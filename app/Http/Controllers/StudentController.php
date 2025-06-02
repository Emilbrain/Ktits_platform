<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Module;
use App\Models\Request as RequestModel;
use App\Models\Task;
use App\Models\Theory;
use App\Models\TheorySections;
use App\Services\CourseService;
use App\Services\HelperService;
use App\Services\ModuleService;
use App\Services\TaskService;
use App\Services\TelegramService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    protected TaskService $taskService;
    protected CourseService $courseService;
    protected ModuleService $moduleService;
    protected HelperService $helperService;

    protected UserService $userService;
    protected TelegramService $telegramService;

    public function __construct(
        TaskService     $taskService,
        CourseService   $courseService,
        ModuleService   $moduleService,
        HelperService   $helperService,
        UserService     $userService,
        TelegramService $telegramService
    )
    {
        $this->taskService = $taskService;
        $this->courseService = $courseService;
        $this->moduleService = $moduleService;
        $this->helperService = $helperService;
        $this->userService = $userService;
        $this->telegramService = $telegramService;
    }

    public function showMain()
    {
        $userId = auth()->id();
        $tasks = $this->taskService->getTasksForUser($userId);
        $courses = $this->courseService->getCoursesForUser($userId);
        foreach ($courses as $course) {
            $course->progress = $this->courseService->calculateCourseProgress($course, $userId);
        }

        $courses = $courses->sortBy('progress');

        return view('page.student.main', compact('courses', 'tasks'));
    }

    public function loadMoreHistory(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);

        $userId = auth()->id();

        $tasks = Task::where('user_id', $userId)
            ->with('module.course') // Подключаем связанные таблицы
            ->orderByRaw("FIELD(status, 'failed', 'pending', 'completed')") // Сортировка по статусу
            ->orderBy('updated_at', 'desc') // Сортировка по времени изменения
            ->offset($offset)
            ->limit($limit)
            ->get();

        $tasks->transform(function ($task) {
            $task->status = $this->taskService->translateStatus($task->status);
            return $task;
        });
        return response()->json($tasks);
    }

    public function showSettings()
    {
        return view('page.student.settings');
    }

    public function showCourses()
    {
        $userId = auth()->id();
        $courses = Course::all();

        foreach ($courses as $course) {
            $request = RequestModel::where('course_id', $course->id)->where('user_id', $userId)->first();
            if (isset($request) && $request->status === "accepted") {
                $course->progress = $this->courseService->calculateCourseProgress($course, $userId);
            }else{
                $course->progress = null;
            }
        }

        return view('page.student.courses', compact('courses'));
    }


    public function showSetting()
    {
        return view('page.student.setting');
    }

    public function showOneCourse($id)
    {
        $course = Course::findOrFail($id);
        $userId = auth()->id();
        $request = RequestModel::where('user_id', $userId)->where('course_id', $course->id)->first();
        if (isset($request) && $request->status === "accepted") {
            $course->progress = $this->courseService->calculateCourseProgress($course, $userId);
        }

        $modules = $course->modules;

        foreach($modules as $module) {
            $task = $this->taskService->getTasksByModule($module->id, $userId)->first();
            if (!is_null($task)) {
                $module['status_and'] = $this->taskService->translateStatus($task->status);
            }
        }

        return view('page.student.one-course', compact('course', 'request', 'modules'));
    }

    public function showOneModule($id)
    {
        $userId = auth()->id();
        $module = $this->moduleService->getModuleById($id);
        $task = $this->taskService->getTasksByModule($module->id, $userId)->first();

        if ($task) {
            $comments = $task->comments;
            $comments = $this->helperService->formatDate($comments);
            $task->formatted_status = $this->taskService->translateStatus($task->status);
            return view('page.student.one-module', compact('module', 'task', 'comments'));
        }

        return view('page.student.one-module', compact('module'));
    }

    public function updateTelegramUserName(Request $request)
    {
        $userId = auth()->id();
        $this->telegramService->updateTelegramUsers();
        $isUpdate = $this->userService->updateTelegramUserName($request, $userId);
        if ($isUpdate) {
           return $this->helperService->returnWithSuccess('student.setting', 'Ник успешно обновлен.');
        } else {
           return $this->helperService->returnBackWithError('Не удалось обновить ник;');
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


    public function showTheory()
    {
        $theories = Theory::all();
        return view('page.student.theory', compact('theories'));
    }

    public function showModules($id)
    {
        $theory = TheorySections::where('theory_id', $id)->get();
        return view('page.student.modules', compact('theory'));
    }

    public function showGlav($id){
        $theory = TheorySections::FindOrFail($id);
        return view('page.student.glav', compact('theory'));
    }
    public function showOneModules()
    {
        return view('page.student.one-module');
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

