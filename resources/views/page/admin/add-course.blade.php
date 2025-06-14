@extends('includes.layout')
@section('content')
    @include('includes.error')
    <div class="flex flex-col lg:flex-row gap-5 h-full">
        <form action="{{ route('admin.store.course') }}" method="post" enctype="multipart/form-data" class="flex flex-col lg:flex-row gap-5 w-full h-full">
            @csrf
            <div class="w-full lg:w-1/4 bg-white rounded-xl flex flex-col items-center p-4 gap-3">
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                           class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg id="placeholder-icon" class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-center text-gray-500 dark:text-gray-400">
                                <span class="font-semibold">Добавить фото</span>
                            </p>
                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">
                                SVG, PNG, JPG (MAX. 800x400px)
                            </p>
                        </div>
                        <img id="preview-image" src="#" alt="Preview" class="hidden object-contain w-full h-48 mb-2 rounded" />
                        <input id="dropzone-file" type="file" class="hidden" name="logo" />
                    </label>
                </div>
                <input type="text" id="last_name" name="title"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                       placeholder="Название" />
            </div>

            <div class="w-full lg:w-3/4 bg-white rounded-xl px-4 pt-4 pb-3 flex flex-col gap-3 justify-between">
            <textarea id="message" name="description"
                      class="p-2.5 w-full h-32 lg:h-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                      placeholder="Небольшое описание курса..."></textarea>
                <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Добавить курс
                </button>
            </div>
        </form>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('dropzone-file');
            const previewImg = document.getElementById('preview-image');
            const placeholderIcon = document.getElementById('placeholder-icon');
            const placeholderText = document.getElementById('placeholder-text');

            input.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (!file) return;

                // Скрываем placeholder
                placeholderIcon.classList.add('hidden');
                placeholderText.classList.add('hidden');

                // Показываем картинку
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImg.src = event.target.result;
                    previewImg.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection




