@extends('includes.layout')
@section('h2-name', 'Теория')
@section('content')

    <div class="flex justify-end mb-6">
        <a
            href="{{route('admin.show.module.theory.add')}}"
            class="inline-flex items-center px-5 py-2 bg-blue-600 text-white font-medium rounded-md
           hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        >
            <i class="bx bx-plus mr-2"></i>
            Добавить модуль
        </a>

    </div>
    <!-- Карточка модуля -->
    <div class="flex flex-col">
        @forelse($theories as $theory)
            <div class="mb-6">
                <a
                    href="{{route('admin.show.theory.module', $theory->id)}}"
                    class="flex items-center justify-between bg-white rounded-md p-5 shadow hover:shadow-md transition"
                >
                    <p class="font-medium text-lg">{{$theory->title}}</p>
                    <img src="{{ asset('storage/' . $theory->logo) }}" alt="PHP" class="w-12 h-12 object-contain"/>
                </a>
                <div class="flex flex-col sm:flex-row items-center mt-3 gap-5">
                    <form action="{{route('admin.del.module',  $theory->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit"
                                class=" w-full sm:w-auto bg-red-500 hover:bg-red-800 text-white font-medium px-5 py-2 rounded-lg">
                            Удалить
                        </button>
                    </form>
                    <a href="{{route('admin.edit.theory.module', $theory->id)}}"  class="w-full sm:w-auto text-center inline justify-center px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900">
                        Изменить модуль
                    </a>
                </div>
            </div>
        @empty
            <h2>
                Список модулей пуст
            </h2>
        @endforelse


    </div>

@endsection
