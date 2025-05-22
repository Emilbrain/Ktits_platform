<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\Module;
use App\Models\Task;
use App\Models\TeacherCourseGroup;
use App\Models\User;
use App\Services\CourseService;
use App\Services\HelperService;
use App\Services\ModuleService;
use App\Services\TelegramService;
use App\Services\UserService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected ModuleService $moduleService;
    protected HelperService $helperService;
    protected UserService $userService;
    protected TelegramService $telegramService;

    public function __construct(
        HelperService $helperService,
        UserService $userService,
        TelegramService $telegramService,
        ModuleService $moduleService,
    ){
        $this->helperService = $helperService;
        $this->userService = $userService;
        $this->telegramService = $telegramService;
        $this->moduleService = $moduleService;
    }

    public function showMain()
    {
        $courses = TeacherCourseGroup::with('course')->where('teacher_id', auth()->user()->id)->get();
        $tasks = Task::whereHas('module.course.TeacherCourseGroup', function ($query) {
            $query->where('teacher_id', auth()->id());
        })->paginate(10);

        return view('page.teacher.main', compact('courses', 'tasks'));
    }
    public function showSetting(){

        return view('page.teacher.setting');
    }

    public function showGroups()
    {
        return view('page.teacher.groups');
    }

    public function showOneGroup($id)
    {
        $user = User::where('group_id', $id)->first();
        $group = Group::FindOrFail($id);
        return view('page.teacher.one-group', compact('user', 'group'));
    }

    public function showRequest()
    {
        return view('page.teacher.request');
    }

    public function updateTelegramUserName(Request $request)
    {
        $userId = auth()->id();
        $this->telegramService->updateTelegramUsers();
        $isUpdate = $this->userService->updateTelegramUserName($request, $userId);
        if($isUpdate){
            $this->helperService->returnWithSuccess('teacher.setting', 'Ник успешно обновлен.');
        }else{
            $this->helperService->returnBackWithError('Не удалось обновить ник;');
        }
    }

    public function showCourses()
    {
        $courses = TeacherCourseGroup::with('course')
            ->where('teacher_id', auth()->id())
            ->get()
            ->unique('course')
            ->values();
        return view('page.teacher.courses', compact('courses'));
    }

    public function showOneCourses($id){
        $course = Course::where('id', $id)->first();
        $modules = Module::where('course_id', $id)->get();
        return view('page.teacher.course', compact('course', 'modules'));
    }
    public function showAddModule($id)
    {
        return view('page.teacher.add-module', compact('id'));
    }

    public function storeModule(Request $request)
    {
        $data = $this->moduleService->createModule($request);

        Module::create($data);

        $courseId = $data['course_id'];

        return $this->helperService->returnWithSuccess('teacher.show.course', 'Модуль успешно добавлен', $courseId);
    }

    public function showEditModule($id){
        $module = Module::where('id', $id)->first();
        return view('page.teacher.edit-module', compact('module'));
    }

    public function updateModule(Request $request, $id)
    {

        $module = Module::findOrFail($id);

        $data = $this->moduleService->updateModule($request, $id);

        $module->update($data);

        $courseId = $data['course_id'];

        return $this->helperService->returnWithSuccess('teacher.show.course', 'Модуль успешно обновлен', $courseId);
    }

    public function destroyModule($id)
    {
        $module = Module::findOrFail($id);
        $courseId = $module->course;
        $module->delete();

        return $this->helperService->returnWithSuccess('teacher.show.course', 'Модуль успешно удален', $courseId);
    }

}
