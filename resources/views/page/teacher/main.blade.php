@extends('includes.layout')
@section('h2-name', 'Главная')
@section('content')


    <!-- Main Content -->
    <div class="content">
        <main class="flex gap-4">
            <div class="w-3/4 gap-5">
                <div class="grid grid-cols-3 gap-5">
                    <div class="bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center">
                        {{--                        php--}}
                        <img src="{{ asset('images/user.png') }}" alt="" class="h-28">
                        <h4 class="text-md">437/2024</h4>
                    </div>
                    <div class="bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center">
{{--                        <img src="{{ asset('images/html.png') }}" alt="" class="h-full max-h-36">--}}
                        <img src="{{ asset('images/user.png') }}" alt="" class="h-28">
                        <h4 class="text-md">437/2024</h4>
                    </div>
                    <div class="bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center">
                        {{--                        php--}}
                        <img src="{{ asset('images/user.png') }}" alt="" class="h-28">
                        <h4 class="text-md">437/2024</h4>
                    </div>
                </div>
                <h3 class="mb-3 text-lg mt-5 ml-2 font-bold">Доступные для проверки</h3>
                <div class="bg-gray-100 flex flex-col gap-5 rounded-xl">
                    <div class="flex flex-col">
                        <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-t-lg">
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Группа</div>
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700">ФИО</div>
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Курс</div>
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700"></div>
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
