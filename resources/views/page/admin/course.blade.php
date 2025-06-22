@extends('includes.layout')
@section('h2-name', 'Редактирование курса: '. $course->title)
@section('content')
    <div class="flex flex-col gap-5">
        <!-- Форма редактирования -->
        <div class="flex flex-col lg:flex-row gap-5 w-full">
            <form action="{{ route('admin.update.course', $course->id) }}" method="post"
                  class="flex flex-col lg:flex-row gap-5 w-full" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Левая колонка: изображение и название -->
                <div class="w-full lg:w-1/4 bg-white rounded-xl flex flex-col items-center p-4 gap-3">
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                               class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <img src="{{ asset('storage/' . $course->logo) }}" alt=""
                                     class="object-cover max-h-36">
                            </div>
                            <input id="dropzone-file" type="file" name="logo" class="hidden"/>
                        </label>
                    </div>
                    <input type="text" value="{{ $course->title }}" name="title"
                           class="w-full p-2.5 text-sm bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Название"/>
                </div>

                <!-- Правая колонка: описание и кнопки -->
                <div class="w-full lg:w-3/4 bg-white rounded-xl px-4 pt-4 pb-3 flex flex-col gap-3 justify-between">
                <textarea name="description" rows="3"
                          class="w-full p-2.5 text-sm bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500 flex-grow"
                          placeholder="Небольшое описание курса...">{{ $course->description }}</textarea>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900">
                            Изменить курс
                        </button>
                        <button type="button"
                                data-modal-target="popup-modal-{{ $course->id }}"
                                data-modal-toggle="popup-modal-{{ $course->id }}"
                                class="w-full sm:w-auto bg-red-500 hover:bg-red-800 text-white font-medium px-5 py-2 rounded-lg">
                            Удалить курс
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Кнопка добавления модуля -->
        <a href="{{ route('admin.add.module', $course->id) }}"
           class="text-center font-bold text-lg mb-6">
            Добавить модуль для курса
        </a>

        <!-- Список модулей -->
        @foreach($modules as $module)
            <div class="flex flex-col sm:flex-row bg-white p-4 items-center justify-between rounded-xl mb-4 gap-3">
                <div class="text-center sm:text-left w-full sm:w-auto flex-1">
                    {{ $module->title }}
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('admin.edit.module', $module->id) }}">
                        <i class='bx bx-pencil'></i>
                    </a>
                    <button data-modal-target="popup-modal-{{ $module->id }}"
                            data-modal-toggle="popup-modal-{{ $module->id }}"
                            class="text-black" type="button">
                        <i class='bx bxs-trash'></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
