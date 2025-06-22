<?php

namespace App\Services;

use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ModuleService
{
    public function getModuleById(int $id)
    {
        return Module::findOrFail($id);
    }

    public function getModulesForCourse(int $courseId)
    {
        return Module::where('course_id', $courseId)->get();
    }

    public function createModule($request)
    {
        $data = $this->validateModule($request);
        $data['stat']= 'theory';
        $data['status']= 'necessarily';
        $data['slug'] = Str::slug($request->input('title'));

        if ($request->hasFile('video')) {
            $data['video_link'] = $request
                ->file('video')
                ->store('video', 'public');
        }

        if ($request->hasFile('video_avatar')) {
            $data['video_avatar'] = $request
                ->file('video_avatar')
                ->store('video_avatar', 'public');
        }

        return $data;
    }

    public function updateModule($request, int $id)
    {
        $module = Module::findOrFail($id);

        $data = $this->validateModule($request, $id);

        $data['slug'] = Str::slug($request->input('title'));

        if ($request->hasFile('video')) {
            if ($module->video_link) {
                Storage::disk('public')->delete($module->video_link);
            }
            $data['video_link'] = $request
                ->file('video')
                ->store('video', 'public');
        }

        if ($request->hasFile('video_avatar')) {
            if ($module->video_avatar) {
                Storage::disk('public')->delete($module->video_avatar);
            }
            $data['video_avatar'] = $request
                ->file('video_avatar')
                ->store('video_avatar', 'public');
        }

        return $data;
    }

    private function validateModule($request, $ignoreId = null)
    {
        return $request->validate([
            'title' => [
                'required',
                'max:255',
                Rule::unique('modules')->ignore($ignoreId), // Уникальность, игнорируя текущий модуль
            ],
            'comment' => 'nullable|max:255',
            'theory' => 'required',
            'task' => 'required',
            'course_id' => 'required|exists:courses,id',
            'video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:51200',
            'video_avatar'  => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:10240',
        ],
            [
                'title.required' => 'Поле "Название" обязательно для заполнения.',
                'title.max' => 'Поле "Название" не должно превышать :max символов.',
                'title.unique' => 'Поле "Название" должно быть уникальным.',
                'comment.max' => 'Поле "Комментарий" не должно превышать :max символов.',
                'theory.required' => 'Поле "Теория" обязательно для заполнения.',
                'task.required' => 'Поле "Задача" обязательно для заполнения.',
                'stat.required' => 'Поле "Тип" обязательно для заполнения.',
                'stat.in' => 'Поле "Тип" должно быть одним из следующих: theory, practice.',
                'status.required' => 'Поле "Статус" обязательно для заполнения.',
                'status.in' => 'Поле "Статус" должно быть одним из следующих: necessarily, not necessary.',
                'course_id.required' => 'Поле "Курс" обязательно для заполнения.',
                'course_id.exists' => 'Выбранный курс не существует.',
                'video.mimes'           => 'Видео должно быть в формате MP4, MOV, AVI или WMV.',
                'video.max'             => 'Максимальный размер видео — 50 МБ.',
                'video_avatar.image' => 'Аватар видео должен быть изображением.',
                'video_avatar.mimes' => 'Аватар видео: JPG, JPEG, PNG, GIF или SVG.',
                'video_avatar.max'   => 'Максимальный размер аватара — 10 МБ.',
            ]);
    }
}
