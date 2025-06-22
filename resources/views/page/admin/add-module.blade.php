@extends('includes.layout')
@section('h2-name', 'Добавить модуль')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Добавить модуль</h1>

        <!-- Форма создания контента -->
        <form id="quillForm" method="POST" action="{{ route('admin.store.module') }}" enctype="multipart/form-data">
            @csrf
            <!-- Поле для названия модуля -->
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Название</h2>
                <input type="text" name="title"
                       class="text-md bg-gray-50 border border-gray-300  text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4"
                       placeholder="Название..." />
                @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex justify-around">
                <div class="flex flex-col">
                    <h2 class="text-xl font-semibold mb-2">Загрузить видео</h2>
                    <input
                        type="file"
                        name="video"
                        accept="video/*"
                        class="block w-full text-sm text-gray-700
                        rounded-lg
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-lg  file:border-0
                   file:bg-gray-200 file:text-gray-700
                   hover:file:bg-gray-300
                   cursor-pointer focus:outline-none"
                    />
                    @error('video')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <h2 class="text-xl font-semibold mb-2">Аватар для видео</h2>
                    <input
                        type="file"
                        name="video_avatar"
                        accept="image/*"
                        class="block rounded-lg  w-full text-sm text-gray-700
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-lg file:border-0
                   file:bg-gray-200 file:text-gray-700
                   hover:file:bg-gray-300
                   cursor-pointer focus:outline-none"
                    />
                    @error('video_avatar')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Поле для комментариев -->
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Директория для загрузки</h2>
                <input type="text" name="comment"
                       class="text-md bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4"
                       placeholder="Директория для загрузки..."/>
                @error('comment')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Редактор Quill для Теории -->
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Теория</h2>
                <div id="editor1" class="bg-white p-4 border rounded"></div>
                <input type="hidden" id="quillContent1" name="theory">
                @error('theory')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Редактор Quill для Заданий -->
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Задания для выполнения</h2>
                <div id="editor2" class="bg-white p-4 border rounded"></div>
                <input type="hidden" id="quillContent2" name="task">
                @error('task')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Поля выбора типа и статуса -->
{{--            <div class="flex gap-5 my-6">--}}
{{--                <div class="flex flex-col w-full">--}}
{{--                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Выбрать--}}
{{--                        тип</label>--}}
{{--                    <select name="stat" id="type"--}}
{{--                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">--}}
{{--                        <option value="">Выбрать тип</option>--}}
{{--                        <option value="theory">теория</option>--}}
{{--                        <option value="practice">практика</option>--}}
{{--                    </select>--}}
{{--                    @error('stat')--}}
{{--                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="flex flex-col w-full">--}}
{{--                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Выбрать--}}
{{--                        статус</label>--}}
{{--                    <select name="status" id="status"--}}
{{--                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">--}}
{{--                        <option value="">Выбрать статус</option>--}}
{{--                        <option value="necessarily">обязательно</option>--}}
{{--                        <option value="not necessary">не обязательно</option>--}}
{{--                    </select>--}}
{{--                    @error('status')--}}
{{--                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--            </div>--}}

            <!-- Скрытое поле с ID курса -->
            <input type="hidden" name="course_id" value="{{ $id }}">

            <!-- Кнопка отправки формы -->
            <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
                Добавить
            </button>
        </form>

        <script>
            // Инициализация редакторов Quill
            var quill1 = new Quill('#editor1', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{'font': []}, {'size': []}],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{'color': []}, {'background': []}],
                        ['blockquote', 'code-block'],
                        [{'header': 1}, {'header': 2}, {'header': 3}, {'header': 4}],
                        [{'list': 'ordered'}, {'list': 'bullet'}],
                        [{'script': 'sub'}, {'script': 'super'}],
                        [{'indent': '-1'}, {'indent': '+1'}],
                        [{'direction': 'rtl'}],
                        [{'align': []}],
                        ['link', 'image', 'video', 'formula'],
                        ['clean']
                    ]
                }
            });

            var quill2 = new Quill('#editor2', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{'font': []}, {'size': []}],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{'color': []}, {'background': []}],
                        ['blockquote', 'code-block'],
                        [{'header': 1}, {'header': 2}, {'header': 3}, {'header': 4}],
                        [{'list': 'ordered'}, {'list': 'bullet'}],
                        [{'script': 'sub'}, {'script': 'super'}],
                        [{'indent': '-1'}, {'indent': '+1'}],
                        [{'direction': 'rtl'}],
                        [{'align': []}],
                        ['link', 'image', 'video', 'formula'],
                        ['clean']
                    ]
                }
            });

            // Обработчик отправки формы
            // Обработчик отправки формы
            document.getElementById('quillForm').addEventListener('submit', function (event) {
                event.preventDefault();
                const htmlContent = quill1.root.innerHTML.trim();
                const htmlContent2 = quill2.root.innerHTML.trim();

                document.getElementById('quillContent1').value = (htmlContent  === '<p><br></p>') ? '' : htmlContent;
                document.getElementById('quillContent2').value = (htmlContent2  === '<p><br></p>') ? '' : htmlContent2;
                this.submit();
            });

        </script>
    </div>
@endsection
