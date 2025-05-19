<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherCourseGroupController;
use Illuminate\Support\Facades\Route;

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
        Route::get('/courses/course/{id}', [StudentController::class, 'showOneCourse'])->name('student.one.course');
        Route::get('/courses/course/module/{id}', [StudentController::class, 'showOneModule'])->name('student.one.module');

        Route::post('/courses/course/{id}/request', [RequestController::class, 'record'])->name('student.request.record');

        Route::post('/task/create/{id}', [TaskController::class, 'markCompletion'])->name('student.task.create');

        Route::get('/theory', [StudentController::class, 'showTheory'])->name('student.theory');
        Route::get('/theory/modules',[StudentController::class, 'showModules'])->name('student.theory.modules');
    });

    // Маршруты для преподавателей
    Route::prefix('teacher')->group(function () {
        Route::get('/', [TeacherController::class, 'showMain'])->name('teacher.main');
        Route::get('/requests', [TeacherController::class, 'showRequest'])->name('teacher.request');
        Route::get('/groups', [TeacherController::class, 'showGroups'])->name('teacher.groups');
        Route::get('/groups/{id}/group', [TeacherController::class, 'showOneGroup'])->name('teacher.one.group');
        Route::get('/setting', [TeacherController::class, 'showSetting'])->name('teacher.setting');
        Route::post('/setting/update/telegram', [TeacherController::class, 'updateTelegramUserName'])->name('teacher.setting.update.telegram');
    });

    // Маршруты для администраторов
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'showMain'])->name('admin.main');
        Route::get('/generate', [AdminController::class, 'showGenerate'])->name('admin.generate');
        Route::post('/generate', [AdminController::class, 'createUser'])->name('admin.generate.store');
        Route::get('/list', [AdminController::class, 'showList'])->name('admin.list');

        Route::get('/requests', [AdminController::class, 'showRequests'])->name('admin.requests');
        Route::put('/request/update/{id}', [AdminController::class, 'updateRequest'])->name('admin.request.update');

        Route::get('/courses', [AdminController::class, 'showCourses'])->name('admin.courses');

        Route::get('/courses/course/{id}', [AdminController::class, 'showOneCourse'])->name('admin.show.course');

        Route::post('/courses/module/destroy/{id}', [AdminController::class, 'destroyModule'])->name('admin.module.delete');

        Route::get('/courses/add/module/{id}', [AdminController::class, 'showAddModule'])->name('admin.add.module');
        Route::post('/courses/add/module/store', [AdminController::class, 'storeModule'])->name('admin.store.module');

        Route::get('/groups', [AdminController::class, 'showGroups'])->name('admin.groups');
        Route::get('/add/group', [AdminController::class, 'showAddGroup'])->name('admin.add.group');
        Route::post('/add/group', [AdminController::class, 'storeGroup'])->name('admin.store.group');
        Route::put('/group/update/{id}', [AdminController::class, 'updateGroup'])->name('admin.group.update');
        Route::post('/group/delete/{id}', [AdminController::class, 'deleteGroup'])->name('admin.group.delete');

        Route::get('/add/course', [AdminController::class, 'showAddCourse'])->name('admin.add.course');
        Route::post('/add/course', [AdminController::class, 'storeCourse'])->name('admin.store.course');

        Route::get('/course/module/{id}/edit', [AdminController::class, 'editModule'])->name('admin.edit.module');
        Route::put('/course/module/{id}/update', [AdminController::class, 'updateModule'])->name('admin.update.module');

        Route::get('/show/tasks', [AdminController::class, 'showTasks'])->name('admin.show.tasks');
        Route::put('/task/update/{id}', [TaskController::class, 'updateStatus'])->name('admin.task.update');

        Route::get('/show/teachers', [AdminController::class, 'showTeachers'])->name('admin.show.teachers');
        Route::get('/show/teachers/get/{group_id}/{teacher_id}', [AdminController::class, 'getCoursesForUsers'])->name('admin.show.teachers.get');
        Route::post('/show/teachers/assign', [AdminController::class, 'assignTeacherToGroupAndCourses'])->name('admin.assign.store');
        Route::post('/assign/remove/{teacher_id}/{group_id}/{course_id}', [TeacherCourseGroupController::class, 'remove'])->name('admin.assign.remove');

        Route::get('/setting', [AdminController::class, 'setting'])->name('admin.setting');
        Route::post('/setting/update/telegram', [AdminController::class, 'updateTelegramUserName'])->name('admin.setting.update.telegram');
    });
});
