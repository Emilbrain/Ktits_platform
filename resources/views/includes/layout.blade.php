<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://vjs.zencdn.net/8.11.0/video-js.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Include Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link type="image/x-icon" rel="shortcut icon" href="{{ asset('icons/ckico.png') }}">
    <title>{{ config('app.name') }}</title>
</head>
<body>
<script async defer>
    document.addEventListener('DOMContentLoaded', function () {
        const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');
        const menuBar = document.querySelector('.content nav .bx.bx-menu');
        const sideBar = document.querySelector('.sidebar');

        // Проверка состояния меню при загрузке страницы
        // Скрываем меню до завершения проверки состояния
        sideBar.style.opacity = '0';
        sideBar.style.visibility = 'hidden';

        // Проверка состояния меню при загрузке страницы
        if (localStorage.getItem('sidebarClosed') === 'true') {
            sideBar.classList.add('close');
        } else {
            sideBar.classList.remove('close');
        }

        // Показываем меню после завершения проверки состояния
        sideBar.style.opacity = '1';
        sideBar.style.visibility = 'visible';

        // Добавление события клика для открытия/закрытия меню
        menuBar.addEventListener('click', () => {
            sideBar.classList.toggle('close');
            // Сохранение состояния меню в localStorage
            localStorage.setItem('sidebarClosed', sideBar.classList.contains('close'));
        });

        sideLinks.forEach(item => {
            const li = item.parentElement;
            item.addEventListener('click', () => {
                sideLinks.forEach(i => {
                    i.parentElement.classList.remove('active');
                })
                li.classList.add('active');
            })
        });

        const searchBtn = document.querySelector('.content nav form .form-input button');
        const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
        const searchForm = document.querySelector('.content nav form');

        searchBtn.addEventListener('click', function (e) {
            if (window.innerWidth < 576) {
                e.preventDefault();
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
    });

    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.copy-btn');
        if (!btn) return;

        // Ищем в том же родителе элемент с классом copy-text
        const container = btn.closest('p, div'); // можно указать более узкий селектор
        const textEl = container?.querySelector('.copy-text');
        if (!textEl) {
            console.warn('Copy-btn нашёлся, но рядом нет .copy-text');
            return;
        }

        const text = textEl.innerText.trim();
        if (!text) {
            console.warn('Текст для копирования пуст');
            return;
        }

        navigator.clipboard.writeText(text)
            .then(() => {
                // Временная индикация успеха: меняем иконку на галочку
                const icon = btn.querySelector('i');
                const oldClass = icon.className;
                icon.className = 'bx bx-check text-green-500';
                setTimeout(() => icon.className = oldClass, 1500);
            })
            .catch(err => {
                console.error('Не удалось скопировать:', err);
            });
    });
</script>
@adminArea
<div class="sidebar">
    <a href="{{ route('admin.main') }}" class="logo">
        <img src="{{ asset('icons/ckico.png') }}" alt="" class="w-10 ml-3 mr-2">
        <div class="logo-name gradient">платформа</div>
    </a>
    <ul class="side-menu">
        <li class="{{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.main') }}">
                <i class='bx bxs-dashboard'></i> Главная
            </a>
        </li>
        <li class="{{ request()->is('admin/courses') || request()->is('admin/courses/*') || request()->is('admin/course/module/*') ? 'active' : '' }}">
            <a href="{{ route('admin.courses') }}">
                <i class='bx bx-analyse'></i> Курсы
            </a>
        </li>
        <li class="{{ request()->is('admin/add/course') ? 'active' : '' }}">
            <a href="{{ route('admin.add.course') }}">
                <i class='bx bx-plus'></i> Добавить курс
            </a>
        </li>
        <li class="{{ request()->is('admin/requests') || request()->is('admin/requests/*') ? 'active' : '' }}">
            <a href="{{ route('admin.requests') }}">
                <i class='bx bx-analyse'></i> Запросы
            </a>
        </li>
        <li class="{{ request()->is('admin/list') ? 'active' : '' }}">
            <a href="{{ route('admin.list') }}">
                <i class='bx bx-group'></i> Пользователи
            </a>
        </li>
        <li class="{{ request()->is('admin/generate') ? 'active' : '' }}">
            <a href="{{ route('admin.generate') }}">
                <i class='bx bx-plus-circle'></i> Генерация
            </a>
        </li>
        <li class="{{ request()->is('admin/add/group') ? 'active' : '' }}">
            <a href="{{ route('admin.add.group') }}">
                <i class='bx bx-plus'></i> Добавить группа
            </a>
        </li>
        <li class="{{ request()->is('admin/groups') ? 'active' : '' }}">
            <a href="{{ route('admin.groups') }}">
                <i class='bx bx-list-ul'></i>Список групп
            </a>
        </li>
        <li class="{{ request()->is('admin/show/tasks') ? 'active' : '' }}">
            <a href="{{ route('admin.show.tasks') }}">
                <i class='bx bx-list-ol'></i>Задания
            </a>
        </li>
        <li class="{{ request()->is('admin/show/teachers') || request()->is('admin/show/teachers/*') ? 'active' : '' }}">
            <a href="{{ route('admin.show.teachers') }}">
                <i class='bx bx-chalkboard'></i>Преподаватели
            </a>
        </li>
        <li class="{{ request()->is('admin/show/theory') || request()->is('admin/show/theory/*') ? 'active' : '' }}">
            <a href="{{ route('admin.show.theory') }}">
                <i class='bx bx-book'></i>Теория
            </a>
        </li>
        <li class="{{ request()->is('admin/setting') ? 'active' : '' }}">
            <a href="{{ route('admin.setting') }}">
                <i class='bx bx-cog'></i> Настройки
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <div class="logout">
                <form action="{{ route('logout') }}" method="post" style="display: flex; align-items: center;">
                    @csrf
                    <button type="submit"
                            style="display: flex; align-items: center; border: none; background: none; cursor: pointer;">
                        <i class='bx bx-log-out-circle'></i>
                        Выход
                    </button>
                </form>
            </div>
        </li>

        <li>
            <a href="https://ktplatform.ru">
                <i class='bx bx-globe'></i> Сайт ЦК
            </a>
        </li>
        <li>
            <a href="https://mck-ktits.ru">
                <i class='bx bx-globe'></i> Сайт МЦК-КТИТЦ
            </a>
        </li>
    </ul>
</div>
@endadminArea
@studentArea
<div class="sidebar close">
    <a href="{{ route('student.main') }}" class="logo">
        <img src="{{ asset('icons/ckico.png') }}" alt="" class="w-10 ml-3 mr-2">
        <div class="logo-name gradient">платформа</div>
    </a>
    <ul class="side-menu">
        <li class="{{ request()->is('student') ? 'active' : '' }}">
            <a href="{{ route('student.main') }}">
                <i class='bx bxs-dashboard'></i> Главная
            </a>
        </li>
        <li class="{{ request()->is('student/courses')|| request()->is('student/courses/*') ? 'active' : '' }}">
            <a href="{{ route('student.courses') }}">
                <i class='bx bx-analyse'></i> Курсы
            </a>
        </li>
        <li class="{{ request()->is('student/theory')|| request()->is('student/theory/*') ? 'active' : '' }}">
            <a href="{{ route('student.theory') }}">
                <i class='bx bx-book'></i> Теория
            </a>
        </li>
        {{--        <li class="{{ request()->is('student/content/list') ? 'active' : '' }}">--}}
        {{--            <a href="{{ route('student.student.list') }}">--}}
        {{--                <i class='bx bx-list-ol'></i> Списки--}}
        {{--            </a>--}}
        {{--        </li>--}}
        <li class="{{ request()->is('student/setting') ? 'active' : '' }}">
            <a href="{{ route('student.setting') }}">
                <i class='bx bx-cog'></i> Настройки
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <div class="logout">
                <form action="{{ route('logout') }}" method="post" style="display: flex; align-items: center;">
                    @csrf
                    <button type="submit"
                            style="display: flex; align-items: center; border: none; background: none; cursor: pointer;">
                        <i class='bx bx-log-out-circle'></i>
                        Выход
                    </button>
                </form>
            </div>
        </li>

        <li>
            <a href="https://ktplatform.ru">
                <i class='bx bx-globe'></i> Сайт ЦК
            </a>
        </li>
        <li>
            <a href="https://mck-ktits.ru">
                <i class='bx bx-globe'></i> Сайт МЦК-КТИТЦ
            </a>
        </li>
    </ul>
</div>
@endstudentArea
@teacherArea
<div class="sidebar close">
    <a href="{{ route('teacher.main') }}" class="logo">
        <img src="{{ asset('icons/ckico.png') }}" alt="" class="w-10 ml-3 mr-2">
        <div class="logo-name gradient">платформа</div>
    </a>
    <ul class="side-menu">
        <li class="{{ request()->is('teacher') ? 'active' : '' }}">
            <a href="{{ route('student.main') }}">
                <i class='bx bxs-dashboard'></i> Главная
            </a>
        </li>
        <li class="{{request()->is('teacher/groups') ? 'active' : ''}}"><a href="{{ route('teacher.groups')}}"><i class='bx bx-store-alt'></i>Группы</a></li>
        <li class="{{ request()->is('teacher/courses')|| request()->is('teacher/courses/*') ? 'active' : '' }}">
            <a href="{{ route('teacher.courses') }}">
                <i class='bx bx-analyse'></i> Курсы
                <i class="bx"></i>
            </a>
        </li>
        <li class="{{ request()->is('teacher/setting') ? 'active' : '' }}">
            <a href="{{ route('teacher.setting') }}">
                <i class='bx bx-cog'></i> Настройки
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <div class="logout">
                <form action="{{ route('logout') }}" method="post" style="display: flex; align-items: center;">
                    @csrf
                    <button type="submit"
                            style="display: flex; align-items: center; border: none; background: none; cursor: pointer;">
                        <i class='bx bx-log-out-circle'></i>
                        Выход
                    </button>
                </form>
            </div>
        </li>

        <li>
            <a href="https://ktplatform.ru">
                <i class='bx bx-globe'></i> Сайт ЦК
            </a>
        </li>
        <li>
            <a href="https://mck-ktits.ru">
                <i class='bx bx-globe'></i> Сайт МЦК-КТИТЦ
            </a>
        </li>
    </ul>
</div>
@endteacherArea
<div class="content">
    @auth()
        <nav class="navi">
            <i class='bx bx-menu'></i>
            <form action="#">
                <h2 class="text-xl">@yield('h2-name')</h2>
            </form>
            <a href="#" class="profile">
                @if(auth()->user()->logo)
                    <img src="{{ asset('storage/' . auth()->user()->logo) }}" alt="Аватар">
                @else
                    <img src="{{ asset('images/user.png') }}" alt="">
                @endif
            </a>
        </nav>
    @endauth
    <main class="flex gap-5">
        <div class="w-3/4 gap-5">
            @include('includes.message')
            @yield('content')
        </div>
        @adminArea
        <div class="w-1/4 gap-y-5 flex flex-col">
            <div class="flex rounded-xl bg-white flex-col p-6 items-center">
                @if(auth()->user()->logo)
                    <img src="{{ asset('storage/' . auth()->user()->logo) }}" alt="" class="w-16 h-16 mb-4">
                @else
                    <img src="{{ asset('images/user.png') }}" alt="" class="w-16 h-16 mb-4">
                @endif
                <h3 class="mb-2">{{ auth()->user()->username }} {{ auth()->user()->patronymic }}</h3>
                <p><span class="text-[#677483]">Администратор</span></p>
            </div>
        </div>
        @endadminArea
        @studentArea
        <div class="w-1/4 gap-y-5 flex flex-col">
            <div class="flex rounded-xl bg-white flex-col p-6 items-center">
                @if(auth()->user()->logo)
                    <img src="{{ asset('storage/' . auth()->user()->logo) }}" alt="" class="w-16 h-16 mb-4">
                @else
                    <img src="{{ asset('images/user.png') }}" alt="" class="w-16 h-16 mb-4">
                @endif
                <h3 class="mb-2">{{ auth()->user()->username }} {{ auth()->user()->patronymic }}</h3>
                <p><span class="text-[#677483]">Студент группы: </span>{{ auth()->user()->group->title }}</p>
            </div>
            <div class="flex rounded-xl bg-white shadow-lg flex-col gap-y-6 p-6 items-center">
                                <h3 class="text-xl font-bold text-gray-800">Данные личного домена</h3>
                <div class="w-full">
                    <div class="mt-2">

                        <p class=""><span class="text-[#677483]">Ссылка на сайт: </span><a href="http://{{ auth()->user()->login }}.{{ $fileZilla->host }}">{{ auth()->user()->login }}.{{ $fileZilla->host }}</a></p>
                    </div>
                </div>

                <div class="w-full">
                    <p class="text-md">Подключение для FileZilla</p>
                    <div class="mt-2">
                        <p class="flex items-center"><span class="text-[#677483]">Хост: </span>
                            <span class="copy-text">{{ $fileZilla->host }} </span>
                            <button type="button" class="copy-btn ml-2 p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition" title="Копировать">
                                <i class='bx bx-copy text-xl text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white'></i>
                            </button>
                        </p>
                        <p class="flex items-center">
                            <span class="text-[#677483]">Имя пользователя: </span>
                            <span class="copy-text">{{ $fileZilla->username  }}</span>
                            <button type="button" class="copy-btn ml-2 p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition" title="Копировать">
                                <i class='bx bx-copy text-xl text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white'></i>
                            </button>
                        </p>
                        <p class="flex items-center">
                        <span class="text-[#677483]">Пароль: </span>
                            <span class="copy-text">{{ $fileZilla->password }}</span>
                            <button type="button" class="copy-btn ml-2 p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition" title="Копировать">
                                <i class='bx bx-copy text-xl text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white'></i>
                            </button>
                        </p>


                    </div>
                </div>
                <div class="w-full">
                    <p class="text-md">Подключение для phpMyAdmin</p>
                    <div class="mt-2">
                        <p class=""><span class="text-[#677483]"></span><a
                                href="https://argent.beget.com/phpMyAdmin">Ссылка</a></p>
                        <p class="flex items-center">
                            <span class="text-[#677483]">Имя пользователя: </span>
                            <span class="copy-text">{{ $database->username }}</span>
                            <button type="button" class="copy-btn ml-2 p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition" title="Копировать">
                                <i class='bx bx-copy text-xl text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white'></i>
                            </button>
                        </p>
                        <p class="flex items-center">
                            <span class="text-[#677483]">Пароль: </span>
                            <span class="copy-text">{{ $database->password }}</span>
                            <button type="button" class="copy-btn ml-2 p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition" title="Копировать">
                                <i class='bx bx-copy text-xl text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white'></i>
                            </button>
                        </p>
                    </div>
                </div>
                <div class="w-full">
                    <p class="text-md">Данные для платформы</p>
                    <div class="mt-2">
                        <p class="flex items-center">
                        <span class="text-[#677483]">Логин: </span>
                            <span class="copy-text">{{ auth()->user()->login }}</span>
                            <button type="button" class="copy-btn ml-2 p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition" title="Копировать">
                                <i class='bx bx-copy text-xl text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white'></i>
                            </button>
                        </p>
                        <p class="flex items-center">
                        <span class="text-[#677483]">Пароль: </span>
                            <span class="copy-text">{{ auth()->user()->pp }}</span>
                            <button type="button" class="copy-btn ml-2 p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition" title="Копировать">
                                <i class='bx bx-copy text-xl text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white'></i>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex rounded-xl bg-white flex-col gap-y-6 p-6 items-center">
                <img src="{{ asset('images/spisok.png') }}" alt="" class="w-16">
                <div class="grid w-full gap-3">
                    <a href="{{ auth()->user()->group->link }}"
                       class="flex justify-center shadow-md gap-2 bg-white rounded-xl text-center p-2">
                        <p class="text-[16px]"><span
                                class="text-[16px] mb-1 text-[#677483]">Группа</span><br>{{ auth()->user()->group->title }}
                        </p>
                    </a>
                </div>
            </div>
        </div>
        @endstudentArea
        @teacherArea
        <div class="w-1/4 gap-y-5 flex flex-col">
            <div class="flex rounded-xl bg-white flex-col p-6 items-center">
                @if(auth()->user()->logo)
                    <img src="{{ asset('storage/' . auth()->user()->logo) }}" alt="" class="w-16 h-16 mb-4">
                @else
                    <img src="{{ asset('images/user.png') }}" alt="" class="w-16 h-16 mb-4">
                @endif
                <h3 class="mb-2">{{ auth()->user()->username }} {{ auth()->user()->patronymic }}</h3>
                <p><span class="text-[#677483]">Преподаватель</span></p>
            </div>
            <div class="flex rounded-xl bg-white shadow-lg flex-col gap-y-6 p-6 items-center">
                <div class="flex rounded-xl bg-white flex-col gap-y-6 p-6 items-center">
                    <img src="{{ asset('images/spisok.png') }}" alt="" class="w-16">
                    <div class="grid grid-cols-2 w-full gap-3">
                        @forelse($groups as $group)
                            <div class="flex justify-center shadow-md gap-2 bg-white rounded-xl text-center p-2">
                                <a href="{{route('teacher.one.group', $group->group->id)}}" class="text-md"><p class="text-[14px] mb-1">Группа</p>{{$group->group->title}}</a>
                            </div>
                        @empty
                            <h2 class="col-span-4">Нет ни одной группы в списке </h2>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @endteacherArea
    </main>
</div>
</body>
</html>
