@extends('includes.layout')
@section('content')
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name">Платформа</div>
        </a>
        <ul class="side-menu">
            <li class="{{ request()->is('student') ? 'active' : '' }}">
                <a href="{{ route('student.main') }}">
                    <i class='bx bxs-dashboard'></i> Главная
                </a>
            </li>
            {{--            <li><a href="#"><i class='bx bx-store-alt'></i>Группы</a></li>--}}
            <li class="{{ request()->is('student/courses') ? 'active' : '' }}">
                <a href="{{ route('student.courses') }}">
                    <i class='bx bx-analyse'></i> Курсы
                </a>
            </li>
            {{--            <li><a href="#"><i class='bx bx-message-square-dots'></i>Запросы</a></li    >--}}
            {{--            <li><a href="#"><i class='bx bx-group'></i>Пользователи</a></li>--}}
            <li class="{{ request()->is('student/setting') ? 'active' : '' }}"><a href="{{ route('student.setting') }}"><i class='bx bx-cog'></i>Настройки</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Выход
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <h2 class="text-xl">Главная</h2>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="{{ asset('images/user.png') }}" alt="">
            </a>
        </nav>
        <main class="flex gap-4">
            <div class="w-3/4 gap-5">
                <div class="grid grid-cols-3 gap-5">
                    <div class="bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center">
                        {{--                        php--}}
                        <img src="{{ asset('images/php.png') }}" alt="" class="h-full max-h-36">
                        <h4 class="text-md">PHP</h4>
                    </div>
                    <div class="bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center">
                        <img src="{{ asset('images/html.png') }}" alt="" class="h-full max-h-36">
                        <h4 class="text-md">html+css</h4>
                    </div>
                    <div class="bg-white rounded-xl"></div>
                </div>
                <h3 class="mb-3 text-lg mt-5 ml-2 font-bold">Доступные для проверки</h3>
                <div class="bg-gray-100 flex flex-col gap-5 rounded-xl">
                    <div class="flex flex-col">
                        <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-t-lg">
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Группа</div>
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700">ФИО</div>
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Курс</div>
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Действие</div>
                        </div>
                        <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                            <div class="flex justify-center items-center py-2 text-[#677483]">427/2023</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Кузьмин И.В.</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">РHP начинающий</div>
                            <div class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl transition duration-700 ease-in-out items-center hover:text-white text-blue-500 cursor-pointer">Проверить</div>
                        </div>
                        <hr class="border-gray-300">
                        <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                            <div class="flex justify-center items-center py-2 text-[#677483]">427/2023</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Кузьмин И.В.</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">РHP начинающий</div>
                            <div class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl items-center transition duration-700 ease-in-out hover:text-white text-blue-500 cursor-pointer">Проверить</div>
                        </div>
                        <hr class="border-gray-300">
                        <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                            <div class="flex justify-center items-center py-2 text-[#677483]">427/2023</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Кузьмин И.В.</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">РHP начинающий</div>
                            <div class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl items-center transition duration-700 ease-in-out hover:text-white text-blue-500 cursor-pointer">Проверить</div>
                        </div>
                        <hr class="border-gray-300">
                        <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                            <div class="flex justify-center items-center py-2 text-[#677483]">427/2023</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Кузьмин И.В.</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">РHP начинающий</div>
                            <div class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl items-center transition duration-700 ease-in-out hover:text-white text-blue-500 cursor-pointer">Проверить</div>
                        </div>
                        <hr class="border-gray-300">
                        <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                            <div class="flex justify-center items-center py-2 text-[#677483]">427/2023</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Кузьмин И.В.</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">РHP начинающий</div>
                            <div class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl items-center transition duration-700 ease-in-out hover:text-white text-blue-500 cursor-pointer">Проверить</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-1/4 gap-y-6 flex flex-col">
                <div class="flex rounded-xl bg-white flex-col p-6 items-center">
                    <img src="{{ asset('images/user.png') }}" alt="" class="w-16 h-16 mb-4">
                    <h3 class="mb-2">Альберт Наумович</h3>
                    <p>Преподователь</p>
                </div>
                <div class="flex rounded-xl bg-white flex-col gap-y-6 p-6 items-center">
                    <img src="{{ asset('images/spisok.png') }}" alt="" class="w-16">
                    <div class="grid grid-cols-2 w-full gap-3">
                        <div class="flex justify-center shadow-md gap-2 bg-white rounded-xl text-center p-2">
                            <a href="" class="text-md"><p class="text-[14px] mb-1">Группа</p>437/10</a>
                        </div>
                        <div class="flex justify-center shadow-md gap-2 bg-white rounded-xl text-center p-2">
                            <a href="" class="text-md"><p class="text-[14px] mb-1">Группа</p>437/10</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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
