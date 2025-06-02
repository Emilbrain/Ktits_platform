<?php

namespace App\Http\Controllers;

use App\Models\TheorySections;
use Illuminate\Http\Request;

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
            ->route('admin.show.theory', $data['theory_id'])
            ->with('success', 'Секция теории успешно добавлена.');

    }
}
