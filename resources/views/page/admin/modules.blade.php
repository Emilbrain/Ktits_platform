@extends('includes.layout')
@section('h2-name', 'Модуль')
@section('content')
    <div class="flex justify-end mb-6">
        <a
            href="{{route('admin.show.theory.section.add', $id)}}"
            class="inline-flex items-center px-5 py-2 bg-blue-600 text-white font-medium rounded-md
           hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        >
            <i class="bx bx-plus mr-2"></i>
            Добавить главу
        </a>

    </div>

    @forelse($theory as $item)
        <a href="{{route('admin.glav.theory', $item->id)}}" class="flex items-center w-full justify-between bg-white rounded-md p-5 mb-4">
            <p>{{$item->title}}</p>
        </a>
    @empty
        Список глав пока пуст
    @endforelse



@endsection
