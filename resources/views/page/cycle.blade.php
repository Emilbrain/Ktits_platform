@extends('includes.layout')
@section('content')
    <h2 class="text-xl my-6 ml-5 font-bold">Дополнительное задание</h2>
    <div id="accordion-collapse-task" data-accordion="collapse">
        <!-- for loop -->
        <h2 id="accordion-collapse-heading-if">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-if" aria-expanded="false" aria-controls="accordion-collapse-body-if">
                <span>Условие if</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-if" class="hidden" aria-labelledby="accordion-collapse-heading-if">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 1:<br>
                Если температура выше 40 -> это очень жаркий день,
                <br>
                если температура выше 25, но меньше 40 -> это жаркий день,
                <br>
                если температура равна 25 градусам -> это чудесный день,
                <br>
                если температура ниже 25 градусов, но выше или равно 10 -> это прохладный день,
                <br>
                если температура ниже 10 градусов -> это холодный день.
            </div>
        </div>
    </div>
    <h2 class="text-xl my-6 ml-5 font-bold">Задание</h2>
    <div id="accordion-collapse-tasks" data-accordion="collapse">
        <!-- for loop -->
        <h2 id="accordion-collapse-heading-forr">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-forr" aria-expanded="false" aria-controls="accordion-collapse-body-forr">
                <span>Цикл for</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-forr" class="hidden" aria-labelledby="accordion-collapse-heading-forr">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 1:<br>
                Напишите цикл for, который будет выводить числа от 1 до 10, умноженные на 5.
            </div>
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 2:<br>
                Используя цикл for, выведите таблицу умножения на 7 (от 1 до 10).
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskwhile">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-taskwhile" aria-expanded="false" aria-controls="accordion-collapse-body-taskwhile">
                <span>Цикл while</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskwhile" class="hidden" aria-labelledby="accordion-collapse-heading-taskwhile">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 1:<br>
                Используя цикл while, выведите все четные числа от 2 до 20.
            </div>
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 2:<br>
                Напишите цикл while, который будет выводить квадраты чисел от 1 до 5.
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskdowhile">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-taskdowhile" aria-expanded="false" aria-controls="accordion-collapse-body-taskdowhile">
                <span>Цикл do while</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskdowhile" class="hidden" aria-labelledby="accordion-collapse-heading-taskdowhile">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 1:<br>
                Используя цикл do...while, выведите все числа от 1 до 10.
            </div>
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 2:<br>
                Выводить на экран ряд чисел 4 7 10 13 16 19 22... Всего вывести 30 цифр
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskforeach">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-taskforeach" aria-expanded="false" aria-controls="accordion-collapse-body-taskforeach">
                <span>Цикл foreach</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskforeach" class="hidden" aria-labelledby="accordion-collapse-heading-taskforeach">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 1:<br>
                Используя цикл foreach, выведите все элементы массива $colors.<br>
                Массив: $colors = ["Red", "Green", "Blue", "Yellow"];
            </div>
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 2:<br>
                Вывести массив используя foreach<br>
                Массив:<pre>
                    $ages = [
                        "John" => 30,
                        "Jane" => 25,
                        "Doe" => 40
                    ];
                </pre>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskbreak">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-taskbreak" aria-expanded="false" aria-controls="accordion-collapse-body-taskbreak">
                <span>Break</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskbreak" class="hidden" aria-labelledby="accordion-collapse-heading-taskbreak">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 1:<br>
                Напишите цикл for, который будет выводить числа от 1 до 5. Используйте оператор break, чтобы прекратить выполнение цикла после вывода числа 3.
            </div>
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 2:<br>
                Используя цикл while, выведите все четные числа от 2 до 10. Используйте оператор break, чтобы прекратить выполнение цикла после вывода числа 6.
            </div>
        </div>
        <h2 id="accordion-collapse-heading-taskcontinue">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-taskcontinue" aria-expanded="false" aria-controls="accordion-collapse-body-taskcontinue">
                <span>Continue</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-taskcontinue" class="hidden" aria-labelledby="accordion-collapse-heading-taskcontinue">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 1:<br>
                Напишите цикл for, который будет выводить числа от 1 до 10, пропуская число 5 с помощью оператора continue.
            </div>
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                Задание 2:<br>
                Используя цикл while, выведите все нечетные числа от 1 до 9, пропуская число 3 с помощью оператора continue.
            </div>
        </div>
    </div>
    <h2 class="text-xl my-6 ml-5 font-bold">Описание</h2>
    <div id="accordion-collapse-descriptions" data-accordion="collapse" class="mb-10">
        <!-- for loop -->
        <h2 id="accordion-collapse-heading-for-description">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-for-description" aria-expanded="false" aria-controls="accordion-collapse-body-for-description">
                <span>Цикл for</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-for-description" class="hidden" aria-labelledby="accordion-collapse-heading-for-description">
            <div class="p-5 flex max-w-full gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                <img src="{{ asset('images/for.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
                <img src="{{ asset('images/примерfor.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
            </div>
        </div>


        <!-- while loop -->
        <h2 id="accordion-collapse-heading-while">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-while" aria-expanded="false" aria-controls="accordion-collapse-body-while">
                <span>Цикл while</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-while" class="hidden" aria-labelledby="accordion-collapse-heading-while">
            <div class="p-5 flex gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                <img src="{{ asset('images/while.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
                <img src="{{ asset('images/примерwhile.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
            </div>
        </div>

        <!-- do..while loop -->
        <h2 id="accordion-collapse-heading-do-while">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-do-while" aria-expanded="false" aria-controls="accordion-collapse-body-do-while">
                <span>Цикл do..while</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-do-while" class="hidden" aria-labelledby="accordion-collapse-heading-do-while">
            <div class="p-5 flex gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                <img src="{{ asset('images/dowhile.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
                <img src="{{ asset('images/примерdowhile.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
            </div>
        </div>

        <!-- foreach loop -->
        <h2 id="accordion-collapse-heading-foreach">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-foreach" aria-expanded="false" aria-controls="accordion-collapse-body-foreach">
                <span>Цикл foreach</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-foreach" class="hidden" aria-labelledby="accordion-collapse-heading-foreach">
            <div class="p-5 flex gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                <img src="{{ asset('images/foreach.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
                <img src="{{ asset('images/примерforeach.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
            </div>
        </div>
        <h2 id="accordion-collapse-heading-break">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-break" aria-expanded="false" aria-controls="accordion-collapse-body-break">
                <span>Break</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-break" class="hidden" aria-labelledby="accordion-collapse-heading-break">
            <div class="p-5 flex gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                <img src="{{ asset('images/break1.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
                <img src="{{ asset('images/break2.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
            </div>
        </div>
        <h2 id="accordion-collapse-heading-continue">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-continue" aria-expanded="false" aria-controls="accordion-collapse-body-continue">
                <span>Continue</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-continue" class="hidden mb-10" aria-labelledby="accordion-collapse-heading-continue">
            <div class="p-5 flex gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                <img src="{{ asset('images/continue1.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
                <img src="{{ asset('images/continue2.png') }}" alt="Image for For Loop" class="max-w-[48%] object-contain rounded-md">
            </div>
        </div>
    </div>

@endsection
