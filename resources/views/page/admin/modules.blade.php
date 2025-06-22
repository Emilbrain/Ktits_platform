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
        <div class="mt-3">
            <a href="{{route('admin.glav.theory', $item->id)}}"
               class="flex items-center w-full justify-between bg-white rounded-md p-5 mb-4">
                <p>{{$item->title}}</p>
            </a>

            <div class="flex flex-col sm:flex-row items-center mt-3 gap-5">
                <form action="{{route('admin.glava.module.destroy',  $item->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit"
                            class=" w-full sm:w-auto bg-red-500 hover:bg-red-800 text-white font-medium px-5 py-2 rounded-lg">
                        Удалить
                    </button>
                </form>
                <a href="{{route('admin.edit.theory.module.glav', $item->id)}}"  class="w-full sm:w-auto text-center inline justify-center px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900">
                    Изменить главу
                </a>
            </div>
        </div>
    @empty
        Список глав пока пуст
    @endforelse

@endsection
