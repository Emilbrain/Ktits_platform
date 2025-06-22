<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\Module;
use App\Models\Request as RequestModel;
use App\Models\Task;
use App\Models\TeacherCourseGroup;
use App\Models\Theory;
use App\Models\TheorySections;
use App\Models\User;
use App\Services\BegetAPIService;
use App\Services\BegetDatabaseService;
use App\Services\CourseService;
use App\Services\FileZillaService;
use App\Services\GroupService;
use App\Services\HelperService;
use App\Services\ModuleService;
use App\Services\SubdomainService;
use App\Services\TelegramService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Сервис для работы с API Beget (хостинг).
     * @var BegetAPIService
     */
    protected BegetAPIService $begetApiService;

    /**
     * Сервис для взаимодействия с Telegram ботом.
     * @var TelegramService
     */
    protected TelegramService $telegramService;

    /**
     * Сервис для управления поддоменами.
     * @var SubdomainService
     */
    protected SubdomainService $subdomainService;

    /**
     * Сервис для управления базой данных Beget.
     * @var BegetDatabaseService
     */
    protected BegetDatabaseService $begetDatabaseService;

    /**
     * Сервис для управления FileZilla Beget.
     * @var FileZillaService
     */
    protected FileZillaService $fileZillaService;

    /**
     * Сервис для управления пользователем.
     * @var UserService
     */
    protected UserService $userService;

    protected ModuleService $moduleService;
    protected HelperService $helperService;
    protected CourseService $courseService;
    protected GroupService $groupService;

    /**
     * Символ, отображающий успешное выполнение операции.
     * @var string
     */
    private string $completed = '✅';

    /**
     * Символ, отображающий ошибку при выполнении операции.
     * @var string
     */
    private string $error = '🚫';

    /**
     * Telegram username текущего пользователя.
     * @var ?string
     */
    private ?string $telegramUsername;

    /**
     * Конструктор, в котором происходит инъекция зависимостей.
     *
     * @param BegetAPIService $begetApiService Сервис для работы с API Beget.
     * @param TelegramService $telegramService Сервис для работы с Telegram.
     * @param SubdomainService $subdomainService Сервис для управления поддоменами.
     * @param BegetDatabaseService $begetDatabaseService Сервис для управления базой данных Beget.
     * @param FileZillaService $fileZillaService Сервис для управления FileZilla Beget.
     * @param UserService $userService Сервис для управления пользователем.
     */
    public function __construct(
        BegetAPIService      $begetApiService,
        TelegramService      $telegramService,
        SubdomainService     $subdomainService,
        BegetDatabaseService $begetDatabaseService,
        FileZillaService     $fileZillaService,
        UserService          $userService,
        ModuleService        $moduleService,
        HelperService        $helperService,
        CourseService        $courseService,
        GroupService         $groupService,
    )
    {
        $this->begetApiService = $begetApiService;
        $this->subdomainService = $subdomainService;
        $this->telegramService = $telegramService;
        $this->begetDatabaseService = $begetDatabaseService;
        $this->fileZillaService = $fileZillaService;
        $this->userService = $userService;
        $this->moduleService = $moduleService;
        $this->helperService = $helperService;
        $this->courseService = $courseService;
        $this->groupService = $groupService;
    }

    public function showMain()
    {

        $teacher = User::where('role', 'teacher')->get();
        $teachersCount = count($teacher);

        $student = User::where('role', 'student')->get();
        $studentsCount = count($student);

        $courses = Course::all();
        $coursesCount = count($courses);

        $tasks = Task::with('user.group')->get();
        $tasksByGroup = $tasks->groupBy(fn($task) => $task->user->group->name);

        $raw = Task::selectRaw('status, COUNT(*) as cnt')
            ->groupBy('status')
            ->pluck('cnt', 'status')
            ->toArray();

        $stats = [
            'completed' => $raw['completed'] ?? 0,
            'pending' => $raw['pending'] ?? 0,
            'failed' => $raw['failed'] ?? 0,
        ];
        return view('page.admin.main', compact('tasks', 'tasksByGroup', 'stats', 'teachersCount', 'studentsCount', 'coursesCount'));
    }

    public function showGenerate()
    {
        $groups = Group::all();
        return view('page.admin.generate', compact('groups'));
    }

    public function createUser(Request $request)
    {
        $user = $this->userService->createUser($request);

        if (!is_array($user)) {
            return $this->helperService->returnBackWithError('Ошибка создания пользователя.');
        }

        $login = $user['login'];
        $role = $user['user']->role;
        $userID = $user['user']->id;

        if ($role === 'student') {
            $createDomain = $this->begetApiService->createSiteAndRetrieveIds($login);
            if ($createDomain['status'] === 'success') {
                $this->fileZillaService->createFileZilla([
                    'host' => 'ktplatform.ru',
                    'username' => $createDomain['ftPLogin'],
                    'password' => $createDomain['ftPPassword'],
                    'user_id' => $userID,
                ]);

                $this->subdomainService->createSubdomain([
                    'title' => $createDomain['link'],
                    'user_id' => $userID,
                ]);

                $this->begetDatabaseService->createBegetDatabase([
                    'username' => $createDomain['dbLogin'],
                    'password' => $createDomain['dbPassword'],
                    'user_id' => $userID,
                ]);

            } else {
                $user['user']->delete();
                return $this->helperService->returnBackWithError('Ошибка при создании сайта и поддомена.');
            }
        }

        return $this->helperService->returnWithSuccess('admin.generate', 'Пользователь успешно создан.');
    }


    public function showList(Request $request)
    {
        // Получаем параметры поиска
        $search = $request->input('search');
        $category = $request->input('category');

        // Запрос к таблице пользователей
        $query = User::query();

        // Применяем фильтр по категории (если категория выбрана)
        if ($category) {
            $query->whereHas('group', function ($q) use ($category) {
                $q->where('id', $category);
            });
        }

        // Применяем фильтр поиска (если задан поисковый запрос)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', '%' . $search . '%')
                    ->orWhere('surname', 'like', '%' . $search . '%')
                    ->orWhere('patronymic', 'like', '%' . $search . '%');
            });
        }

        // Получаем отфильтрованные результаты
        $list = $query->paginate(10);

        // Извлекаем все уникальные группы из базы данных
        $groups = Group::all(); // Извлечение всех групп, чтобы использовать их в выпадающем списке
        $count = $list->count();
        $allCount = User::count();

        // Возвращаем представление с отфильтрованными пользователями и группами
        return view('page.admin.list', compact('list', 'groups', 'count', 'allCount'));
    }


    public function showCourses()
    {
        $courses = Course::all();
        return view('page.admin.courses', compact('courses'));
    }

    public function showOneCourse($id)
    {
        $course = Course::findOrFail($id);
        $modules = $course->modules;
        return view('page.admin.course', compact('course', 'modules'));
    }

    public function showAddCourse()
    {
        return view('page.admin.add-course');
    }

    public function storeCourse(Request $request)
    {

        $data = $this->courseService->createCourse($request);

        $logoPath = $this->helperService->uploadFile($request, 'logo', 'courses/logos');

        if ($logoPath) {
            $data['logo'] = $logoPath;
        } else {
            return $this->helperService->returnBackWithError('Ошибка загрузки файла');
        }

        Course::create($data);

        return $this->helperService->returnWithSuccess('admin.courses', 'Курс успешно добавлен');
    }

    public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $data = $this->courseService->updateCourse($request, $course);

        if ($request->hasFile('logo')) {
            $logoPath = $this->helperService->uploadFile($request, 'logo', 'courses/logos');
            if (!$logoPath) {
                return $this->helperService->returnBackWithError('Ошибка загрузки файла');
            }

            if ($course->logo) {
                Storage::disk('public')->delete($course->logo);
            }

            $data['logo'] = $logoPath;
        }

        $course->update($data);


        return $this->helperService->returnWithSuccess('admin.courses', 'Курс успешно обновлён');
    }

    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);

        $title = $course->title;

        $course->delete();

//        $this->telegramService->sendMessageToUsername($this->userService->getTelegramUsername(), 'ADMIN: ' . "группа " . $title . " удалена");

        return $this->helperService->returnWithSuccess('admin.courses', 'Курс ' . $title .' успешно удалена');
    }

    public function showAddGroup()
    {
        return view('page.admin.add-group');
    }

    public function storeGroup(Request $request)
    {
        $data = $this->groupService->createGroup($request);

        Group::create($data);

        $this->telegramService->sendMessageToUsername($this->userService->getTelegramUsername(), 'ADMIN: ' . "группа " . $request->input('title') . " создана");

        return $this->helperService->returnWithSuccess('admin.groups', "Группа " . $request->input('title') . " успешно добавлена");
    }

    public function deleteGroup($id)
    {
        $group = Group::findOrFail($id);

        $title = $group->title;

        $group->delete();

        $this->telegramService->sendMessageToUsername($this->userService->getTelegramUsername(), 'ADMIN: ' . "группа " . $title . " удалена");

        return $this->helperService->returnWithSuccess('admin.groups', 'Группа успешно удалена');
    }

    public function updateGroup(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $data = $this->groupService->updateGroup($request, $id);

        $group->update($data);

        $this->telegramService->sendMessageToUsername($this->userService->getTelegramUsername(), 'ADMIN: ' . "группа " . $request->input('title') . " обновлена");

        return $this->helperService->returnWithSuccess('admin.groups', 'Группа успешно обновлена');
    }

    public function showGroups()
    {
        $groups = Group::all();
        return view('page.admin.groups', compact('groups'));
    }

    public function showAddModule($id)
    {
        return view('page.admin.add-module', compact('id'));
    }

    public function storeModule(Request $request)
    {
        $data = $this->moduleService->createModule($request);
        Module::create($data);

        $courseId = $data['course_id'];

        return $this->helperService->returnWithSuccess('admin.show.course', 'Модуль успешно добавлен', $courseId);
    }

    public function editModule($id)
    {
        $module = Module::findOrFail($id);
        return view('page.admin.edit-module', compact('module'));
    }

    public function updateModule(Request $request, $id)
    {

        $module = Module::findOrFail($id);

        $data = $this->moduleService->updateModule($request, $id);

        $module->update($data);

        $courseId = $data['course_id'];

        return $this->helperService->returnWithSuccess('admin.show.course', 'Модуль успешно обновлен', $courseId);
    }

    public function destroyModule($id)
    {
        $module = Module::findOrFail($id);
        $courseId = $module->course;
        $module->delete();

        return $this->helperService->returnWithSuccess('admin.show.course', 'Модуль успешно удален', $courseId);
    }

    public function showRequests()
    {
        $requests = RequestModel::orderByRaw("status = 'pending' desc")->orderBy('status', 'asc')->paginate(10);
        foreach ($requests as $item) {
            $userId = $item->user_id;
            $user = User::where('id', $userId)->first();
            $group = $user->group->title;
            $item['group'] = $group;
        }
        return view('page.admin.requests', compact('requests'));
    }

    public function updateRequest(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $requestModel = RequestModel::findOrFail($id);

        $requestModel->status = $validatedData['status'];
        $requestModel->save();

        return redirect()->back()->with('success', 'Статус заявки успешно обновлен.');
    }

    public function showTasks()
    {
        $tasks = Task::orderByRaw("FIELD(status, 'pending', 'failed', 'completed')")
            ->with(['user.filezilla', 'module'])
            ->paginate(10);

        // 2) Пробегаем по каждой задаче и для неё собираем список файлов
        foreach ($tasks as $task) {
            $ftpConfig = optional($task->user->filezilla);

            // Если у пользователя нет FTP-учётки — пропускаем
            if (! $ftpConfig) {
                $task->ftpFiles = [];
                continue;
            }

            // 3) Динамически настраиваем диск student_ftp
            Config::set('filesystems.disks.student_ftp', [
                'driver'   => 'ftp',
                'host'     => $ftpConfig->host,
                'username' => $ftpConfig->username,
                'password' => $ftpConfig->password,
                // если FTP-юзер сразу попадает в public_html/{login}, можно оставить пустым:
                'root'     => '',
                'passive'  => true,
                'timeout'  => 30,
            ]);

            $disk = Storage::disk('student_ftp');

            // 4) Папка на FTP определяем по полю comment в модуле
            $folder = trim($task->module->comment ?: '', '/');

            // 5) Если папка есть — получаем файлы, иначе пустой массив
            if ($folder && $disk->exists($folder)) {
                $task->ftpFiles = $disk->files($folder);
            } else {
                $task->ftpFiles = [];
            }
        }

        // 6) Передаём в представление
        return view('page.admin.tasks', compact('tasks'));
    }


    public function showTeachers()
    {
        $assignedTeachers = DB::table('teacher_course_groups')
            ->join('users', 'teacher_course_groups.teacher_id', '=', 'users.id')
            ->join('courses', 'teacher_course_groups.course_id', '=', 'courses.id')
            ->join('groups', 'teacher_course_groups.group_id', '=', 'groups.id')
            ->select(
                'users.username',
                'users.surname',
                'users.id as teacher_id',
                'courses.id as course_id',
                'groups.id as group_id',
                'groups.title as group_title',
                'courses.title as course_title'
            )
            ->get();
        $teachers = User::where('role', 'teacher')->get();
        $groups = Group::all();
        $courses = Course::all();
        return view('page.admin.teachers', compact('groups', 'courses', 'teachers', 'assignedTeachers'));
    }

    public function getCoursesForUsers($groupId, $teacherId)
    {
        $courses = Course::whereHas('requests', function ($query) use ($groupId) {
            $query->whereHas('user', function ($subQuery) use ($groupId) {
                $subQuery->where('group_id', $groupId);
            });
        })->with(['requests' => function ($query) use ($groupId) {
            $query->whereHas('user', function ($subQuery) use ($groupId) {
                $subQuery->where('group_id', $groupId);
            });
        }])->get();

        // Получаем существующие связи для преподавателя
        $existingAssignments = DB::table('teacher_course_groups')
            ->where('teacher_id', $teacherId)
            ->where('group_id', $groupId)
            ->pluck('course_id')
            ->toArray();

        // Возвращаем список курсов и отмеченные курсы
        return response()->json([
            'courses' => $courses,
            'existingAssignments' => $existingAssignments
        ]);
    }

    public function assignTeacherToGroupAndCourses(Request $request)
    {
        $teacherId = $request->input('teacher');
        $groupId = $request->input('group');
        $courseIds = $request->input('courses', []);


        DB::table('teacher_course_groups')
            ->where('teacher_id', $teacherId)
            ->where('group_id', $groupId)
            ->delete();

        if ($teacherId && $groupId && !empty($courseIds)) {
            foreach ($courseIds as $courseId) {
                TeacherCourseGroup::create([
                    'teacher_id' => $teacherId,
                    'course_id' => $courseId,
                    'group_id' => $groupId,
                ]);
            }
            return redirect()->back()->with('success', 'Связи успешно созданы.');
        } else {
            return redirect()->back()->with('error', 'Ошибка, проверьте заполненность полей.');
        }
    }

    public function showTheory()
    {
        $theories = Theory::all();
        return view('page.admin.theory', compact('theories'));
    }

    public function showAddTheoryModule()
    {
        return view('page.admin.add-theory-module');
    }
    public function showEditTheoryModule($id){
        $theory = Theory::findOrfail($id);
        return view('page.admin.edit-theory-module', compact('theory'));

    }
    public function showEditTheoryModuleGlav($id){
        $theory = TheorySections::findOrfail($id);
        return view('page.admin.edit-theory_section', compact('theory'));

    }
    public function showTheoryModule($id)
    {
        $theory = TheorySections::where('theory_id', $id)->get();
        return view('page.admin.modules', compact('theory'), compact('id'));
    }

    public function addTheoryModule(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255|unique:theories,title',
            'logo' => 'required|nullable|image|max:2048', // опционально, до 2 МБ
        ], [
            'title.required' => 'Название обязательно',
            'logo.required' => 'Логотип обязателен',
            'title.unique' => 'Модуль с таким названием уже существует',
            'logo.image'    => 'Файл должен быть изображением',
            'logo.max'      => 'Максимальный размер изображения — 2 МБ',
        ]);

        if ($request->hasFile('logo')) {
            // по умолчанию диск "local" → storage/app
            $path = $request->file('logo')->store('theory_modules');

            // $path теперь строка вида "theory_modules/имя_файла.png"
            $data['logo'] = $path;
        }
        Theory::create($data);

        // 4) Редирект со сообщением об успехе
        return redirect()
            ->route('admin.show.theory')
            ->with('success', 'Модуль теории успешно создан');
    }

    public function showAddTheorySection($id)
    {
        return view('page.admin.add-theory_section', compact('id'));
    }

    public function showGlavTheory($id){
        $theory = TheorySections::FindOrFail($id);
        return view('page.admin.glav', compact('theory'));
    }

    public function setting()
    {
        return view('page.admin.setting');
    }

    public function updateTelegramUserName(Request $request)
    {
        $userId = auth()->id();
        $this->telegramService->updateTelegramUsers();
        $isUpdate = $this->userService->updateTelegramUserName($request, $userId);
        if ($isUpdate) {
            $this->helperService->returnWithSuccess('admin.setting', 'Ник успешно обновлен.');
        } else {
            $this->helperService->returnBackWithError('Не удалось обновить ник;');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'current_password.required' => 'Введите текущий пароль',
            'new_password.required' => 'Введите новый пароль',
            'new_password.min' => 'Пароль должен быть не менее 6 символов',
            'new_password.confirmed' => 'Подтверждение пароля не совпадает',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Текущий пароль указан неверно'])->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->pp = $request->new_password;
        $user->save();

        return back()->with('success', 'Пароль успешно обновлён');
    }

    public function updateAvatar(Request $request)
    {
        // 1) Валидация
        $request->validate([
            'logo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Auth::user();

        // 2) Удаляем старый, если есть
        if ($user->logo) {
            $old = public_path($user->logo);
            if (file_exists($old)) {
                unlink($old);
            }
        }

        // 3) Папка public/avatar
        $avatarDir = public_path('logo');
        if (!is_dir($avatarDir)) {
            mkdir($avatarDir, 0755, true);
        }

        // 4) Сохраняем новый файл
        $path = $request
            ->file('logo')
            ->store('avatars', 'public');

        // 5) Сохраняем в БД относительный путь
        $user->logo =  $path;
        $user->save();

        return back()->with('success', 'Аватар обновлён!');
    }
}
