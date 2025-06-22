<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://vjs.zencdn.net/8.11.0/video-js.css" rel="stylesheet"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Include Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link type="image/x-icon" rel="shortcut icon" href="{{ asset('icons/ckico.png') }}">
    <title>{{ config('app.name') }}</title>
</head>
<body>
<header id="main-header" class="py-4 fixed top-0 z-40 w-full transition duration-300">
    <div class="container mx-auto px-4 flex items-center justify-between flex-wrap w-[1300px]">
        <!-- Логотипы -->
        <div class="flex items-center space-x-10">
            <img id="ck-logo" src="{{ asset('icons/ckico.png') }}" alt="logo CK"
                 class="h-12 sm:h-16 transition-all filter brightness-0 invert">
            <img id="ktits-logo" src="{{ asset('images/ktitsLogo.png') }}" alt="logo ktits"
                 class="h-10 sm:h-12 transition-all filter brightness-0 invert">
        </div>

        <!-- Навигация -->
        <nav id="main-nav" class="hidden lg:flex space-x-[30px] text-white text-sm transition-all">
            <a href="#directions" class="hover:underline">Направления</a>
            <a href="#teachers" class="hover:underline">Преподаватели</a>
            <a href="#platform" class="hover:underline">О платформе</a>
            <a href="#footer" class="hover:underline">Контакты</a>
        </nav>


    </div>
</header>


<section class="relative w-full h-screen overflow-hidden">
    <!-- Видео на фоне -->
    <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
        <source src="{{asset('bg-video/wallpeper.mp4')}}" type="video/mp4"/>
        Ваш браузер не поддерживает видео.
    </video>

    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 z-10"></div>


    <!-- Текст поверх видео -->
    <div
        class="relative z-20 flex flex-col justify-center items-center h-full text-center text-white px-4 ">
        <p class="text-sm sm:text-base mb-2">ЦИКЛОВАЯ КОМИССИЯ</p>
        <h1 class="text-[40px] sm:text-[60px] font-semibold tracking-wide">ВЕБ-ТЕХНОЛОГИИ</h1>
        <div class="mt-3 sm:mt-0 ">
            @guest()
                <a href="{{route('login')}}"
                   class="border-solid border-2 border-white inline-block text-white font-medium rounded-lg px-8 py-3 text-sm md:px-[100px] md:py-[15px] transition focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-[#3F83F8]">Войти</a>
            @endguest
            @auth()
                <a href="{{route('login')}}"
                   class="border-solid border-2 border-white inline-block text-white font-medium rounded-lg px-6 py-2 text-sm md:px-[32px] md:py-[18px] focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800 transition">Платформа</a>
            @endauth
        </div>
    </div>
</section>


<section class=" bg-white py-16 px-4 w-full " id="directions">
    {{--    <div class="max-w-6xl mx-auto ">--}}
    <div class="max-w-[1300px] mx-auto ">
        <h2 class="text-2xl md:text-3xl font-semibold mb-8">Направления</h2>

        <!-- Верхние карточки -->
        <div class="grid grid-cols-1 sm:grid-cols-2 cont gap-4 md:gap-12 lg:gap-12 xl:gap-48">
            <!-- Левая карточка -->
            <div id="card1" onclick="switchProgram(1)"
                 class="cursor-pointer transition py-32 shadow-md clip-left active-card h-full ">
                <h3 class="text-lg font-medium mb-4 leading-tight text-center ">
                    <p class="uppercase">
                        09.02.07
                    </p>
                    <p class="uppercase mt-2">
                        Информационные системы и программирование.
                    </p>
                    <p class="mt-4">
                        Квалификация: Разработчик веб и мультимедийных
                        приложений
                    </p>

                </h3>
                <button class="details-btn text-[#3F83F8] absolute bottom-9 right-32">
                    <span>Подробнее</span>
                    <i class='bx bx-chevron-down'></i>
                </button>
            </div>

            <!-- Правая карточка -->
            <div id="card2" onclick="switchProgram(2)"
                 class="p-6 border-2 relative  py-32 cursor-pointer transition clip-right  shadow-md h-full">
                <h3 class="text-lg font-medium text-center mb-4 leading-tight absolute right-8">
                    <p class="uppercase ">09.02.09</p>
                    <p class="uppercase mt-2">Веб-разработка.</p>
                    <p class="mt-4">Квалификация: Разработчик веб приложений</p>
                </h3>
                <button class="details-btn text-[#3F83F8] absolute bottom-9 right-5 ">
                    <span>Подробнее</span>
                    <i class='bx bx-chevron-down'></i>
                </button>
            </div>
        </div>
        <!-- Нижние блоки -->

        <div class="flex  gap-2 mt-4 relative justify-between">

            <!-- Левый текст -->
            <div class="flex flex-col gap-4">
                <div id="left-1"
                     class=" text-black p-6 rounded-lg text-justify leading-relaxed text-sm sm:text-base  border-2 max-w-[860px] border-[#EFF6FF]">
                </div>

                <div id="left-2"
                     class="border-2 border-[#EFF6FF] p-6 rounded-lg max-w-[860px]"
                >
                </div>

                <div id="left-3"
                     class="border-2 border-[#EFF6FF] p-6 rounded-lg max-w-[860px]"
                >
                </div>

                <div id="left-4"
                     class="border-2 border-[#EFF6FF] p-6 rounded-lg max-w-[860px]"
                >
                </div>

                <div id="left-5"
                     class="border-2 border-[#EFF6FF] p-6 rounded-lg max-w-[860px]"
                >
                </div>

            </div>
            <!-- Правый текст с иконками -->
            <div id="infoBlock"
                 class="bg-[#EFF6FF]  rounded-lg p-10 h-min sticky top-[110px] text-sm sm:text-base max-w-[430px]">
                <!-- Контент будет меняться -->
            </div>
        </div>
    </div>
</section>


<section class="bg-white py-16" id="teachers">
    <div class="bg-[#EFF6FF]  p-16 rounded-lg">
        <div class="max-w-[1300px] mx-auto">
            <h2 class="text-2xl md:text-3xl font-semibold mb-8  ">Преподаватели</h2>
        </div>
        <div class="max-w-[1300px] mx-auto flex items-center flex-wrap justify-center gap-4   ">
            {{--            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-10">--}}
            <!-- Один элемент -->
            <div class="flex flex-col items-center  text-center p-4 rounded-lg bg-white">
                <div class="w-[200px] h-[200px] rounded-full overflow-hidden">
                    <img src="{{ asset('teacher/Dinar.jpg') }}" alt="Преподаватель"
                         class="w-full h-full object-cover"/>
                </div>
                <p class="text-sm mt-3 font-semibold leading-tight">Хайруллин <br> Динар Ильсурович</p>
                <button onclick="openModal('teacher1')"
                        class="text-sm bg-[#3F83F8] text-white px-4 py-1 rounded hover:bg-gray-100 transition mt-2">
                    Подробнее
                </button>
            </div>

            <div class="flex flex-col items-center  text-center p-4 rounded-lg bg-white">
                <div class="w-[200px] h-[200px] rounded-full overflow-hidden">
                    <img src="{{ asset('teacher/ruslan.jpg') }}" alt="Преподаватель"
                         class="w-full h-full object-cover"/>
                </div>
                <p class="text-sm mt-3 font-semibold leading-tight">Зарипов <br> Руслан Ринатович</p>
                <button onclick="openModal('teacher9')"
                        class="text-sm bg-[#3F83F8] text-white px-4 py-1 rounded hover:bg-gray-100 transition mt-2">
                    Подробнее
                </button>
            </div>

            <div class="flex flex-col items-center  text-center p-4 rounded-lg bg-white">
                <div class="w-[200px] h-[200px] rounded-full overflow-hidden">
                    <img src="{{ asset('teacher/Alsu.jpg') }}" alt="Преподаватель"
                         class="w-full h-full object-cover"/>
                </div>
                <p class="text-sm mt-3 font-semibold leading-tight">Зифарова <br> Алсу Вильдановна</p>
                <button onclick="openModal('teacher2')"
                        class="text-sm bg-[#3F83F8] text-white px-4 py-1 rounded hover:bg-gray-100 transition mt-2">
                    Подробнее
                </button>
            </div>

            <div class="flex flex-col items-center  text-center p-4 rounded-lg bg-white">
                <div class="w-[200px] h-[200px] rounded-full overflow-hidden">
                    <img src="{{ asset('teacher/Alina.jpg') }}" alt="Преподаватель"
                         class="w-full h-full object-cover"/>
                </div>
                <p class="text-sm mt-3 font-semibold leading-tight">Халиуллина <br> Алина Рафаилевна</p>
                <button onclick="openModal('teacher3')"
                        class="text-sm bg-[#3F83F8] text-white px-4 py-1 rounded hover:bg-gray-100 transition mt-2">
                    Подробнее
                </button>
            </div>

            <div class="flex flex-col items-center  text-center p-4 rounded-lg bg-white">
                <div class="w-[200px] h-[200px] rounded-full overflow-hidden">
                    <img src="{{ asset('teacher/Lily.jpg') }}" alt="Преподаватель"
                         class="w-full h-full object-cover"/>
                </div>
                <p class="text-sm mt-3 font-semibold leading-tight"> Фазлиева <br> Лилия Ришатовна</p>
                <button onclick="openModal('teacher4')"
                        class="text-sm bg-[#3F83F8] text-white px-4 py-1 rounded hover:bg-gray-100 transition mt-2">
                    Подробнее
                </button>
            </div>

            <div class="flex flex-col items-center  text-center p-4 rounded-lg bg-white">
                <div class="w-[200px] h-[200px] rounded-full overflow-hidden">
                    <img src="{{ asset('teacher/Misha.jpg') }}" alt="Преподаватель"
                         class="w-full h-full object-cover"/>
                </div>
                <p class="text-sm mt-3 font-semibold leading-tight">Лапаев <br> Михаил Дмиитриевич</p>
                <button onclick="openModal('teacher5')"
                        class="text-sm bg-[#3F83F8] text-white px-4 py-1 rounded hover:bg-gray-100 transition mt-2">
                    Подробнее
                </button>
            </div>

            <div class="flex flex-col items-center  text-center p-4 rounded-lg bg-white">
                <div class="w-[200px] h-[200px] rounded-full overflow-hidden">
                    <img src="{{ asset('teacher/NiazG.jpg') }}" alt="Преподаватель"
                         class="w-full h-full object-cover"/>
                </div>
                <p class="text-sm mt-3 font-semibold leading-tight">Гимадиев <br> Нияз Наилевич</p>
                <button onclick="openModal('teacher6')"
                        class="text-sm bg-[#3F83F8] text-white px-4 py-1 rounded hover:bg-gray-100 transition mt-2">
                    Подробнее
                </button>
            </div>

            <div class="flex flex-col items-center  text-center p-4 rounded-lg bg-white">
                <div class="w-[200px] h-[200px] rounded-full overflow-hidden">
                    <img src="{{ asset('teacher/NIazN.jpg') }}" alt="Преподаватель"
                         class="w-full h-full object-cover"/>
                </div>
                <p class="text-sm mt-3 font-semibold leading-tight">Гатауллин <br> Нияз Рамилевич</p>
                <button onclick="openModal('teacher7')"
                        class="text-sm bg-[#3F83F8] text-white px-4 py-1 rounded hover:bg-gray-100 transition mt-2">
                    Подробнее
                </button>
            </div>

            <div class="flex flex-col items-center  text-center p-4 rounded-lg bg-white">
                <div class="w-[200px] h-[200px] rounded-full overflow-hidden">
                    <img src="{{ asset('teacher/Regina.jpg') }}" alt="Преподаватель"
                         class="w-full h-full object-cover"/>
                </div>
                <p class="text-sm mt-3 font-semibold leading-tight">Данилкина <br> Регина Сергеевна</p>
                <button onclick="openModal('teacher8')"
                        class="text-sm bg-[#3F83F8] text-white px-4 py-1 rounded hover:bg-gray-100 transition mt-2">
                    Подробнее
                </button>
            </div>
        </div>
    </div>


    <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->


    <!-- Модальное окно -->
    <div id="modal-teacher1"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition invisible">
        <div class="bg-white rounded-lg max-w-[600px] w-full p-6 sm:p-12 relative max-h-[90vh] overflow-y-auto">
            <button onclick="closeModal('modal-teacher1')"
                    class="absolute top-0 right-0 sm:top-2 sm:right-2 sm:p-2 hover:text-gray-500">
                <i class='bx bx-x text-2xl'></i>
            </button>

            <div class="flex flex-col sm:flex-row items-center gap-4 mb-4 bg-[#3F83F8] p-4 rounded-lg text-white">
                <img src="{{ asset('teacher/Dinar.jpg') }}"
                     class="w-[60px] h-[60px] sm:w-[90px] sm:h-[90px] rounded-full object-cover"
                     alt="Фото преподавателя">
                <div>
                    <p class="text-base sm:text-lg">Хайруллин Динар Ильсурович</p>
                    <p class="text-xs sm:text-sm mt-2">Председатель цикловой комиссии <br> «Веб-технологии»</p>
                </div>
            </div>

            <div class="mb-4">
                <h4 class="font-semibold text-lg mb-2">Преподаваемые предметы</h4>
                <ul class="list-disc ml-5 space-y-3 text-xs sm:text-sm">
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - ВВЕДЕНИЕ В СПЕЦИАЛЬНОСТЬ

                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>

                        - МДК.08.01 ПРОЕКТИРОВАНИЕ И РАЗРАБОТКА ИНТЕРФЕЙСОВ ПОЛЬЗОВАТЕЛЯ

                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>

                        - МДК.05.01 ПРОЕКТИРОВАНИЕ И ДИЗАЙН ИНФОРМАЦИОННЫХ СИСТЕМ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>

                        - ОП.14 ВЕБ ДИЗАЙН

                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>

                        - ГОСУДАРСТВЕННАЯ ИТОГОВАЯ АТТЕСТАЦИЯ

                    </li>
                    <li class="flex gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>

                        - РУКОВОДСТВО ВЫПУСКНЫМИ КВАЛИФИКАЦИОННЫМИ РАБОТАМИ
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal-teacher2"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 invisible">
        <div class="bg-white rounded-lg max-w-[600px] w-full p-6 sm:p-12 relative max-h-[90vh] overflow-y-auto ">
            <button onclick="closeModal('modal-teacher2')"
                    class="absolute top-0 right-0 sm:top-2 sm:right-2 sm:p-2 hover:text-gray-500">
                <i class='bx bx-x text-2xl'></i>
            </button>

            <div class="flex flex-col sm:flex-row items-center gap-4 mb-4 bg-[#3F83F8] p-4 rounded-lg text-white">
                <img src="{{ asset('teacher/Alsu.jpg') }}"
                     class="w-[60px] h-[60px] sm:w-[90px] sm:h-[90px] rounded-full object-cover"
                     alt="Фото преподавателя">
                <div>
                    <p class="text-base sm:text-lg">Зифарова Алсу Вильдановна</p>
                </div>
            </div>

            <div class="mb-4">
                <h4 class="font-semibold text-base sm:text-lg mb-2">Преподаваемые предметы</h4>
                <ul class="list-disc ml-5 space-y-3 text-xs sm:text-sm">
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.05.03 ТЕСТИРОВАНИЕ ИНФОРМАЦИОННЫХ СИСТЕМ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.08.01 ПРОЕКТИРОВАНИЕ И РАЗРАБОТКА ИНТЕРФЕЙСОВ ПОЛЬЗОВАТЕЛЯ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.08.02 ГРАФИЧЕСКИЙ ДИЗАЙН И МУЛЬТИМЕДИА
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - 09.03 ОБЕСПЕЧЕНИЕ БЕЗОПАСНОСТИ ВЕБ ПРИЛОЖЕНИЙ

                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - ПП.08.01 ПРОИЗВОДСТВЕННАЯ ПРАКТИКА

                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - УП.08.01 УЧЕБНАЯ ПРАКТИКА

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal-teacher3"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 invisible">
        <div class="bg-white rounded-lg max-w-[600px] w-full p-6 sm:p-12 relative max-h-[90vh] overflow-y-auto ">
            <button onclick="closeModal('modal-teacher3')"
                    class="absolute top-0 right-0 sm:top-2 sm:right-2 sm:p-2 hover:text-gray-500">
                <i class='bx bx-x text-2xl'></i>
            </button>

            <div class="flex flex-col sm:flex-row items-center gap-4 mb-4 bg-[#3F83F8] p-4 rounded-lg text-white">
                <img src="{{ asset('teacher/Alina.jpg') }}"
                     class="w-[60px] h-[60px] sm:w-[90px] sm:h-[90px] rounded-full object-cover"
                     alt="Фото преподавателя">
                <div>
                    <p class="text-base sm:text-lg">Халиуллина Алина Рафаилевна</p>

                </div>
            </div>

            <div class="mb-4">
                <h4 class="font-semibold text-base sm:text-lg mb-2">Преподаваемые предметы</h4>
                <ul class="list-disc ml-5 space-y-3 text-xs sm:text-sm">
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.09.01 ПРОЕКТИРОВАНИЕ И РАЗРАБОТКА ВЕБ ПРИЛОЖЕНИЙ

                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.05.01 ПРОЕКТИРОВАНИЕ И ДИЗАЙН ИНФОРМАЦИОННЫХ СИСТЕМ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - УП.05.01 УЧЕБНАЯ ПРАКТИКА
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal-teacher4"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 invisible">
        <div class="bg-white rounded-lg max-w-[600px] w-full p-6 sm:p-12 relative max-h-[90vh] overflow-y-auto ">
            <button onclick="closeModal('modal-teacher4')"
                    class="absolute top-0 right-0 sm:top-2 sm:right-2 sm:p-2 hover:text-gray-500">
                <i class='bx bx-x text-2xl'></i>
            </button>

            <div class="flex flex-col sm:flex-row items-center gap-4 mb-4 bg-[#3F83F8] p-4 rounded-lg text-white">
                <img src="{{ asset('teacher/Lily.jpg') }}"
                     class="w-[60px] h-[60px] sm:w-[90px] sm:h-[90px] rounded-full object-cover"
                     alt="Фото преподавателя">
                <div>
                    <p class="text-base sm:text-lg">Фазлиева Лилия Ришатовна</p>
                </div>
            </div>


            <div class="mb-4">
                <h4 class="font-semibold text-base sm:text-lg mb-2">Преподаваемые предметы</h4>
                <ul class="list-disc ml-5 space-y-3 text-xs sm:text-sm">
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.05.01 ПРОЕКТИРОВАНИЕ И ДИЗАЙН ИНФОРМАЦИОННЫХ СИСТЕМ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - УП.08.01 УЧЕБНАЯ ПРАКТИКА
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.05.02 РАЗРАБОТКА КОДА ИНФОРМАЦИОННЫХ СИСТЕМ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - ПП.09.01 ПРОИЗВОДСТВЕННАЯ ПРАКТИКА
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal-teacher5"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 invisible">
        <div class="bg-white rounded-lg max-w-[600px] w-full p-6 sm:p-12 relative max-h-[90vh] overflow-y-auto ">
            <button onclick="closeModal('modal-teacher5')"
                    class="absolute top-0 right-0 sm:top-2 sm:right-2 sm:p-2 hover:text-gray-500">
                <i class='bx bx-x text-2xl'></i>
            </button>

            <div class="flex flex-col sm:flex-row items-center gap-4 mb-4 bg-[#3F83F8] p-4 rounded-lg text-white">
                <img src="{{ asset('teacher/Misha.jpg') }}"
                     class="w-[60px] h-[60px] sm:w-[90px] sm:h-[90px] rounded-full object-cover"

                     alt="Фото преподавателя">
                <div>
                    <p class="text-base sm:text-lg">Лапаев Михаил Дмиитриевич</p>
                </div>
            </div>


            <div class="mb-4">
                <h4 class="font-semibold text-base sm:text-lg mb-2">Преподаваемые предметы</h4>
                <ul class="list-disc ml-5 space-y-3 text-xs sm:text-sm">
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - 09.03 ОБЕСПЕЧЕНИЕ БЕЗОПАСНОСТИ ВЕБ ПРИЛОЖЕНИЙ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.08.01 ПРОЕКТИРОВАНИЕ И РАЗРАБОТКА ИНТЕРФЕЙСОВ ПОЛЬЗОВАТЕЛЯ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - УП.08.01 УЧЕБНАЯ ПРАКТИКА
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - УП.09.01 УЧЕБНАЯ ПРАКТИКА
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - УП.05.01 УЧЕБНАЯ ПРАКТИКА
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal-teacher6"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 invisible">
        <div class="bg-white rounded-lg max-w-[600px] w-full p-6 sm:p-12 relative max-h-[90vh] overflow-y-auto ">
            <button onclick="closeModal('modal-teacher6')"
                    class="absolute top-0 right-0 sm:top-2 sm:right-2 sm:p-2 hover:text-gray-500">
                <i class='bx bx-x text-2xl'></i>
            </button>

            <div class="flex flex-col sm:flex-row items-center gap-4 mb-4 bg-[#3F83F8] p-4 rounded-lg text-white">
                <img src="{{ asset('teacher/NiazG.jpg') }}"
                     class="w-[60px] h-[60px] sm:w-[90px] sm:h-[90px] rounded-full object-cover"

                     alt="Фото преподавателя">
                <div>
                    <p class="text-base sm:text-lg">Гимадиев Нияз Наилевич</p>
                </div>
            </div>

            <div class="mb-4">
                <h4 class="font-semibold text-base sm:text-lg mb-2">Преподаваемые предметы</h4>
                <ul class="list-disc ml-5 space-y-3 text-xs sm:text-sm">
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.05.02 РАЗРАБОТКА КОДА ИНФОРМАЦИОННЫХ СИСТЕМ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - УП.05.01 УЧЕБНАЯ ПРАКТИКА
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - УП.09.01 УЧЕБНАЯ ПРАКТИКА
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal-teacher7"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 invisible">
        <div class="bg-white rounded-lg max-w-[600px] w-full p-6 sm:p-12 relative max-h-[90vh] overflow-y-auto ">
            <button onclick="closeModal('modal-teacher7')"
                    class="absolute top-0 right-0 sm:top-2 sm:right-2 sm:p-2 hover:text-gray-500">
                <i class='bx bx-x text-2xl'></i>
            </button>

            <div class="flex flex-col sm:flex-row items-center gap-4 mb-4 bg-[#3F83F8] p-4 rounded-lg text-white">
                <img src="{{ asset('teacher/NIazN.jpg') }}"
                     class="w-[60px] h-[60px] sm:w-[90px] sm:h-[90px] rounded-full object-cover"
                     alt="Фото преподавателя">
                <div>
                    <p class="text-base sm:text-lg">Гатауллин Нияз Рамилевич</p>
                </div>
            </div>

            <div class="mb-4">
                <h4 class="font-semibold text-base sm:text-lg mb-2">Преподаваемые предметы</h4>
                <ul class="list-disc ml-5 space-y-3 text-xs sm:text-sm">
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.09.02 ОПТИМИЗАЦИЯ ВЕБ ПРИЛОЖЕНИЙ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.05.02 РАЗРАБОТКА КОДА ИФОРМАЦИОННЫХ СИСТЕМ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.09.01 ПРОЕКТИРОВАНИЕ И РАЗРАБОТКА ВЕБ ПРИЛОЖЕНИЙ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - УП.05.01 УЧЕБНАЯ ПРАКТИКА
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal-teacher8"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 invisible">
        <div class="bg-white rounded-lg max-w-[600px] w-full p-6 sm:p-12 relative max-h-[90vh] overflow-y-auto">
            <button onclick="closeModal('modal-teacher8')"
                    class="absolute top-0 right-0 sm:top-2 sm:right-2 sm:p-2 hover:text-gray-500">
                <i class='bx bx-x text-2xl'></i>
            </button>

            <div class="flex flex-col sm:flex-row items-center gap-4 mb-4 bg-[#3F83F8] p-4 rounded-lg text-white">
                <img src="{{ asset('teacher/Regina.jpg') }}"
                     class="w-[60px] h-[60px] sm:w-[90px] sm:h-[90px] rounded-full object-cover"
                     alt="Фото преподавателя">
                <div>
                    <p class="text-base sm:text-lg">Данилкина Регина Сергеевна</p>
                </div>
            </div>

            <div class="mb-4">
                <h4 class="font-semibold text-base sm:text-lg mb-2">Преподаваемые предметы</h4>
                <ul class="list-disc ml-5 space-y-3 text-xs sm:text-sm">
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.08.02 ГРАФИЧЕСКИЙ ДИЗАЙН И МУЛЬТИМЕДИА
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - ОП.14 ВЕБ ДИЗАЙН
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.05.03 ТЕСТИРОВАНИЕ ИНФОРМАЦИОННЫХ СИСТЕМ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - ПП.05.01 ПРОИЗВОДСТВЕННАЯ ПРАКТИКА
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - УП.08.01 УЧЕБНАЯ ПРАКТИКА
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal-teacher9"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 invisible">
        <div class="bg-white rounded-lg max-w-[600px] w-full p-6 sm:p-12 relative max-h-[90vh] overflow-y-auto">
            <button onclick="closeModal('modal-teacher9')"
                    class="absolute top-0 right-0 sm:top-2 sm:right-2 sm:p-2 hover:text-gray-500">
                <i class='bx bx-x text-2xl'></i>
            </button>
            <div class="flex flex-col sm:flex-row items-center gap-4 mb-4 bg-[#3F83F8] p-4 rounded-lg text-white">
                <img src="{{ asset('teacher/ruslan.jpg') }}"
                     class="w-[60px] h-[60px] sm:w-[90px] sm:h-[90px] rounded-full object-cover"
                     alt="Фото преподавателя">
                <div>
                    <p class="text-base sm:text-lg">Зарипов Руслан Ринатович</p>
                </div>
            </div>

            <div class="mb-4">
                <h4 class="font-semibold text-base sm:text-lg mb-2">Преподаваемые предметы</h4>
                <ul class="list-disc ml-5 space-y-3 text-xs sm:text-sm">
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.09.01 ПРОЕКТИРОВАНИЕ И РАЗРАБОТКА ВЕБ ПРИЛОЖЕНИЙ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - МДК.09.02 ОПТИМИЗАЦИЯ ВЕБ ПРИЛОЖЕНИЙ

                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - ГОСУДАРСТВЕННАЯ ИТОГОВАЯ АТТЕСТАЦИЯ

                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bx bx-book text-[#3F83F8]"></i>
                        - РУКОВОДСТВО ВЫПУСКНЫМИ КВАЛИФИКАЦИОННЫМИ РАБОТАМИ

                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16 px-4" id="platform">
    <div class="max-w-[1300px] mx-auto grid md:grid-cols-2 gap-8 items-center">

        <!-- Левая часть -->
        <div>
            <h2 class="text-2xl md:text-3xl font-semibold mb-4">О платформе</h2>
            <p class="text-lg leading-relaxed mb-6 max-w-md">
                Наша онлайн платформа — это современное онлайн-пространство, где студенты осваивают востребованную
                IT-направление с нуля до уверенного уровня
            </p>
            <a href="{{route('login')}}"
               class="inline-block bg-[#3F83F8] text-white px-6 py-3 rounded text-sm hover:bg-blue-600 transition">
                Войти на платформу
            </a>
        </div>

        <!-- Правая часть -->
        <div class="space-y-6">
            <div class="flex items-start gap-4">
                <i class='bx bx-book text-3xl text-[#3F83F8]'></i>
                <div>
                    <p class="text-base font-medium">Современные курсы</p>
                    <p class="text-sm text-gray-600">Программы по HTML, CSS, PHP и др.</p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <i class='bx bx-user-pin text-3xl text-[#3F83F8]'></i>
                <div>
                    <p class="text-base font-medium">Опытные преподаватели</p>
                    <p class="text-sm text-gray-600">Практикующие специалисты и методисты</p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <i class='bx bx-laptop text-3xl text-[#3F83F8]'></i>
                <div>
                    <p class="text-base font-medium">Онлайн-формат</p>
                    <p class="text-sm text-gray-600">Удобный и простой способ</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white" id="footer">
    <footer class="bg-white py-10 px-4 shadow-[0_0_20px_0_rgba(63,131,248,0.20)]  rounded-3xl mx-auto">
        <div class="max-w-[1300px] mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-6 mb-4 ]">

                <!-- Левая часть -->
                <div class="text-center md:text-left">
                    <p class="text-sm mb-2">Сайт ГАПОУ МЦК-КТИТС</p>
                    <a href="https://mck-ktits.ru"
                       class="inline-block bg-[#3F83F8] text-white px-4 py-2 rounded text-sm hover:bg-blue-600 transition">
                        Перейти на сайт
                    </a>
                </div>

                <!-- Правая часть -->
                <div class="text-center md:text-right">
                    <p class="text-sm mb-2">Наши мессенджеры и соц. сети</p>
                    <div class="flex justify-center items-center md:justify-end gap-3">
                        <a href="#" class="text-[#0088cc] text-2xl"><i class='bx bxl-telegram'></i></a>
                        <a href="#" class="text-[#4c75a3] text-2xl"><i class='bx bxl-vk'></i></a>
                    </div>
                </div>
            </div>

            <hr class="border-gray-200 my-4">

            <div class="flex flex-col md:flex-row justify-between items-center text-center text-sm text-black">
                <p>© Платформа 2025</p>
                <p>Разработка Габдрахманов Эмиль Айдарович</p>
            </div>
        </div>
    </footer>
</section>
</body>
<script>
    function openModal(id) {
        const modal = document.getElementById('modal-' + id);
        if (modal) {
            modal.classList.remove('invisible');
            document.body.classList.add('overflow-hidden');
            document.documentElement.classList.add('overflow-hidden');
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.add('invisible');
            document.body.classList.remove('overflow-hidden');
            document.documentElement.classList.remove('overflow-hidden');
        }
    }

    document.addEventListener('mousedown', function (e) {
        const modals = document.querySelectorAll('[id^="modal-"]');
        modals.forEach(modal => {
            if (!modal.classList.contains('invisible')) {
                const content = modal.querySelector('.bg-white');
                if (content && !content.contains(e.target)) {
                    closeModal(modal.id);
                }
            }
        });
    });
</script>

<script>
    const data = {
        1: {
            left1: `
            <p> Данная квалификация присваивается FrontEnd и BackEnd разработчикам, а именно Веб-дизайнерам и Веб-программистам. </p>
            <p class="mt-[37px]" > На данном направление изучают современные технологии проектирования и создания макетов сайтов. </p>
            <p class="mt-[37px]" > Разработчики WEB и мультимедийных приложений получают богаты опыт в реализации адаптивной верстки сайтов под мобильные, планшетный и компьютерные устройства. </p>
            <p class="mt-[37px]" > На данной специализации изучают языки, как HTML, CSS, JavaScript и PHP, включая различные популярные фреймворки и CMS. </p>
            <p class="mt-[37px]" > Разработчики веб и мультимедийных приложений сочетают в своей работе технические и дизайнерские знания и навыки для проведения анализа, проектирования, программирования и изменения веб-сайтов и приложений, объединяющих текстовые, графические, мультимедийные средства. </p>
            <p class="mt-[37px]" > Данная специализация позволяет стать профессиональным программистом для создания WEB-приложений, корпоративных сайтов и Интернет-магазинов. </p>
      `,
            left2: `
               <h3 class="text-2xl font-semibold mb-4">Ключевые профессиональные дисциплины:</h3>
                    <ul class="space-y-3 text-sm mt-8">
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> Проектирование и дизайн
                            информационных систем
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Разработка
                            веб-информационных систем
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Тестирование
                            информационных систем
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Разработка мобильных
                            приложений
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Графический дизайн и
                            мультимедиа
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Оптимизация
                            веб-приложений
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Безопасность
                            веб-приложений
                        </li>
                    </ul>

            `,
            left3: `
          <h3 class="text-2xl font-semibold mb-4">Где можно работать после колледжа?</h3>
                    <ul class="space-y-3 text-sm mt-6">
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Фронтенд-разработчик</li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Бэкенд-разработчик</li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Fullstack-разработчик</li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Веб-дизайнер</li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Тестировщик ПО</li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Специалист по сопровождению
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Контент-менеджер</li>
                    </ul>
                    <div class="flex items-start  text-[12px] mt-5 p-4 bg-[#F2F8FF] rounded-xl">
                        <i class='bx bx-info-circle text-[16px] mr-2 text-[#3F83F8]'></i>
                        <p class="">
                           <span class="font-bold"> Можно работать: </span> в IT-компаниях, студиях веб-разработки, рекламных агентствах, фрилансе,
                            стартапах или продолжить обучение в вузе.
                        </p>
                    </div>

            `,
            left4: `
                     <h3 class="text-2xl font-semibold mb-4">Кому подойдёт эта специальность?</h3>
                    <p class="mb-2 text-lg">Если тебе нравится:</p>
                    <ul class="space-y-3 text-sm mt-6">
                        <li class="flex items-start gap-2"><i class='bx bxs-heart text-[#3F83F8]'></i> Работать с компьютерами и
                            технологиями
                        </li>
                        <li class="flex items-start gap-2"><i class='bx bxs-heart text-[#3F83F8]'></i> Создавать сайты, приложения или
                            игры
                        </li>
                        <li class="flex items-start gap-2"><i class='bx bxs-heart text-[#3F83F8]'></i> Разбираться в программировании и
                            дизайне
                        </li>
                        <li class="flex items-start gap-2"><i class='bx bxs-heart text-[#3F83F8]'></i> Решать логические задачи и
                            придумывать новые идеи
                        </li>
                        <li class="flex items-start gap-2"><i class='bx bxs-heart text-[#3F83F8]'></i> Работать удаленно
                        </li>
                    </ul>
                    <p class="mt-4 font-semibold text-lg text-[#3F83F8]">— это отличный выбор!</p>

            `,
            left5: `
                     <h3 class="text-2xl font-semibold mb-4">Чему ты научишься?</h3>
                    <ul class="space-y-3 text-sm mt-7">
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> Вёрстке и разработке (HTML, CSS,
                            JS, React/Vue)
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> Бэкенду: PHP, Laravel, Python
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> Тестированию и поддержке систем
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> Проектированию интерфейсов</li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> UX/UI-дизайну (Figma)</li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> Работа с БД (MySQL)</li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> CMS (WordPress)</li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> Создание приложений и веб-сайтов
                        </li>
                    </ul>

            `,
            info: `
        <p class="flex flex-row  gap-4"> <i class='bx bx-time'></i> Срок обучения: 3 г. 10 мес.</p>
        <p class="flex flex-row  gap-4 mt-7" ><i class='bx bx-badge-check'></i> Квалификация: Разработчик веб и мультимедийных приложений</p>
        <p class="flex flex-row  gap-4 mt-7" ><i class='bx bx-book-open'></i> Форма обучения: очная</p>
        <p class="flex flex-row  gap-4 mt-7" ><i class='bx bx-user'></i> На базе: 9 классов</p>
        <p class="flex flex-row  gap-4 mt-7" ><i class='bx bx-bar-chart'></i> Бюджет: 50 мест, Коммерция: 25 мест</p>
        <a href="https://mck-ktits.ru/wp-content/uploads/2021/04/fros090207.pdf" class="inline-flex items-center justify-center w-full gap-2 mt-4 px-4 py-2 bg-white text-black rounded text-sm"><i class='bx bx-download'></i> Скачать ФГОС 09.02.07</a>
      `
        },
        2: {
            left1: `
               <p>
                    Специальность 09.02.09 «Веб-разработка» готовит специалистов по созданию современных веб-приложений с акцентом на
                    клиентскую часть (frontend). Выпускники получают навыки разработки интерактивных пользовательских интерфейсов,
                    адаптивной вёрстки, работы с JavaScript-фреймворками и интеграции с серверными технологиями.
               </p>
`,
            left2: `
               <h3 class="text-lg font-semibold mb-4">Выпускник по направлению «Клиентская часть» умеет:</h3>
                    <ul class="space-y-3 text-sm mt-8">
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i>  Разрабатывать адаптивные и кросс-браузерные веб-интерфейсы с использованием HTML5, CSS3.
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Программировать интерактивные элементы на JavaScript (ES6+).
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Работать с фреймворками и библиотеками (React, Vue.js, Angular, Svelte).
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i>  Оптимизировать производительность веб-приложений.
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Применять системы контроля версий (Git, GitHub/GitLab).
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Тестировать код (Jest, Cypress, Storybook).
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-lg text-[#5190FB]'></i> Работать с UI/UX-дизайном (Figma, Adobe XD).
                        </li>
                    </ul>

            `,
            left3: `
          <h3 class="text-2xl font-semibold mb-4">Выпускник может работать:</h3>
                    <ul class="space-y-3 text-sm mt-6">
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Frontend-разработчиком</li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Веб-программистом</li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Fullstack-разработчик</li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> UI/UX-разработчиком</li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> JavaScript-инженером</li>
                        <li class="flex items-center gap-2"><i class='bx bxs-flame text-[#5190FB]'></i> Fullstack-разработчиком (при изучении бэкенда)</li>

                    </ul>
                    <div class="flex items-start  text-[12px] mt-5 p-4 bg-[#F2F8FF] rounded-xl">
                        <i class='bx bx-info-circle text-[16px] mr-2 text-[#3F83F8]'></i>
                        <p class="">
                           <span class="font-bold">Компании: </span>  IT-стартапы, веб-студии, digital-агентства, корпоративный сектор.
                        </p>
                    </div>

            `,
            left4: `
                     <h3 class="text-2xl font-semibold mb-4">Изучаемые технологии и инструменты</h3>
                    <ul class="space-y-3 text-sm mt-6">
                        <li class="flex items-start gap-2"><i class='bx bxs-heart text-[#3F83F8]'></i> Языки: HTML5, CSS3, JavaScript (TypeScript).
                        </li>
                        <li class="flex items-start gap-2"><i class='bx bxs-heart text-[#3F83F8]'></i> Стилизация: CSS Modules, Tailwind CSS, Styled Components.
                        </li>
                        <li class="flex items-start gap-2"><i class='bx bxs-heart text-[#3F83F8]'></i> Тестирование: Unit-тесты (Jest), E2E (Cypress).
                        </li>
                    </ul>
            `,
            left5: `
                     <h3 class="text-2xl font-semibold mb-4">Преимущества профессии:</h3>
                    <ul class="space-y-3 text-sm mt-7">
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i>  Востребованность на рынке труда.
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> Высокий уровень зарплат (от 70 000 ₽ для junior).
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> Возможность работать удалённо и на фрилансе.
                        </li>
                        <li class="flex items-center gap-2"><i class='bx bx-check text-[#5190FB]'></i> Постоянное развитие и изучение новых технологий.</li>
                        </li>
                    </ul>

            `,


            info: `
        <p class="flex flex-row items-center gap-4"> <i class='bx bx-time'></i> Срок обучения: 1 г. 10 мес.</p>
        <p class="flex flex-row items-center gap-4 mt-7" ><i class='bx bx-badge-check'></i> Квалификация: Разработчик веб-приложений</p>
        <p class="flex flex-row items-center gap-4 mt-7" ><i class='bx bx-book-open'></i> Форма обучения: Очно-дистанционное</p>
        <p class="flex flex-row items-center gap-4 mt-7" ><i class='bx bx-user'></i> На базе: 11 классов</p>
        <p class="flex flex-row items-center gap-4 mt-7" ><i class='bx bx-bar-chart'></i> Бюджет: 0, Коммерция: 34 мест</p>
        <p class="flex flex-row items-center gap-4 mt-7" ><i class='bx bx-file'></i> Документ об образовании: диплом государственного образца о среднем профессиональном образовании</p>
        <p class="flex flex-row items-center gap-4 mt-7" ><i class='bx bx-building'></i> Предприятия для трудоустройства: АО «БАРС Груп», ОЭЗ Иннополис, Технопарк в сфере высоких технологий «ИТ-парк», Любые IT-компании</p>
<!--        <a href="#" class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-white text-black rounded text-sm"><i class='bx bx-download'></i> Скачать ФГОС 09.02.09</a>-->
      `
        }
    };

    function switchProgram(id) {
        const card1 = document.getElementById('card1');
        const card2 = document.getElementById('card2');

        // Сброс
        card1.classList.remove('bg-[#3F83F8]', 'text-white', 'border-2', 'border-[#3F83F8]', 'text-[#3F83F8]', 'active-card');
        card2.classList.remove('bg-[#3F83F8]', 'text-white', 'border-2', 'border-[#3F83F8]', 'text-[#3F83F8]', 'active-card');

        // Активная карточка
        const activeCard = id === 1 ? card1 : card2;
        const inactiveCard = id === 1 ? card2 : card1;

        activeCard.classList.add('active-card');
        inactiveCard.classList.add();

        // Сменить содержимое
        document.getElementById('left-1').innerHTML = data[id].left1;
        document.getElementById('left-2').innerHTML = data[id].left2;
        document.getElementById('left-3').innerHTML = data[id].left3;
        document.getElementById('left-4').innerHTML = data[id].left4;
        document.getElementById('left-5').innerHTML = data[id].left5;
        document.getElementById('infoBlock').innerHTML = data[id].info;
    }

    // При загрузке показываем первую программу
    switchProgram(1);
</script>
<script>
    window.addEventListener('scroll', function () {
        const header = document.getElementById('main-header');
        const nav = document.getElementById('main-nav');
        const ckLogo = document.getElementById('ck-logo');
        const ktitsLogo = document.getElementById('ktits-logo');

        if (window.scrollY > 50) {
            header.classList.add('bg-white', 'shadow-md');
            nav.classList.remove('text-white');
            nav.classList.add('text-black');
            // убираем invert
            ckLogo.classList.remove('invert', 'brightness-0');
            ktitsLogo.classList.remove('invert', 'brightness-0');
        } else {
            header.classList.remove('bg-white', 'shadow-md');
            nav.classList.add('text-white');
            nav.classList.remove('text-black');
            // добавляем invert
            ckLogo.classList.add('invert', 'brightness-0');
            ktitsLogo.classList.add('invert', 'brightness-0');
        }
    });
</script>
</html>
