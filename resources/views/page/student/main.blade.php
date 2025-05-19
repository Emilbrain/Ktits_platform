@extends('includes.layout')
@section('h2-name', 'Главная')
@section('content')
    <!-- resources/views/history.blade.php -->
    <!-- resources/views/history.blade.php -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer>
        let currentOffset = 0;
        const itemsPerLoad = 10;
        const additionalItemsPerLoad = 4;

        function loadInitialHistory() {
            loadMoreHistory(currentOffset, itemsPerLoad);
        }

        function loadMoreHistory(offset, limit) {
            $.ajax({
                url: "{{ route('student.load-more-history') }}",
                method: 'GET',
                data: {
                    offset: offset,
                    limit: limit
                },
                success: function (response) {
                    const hess = $('#hess');
                    response.forEach(item => {
                        const historyItem = createHistoryItem(item);
                        hess.append(historyItem);
                    });
                    currentOffset += response.length;
                }
            });
        }

        function createHistoryItem(item) {
            return `
            <hr class="border-gray-300">
            <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                <div class="flex justify-center items-center py-2 text-[#677483]">${item.module.course.title}</div>
                <div class="flex justify-center items-center py-2 text-[#677483]">${item.module.title}</div>
                <div class="flex justify-center items-center py-2 text-[#677483]">${item.status}</div>
                <a href="/student/courses/course/module/${item.module.id}" class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl transition duration-700 ease-in-out items-center hover:text-white text-blue-500 cursor-pointer">
                    Подробнее
                </a>
            </div>
        `;
        }

        function handleScroll() {
            const historyContainer = $('#history-container');
            const scrollHeight = historyContainer.prop('scrollHeight');
            const scrollTop = historyContainer.scrollTop();
            const clientHeight = historyContainer.height();

            if (scrollHeight - scrollTop <= clientHeight + 100) {
                loadMoreHistory(currentOffset, additionalItemsPerLoad);
            }
        }

        // Загрузка начальных данных
        loadInitialHistory();

        // Добавление обработчика события прокрутки
        $('#history-container').on('scroll', handleScroll);
    </script>
    <div class="grid grid-cols-3 gap-5">
        @if(count($courses)>0)
            @foreach($courses as $course)
                <a href="{{ route('student.one.course', $course->id) }}"
                   class="bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center h-full relative">
                    <img src="{{ asset('storage/' . $course->logo) }}" alt=""
                         class="object-cover h-36">
                    <h4 class="text-md">{{ $course->title }}</h4>
                    @if ($course['progress'] !== null)
                        <div class="progress-circle w-10 absolute right-2 top-2" id="progress-circle-{{ $course->id }}" data-progress="{{ $course['progress'] }}"></div>
                    @endif
                </a>
            @endforeach
        @else
            <a href="{{ route('student.courses') }}" class="p-6 text-xl transition-all hover:text-blue-500">Записаться на курсы</a>
        @endif
    </div>
    <h3 class="mb-3 text-lg mt-5 ml-2 font-bold">История выполнения</h3>
    <div class="bg-gray-100 flex flex-col gap-5 rounded-xl" id="history-container">
        <div class="flex flex-col" id="hess">
            @if(count($tasks)>0)
                <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-t-lg">
                    <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Курс</div>
                    <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Модуль</div>
                    <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Статус</div>
                    <div class="flex justify-center items-center py-2 font-semibold text-gray-700"></div>
                </div>
            @else
                <p class="p-6 text-lg">История пуста</p>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const progressCircles = document.querySelectorAll('.progress-circle');

            progressCircles.forEach(circle => {
                const progress = parseFloat(circle.getAttribute('data-progress'));

                if (!isNaN(progress)) {
                    const bar = new ProgressBar.Circle(circle, {
                        color: 'rgb(10,10,255)', // Изменение цвета линии на #1d4ed8
                        strokeWidth: 4,
                        trailWidth: 20,
                        easing: 'easeInOut',
                        duration: 1400,
                        text: {
                            autoStyleContainer: false
                        },
                        from: { color: '#aaa', width: 20 },
                        to: { color: 'rgb(40,193,85)', width: 20 }, // Изменение цвета линии на #1d4ed8
                        step: function(state, circle) {
                            circle.path.setAttribute('stroke', state.color);
                            circle.path.setAttribute('stroke-width', state.width);

                            const value = Math.round(circle.value() * 100);
                            if (value === 0) {
                                circle.setText('');
                            } else if (value === 100) {
                                circle.setText(`<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="rgb(40,193,85)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check" style="width: 100%; height: 100%;"><path d="M20 6L9 17l-5-5"></path></svg>`);
                            }
                        }
                    });

                    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                    bar.text.style.fontSize = '1rem';

                    bar.animate(progress / 100);
                }
            });
        });
    </script>
@endsection
