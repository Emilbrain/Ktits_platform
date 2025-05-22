@extends('includes.layout')
@section('h2-name', 'Главная')
@section('content')


    <!-- Main Content -->
            <div class="w-3/4 gap-5">
                <div class="grid grid-cols-3 gap-5">
                    @forelse($courses as $course)
                        <a href="{{ route('teacher.show.course', $course->course->id) }}" class="bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center">
                            {{--                        php--}}
                            <img src="{{ asset('storage/' . $course->course->logo) }}" alt="" class="h-28">
                            <h4 class="text-md">{{$course->course->title}}</h4>
                        </a>
                    @empty
                        <h2 class="col-span-4"> Вы не видете не один курс </h2>

                    @endforelse

                </div>
                <h3 class="mb-3 text-lg mt-5 ml-2 font-bold">Доступные для проверки</h3>
                <div class="bg-gray-100 flex flex-col gap-5 rounded-xl">
                    <div class="flex flex-col">
                        @forelse($tasks as $task)
                            @if(count($task->comments)>0)
                                <div class="flex flex-col bg-white rounded-t-xl p-4 border-b-2 border-amber-200">
                                    <h4 class="text-blue-200">Комментарии:</h4>
                                    @foreach($task->comments as $item)
                                        <div class="flex w-full justify-between">
                                            <p>{{ $item->text }}</p>
                                            <p>{{ $item->created_at }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="flex justify-between items-center bg-white shadow-md @if($task->comments->isNotEmpty()) rounded-b-lg @else rounded-lg @endif p-4 mb-4">


                                <div class="flex flex-col">
                                    <div class="flex gap-2 flex-col">
                                        <span class="font-bold">{{ $task->user->username }} {{ $task->user->surname }} {{$task->user->group->title}}</span>
                                        <p class="text-gray-600">Курс: <span class="text-black font-bold">{{ $task->module->title }}</span>
                                        </p>
                                    </div>
                                    {{--                <p class="text-gray-600">Курс: <a class="text-black font-bold" href="{{ $domain->title }}">{{ $task->module->comment }}</a></p>--}}
                                    @if($task->user->subdomains->isNotEmpty())
                                        <a class="text-black font-bold"
                                           href="{{ $task->user->subdomains->first()->title }}{{ $task->module->comment }}"><span
                                                class="text-gray-600">Ссылка: </span> {{ $task->module->comment }}</a>
                                    @else
                                        <span class="text-gray-600">Ссылка: </span>Поддомен не найден
                                    @endif
                                </div>
                                <div>
                                    <form action="{{ route('teacher.task.update', $task->id) }}" method="post"
                                          class="flex gap-2 items-center">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="comment" id="" placeholder="Добавить комментарий" class="rounded-lg">
                                        <select name="status" id="status" class="px-4 py-2 border rounded-lg">
                                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Ожидаемый</option>
                                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Выполнено
                                            </option>
                                            <option value="failed" {{ $task->status == 'failed' ? 'selected' : '' }}>Ошибка выполнения
                                            </option>
                                        </select>
                                        <input type="submit" value="Изменить"
                                               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">
                                    </form>
                                </div>
                            </div>


                        @empty
                            <h2>
                                Нет заданий для  проверки
                            </h2>
                        @endforelse
                        <div class="mt-4">
                            {{ $tasks->links() }}
                        </div>

                    </div>
                </div>

            </div>

    <script>
        const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

        sideLinks.forEach(item => {
            const li = item.parentElement;
            item.addEventListener('click', () => {
                sideLinks.forEach(i => {
                    i.parentElement.classList.remove('active');
                })
                li.classList.add('active');
            })
        });

        const menuBar = document.querySelector('.content nav .bx.bx-menu');
        const sideBar = document.querySelector('.sidebar');

        menuBar.addEventListener('click', () => {
            sideBar.classList.toggle('close');
        });

        const searchBtn = document.querySelector('.content nav form .form-input button');
        const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
        const searchForm = document.querySelector('.content nav form');

        searchBtn.addEventListener('click', function (e) {
            if (window.innerWidth < 576) {
                e.preventDefault;
                searchForm.classList.toggle('show');
                if (searchForm.classList.contains('show')) {
                    searchBtnIcon.classList.replace('bx-search', 'bx-x');
                } else {
                    searchBtnIcon.classList.replace('bx-x', 'bx-search');
                }
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth < 768) {
                sideBar.classList.add('close');
            } else {
                sideBar.classList.remove('close');
            }
            if (window.innerWidth > 576) {
                searchBtnIcon.classList.replace('bx-x', 'bx-search');
                searchForm.classList.remove('show');
            }
        });

        const toggler = document.getElementById('theme-toggle');

        toggler.addEventListener('change', function () {
            if (this.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        });
    </script>
@endsection
