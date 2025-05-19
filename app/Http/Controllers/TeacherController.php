<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Services\CourseService;
use App\Services\HelperService;
use App\Services\TelegramService;
use App\Services\UserService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    protected HelperService $helperService;
    protected UserService $userService;
    protected TelegramService $telegramService;

    public function __construct(
        HelperService $helperService,
        UserService $userService,
        TelegramService $telegramService,
    ){
        $this->helperService = $helperService;
        $this->userService = $userService;
        $this->telegramService = $telegramService;
    }

    public function showMain()
    {
        return view('page.teacher.main');
    }
    public function showSetting(){

        return view('page.teacher.setting');
    }

    public function showGroups()
    {
        $groups = Group::withCount(['User as student_count' => function ($query) {
            $query->where('role', 'student');
        }])->get();
        return view('page.teacher.groups', compact('groups'));
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

}
