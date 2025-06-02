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
                    <img src="{{ asset('storage/' . $theory->logo) }}" alt="PHP" class="w-12 h-12 object-contain">
                </a>
            </div>
        @empty
            <h2>
                Список модулей пуст
            </h2>
        @endforelse


    </div>


@endsection
