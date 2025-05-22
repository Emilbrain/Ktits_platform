@extends('includes.layout')
@section('h2-name', 'Редактирование курса: '. $course->title)
@section('content')
    <div class="flex gap-5 flex-col">
        <div class="flex gap-5">
            <div class="w-full flex gap-5">
                <div class="w-1/4 bg-white rounded-xl flex flex-col items-center p-4 gap-3">
                    <img src="{{ asset('storage/' . $course->logo) }}" alt="" class="h-full max-h-36 object-cover">
                    <h4 class="text-md">{{ $course->title }}</h4>
                </div>
                <div class="w-3/4 bg-white rounded-xl px-4 pt-4 pb-3 flex flex-col gap-3 justify-between">
                    {{ $course->description }}
                </div>
            </div>
        </div>
        <a href="{{ route('teacher.add.module', $course->id) }}" class="text-center font-bold text-lg mb-6">Добавить
            модуль для курса</a>
    </div>
    @foreach($modules as $module)
        <div class="flex bg-white p-4 items-center justify-between rounded-xl mb-4  ">
            <div class="">
                {{ $module->title }}
            </div>
            <div class="flex gap-5">
                <a href="{{ route('teacher.edit.module', $module->id) }}"><i class='bx bx-pencil'></i></a>
                <button data-modal-target="popup-modal-{{ $module->id }}"
                        data-modal-toggle="popup-modal-{{ $module->id }}" class="block text-black" type="button">
                    <i class='bx bxs-trash'></i>
                </button>
            </div>
            <div id="popup-modal-{{ $module->id }}" tabindex="-1"
                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-1000 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-modal-{{ $module->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center flex flex-col">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Вы уверены что хотите
                                удалить модуль {{ $module->title }}?</h3>
                            <div class="flex justify-center gap-2">
                                <form action="{{ route('teacher.module.delete', $module->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $course->id }}">
                                    <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Да, конечно
                                    </button>
                                </form>
                                <button data-modal-hide="popup-modal-{{ $module->id }}" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    Нет, отмена
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endforeach
@endsection
