<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <title>Главная</title>
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-10 flex justify-center">

    <!-- Кнопки для открытия модальных окон -->
    <div class="space-y-4">
        <button data-modal-target="dom-modal" data-modal-toggle="dom-modal"
                class="w-72 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
            Преобразование типов данных
        </button>

        <button data-modal-target="else-if" data-modal-toggle="else-if"
                class="w-72 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
            Условные операторы
        </button>

        <button data-modal-target="dom" data-modal-toggle="dom"
                class="w-72 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
            Навигация по DOM
        </button>

        <button data-modal-target="class" data-modal-toggle="class"
                class="w-72 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
            Изменение стилей и клссов
        </button>

        <button data-modal-target="events-modal" data-modal-toggle="events-modal"
                class="w-72 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
            Функции
        </button>

        <button data-modal-target="mouse-events-modal" data-modal-toggle="mouse-events-modal"
                class="w-72 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
            События мыши
        </button>

        <button data-modal-target="keyboard-events-modal" data-modal-toggle="keyboard-events-modal"
                class="w-72 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
            События клавиатуры
        </button>
        <button data-modal-target="setTimeout" data-modal-toggle="setTimeout"
                class="w-72 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
            setTimeout
        </button>
        <button data-modal-target="setTimeout" data-modal-toggle="setTimeout"
                class="w-72 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
            setInterval
        </button>
    </div>

    <!-- Модальные окна -->
    <div id="setTimeout" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="header-text">
                        setTimeout
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="setTimeout">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <div
                    class="p-6 space-y-6 overflow-y-auto h-[700px] bg-gray-50 rounded-lg shadow-md border border-gray-200">
                    <p class="text-lg font-semibold text-gray-800">Теория</p>
                    <p class="text-gray-700">
                        Функция setTimeout позволяет выполнить код через определённое количество времени. Она
                        откладывает выполнение функции на заданный промежуток времени, который задается в миллисекундах.
                        <br>
                        <br>
                        setTimeout(function, delay, [param1, param2, ...]);
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li><strong>function</strong>— это функция, которая будет выполнена после задержки.
                        </li>
                        <li><strong>delay</strong> — время в миллисекундах, которое нужно подождать перед выполнением
                            функции.
                        </li>
                        <li><strong>param1, param2 и т.д.</strong>— это необязательные параметры, которые можно передать
                            в вызываемую функцию.
                        </li>
                    </ul>

                    <p class="text-lg font-semibold text-gray-800">Простые примеры</p>
                    <p class="h3">
                        Простая задержка:
                    </p>
                    <pre class="code">
setTimeout(() => {
    console.log('Сообщение через 1 секунду');
}, 1000);
    </pre>
                    <p class="h3">
                        Передача параметров в функцию:
                    </p>
                    <pre class="code">
function greet(name) {
    console.log(`Привет, ${name}`);
}

setTimeout(greet, 2000, 'Алексей');

    </pre>
                    <p class="h3">
                        Отмена setTimeout:
                    </p>
                    <pre class="code">
let timeoutId = setTimeout(() => {
    console.log('Этого не будет видно');
}, 3000);

clearTimeout(timeoutId);
    </pre>
                    <p class="h3">
                        Задержка для выполнения нескольких действий:
                    </p>
                    <pre class="code">
setTimeout(() => {
    console.log('Действие 1');
    setTimeout(() => {
        console.log('Действие 2');
    }, 2000);
}, 1000);
    </pre>
                    <p class="h3">
                        Функция с условием:
                    </p>
                    <pre class="code">
let condition = true;

setTimeout(() => {
    if (condition) {
        console.log('Условие выполнено');
    }
}, 1500);
    </pre>
                    <p class="h3">
                        Цикл с использованием setTimeout:
                    </p>
                    <pre class="code">
for (let i = 1; i <= 5; i++) {
    setTimeout(() => {
        console.log(i);
    }, i * 1000);
}
    </pre>
                    <p class="h3">
                        Задержка для вывода сообщения с текущей датой:
                    </p>
                    <pre class="code">
setTimeout(() => {
    console.log(`Текущая дата: ${new Date()}`);
}, 2000);

    </pre>
                    <p class="text-lg font-semibold text-gray-800">Реальные примеры</p>
                    <div class="h3">1. Уведомление о завершении задачи</div>
                    <pre class="code">
    &lt;!DOCTYPE html&gt;
    &lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Уведомление о задаче&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Уведомление о задаче&lt;/h1&gt;
        &lt;input type="text" id="task" placeholder="Опишите задачу" /&gt;
        &lt;input type="number" id="delay" placeholder="Время в секундах" /&gt;
        &lt;button onclick="setReminder()"&gt;Установить напоминание&lt;/button&gt;
        &lt;div id="message"&gt;&lt;/div&gt;

        &lt;script&gt;
            function setReminder() {
                const task = document.getElementById('task').value;
                const delay = parseInt(document.getElementById('delay').value) * 1000;

                if (!task || isNaN(delay)) {
                    alert('Введите задачу и время!');
                    return;
                }

                document.getElementById('message').textContent =
                        `Напоминание установлено: "${task}" через ${delay / 1000} секунд`;

                setTimeout(() =&gt; {
                    alert(`Напоминание: ${task}`);
                }, delay);
            }
        &lt;/script&gt;
    &lt;/body&gt;
    &lt;/html&gt;
</pre>
                    <div class="h3">2. Слайд-шоу изображений</div>
                    <pre class="code">
    &lt;!DOCTYPE html&gt;
    &lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Слайд-шоу&lt;/title&gt;
        &lt;style&gt;
            #slideshow img {
                width: 300px;
                height: 200px;
            }
        &lt;/style&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Слайд-шоу&lt;/h1&gt;
        &lt;div id="slideshow"&gt;
            &lt;img id="currentImage" src="image1.jpg" alt="Слайд"&gt;
        &lt;/div&gt;

        &lt;script&gt;
            const images = ['image1.jpg', 'image2.jpg', 'image3.jpg'];
            let currentIndex = 0;

            function showNextImage() {
                currentIndex = (currentIndex + 1) % images.length;
                document.getElementById('currentImage').src = images[currentIndex];
                setTimeout(showNextImage, 5000);
            }

            setTimeout(showNextImage, 5000);
        &lt;/script&gt;
    &lt;/body&gt;
    &lt;/html&gt;
</pre>

                    <div class="h3">3.Имитация загрузки данных</div>
                    <pre class="code">
    &lt;!DOCTYPE html&gt;
    &lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Имитация загрузки данных&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Имитация загрузки данных&lt;/h1&gt;
        &lt;button onclick="loadData()"&gt;Загрузить данные&lt;/button&gt;
        &lt;div id="loading" style="display:none;"&gt;Загрузка...&lt;/div&gt;
        &lt;div id="message"&gt;&lt;/div&gt;

        &lt;script&gt;
            function loadData() {
                document.getElementById('loading').style.display = 'block';
                document.getElementById('message').textContent = '';

                setTimeout(() =&gt; {
                    document.getElementById('loading').style.display = 'none';
                    document.getElementById('message').textContent =
                        'Данные успешно загружены!';
                }, 3000);
            }
        &lt;/script&gt;
    &lt;/body&gt;
    &lt;/html&gt;
</pre>
                    <div class="h3">4. Анимация появления текста</div>
                    <pre class="code">
    &lt;!DOCTYPE html&gt;
    &lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Анимация текста&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Анимация текста&lt;/h1&gt;
        &lt;input type="text" id="textInput" placeholder="Введите текст" /&gt;
        &lt;button onclick="animateText()"&gt;Показать текст&lt;/button&gt;
        &lt;div id="output"&gt;&lt;/div&gt;

        &lt;script&gt;
            function animateText() {
                const text = document.getElementById('textInput').value;
                let index = 0;
                const output = document.getElementById('output');
                output.textContent = '';

                function showNextChar() {
                    if (index &lt; text.length) {
                        output.textContent += text.charAt(index);
                        index++;
                        setTimeout(showNextChar, 200);
                    }
                }

                showNextChar();
            }
        &lt;/script&gt;
    &lt;/body&gt;
    &lt;/html&gt;
</pre>
<div class="h3">5. Задержка для автоматической авторизации</div>
                    <pre class="code">
    &lt;!DOCTYPE html&gt;
    &lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Авторизация с задержкой&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Форма авторизации&lt;/h1&gt;
        &lt;input type="password" id="password" placeholder="Введите пароль" /&gt;
        &lt;button onclick="login()"&gt;Войти&lt;/button&gt;
        &lt;div id="message"&gt;&lt;/div&gt;

        &lt;script&gt;
            let failedAttempts = 0;

            function login() {
                const password = document.getElementById('password').value;

                if (password !== '1234') {
                    failedAttempts++;
                    if (failedAttempts &gt;= 3) {
                        document.getElementById('message').textContent =
                        'Заблокировано на 10 секунд';
                        document.querySelector('button').disabled = true;

                        setTimeout(() =&gt; {
                            document.getElementById('message').textContent = '';
                            document.querySelector('button').disabled = false;
                            failedAttempts = 0;
                        }, 10000);
                    } else {
                        document.getElementById('message').textContent =
                        'Неправильный пароль';
                    }
                } else {
                    document.getElementById('message').textContent = 'Добро пожаловать!';
                }
            }
        &lt;/script&gt;
    &lt;/body&gt;
    &lt;/html&gt;
</pre>
<div class="h3">6. Простая игра "Реакция"</div>
                    <pre class="code">
    &lt;!DOCTYPE html&gt;
    &lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Игра на реакцию&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Игра на реакцию&lt;/h1&gt;
        &lt;button id="reactionButton" style="display:none;" onclick="showReactionTime()"&gt;
                        Нажми меня!&lt;/button&gt;
        &lt;div id="message"&gt;&lt;/div&gt;

        &lt;script&gt;
            let startTime;

            function startGame() {
                const randomDelay = Math.floor(Math.random() * 3000) + 2000;
                setTimeout(() =&gt; {
                    startTime = new Date().getTime();
                    document.getElementById('reactionButton').style.display = 'block';
                }, randomDelay);
            }

            function showReactionTime() {
                const reactionTime = new Date().getTime() - startTime;
                document.getElementById('message').textContent = `Ваше время реакции:
                        ${reactionTime} мс`;
                document.getElementById('reactionButton').style.display = 'none';
                startGame();
            }

            startGame();
        &lt;/script&gt;
    &lt;/body&gt;
    &lt;/html&gt;
</pre>
<div class="h3">7. Автоматическое закрытие уведомления</div>
                    <pre class="code">
    &lt;!DOCTYPE html&gt;
    &lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Автоматическое уведомление&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Автоматическое уведомление&lt;/h1&gt;
        &lt;button onclick="showNotification()"&gt;Показать уведомление&lt;/button&gt;
        &lt;div id="notification" style="display:none;"&gt;Уведомление&lt;/div&gt;

        &lt;script&gt;
            function showNotification() {
                const notification = document.getElementById('notification');
                notification.style.display = 'block';
                setTimeout(() =&gt; {
                    notification.style.display = 'none';
                }, 5000);
            }
        &lt;/script&gt;
    &lt;/body&gt;
    &lt;/html&gt;
</pre>

                </div>

            </div>
        </div>
    </div>
    <!-- Modal Навигация по DOM -->
    <div id="dom-modal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="header-text">
                        Преобразование типов данных
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="dom-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <div
                    class="p-6 space-y-6 overflow-y-auto h-[700px] bg-gray-50 rounded-lg shadow-md border border-gray-200">
                    <p class="text-lg font-semibold text-gray-800">1. Типы данных в JavaScript</p>
                    <p class="text-gray-700">
                        JavaScript различает несколько основных типов данных:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li><strong>Number</strong>: числовые значения, включая целые и дробные числа, Infinity и NaN.
                        </li>
                        <li><strong>String</strong>: строковые значения, заключённые в кавычки (' ', " ", `` `).</li>
                        <li><strong>Boolean</strong>: логические значения <code>true</code> и <code>false</code>.</li>
                        <li><strong>Null</strong>: специальное значение, которое означает "ничто".</li>
                        <li><strong>Undefined</strong>: значение переменной, которая была объявлена, но не
                            инициализирована.
                        </li>
                        <li><strong>Symbol</strong>: уникальные идентификаторы.</li>
                        <li><strong>BigInt</strong>: целые числа произвольной длины.</li>
                        <li><strong>Object</strong>: сложные структуры данных (объекты, массивы, функции).</li>
                    </ul>

                    <p class="text-lg font-semibold text-gray-800">2. Преобразование типов (type casting)</p>
                    <p class="text-gray-700">
                        Преобразование типов данных бывает явным (явное указание на преобразование) и неявным (когда
                        JavaScript автоматически преобразует типы).
                    </p>

                    <p class="font-semibold text-gray-800">Явное преобразование</p>
                    <p class="text-gray-700">Преобразование в строку (<code>String</code>)</p>
                    <pre class="code">
let num = 10;
let str = String(num);  // '10'

let value = 5 + '';
console.log(typeof value);  // 'string'
    </pre>

                    <p class="text-gray-700">Также можно использовать конкатенацию со строкой:</p>
                    <pre class="code">
let value = 5 + '';
console.log(typeof value);  // 'string'
    </pre>

                    <p class="font-semibold text-gray-800">Преобразование в число (<code>Number</code>)</p>
                    <pre class="code">
let str = '20';
let num = Number(str);  // 20

let str = '5';
let num = +str;  // 5
    </pre>

                    <p class="font-semibold text-gray-800">Преобразование в логическое значение (<code>Boolean</code>)
                    </p>
                    <pre class="code">
let nonEmptyStr = 'Hello';
let isTrue = Boolean(nonEmptyStr);  // true
    </pre>

                    <p class="text-gray-700">Значения, которые становятся <code>false</code> при преобразовании:</p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Пустая строка ('')</li>
                        <li>0</li>
                        <li><code>null</code></li>
                        <li><code>undefined</code></li>
                        <li><code>NaN</code></li>
                    </ul>

                    <p class="text-lg font-semibold text-gray-800">Неявное преобразование</p>
                    <p class="text-gray-700">
                        Неявное преобразование типов происходит автоматически во время выполнения операций, когда
                        JavaScript сам преобразует типы для выполнения задачи.
                    </p>

                    <p class="text-gray-700">Пример сложения строки и числа:</p>
                    <pre class="code">
let result = '5' + 3;  // '53'
    </pre>

                    <p class="text-gray-700">Пример для других арифметических операций:</p>
                    <pre class="code">
let result = '5' - 2;  // 3
    </pre>

                    <p class="text-lg font-semibold text-gray-800">3. Проверка типов данных</p>
                    <p class="text-gray-700">
                        Для проверки типов данных в JavaScript можно использовать оператор <code>typeof</code> и
                        некоторые методы и проверки.
                    </p>

                    <p class="font-semibold text-gray-800">Оператор <code>typeof</code></p>
                    <pre class="code">
let num = 42;
console.log(typeof num);  // 'number'

let str = 'Hello';
console.log(typeof str);  // 'string'

let isTrue = true;
console.log(typeof isTrue);  // 'boolean'

console.log(typeof undefined);  // 'undefined'
console.log(typeof null);  // 'object'
    </pre>

                    <p class="font-semibold text-gray-800">Проверка на массив (<code>Array.isArray()</code>)</p>
                    <pre class="code">
let arr = [1, 2, 3];
console.log(Array.isArray(arr));  // true
    </pre>

                    <p class="font-semibold text-gray-800">Проверка на <code>null</code></p>
                    <pre class="code">
let value = null;
console.log(value === null);  // true
    </pre>

                    <p class="font-semibold text-gray-800">Проверка на <code>NaN</code></p>
                    <pre class="code">
let value = NaN;
console.log(isNaN(value));  // true
console.log(Number.isNaN(NaN));  // true
    </pre>
                    <p class="text-lg font-semibold text-gray-800">4. Часто используемые методы преобразования</p>
                    <p class="text-gray-700">
                        Преобразование строки в число: parseInt() и parseFloat() Эти функции позволяют преобразовывать
                        строки в числа, включая целые (parseInt()) и дробные (parseFloat()). <code>typeof</code> и
                        некоторые методы и проверки.
                    </p>

                    {{--                    <p class="font-semibold text-gray-800">Оператор <code>typeof</code></p>--}}
                    <pre class="code">
let str = '100px';
let num = parseInt(str);  // 100

let floatStr = '3.14';
let floatNum = parseFloat(floatStr);  // 3.14

    </pre>
                    <p class="text-gray-700">
                        toString() для преобразования в строку Для преобразования числа или другого объекта в строку
                        используется метод toString().

                    </p>
                    <pre class="code">
let num = 42;
let str = num.toString();  // '42'
    </pre>
                    <p class="h2">4. Часто используемые методы преобразования</p>
                    <pre class="code">
// Преобразование строки в число
let str = '100';
let num = Number(str);
console.log(num);  // 100
console.log(typeof num);  // 'number'

// Преобразование числа в строку
let anotherNum = 50;
let anotherStr = String(anotherNum);
console.log(anotherStr);  // '50'
console.log(typeof anotherStr);  // 'string'

// Проверка типа данных
console.log(typeof anotherStr);  // 'string'

// Проверка на массив
let arr = [1, 2, 3];
console.log(Array.isArray(arr));  // true

// Преобразование строки в логическое значение
let isEmpty = Boolean('');
console.log(isEmpty);  // false

// Преобразование значения в число с помощью унарного плюса
let result = +'20';
console.log(result);  // 20

                    </pre>
                </div>

            </div>
        </div>
    </div>

    <div id="else-if" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="header-text">
                        Условные операторы
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="else-if">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <div
                    class="p-6 space-y-6 overflow-y-auto h-[700px] bg-gray-50 rounded-lg shadow-md border border-gray-200">
                    <p class="h2">1. Оператор if...else</p>
                    <p class="p">Оператор if...else выполняет один блок кода, если условие истинно (true), и другой блок
                        кода, если условие ложно (false).</p>
                    <p class="p">Синтаксис:</p>
                    <pre class="code">
if (условие) {
    // Код выполняется, если условие истинно (true)
} else {
    // Код выполняется, если условие ложно (false)
}
                    </pre>
                    <p class="p">Пример:</p>
                    <pre class="code">
let age = 18;

if (age >= 18) {
    console.log('Вы совершеннолетний');
} else {
    console.log('Вы несовершеннолетний');
}
                    </pre>
                    <p class="h2">2. Оператор else if</p>
                    <p class="p">Оператор else if используется для проверки нескольких условий. Если одно из условий
                        истинно, соответствующий блок кода будет выполнен.</p>
                    <p class="p">Синтаксис:</p>
                    <pre class="code">
if (условие1) {
    // Код выполняется, если условие1 истинно
} else if (условие2) {
    // Код выполняется, если условие2 истинно
} else {
    // Код выполняется, если все предыдущие условия ложны
}
                    </pre>
                    <p class="p">Пример:</p>
                    <pre class="code">
let score = 85;

if (score >= 90) {
    console.log('Отлично');
} else if (score >= 70) {
    console.log('Хорошо');
} else {
    console.log('Удовлетворительно');
}
                    </pre>
                    <p class="h2">3. Тернарный оператор ?</p>
                    <p class="p">Тернарный оператор ? является сокращённой формой записи оператора if...else. Он
                        возвращает одно из двух значений в зависимости от условия.</p>
                    <p class="p">Синтаксис:</p>
                    <pre class="code">
условие ? значение1 : значение2;
                    </pre>
                    <p class="p">
                        Если условие истинно, возвращается значение1, если ложно — значение2.

                        Пример:
                    </p>
                    <pre class="code">
let isLoggedIn = true;

let message = isLoggedIn ? 'Добро пожаловать!' : 'Пожалуйста, войдите в систему';
console.log(message);  // 'Добро пожаловать!'
                    </pre>
                    <div class="h2">4. Оператор switch</div>
                    <p class="p">Оператор switch проверяет значение переменной и выполняет соответствующий блок кода,
                        если есть совпадение.</p>
                    <p class="p">Синтаксис:</p>
                    <pre class="code">
switch (выражение) {
    case значение1:
        // Код выполняется, если выражение равно значению1
        break;
    case значение2:
        // Код выполняется, если выражение равно значению2
        break;
    default:
        // Код выполняется, если ни одно из значений не совпало
}
                    </pre>
                    <p class="p">Пример:</p>
                    <pre class="code">
let day = 3;

switch (day) {
    case 1:
        console.log('Понедельник');
        break;
    case 2:
        console.log('Вторник');
        break;
    case 3:
        console.log('Среда');
        break;
    default:
        console.log('Неизвестный день');
}
                    </pre>
                    <div class="h2">Пример кода с использованием условных операторов:</div>
                    <pre class="code">
let temperature = 30;

if (temperature > 30) {
    console.log('Очень жарко!');
} else if (temperature > 20) {
    console.log('Тепло');
} else {
    console.log('Холодно');
}

// Тернарный оператор
let access = (temperature > 20) ? 'Можно идти на прогулку' : 'Останьтесь дома';
console.log(access);

// Switch оператор
let weather = 'дождь';
switch (weather) {
    case 'солнечно':
        console.log('Солнечный день');
        break;
    case 'дождь':
        console.log('Возьмите зонт');
        break;
    default:
        console.log('Неизвестная погода');
}
                    </pre>

                </div>
            </div>
        </div>
    </div>

    <div id="dom" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="header-text">
                        Навигация по DOM
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="dom">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <div
                    class="p-6 space-y-6 overflow-y-auto h-[700px] bg-gray-50 rounded-lg shadow-md border border-gray-200">
                    <div class="h2">2. Выбор элементов</div>
                    <p class="p">JavaScript предоставляет несколько методов для поиска и работы с элементами DOM.</p>
                    <p class="h3">2.1 getElementById()</p>
                    <p class="p">Возвращает элемент по его уникальному id.</p>
                    <pre class="code">
let element = document.getElementById('header');
console.log(element);  // Вернёт элемент с id "header"
                    </pre>
                    <div class="h3">2.2 getElementsByClassName()</div>
                    <p class="p">Возвращает все элементы, у которых есть указанное имя класса.
                    </p>
                    <pre class="code">
let elements = document.getElementsByClassName('item');
console.log(elements);  // Вернёт HTMLCollection всех элементов с классом "item"
                    </pre>
                    <div class="h3">
                        2.3 getElementsByTagName()
                    </div>
                    <p class="p">
                        Возвращает все элементы с указанным именем тега.
                    </p>
                    <pre class="code">
let elements = document.getElementsByTagName('div');
console.log(elements);  // Вернёт HTMLCollection всех элементов div
                    </pre>
                    <div class="h3">
                        2.4 querySelector()
                    </div>
                    <p class="p">
                        Возвращает первый элемент, который соответствует CSS-селектору.
                    </p>
                    <pre class="code">
let element = document.querySelector('.container .item');
console.log(element);  // Вернёт первый элемент с классом "item" внутри элемента с классом "container"
                    </pre>
                    <div class="h3">
                        2.5 querySelectorAll()
                    </div>
                    <p class="p">
                        Возвращает все элементы, соответствующие CSS-селектору.
                    </p>
                    <pre class="code">
let elements = document.querySelectorAll('.container .item');
console.log(elements);  // Вернёт NodeList всех элементов с классом "item"
                    </pre>
                    <div class="h2">3. Изменение элементов</div>
                    <p class="p">После того, как элементы были выбраны, с ними можно взаимодействовать — изменять текст,
                        стили или добавлять новые элементы.</p>
                    <div class="h3">3.1 Изменение текста</div>
                    <p class="p">Используйте свойство textContent для изменения текста внутри элемента.</p>
                    <pre class="code">
let element = document.getElementById('header');
element.textContent = 'Новый текст';  // Изменит текст элемента с id "header"
                    </pre>
                    <div class="h3">3.2 Изменение HTML-содержимого</div>
                    <p class="p">Используйте свойство innerHTML для изменения HTML-контента элемента.</p>
                    <pre class="code">
let element = document.getElementById('content');
element.innerHTML = &lt;p&gt;Hовый параграф&lt;/p&gt;;  // Заменит содержимое на новый параграф
                    </pre>
                    <div class="h3">3.3 Изменение стилей</div>
                    <p class="p">Используйте свойство style для изменения CSS-стилей элемента.</p>
                    <pre class="code">
let element = document.getElementById('box');
element.style.backgroundColor = 'blue';  // Изменит цвет фона на синий
                    </pre>
                    <div class="h2">
                        4. Создание и удаление элементов
                    </div>
                    <div class="h3">
                        4.1 Создание элементов
                    </div>
                    <p class="p">
                        Используйте метод createElement() для создания новых элементов и appendChild() для их добавления
                        в DOM.
                    </p>
                    <pre class="code">
let newElement = document.createElement('div');
newElement.textContent = 'Новый элемент';
document.body.appendChild(newElement);  // Добавит новый элемент в конец &lt;body&gt;
                    </pre>
                    <div class="h3">
                        4.2 Удаление элементов
                    </div>
                    <p class="p">
                        Используйте метод remove() для удаления элемента из DOM.
                    </p>
                    <pre class="code">
let element = document.getElementById('header');
element.remove();  // Удалит элемент с id "header"
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Основы событий, функции -->
<div id="events-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Функции
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="events-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="p-4 space-y-4">
                <div class="h2">1. Обычные функции
                </div>
                <p class="p">Пример:</p>
                <pre class="code">
function greet(name) {
    return `Hello, ${name}!`;
}
console.log(greet("Alice")); // Hello, Alice!
                    </pre>
                <div class="h2">
                    2. Функциональные выражения
                </div>
                <p>Пример:</p>
                <pre class="code">
const greet = function(name) {
    return `Hello, ${name}!`;
};
console.log(greet("Bob")); // Hello, Bob!
                    </pre>
                <div class="h2">3. Cтрелочные функции</div>
                <p class="p">Пример:</p>
                <pre class="code">
const greet = (name) => {
    return `Hello, ${name}!`;
};
console.log(greet("Charlie")); // Hello, Charlie!
                    </pre>
            </div>
        </div>
    </div>
</div>

<div id="class" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="header-text">
                    Преобразование типов данных
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="class">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="p-6 space-y-6 overflow-y-auto h-[700px] bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <div class="h2">
                    1. Свойство style
                </div>
                <p class="p">
                    Свойство <code>style</code> используется для прямого изменения стилей HTML-элемента в JavaScript.
                    Оно позволяет изменить отдельные CSS-свойства для элемента.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;div id="box" style="width: 100px; height: 100px; background-color: lightblue;"&gt;&lt;/div&gt;

&lt;script&gt;
    let box = document.getElementById('box');
    box.style.backgroundColor = 'red'; // Изменение цвета фона
    box.style.width = '150px';         // Изменение ширины элемента
&lt;/script&gt;
</pre>

                <div class="h2">
                    2. Свойство classList
                </div>
                <p class="p">
                    Свойство <code>classList</code> позволяет управлять классами элемента. С помощью этого свойства
                    можно добавлять, удалять и проверять наличие классов у элемента.
                </p>
                <div class="h3">
                    Методы:
                </div>
                <ul class="list">
                    <li><code>add(className)</code> — добавляет указанный класс к элементу.</li>
                    <li><code>remove(className)</code> — удаляет указанный класс из элемента.</li>
                    <li><code>toggle(className)</code> — добавляет класс, если его нет, или удаляет, если он уже есть.
                    </li>
                    <li><code>contains(className)</code> — проверяет, содержит ли элемент указанный класс.</li>
                </ul>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;div id="box" class="box"&gt;&lt;/div&gt;

&lt;script&gt;
    let box = document.getElementById('box');
    box.classList.add('active');     // Добавление класса 'active'
    box.classList.remove('box');     // Удаление класса 'box'
    box.classList.toggle('highlight'); // Добавление или удаление класса 'highlight'
    let hasActive = box.classList.contains('active'); // Проверка наличия класса 'active'
&lt;/script&gt;
</pre>

                <div class="h2">
                    3. Метод getComputedStyle
                </div>
                <p class="p">
                    Метод <code>getComputedStyle</code> позволяет получить все стили, примененные к элементу, включая
                    те, которые могут быть унаследованы от CSS-файлов. Этот метод возвращает объект, который содержит
                    значения всех CSS-свойств элемента.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;div id="box" style="color: red; font-size: 20px;"&gt;Hello&lt;/div&gt;

&lt;script&gt;
    let box = document.getElementById('box');
    let styles = getComputedStyle(box);
    console.log(styles.color); // Выводит цвет текста
    console.log(styles.fontSize); // Выводит размер шрифта
&lt;/script&gt;
</pre>

                <div class="h2">
                    4. Метод setAttribute
                </div>
                <p class="p">
                    Метод <code>setAttribute</code> используется для установки значения атрибута элемента. Он принимает
                    два аргумента: имя атрибута и его значение.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;div id="box"&gt;&lt;/div&gt;

&lt;script&gt;
    let box = document.getElementById('box');
    box.setAttribute('data-id', '123'); // Установка атрибута 'data-id' со значением '123'
&lt;/script&gt;
</pre>


            </div>
        </div>
    </div>
</div>
<!-- Modal События мыши -->
<div id="mouse-events-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    События мыши
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="mouse-events-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div
                class="p-6 space-y-6 overflow-y-auto h-[700px] bg-gray-50 rounded-lg shadow-md border border-gray-200 w-full">
                <div class="h2">
                    1. Событие click
                </div>
                <p class="p">
                    Событие <code>click</code> возникает, когда пользователь нажимает и отпускает кнопку мыши над
                    элементом. Это событие часто используется для выполнения действия при клике на кнопки или другие
                    интерактивные элементы.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;button id="myButton"&gt;Нажми на меня&lt;/button&gt;

&lt;script&gt;
    document.getElementById('myButton').addEventListener('click', function() {
        alert('Кнопка нажата!');
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    2. Событие mouseenter
                </div>
                <p class="p">
                    Событие <code>mouseenter</code> возникает, когда указатель мыши входит в область элемента. Это
                    событие срабатывает только один раз при входе указателя в элемент.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;div id="box" style="width: 100px; height: 100px; background-color: lightblue;"&gt;&lt;/div&gt;

&lt;script&gt;
    let box = document.getElementById('box');
    box.addEventListener('mouseenter', function() {
        box.style.backgroundColor = 'red'; // Изменение цвета фона при наведении
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    3. Событие mouseleave
                </div>
                <p class="p">
                    Событие <code>mouseleave</code> возникает, когда указатель мыши уходит из области элемента. Это
                    событие срабатывает только один раз при уходе указателя из элемента.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;div id="box" style="width: 100px; height: 100px; background-color: lightblue;"&gt;&lt;/div&gt;

&lt;script&gt;
    let box = document.getElementById('box');
    box.addEventListener('mouseleave', function() {
        box.style.backgroundColor = 'lightblue';
        // Возвращение исходного цвета при уходе указателя
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    4. Событие dblclick
                </div>
                <p class="p">
                    Событие <code>dblclick</code> возникает, когда пользователь дважды быстро нажимает на элемент. Это
                    событие часто используется для действий, которые требуют двойного клика, например, для открытия
                    файла.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;button id="myButton"&gt;Дважды кликните&lt;/button&gt;

&lt;script&gt;
    document.getElementById('myButton').addEventListener('dblclick', function() {
        alert('Кнопка дважды нажата!');
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    5. Событие mousemove
                </div>
                <p class="p">
                    Событие <code>mousemove</code> возникает, когда указатель мыши перемещается по элементу. Оно часто
                    используется для создания интерактивных эффектов, таких как отображение координат указателя.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;div id="box" style="width: 100px; height: 100px; background-color: lightblue;"&gt;&lt;/div&gt;

&lt;script&gt;
    let box = document.getElementById('box');
    box.addEventListener('mousemove', function(event) {
        console.log('Координаты: ' + event.clientX + ', ' + event.clientY);
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    6. Событие mousedown
                </div>
                <p class="p">
                    Событие <code>mousedown</code> возникает, когда пользователь нажимает кнопку мыши над элементом. Это
                    событие регистрируется до того, как кнопка мыши будет отпущена.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;div id="box" style="width: 100px; height: 100px; background-color: lightblue;"&gt;&lt;/div&gt;

&lt;script&gt;
    let box = document.getElementById('box');
    box.addEventListener('mousedown', function() {
        box.style.backgroundColor = 'green'; // Изменение цвета фона при нажатии кнопки мыши
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    7. Событие mouseup
                </div>
                <p class="p">
                    Событие <code>mouseup</code> возникает, когда пользователь отпускает кнопку мыши над элементом. Это
                    событие срабатывает после того, как кнопка мыши была отпущена.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;div id="box" style="width: 100px; height: 100px; background-color: lightblue;"&gt;&lt;/div&gt;

&lt;script&gt;
    let box = document.getElementById('box');
    box.addEventListener('mouseup', function() {
        box.style.backgroundColor = 'yellow';
        // Изменение цвета фона при отпускании кнопки мыши
    });
&lt;/script&gt;
</pre>

            </div>
        </div>
    </div>
</div>

<!-- Modal События клавиатуры -->
<div id="keyboard-events-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    События клавиатуры
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="keyboard-events-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="p-6 space-y-6 overflow-y-auto h-[700px] bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <div class="h2">
                    1. Событие keydown
                </div>
                <p class="p">
                    Событие <code>keydown</code> возникает, когда клавиша на клавиатуре нажата. Это событие срабатывает
                    в момент нажатия на клавишу и может использоваться для отслеживания, когда пользователь начинает
                    взаимодействовать с клавиатурой.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;input id="inputField" type="text" placeholder="Нажмите клавишу"&gt;

&lt;script&gt;
    document.addEventListener('keydown', function(event) {
        console.log('Клавиша нажата: ' + event.key);
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    2. Событие keyup
                </div>
                <p class="p">
                    Событие <code>keyup</code> возникает, когда клавиша отпущена. Оно срабатывает после того, как
                    клавиша была нажата и затем отпущена, что может быть полезно для выполнения действия после
                    завершения ввода.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;input id="inputField" type="text" placeholder="Отпустите клавишу"&gt;

&lt;script&gt;
    document.addEventListener('keyup', function(event) {
        console.log('Клавиша отпущена: ' + event.key);
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    3. Отслеживание нажатия нескольких клавиш (hotkeys)
                </div>
                <p class="p">
                    Можно использовать комбинацию клавиш для выполнения определенных действий. Например, комбинации
                    "Ctrl + S" или "Shift + A" могут быть полезны для создания горячих клавиш в вашем приложении.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;script&gt;
    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.key === 's') {
            event.preventDefault(); // Останавливаем стандартное поведение
            alert('Сохранение!');
        }
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    4. Ввод текста через событие input
                </div>
                <p class="p">
                    Событие <code>input</code> используется для отслеживания ввода текста в текстовых полях. Оно
                    срабатывает каждый раз, когда пользователь изменяет содержимое поля ввода.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;input id="inputField" type="text" placeholder="Введите текст"&gt;

&lt;script&gt;
    let inputField = document.getElementById('inputField');
    inputField.addEventListener('input', function(event) {
        console.log('Введено: ' + event.target.value);
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    5. Использование клавиш для управления элементами на странице
                </div>
                <p class="p">
                    Можно использовать клавиши для управления элементами на странице, например, перемещать объект по
                    экрану с помощью клавиш-стрелок или клавиш "W", "A", "S", "D".
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;div id="box" style="width: 50px; height: 50px; background-color: lightblue;
position: relative;"&gt;&lt;/div&gt;

&lt;script&gt;
    let box = document.getElementById('box');
    let step = 10;

    document.addEventListener('keydown', function(event) {
        let position = box.getBoundingClientRect();

        switch (event.code) {
        case 'ArrowUp':
            box.style.top = (position.top - step) + 'px';
            break;
        case 'ArrowDown':
            box.style.top = (position.top + step) + 'pxx';
            break;
        case 'ArrowLeft':
            box.style.left = (position.left - step) + 'px';
            break;
        case 'ArrowRight':
            box.style.left = (position.left + step) + 'px';
            break;
    }
    });
&lt;/script&gt;
</pre>
                <div class="h2">
                    1. Подробнее об объекте event
                </div>
                <p class="p">
                    Когда срабатывает событие, браузер создает объект события, содержащий всю информацию о произошедшем
                    событии. Этот объект передается в обработчик событий автоматически. Объект <code>event</code>
                    содержит свойства и методы, которые позволяют получить доступ к различным данным о событии, таким
                    как клавиша, которая была нажата, координаты мыши, элемент, на котором произошло событие, и многое
                    другое.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;input type="text" id="inputField" placeholder="Введите текст"&gt;

&lt;script&gt;
    document.addEventListener('keydown', function(event) {
        console.log('Клавиша нажата: ' + event.key); // Получаем нажатую клавишу
        console.log('Код клавиши: ' + event.code);   // Получаем код клавиши
        console.log('Alt нажат: ' + event.altKey);   // Проверяем, нажата ли клавиша Alt
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    2. Свойства объекта event
                </div>
                <p class="p">
                    Объект <code>event</code> содержит множество полезных свойств. Вот несколько основных:
                </p>
                <ul class="p">
                    <li><code>event.key</code> — возвращает символ клавиши, которую нажал пользователь.</li>
                    <li><code>event.code</code> — возвращает код клавиши (например, <code>'KeyA'</code> для клавиши
                        "A").
                    </li>
                    <li><code>event.altKey</code>, <code>event.ctrlKey</code>, <code>event.shiftKey</code> — булевы
                        значения, показывающие, были ли нажаты соответствующие модификаторные клавиши.
                    </li>
                    <li><code>event.target</code> — элемент, на котором произошло событие.</li>
                    <li><code>event.type</code> — тип события (например, <code>'keydown'</code>, <code>'click'</code>).
                    </li>
                    <li><code>event.preventDefault()</code> — метод, который останавливает стандартное поведение
                        элемента (например, предотвращает отправку формы).
                    </li>
                </ul>

                <div class="h3">
                    Пример использования event.preventDefault():
                </div>
                <pre class="code">
&lt;form id="myForm"&gt;
    &lt;input type="submit" value="Отправить"&gt;
&lt;/form&gt;

&lt;script&gt;
    let form = document.getElementById('myForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Предотвращает отправку формы
        alert('Форма не отправлена');
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    3. Получение данных о клавише и модификаторах
                </div>
                <p class="p">
                    При работе с событиями клавиатуры часто важно знать, была ли нажата определенная клавиша или
                    модификаторы вроде Alt, Ctrl, Shift. Это можно легко сделать с помощью объекта <code>event</code>.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;script&gt;
    document.addEventListener('keydown', function(event) {
        if (event.altKey && event.key === 'S') {
            console.log('Нажата комбинация Alt+S');
        }
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    4. Примеры использования разных свойств объекта event
                </div>
                <div class="h3">
                    Пример отслеживания нажатий клавиш с использованием event.key и event.code:
                </div>
                <pre class="code">
&lt;script&gt;
    document.addEventListener('keydown', function(event) {
        console.log('Вы нажали клавишу: ' + event.key); // Получаем символ нажатой клавиши
        console.log('Код клавиши: ' + event.code);      // Получаем код клавиши
    });
&lt;/script&gt;
</pre>

                <div class="h3">
                    Пример использования event.target для получения элемента, на котором произошло событие:
                </div>
                <pre class="code">
&lt;div id="div1"&gt;Нажми сюда&lt;/div&gt;
&lt;div id="div2"&gt;Или сюда&lt;/div&gt;

&lt;script&gt;
    document.addEventListener('click', function(event) {
        console.log('Вы нажали на элемент с id: ' + event.target.id);
    });
&lt;/script&gt;
</pre>

                <div class="h3">
                    Пример: изменение поведения браузера с помощью event.preventDefault():
                </div>
                <pre class="code">
&lt;a href="https://example.com" id="link"&gt;Перейти на сайт&lt;/a&gt;

&lt;script&gt;
    let link = document.getElementById('link');
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Предотвращаем переход по ссылке
        alert('Переход отменен!');
    });
&lt;/script&gt;
</pre>

                <div class="h2">
                    5. Событие input: работа с полями формы
                </div>
                <p class="p">
                    Событие <code>input</code> позволяет отслеживать изменения в текстовых полях формы. Это удобно,
                    когда нужно реагировать на изменения в реальном времени.
                </p>
                <div class="h3">
                    Пример:
                </div>
                <pre class="code">
&lt;input type="text" id="textInput" placeholder="Введите текст"&gt;

&lt;script&gt;
    let inputField = document.getElementById('textInput');
    inputField.addEventListener('input', function(event) {
        console.log('Вы ввели: ' + event.target.value); // Получаем текущее значение
    });
&lt;/script&gt;
</pre>

            </div>
        </div>
    </div>
</div>

<!-- Modal Работа с формами -->
<div id="form-events-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Работа с формами
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="form-events-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="p-4 space-y-4">
                <p>Работа с формами — важная часть взаимодействия с пользователем. Основные события:</p>
                <ul class="list-disc pl-5">
                    <li><strong>submit</strong>: Отправка формы.</li>
                    <li><strong>change</strong>: Изменение значения в поле формы.</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="dom-modal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="header-text">
                        Преобразование типов данных
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="dom-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <div
                    class="p-6 space-y-6 overflow-y-auto h-[700px] bg-gray-50 rounded-lg shadow-md border border-gray-200">
                    <p class="text-lg font-semibold text-gray-800">1. Типы данных в JavaScript</p>
                    <p class="text-gray-700">
                        JavaScript различает несколько основных типов данных:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li><strong>Number</strong>: числовые значения, включая целые и дробные числа, Infinity и NaN.
                        </li>
                        <li><strong>String</strong>: строковые значения, заключённые в кавычки (' ', " ", `` `).</li>
                        <li><strong>Boolean</strong>: логические значения <code>true</code> и <code>false</code>.</li>
                        <li><strong>Null</strong>: специальное значение, которое означает "ничто".</li>
                        <li><strong>Undefined</strong>: значение переменной, которая была объявлена, но не
                            инициализирована.
                        </li>
                        <li><strong>Symbol</strong>: уникальные идентификаторы.</li>
                        <li><strong>BigInt</strong>: целые числа произвольной длины.</li>
                        <li><strong>Object</strong>: сложные структуры данных (объекты, массивы, функции).</li>
                    </ul>

                    <p class="text-lg font-semibold text-gray-800">2. Преобразование типов (type casting)</p>
                    <p class="text-gray-700">
                        Преобразование типов данных бывает явным (явное указание на преобразование) и неявным (когда
                        JavaScript автоматически преобразует типы).
                    </p>

                    <p class="font-semibold text-gray-800">Явное преобразование</p>
                    <p class="text-gray-700">Преобразование в строку (<code>String</code>)</p>
                    <pre class="code">
let num = 10;
let str = String(num);  // '10'

let value = 5 + '';
console.log(typeof value);  // 'string'
    </pre>

                    <p class="text-gray-700">Также можно использовать конкатенацию со строкой:</p>
                    <pre class="code">
let value = 5 + '';
console.log(typeof value);  // 'string'
    </pre>

                    <p class="font-semibold text-gray-800">Преобразование в число (<code>Number</code>)</p>
                    <pre class="code">
let str = '20';
let num = Number(str);  // 20

let str = '5';
let num = +str;  // 5
    </pre>

                    <p class="font-semibold text-gray-800">Преобразование в логическое значение (<code>Boolean</code>)
                    </p>
                    <pre class="code">
let nonEmptyStr = 'Hello';
let isTrue = Boolean(nonEmptyStr);  // true
    </pre>

                    <p class="text-gray-700">Значения, которые становятся <code>false</code> при преобразовании:</p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Пустая строка ('')</li>
                        <li>0</li>
                        <li><code>null</code></li>
                        <li><code>undefined</code></li>
                        <li><code>NaN</code></li>
                    </ul>

                    <p class="text-lg font-semibold text-gray-800">Неявное преобразование</p>
                    <p class="text-gray-700">
                        Неявное преобразование типов происходит автоматически во время выполнения операций, когда
                        JavaScript сам преобразует типы для выполнения задачи.
                    </p>

                    <p class="text-gray-700">Пример сложения строки и числа:</p>
                    <pre class="code">
let result = '5' + 3;  // '53'
    </pre>

                    <p class="text-gray-700">Пример для других арифметических операций:</p>
                    <pre class="code">
let result = '5' - 2;  // 3
    </pre>

                    <p class="text-lg font-semibold text-gray-800">3. Проверка типов данных</p>
                    <p class="text-gray-700">
                        Для проверки типов данных в JavaScript можно использовать оператор <code>typeof</code> и
                        некоторые методы и проверки.
                    </p>

                    <p class="font-semibold text-gray-800">Оператор <code>typeof</code></p>
                    <pre class="code">
let num = 42;
console.log(typeof num);  // 'number'

let str = 'Hello';
console.log(typeof str);  // 'string'

let isTrue = true;
console.log(typeof isTrue);  // 'boolean'

console.log(typeof undefined);  // 'undefined'
console.log(typeof null);  // 'object'
    </pre>

                    <p class="font-semibold text-gray-800">Проверка на массив (<code>Array.isArray()</code>)</p>
                    <pre class="code">
let arr = [1, 2, 3];
console.log(Array.isArray(arr));  // true
    </pre>

                    <p class="font-semibold text-gray-800">Проверка на <code>null</code></p>
                    <pre class="code">
let value = null;
console.log(value === null);  // true
    </pre>

                    <p class="font-semibold text-gray-800">Проверка на <code>NaN</code></p>
                    <pre class="code">
let value = NaN;
console.log(isNaN(value));  // true
console.log(Number.isNaN(NaN));  // true
    </pre>
                    <p class="text-lg font-semibold text-gray-800">4. Часто используемые методы преобразования</p>
                    <p class="text-gray-700">
                        Преобразование строки в число: parseInt() и parseFloat() Эти функции позволяют преобразовывать
                        строки в числа, включая целые (parseInt()) и дробные (parseFloat()). <code>typeof</code> и
                        некоторые методы и проверки.
                    </p>

                    {{--                    <p class="font-semibold text-gray-800">Оператор <code>typeof</code></p>--}}
                    <pre class="code">
let str = '100px';
let num = parseInt(str);  // 100

let floatStr = '3.14';
let floatNum = parseFloat(floatStr);  // 3.14

    </pre>
                    <p class="text-gray-700">
                        toString() для преобразования в строку Для преобразования числа или другого объекта в строку
                        используется метод toString().

                    </p>
                    <pre class="code">
let num = 42;
let str = num.toString();  // '42'
    </pre>
                    <p class="h2">4. Часто используемые методы преобразования</p>
                    <pre class="code">
// Преобразование строки в число
let str = '100';
let num = Number(str);
console.log(num);  // 100
console.log(typeof num);  // 'number'

// Преобразование числа в строку
let anotherNum = 50;
let anotherStr = String(anotherNum);
console.log(anotherStr);  // '50'
console.log(typeof anotherStr);  // 'string'

// Проверка типа данных
console.log(typeof anotherStr);  // 'string'

// Проверка на массив
let arr = [1, 2, 3];
console.log(Array.isArray(arr));  // true

// Преобразование строки в логическое значение
let isEmpty = Boolean('');
console.log(isEmpty);  // false

// Преобразование значения в число с помощью унарного плюса
let result = +'20';
console.log(result);  // 20

                    </pre>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
