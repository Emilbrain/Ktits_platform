@extends('includes.layout')
@section('h2-name', 'Создание модуля')
@section('content')
    <div>
        <form
            class="max-w-sm mx-auto bg-white p-5 rounded-lg shadow-md"
            method="POST"
            action="{{ route('admin.store.theory.module') }}"
            enctype="multipart/form-data"
        >
            @csrf

            <!-- Название -->
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Название
                </label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Введите название"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                   rounded-lg focus:ring-blue-500 focus:border-blue-500
                   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                   dark:placeholder-gray-400 dark:text-white
                   dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
                @error('title')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <!-- Загрузка изображения -->
            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Изображение
                </label>
                <input
                    type="file"
                    id="image"
                    name="logo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                   rounded-lg cursor-pointer focus:ring-blue-500 focus:border-blue-500
                   block w-full dark:bg-gray-700 dark:border-gray-600
                   dark:placeholder-gray-400 dark:text-white
                   dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
                @error('logo')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Кнопка отправки -->
            <button
                type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4
               focus:outline-none focus:ring-blue-300 font-medium rounded-lg
               text-sm px-5 py-2.5 text-center dark:bg-blue-600
               dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Создать
            </button>
        </form>
    </div>
@endsection
