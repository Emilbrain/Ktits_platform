@extends('includes.layout')
@section('content')
{{--    <h2 class="text-xl my-6 ml-5 font-bold">Дополнительное задание</h2>--}}
{{--    <div id="accordion-collapse-task" data-accordion="collapse">--}}
{{--        <!-- for loop -->--}}
{{--        <h2 id="accordion-collapse-heading-if">--}}
{{--            <button type="button"--}}
{{--                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"--}}
{{--                    data-accordion-target="#accordion-collapse-body-if" aria-expanded="false"--}}
{{--                    aria-controls="accordion-collapse-body-if">--}}
{{--                <span>Условие if</span>--}}
{{--                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"--}}
{{--                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">--}}
{{--                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                          d="M9 5 5 1 1 5"/>--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--        </h2>--}}
{{--        <div id="accordion-collapse-body-if" class="hidden" aria-labelledby="accordion-collapse-heading-if">--}}
{{--            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">--}}
{{--                Задание 1:<br>--}}
{{--                Если температура выше 40 -> это очень жаркий день,--}}
{{--                <br>--}}
{{--                если температура выше 25, но меньше 40 -> это жаркий день,--}}
{{--                <br>--}}
{{--                если температура равна 25 градусам -> это чудесный день,--}}
{{--                <br>--}}
{{--                если температура ниже 25 градусов, но выше или равно 10 -> это прохладный день,--}}
{{--                <br>--}}
{{--                если температура ниже 10 градусов -> это холодный день.--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <h2 class="text-xl my-6 ml-5 font-bold">Задания</h2>
    <div id="accordion-collapse-tasks" data-accordion="collapse">
        <!-- for loop -->
        <h2 id="accordion-collapse-heading-forr">
            <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-forr" aria-expanded="false"
                    aria-controls="accordion-collapse-body-forr">
                <span>Задание 1</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-forr" class="hidden" aria-labelledby="accordion-collapse-heading-forr">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Создайте форму, которая принимает имя пользователя и выводит приветствие с этим именем.
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskwhile">
            <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-taskwhile" aria-expanded="false"
                    aria-controls="accordion-collapse-body-taskwhile">
                <span>Задание 2</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskwhile" class="hidden"
             aria-labelledby="accordion-collapse-heading-taskwhile">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Создайте форму, которая принимает два числа и оператор (сложение, вычитание, умножение, деление) и выводит результат вычисления.
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskdowhile">
            <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-taskdowhile" aria-expanded="false"
                    aria-controls="accordion-collapse-body-taskdowhile">
                <span>Задание 3</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskdowhile" class="hidden"
             aria-labelledby="accordion-collapse-heading-taskdowhile">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Создайте форму, которая принимает возраст пользователя и выводит сообщение, является ли пользователь совершеннолетним (18 лет и старше).
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskforeach">
            <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-taskforeach" aria-expanded="false"
                    aria-controls="accordion-collapse-body-taskforeach">
                <span>Задание 4</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskforeach" class="hidden"
             aria-labelledby="accordion-collapse-heading-taskforeach">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Создайте форму, которая принимает температуру в градусах Цельсия и выводит её в градусах Фаренгейта. <i>(формула для перевода: цельсия * 9/5 + 32)</i>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskbreak">
            <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-taskbreak" aria-expanded="false"
                    aria-controls="accordion-collapse-body-taskbreak">
                <span>Задание 5</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskbreak" class="hidden"
             aria-labelledby="accordion-collapse-heading-taskbreak">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Создайте форму, которая принимает два числа (минимум и максимум) и выводит случайное число в этом диапазоне. <i>(для вывода рандомного значения используется функция <strong><u>rand</u></strong>(минимальное значение, максимальное значение))</i>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskcontinue">
            <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-taskcontinue" aria-expanded="false"
                    aria-controls="accordion-collapse-body-taskcontinue">
                <span>Задание 6</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskcontinue" class="hidden"
             aria-labelledby="accordion-collapse-heading-taskcontinue">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Создайте форму, которая принимает число и выводит, является ли оно четным или нечетным.
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskk">
            <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-taskk" aria-expanded="false"
                    aria-controls="accordion-collapse-body-taskk">
                <span>Задание 7</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskk" class="hidden"
             aria-labelledby="accordion-collapse-heading-taskk">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Создайте форму, которая принимает строку и выводит её длину. (для того чтобы узнать длину использовать функцию <strong><u>strlen</u></strong>(строка))
            </div>
        </div>
    </div>
    <h2 class="text-xl my-6 ml-5 font-bold">Описание</h2>
    <div id="accordion-collapse-descriptions" data-accordion="collapse" class="mb-10">
        <!-- for loop -->
        <h2 id="accordion-collapse-heading-for-description">
            <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-for-description" aria-expanded="false"
                    aria-controls="accordion-collapse-body-for-description">
                <span>GET запросы</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-for-description" class="hidden"
             aria-labelledby="accordion-collapse-heading-for-description">
            <div class="p-5 flex flex-wrap justify-center max-w-full gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                <img src="{{ asset('images/getwhat.png') }}" alt="Image for For Loop"
                     class="max-w-[48%] object-contain rounded-md">
                <img src="{{ asset('images/getreq.png') }}" alt="Image for For Loop"
                     class="max-w-[48%] object-contain rounded-md">
                <img src="{{ asset('images/ques.png') }}" alt="Image for For Loop"
                     class="max-w-[48%] object-contain rounded-md">
            </div>
        </div>
    </div>

@endsection
