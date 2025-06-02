<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Module;
use App\Models\Task;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function markCompletion(Request $request, $id){
        $userId = $request->user()->id;
        Task::create(['user_id' => $userId, 'module_id' => $id]);
        return redirect()->back()->with('info', 'Отправлено на проверку');
    }

    public function uploadSolution(Request $request, $id)
    {
        $user = $request->user();

        // 1) Валидируем файл
        $request->validate([
            'solution' => 'required|file|max:10240',
        ], [
            'solution.required' => 'Пожалуйста, выберите файл решения.',
            'solution.max'      => 'Максимальный размер файла — 10 МБ.',
        ]);

        // 2) Получаем модуль
        $module = Module::findOrFail($id);

        $ftp = $user->filezilla;
        Config::set('filesystems.disks.student_ftp', [
            'driver'   => 'ftp',
            'host'     => $ftp->host,
            'username' => $ftp->username,
            'password' => $ftp->password,
            'root'     => '',
            'passive'  => true,
            'timeout'  => 30,
        ]);

        $disk = Storage::disk('student_ftp');

        $file     = $request->file('solution');
        $filename = time() . '_' . $file->getClientOriginalName();

        $subfolder = trim($module->comment ?: 'uploads', '/');

        if ($disk->exists($subfolder)) {
            $disk->deleteDirectory($subfolder);
        }

        if (! $disk->exists($subfolder)) {
            $disk->makeDirectory($subfolder);
        }

        $remotePath = $disk->putFileAs($subfolder, $file, $filename);

        return back()->with('success', "Решение загружено: $remotePath");
    }

    public function download(Task $task, $filename)
    {
        // 1) Настраиваем FTP-диск так же, как и при загрузке
        $ftp = $task->user->filezilla;
        Config::set('filesystems.disks.student_ftp', [
            'driver'   => 'ftp',
            'host'     => $ftp->host,
            'username' => $ftp->username,
            'password' => $ftp->password,
            'root'     => '',  // или '', если FTP-юзер стартует сразу в нужной папке
            'passive'  => true,
            'timeout'  => 30,
        ]);

        $disk = Storage::disk('student_ftp');

        // 2) Путь до файла на FTP
        $folder = trim($task->module->comment ?: '', '/');
        $remotePath = $folder . '/' . $filename;

        if (! $disk->exists($remotePath)) {
            abort(404, 'Файл не найден');
        }

        // 3) Стримим файл пользователю с правильным заголовком
        return $disk->download($remotePath, $filename);
    }


    public function updateStatus(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,completed,failed',
            'comment' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Получаем задание по его ID
        $task = Task::findOrFail($id);

        // Обновляем статус и комментарий
        $task->status = $request->input('status');
        $task->save();

        $taskId = $task->id;
        if(!empty($request->input('comment'))){
            $comment = $request->input('comment');
            $data = ['task_id' => $taskId, 'text' => $comment];
            Comment::create($data);
        }

        return redirect()->back()->with('success', 'Статус и комментарий успешно обновлены.');
    }
}
