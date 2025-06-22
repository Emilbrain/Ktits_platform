<?php

namespace App\Http\Controllers;

use App\Models\Theory;
use App\Models\TheorySections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TheoryController extends Controller
{
    public function theorySectionStore(Request $request){
        $data = $request->validate([
            'title'      => ['required', 'string', 'max:255'],
            'theory'     => ['required', 'string'],
            'theory_id'  => ['required', 'integer', 'exists:theories,id'],
            // предположим, что есть таблица "theories" с первичным ключом "id"
        ], [
            'title.required'     => 'Поле «Название» обязательно.',
            'title.max'          => 'Длина заголовка не может превышать 255 символов.',
            'theory.required'    => 'Поле «Теория» не должно быть пустым.',
            'theory_id.required' => 'Не указан родительский элемент теории.',
            'theory_id.exists'   => 'Указанная теория не найдена.',
        ]);

        // 2) Создание записи в таблице theory_sections
        TheorySections::create([
            'title'     => $data['title'],
            'theory'    => $data['theory'],
            'theory_id' => $data['theory_id'],
        ]);

        // 3) Редирект обратно (или куда нужно), с flash-уведомлением об успехе
        return redirect()
            ->route('admin.show.theory.module', $data['theory_id'])
            ->with('success', 'Секция теории успешно добавлена.');

    }

    public function theoryDest( $id){
        // найдём запись
        $theory = Theory::findOrFail($id);

        // удалим
        $theory->delete();

        // редирект обратно на список с флаш-сообщением
        return redirect()
            ->route('admin.show.theory')
            ->with('success', 'Модуль успешно удалён.');
    }

    public function updateTheoryModule(Request $request, $id)
    {
        // 1) Валидация входящих полей
        $data = $request->validate([
            'title' => 'required|string|max:255|unique:theories,title',
            'logo' => 'image|max:2048',
        ], [
            'title.required' => 'Название обязательно',
            'logo.required' => 'Логотип обязателен',
            'title.unique' => 'Модуль с таким названием уже существует',
            'logo.image' => 'Файл должен быть изображением',
            'logo.max' => 'Максимальный размер изображения — 2 МБ',
        ]);

        // 2) Поиск модуля (теоретического раздела) или 404
        $module = Theory::findOrFail($id);

        $update = [
            'title' => $data['title'],
            'content' => $data['content'] ?? $module->content,
        ];

        if ($request->hasFile('logo')) {
            // Опционально: удалить старый файл
            if ($module->logo && Storage::disk('public')->exists($module->logo)) {
                Storage::disk('public')->delete($module->logo);
            }

            // Сохраняем новый логотип в public/storage/logos
            $path = $request->file('logo')
                ->store('logos', 'public');

            $update['logo'] = $path;
        }

        // 5) Обновляем модель
        $module->update($update);

        // 6) Редирект обратно с флаш-сообщением
        return redirect()
            ->route('admin.show.theory')
            ->with('success', 'Модуль успешно обновлён.');
    }

    public function theoryGlavDest( $id){
        // найдём запись
        $theory = TheorySections::findOrFail($id);

        // удалим
        $theory->delete();

        // редирект обратно на список с флаш-сообщением
        return redirect()
            ->back()
            ->with('success', 'Модуль успешно удалён.');
    }

    public function updateTheoryModuleSectin(Request $request, $id){
         $theory = TheorySections::findOrFail($id);
        $data = $request->validate([
            'title'      => ['required', 'string', 'max:255'],
            'theory'     => ['required', 'string'],
            // предположим, что есть таблица "theories" с первичным ключом "id"
        ], [
            'title.required'     => 'Поле «Название» обязательно.',
            'title.max'          => 'Длина заголовка не может превышать 255 символов.',
            'theory.required'    => 'Поле «Теория» не должно быть пустым.',
        ]);

        $update = [
            'title'     => $data['title'],
            'theory'    => $data['theory'],
        ];

        // 4) Выполнить обновление
        $theory->update($update);

        // 5) Редирект на страницу модуля, где показываются все секции
        return redirect()
            ->route('admin.show.theory.module', $id)
            ->with('success', 'Глава успешно обновлена.');
    }
}
