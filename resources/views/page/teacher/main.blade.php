@extends('includes.layout')
@section('h2-name', 'Главная')
@section('content')


    <!-- Main Content -->
        {{-- Секция «Мои курсы» --}}
        <div>
            <h2 class="text-xl font-bold mb-4">Мои курсы</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($courses as $c)
                    <a
                        href="{{ route('teacher.show.course', $c->course->id) }}"
                        class="bg-white rounded-xl shadow p-4 flex flex-col items-center gap-4 hover:shadow-lg transition"
                    >
                        <img
                            src="{{ asset('storage/' . $c->course->logo) }}"
                            alt="{{ $c->course->title }} logo"
                            class="h-24 object-contain"
                        >
                        <h4 class="text-md font-semibold text-gray-800 text-center">
                            {{ $c->course->title }}
                        </h4>
                    </a>
                @empty
                    <p class="text-center text-gray-600 col-span-full">
                        Вы не ведёте ни одного курса
                    </p>
                @endforelse
            </div>
        </div>

        {{-- Секция «Задания для проверки» --}}
        <div>
            <h2 class="text-xl font-bold mb-4">Доступные для проверки</h2>
            <div class="space-y-6">
                @forelse($tasks as $task)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        {{-- Комментарии --}}
                        @if($task->comments->isNotEmpty())
                            <div class="bg-gray-50 border-b border-amber-200 p-4">
                                <h4 class="text-blue-500 font-semibold mb-2">Комментарии:</h4>
                                <div class="space-y-2">
                                    @foreach($task->comments as $cm)
                                        <div class="flex justify-between text-sm text-gray-700">
                                            <span>{{ $cm->text }}</span>
                                            <time class="text-gray-500">{{ $cm->created_at->format('d.m.Y H:i') }}</time>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Основная карточка --}}
                        <div class="p-4 flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                            {{-- Инфо о студенте и модуле --}}
                            <div class="flex-1 space-y-2">
                                <p class="font-bold text-gray-800">
                                    {{ $task->user->username }} {{ $task->user->surname }}
                                    <span class="text-sm font-medium text-gray-600">({{ $task->user->group->title }})</span>
                                </p>
                                <p class="text-gray-600">
                                    Курс:
                                    <span class="font-semibold text-gray-800">
                                    {{ $task->module->course->title }}
                                </span>
                                </p>
                                <p class="text-gray-600">
                                    Модуль:
                                    <span class="font-semibold text-gray-800">
                                    {{ $task->module->title }}
                                </span>
                                </p>
                                <p class="text-gray-600">
                                    Ссылка:
                                    @if($task->user->subdomains->isNotEmpty())
                                        <a
                                            href="https://{{ $task->user->subdomains->first()->title }}/{{ ltrim($task->module->comment, '/') }}"
                                            class="font-semibold text-blue-600 hover:underline"
                                        >
                                            {{ $task->module->comment }}
                                        </a>
                                    @else
                                        <span class="font-semibold">поддомен не найден</span>
                                    @endif
                                </p>
                            </div>

                            {{-- Форма проверки --}}
                            <form
                                action="{{ route('teacher.task.update', $task->id) }}"
                                method="post"
                                class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto"
                            >
                                @csrf
                                @method('PUT')

                                <input
                                    type="text"
                                    name="comment"
                                    placeholder="Добавить комментарий"
                                    class="border rounded-lg px-3 py-2 flex-1 focus:ring-0 focus:border-gray-300"
                                >

                                <select
                                    name="status"
                                    class="border rounded-lg px-3 py-2 focus:ring-0 focus:border-gray-300"
                                >
                                    <option value="pending"   {{ $task->status=='pending'   ? 'selected' : '' }}>
                                        Ожидается
                                    </option>
                                    <option value="completed" {{ $task->status=='completed' ? 'selected' : '' }}>
                                        Выполнено
                                    </option>
                                    <option value="failed"    {{ $task->status=='failed'    ? 'selected' : '' }}>
                                        Ошибка
                                    </option>
                                </select>

                                <button
                                    type="submit"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
                                >
                                    Изменить
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-600">
                        Нет заданий для проверки
                    </p>
                @endforelse

                {{-- Пагинация --}}
                <div class="mt-4">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>

{{--    <script>--}}
{{--        const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');--}}

{{--        sideLinks.forEach(item => {--}}
{{--            const li = item.parentElement;--}}
{{--            item.addEventListener('click', () => {--}}
{{--                sideLinks.forEach(i => {--}}
{{--                    i.parentElement.classList.remove('active');--}}
{{--                })--}}
{{--                li.classList.add('active');--}}
{{--            })--}}
{{--        });--}}

{{--        const menuBar = document.querySelector('.content nav .bx.bx-menu');--}}
{{--        const sideBar = document.querySelector('.sidebar');--}}

{{--        menuBar.addEventListener('click', () => {--}}
{{--            sideBar.classList.toggle('close');--}}
{{--        });--}}

{{--        window.addEventListener('resize', () => {--}}
{{--            if (window.innerWidth < 768) {--}}
{{--                sideBar.classList.add('close');--}}
{{--            } else {--}}
{{--                sideBar.classList.remove('close');--}}
{{--            }--}}
{{--            if (window.innerWidth > 576) {--}}
{{--                searchBtnIcon.classList.replace('bx-x', 'bx-search');--}}
{{--                searchForm.classList.remove('show');--}}
{{--            }--}}
{{--        });--}}

{{--        const toggler = document.getElementById('theme-toggle');--}}

{{--        toggler.addEventListener('change', function () {--}}
{{--            if (this.checked) {--}}
{{--                document.body.classList.add('dark');--}}
{{--            } else {--}}
{{--                document.body.classList.remove('dark');--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endsection
