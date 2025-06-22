@extends('includes.layout')
@section('h2-name', 'Главная')
@section('content')
    <!-- JQuery и первый скрипт остаются без изменений -->
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
                data: { offset, limit },
                success(response) {
                    const hess = $('#hess');
                    response.forEach(item => {
                        hess.append(createHistoryItem(item));
                    });
                    currentOffset += response.length;
                }
            });
        }

        function createHistoryItem(item) {
            return `
                <hr class="border-gray-300">
                <div class="grid grid-cols-2 md:grid-cols-4 bg-white p-2 rounded-b-lg text-sm text-[#677483]">
                    <div class="flex justify-center items-center py-2">${item.module.course.title}</div>
                    <div class="flex justify-center items-center py-2">${item.module.title}</div>
                    <div class="flex justify-center items-center py-2">${item.status}</div>
                    <a href="/student/courses/course/module/${item.module.id}"
                       class="flex justify-center items-center py-2 hover:bg-blue-500 hover:text-white transition rounded-xl text-blue-500 cursor-pointer">
                        Подробнее
                    </a>
                </div>
            `;
        }

        function handleScroll() {
            const c = $('#history-container');
            if (c.prop('scrollHeight') - c.scrollTop() <= c.height() + 100) {
                loadMoreHistory(currentOffset, additionalItemsPerLoad);
            }
        }

        loadInitialHistory();
        $('#history-container').on('scroll', handleScroll);
    </script>

    <div class="container mx-auto px-4 py-6">
        {{-- Сетка курсов --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
            @if(count($courses) > 0)
                @foreach($courses as $course)
                    <a href="{{ route('student.one.course', $course->id) }}"
                       class="relative bg-white rounded-xl p-4 flex flex-col items-center gap-3 justify-center h-full shadow hover:shadow-lg transition">
                        <img src="{{ asset('storage/' . $course->logo) }}" alt=""
                             class="object-cover h-36">
                        <h4 class="text-md font-semibold text-gray-800 text-center">{{ $course->title }}</h4>
                        @if($course['progress'] !== null)
                            <div id="progress-circle-{{ $course->id }}"
                                 class="progress-circle w-10 h-10 absolute top-2 right-2"
                                 data-progress="{{ $course['progress'] }}"></div>
                        @endif
                    </a>
                @endforeach
            @else
                <a href="{{ route('student.courses') }}"
                   class="col-span-full block text-center p-6 text-xl text-blue-600 hover:text-blue-800 transition">
                    Записаться на курсы
                </a>
            @endif
        </div>

        {{-- История выполнения --}}
        <h3 class="mt-8 mb-3 text-lg font-bold">История выполнения</h3>
        <div id="history-container"
             class="bg-gray-100 rounded-xl overflow-x-auto">
            <div id="hess" class="min-w-[600px]">
                @if(count($tasks) > 0)
                    <div class="grid grid-cols-2 md:grid-cols-4 bg-white p-3 rounded-t-lg text-sm font-semibold text-gray-700">
                        <div class="flex justify-center items-center py-2">Курс</div>
                        <div class="flex justify-center items-center py-2">Модуль</div>
                        <div class="flex justify-center items-center py-2">Статус</div>
                        <div class="flex justify-center items-center py-2"></div>
                    </div>
                @else
                    <p class="p-6 text-center text-gray-600">История пуста</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Скрипт прогресс-бара без изменений -->
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.progress-circle').forEach(circle => {
                const progress = parseFloat(circle.dataset.progress);
                if (isNaN(progress)) return;

                const bar = new ProgressBar.Circle(circle, {
                    color: '#1d4ed8',
                    strokeWidth: 4,
                    trailWidth: 20,
                    easing: 'easeInOut',
                    duration: 1400,
                    text: { autoStyleContainer: false },
                    from: { color: '#aaa', width: 20 },
                    to: { color: '#28c155', width: 20 },
                    step(state, c) {
                        c.path.setAttribute('stroke', state.color);
                        c.path.setAttribute('stroke-width', state.width);
                        const val = Math.round(c.value() * 100);
                        if (val === 100) {
                            c.setText(`<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#28c155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check w-full h-full"><path d="M20 6L9 17l-5-5"/></svg>`);
                        } else {
                            c.setText(val > 0 ? `${val}%` : '');
                        }
                    }
                });

                bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                bar.text.style.fontSize   = '1rem';
                bar.animate(progress / 100);
            });
        });
    </script>
@endsection
