<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherCourseGroupController;
use App\Http\Controllers\TheoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showMain'])->name('index');


// Доступ для всех авторизованных пользователей
Route::middleware('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::get('/confirm', [AuthController::class, 'showConfirm'])->name('confirm');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Маршруты для студентов
    Route::prefix('student')->group(function () {
        // routes/web.php
        Route::get('/load-more-history', [StudentController::class, 'loadMoreHistory'])->name('student.load-more-history');
        Route::get('/', [StudentController::class, 'showMain'])->name('student.main');
        Route::get('/courses', [StudentController::class, 'showCourses'])->name('student.courses');
        Route::get('/setting', [StudentController::class, 'showSetting'])->name('student.setting');
        Route::post('/setting/update/telegram', [StudentController::class, 'updateTelegramUserName'])->name('student.setting.update.telegram');
        Route::post('/setting/update/password', [StudentController::class, 'updatePassword'])->name('student.setting.update.password');
        Route::post('/setting/update/avatar', [StudentController::class, 'updateAvatar'])->name('student.setting.update.avatar');

        Route::get('/courses/course/{id}', [StudentController::class, 'showOneCourse'])->name('student.one.course');
        Route::get('/courses/course/module/{id}', [StudentController::class, 'showOneModule'])->name('student.one.module');

        Route::post('/courses/course/{id}/request', [RequestController::class, 'record'])->name('student.request.record');

        Route::post('/task/create/{id}', [TaskController::class, 'markCompletion'])->name('student.task.create');
        Route::post('/module/{id}/upload', [TaskController::class, 'uploadSolution'])->name('student.module.upload');


        Route::get('/theory', [StudentController::class, 'showTheory'])->name('student.theory');
        Route::get('/theory/modules/{id}', [StudentController::class, 'showModules'])->name('student.theory.modules');
        Route::get('/theory/one-modules', [StudentController::class, 'showOneModules'])->name('student.theory.one-module');
        Route::get('/theory/glav/{id}', [StudentController::class, 'showGlav'])->name('student.glav.theory');
    });


    // Маршруты для преподавателей
    Route::prefix('teacher')->group(function () {
        Route::get('/main', [TeacherController::class, 'showMain'])->name('teacher.main');
        Route::get('/requests', [TeacherController::class, 'showRequest'])->name('teacher.request');
        Route::get('/groups', [TeacherController::class, 'showGroups'])->name('teacher.groups');

        Route::get('/courses', [TeacherController::class, 'showCourses'])->name('teacher.courses');
        Route::get('/courses/course/{id}', [TeacherController::class, 'showOneCourses'])->name('teacher.show.course');

        Route::get('/courses/add/module/{id}', [TeacherController::class, 'showAddModule'])->name('teacher.add.module');
        Route::post('/courses/add/module/store', [TeacherController::class, 'storeModule'])->name('teacher.store.module');

        Route::get('/course/module/{id}/edit', [TeacherController::class, 'showEditModule'])->name('teacher.edit.module');
        Route::put('/course/module/{id}/update', [TeacherController::class, 'updateModule'])->name('teacher.update.module');
        Route::post('/courses/module/destroy/{id}', [TeacherController::class, 'destroyModule'])->name('teacher.module.delete');
        Route::get('/courses/course/module/{module}/download', [TeacherController::class, 'downloadSolution'])->name('teacher.module.download');
        Route::get('/tasks/{task}/download/{filename}', [TaskController::class, 'download'])->name('teacher.tasks.download');

        Route::put('/task/update/{id}', [TaskController::class, 'updateStatus'])->name('teacher.task.update');

        Route::get('/group/{id}', [TeacherController::class, 'showOneGroup'])->name('teacher.one.group');
        Route::get('/setting', [TeacherController::class, 'showSetting'])->name('teacher.setting');
        Route::post('/setting/update/telegram', [TeacherController::class, 'updateTelegramUserName'])->name('teacher.setting.update.telegram');
        Route::post('/setting/update/password', [TeacherController::class, 'updatePassword'])->name('teacher.setting.update.password');
        Route::post('/setting/update/avatar', [TeacherController::class, 'updateAvatar'])->name('teacher.setting.update.avatar');

    });

    // Маршруты для администраторов
    Route::prefix('admin')->group(function () {
        Route::get('/test', [AuthController::class, 'showIndex'])->name('admin.test');

        Route::get('/', [AdminController::class, 'showMain'])->name('admin.main');
        Route::get('/generate', [AdminController::class, 'showGenerate'])->name('admin.generate');
        Route::post('/generate', [AdminController::class, 'createUser'])->name('admin.generate.store');
        Route::get('/list', [AdminController::class, 'showList'])->name('admin.list');

        Route::get('/requests', [AdminController::class, 'showRequests'])->name('admin.requests');
        Route::put('/request/update/{id}', [AdminController::class, 'updateRequest'])->name('admin.request.update');

        Route::get('/courses', [AdminController::class, 'showCourses'])->name('admin.courses');

        Route::get('/courses/course/{id}', [AdminController::class, 'showOneCourse'])->name('admin.show.course');

        Route::post('/courses/module/destroy/{id}', [AdminController::class, 'destroyModule'])->name('admin.module.delete');
        Route::get('/courses/course/module/{module}/download', [AdminController::class, 'downloadSolution'])->name('admin.module.download');
        Route::get('/courses/add/module/{id}', [AdminController::class, 'showAddModule'])->name('admin.add.module');
        Route::post('/courses/add/module/store', [AdminController::class, 'storeModule'])->name('admin.store.module');

        Route::get('/groups', [AdminController::class, 'showGroups'])->name('admin.groups');
        Route::get('/add/group', [AdminController::class, 'showAddGroup'])->name('admin.add.group');
        Route::post('/add/group', [AdminController::class, 'storeGroup'])->name('admin.store.group');
        Route::put('/group/update/{id}', [AdminController::class, 'updateGroup'])->name('admin.group.update');
        Route::post('/group/delete/{id}', [AdminController::class, 'deleteGroup'])->name('admin.group.delete');

        Route::get('/add/course', [AdminController::class, 'showAddCourse'])->name('admin.add.course');
        Route::post('/add/course', [AdminController::class, 'storeCourse'])->name('admin.store.course');
        Route::put('/course/update/{id}', [AdminController::class, 'updateCourse'])->name('admin.update.course');
        Route::post('/course/delete/{id}', [AdminController::class, 'deleteCourse'])->name('admin.course.delete');

        Route::get('/course/module/{id}/edit', [AdminController::class, 'editModule'])->name('admin.edit.module');
        Route::put('/course/module/{id}/update', [AdminController::class, 'updateModule'])->name('admin.update.module');

        Route::get('/show/tasks', [AdminController::class, 'showTasks'])->name('admin.show.tasks');
        Route::put('/task/update/{id}', [TaskController::class, 'updateStatus'])->name('admin.task.update');
        Route::get('/tasks/{task}/download/{filename}', [TaskController::class, 'download'])->name('admin.tasks.download');

        Route::get('/show/teachers', [AdminController::class, 'showTeachers'])->name('admin.show.teachers');
        Route::get('/show/teachers/get/{group_id}/{teacher_id}', [AdminController::class, 'getCoursesForUsers'])->name('admin.show.teachers.get');
        Route::post('/show/teachers/assign', [AdminController::class, 'assignTeacherToGroupAndCourses'])->name('admin.assign.store');
        Route::post('/assign/remove/{teacher_id}/{group_id}/{course_id}', [TeacherCourseGroupController::class, 'remove'])->name('admin.assign.remove');

        Route::get('/show/theory', [AdminController::class, 'showTheory'])->name('admin.show.theory');
        Route::get('/show/glav/{id}/theory', [AdminController::class, 'showGlavTheory'])->name('admin.glav.theory');
        Route::get('/show/theory/module/{id}', [AdminController::class, 'showTheoryModule'])->name('admin.show.theory.module');
        Route::get('/show/theory/section/add/{id}', [AdminController::class, 'showAddTheorySection'])->name('admin.show.theory.section.add');
        Route::get('/show/theory/add/', [AdminController::class, 'showAddTheoryModule'])->name('admin.show.module.theory.add');
        Route::get('/show/theory/{id}/edit/', [AdminController::class, 'showEditTheoryModule'])->name('admin.edit.theory.module');
        Route::get('/show/theory/glav/{id}/edit/', [AdminController::class, 'showEditTheoryModuleGlav'])->name('admin.edit.theory.module.glav');
        Route::post('/theory/module/add', [AdminController::class, 'addTheoryModule'])->name('admin.store.theory.module');
        Route::put('/theory/module/{id}/update', [TheoryController::class, 'updateTheoryModule'])->name('admin.update.theory.module');
        Route::put('/theory/module/section/{id}/update', [TheoryController::class, 'updateTheoryModuleSectin'])->name('admin.edit.theory.section');
        Route::post('/theory/section/store', [TheoryController::class, 'theorySectionStore'])->name('admin.store.theory.section');
        Route::delete('theory/modules/{id}', [TheoryController::class, 'theoryDest'])->name('admin.del.module');
        Route::delete('theory/modules/galav/{id}/delete', [TheoryController::class, 'theoryGlavDest'])->name('admin.glava.module.destroy');

        Route::get('/setting', [AdminController::class, 'setting'])->name('admin.setting');
        Route::post('/setting/update/telegram', [AdminController::class, 'updateTelegramUserName'])->name('admin.setting.update.telegram');
        Route::post('/setting/update/avatar', [AdminController::class, 'updateAvatar'])->name('admin.setting.update.avatar');
        Route::post('/setting/update/password', [AdminController::class, 'updatePassword'])->name('admin.setting.update.password');

    });
});
