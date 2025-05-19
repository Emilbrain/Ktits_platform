@extends('includes.layout')
@section('h2-name', 'Группа '.  $group->title )
@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Группа: {{ $group->title }}</h2>
        <p class="text-gray-600 mb-6">Количество студентов: <strong>{{ $group->student_count }}</strong></p>

        <a href="{{$group->link}}"
           class="inline-block bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition duration-300">
            Перейти к студентам группы
        </a>
    </div>
@endsection
