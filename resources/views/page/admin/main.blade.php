@extends('includes.layout')
@section('h2-name', 'Главная страница')
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
        <!-- Прогресс -->
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 sm:p-6 relative">
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white">
                    Прогресс выполнения 4 курс
                </h5>
            </div>
            <div id="radial-chart" class="min-h-[260px] sm:min-h-[300px] w-full py-4 sm:py-6"></div>
        </div>

        <!-- Карточки статистики -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 col-span-1 lg:col-span-3">
            <!-- Курсы -->
            <div class="bg-white max-h-[150px] rounded-lg shadow dark:bg-gray-800 p-6 text-center">
                <i class="bx bx-book-open text-4xl text-blue-600 mb-2"></i>
                <p class="text-sm text-gray-500">Всего курсов</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $coursesCount }}</p>
            </div>

            <!-- Студенты -->
            <div class="bg-white max-h-[150px] rounded-lg shadow dark:bg-gray-800 p-6 text-center">
                <i class="bx bx-user text-4xl text-green-600 mb-2"></i>
                <p class="text-sm text-gray-500">Всего студентов</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $studentsCount }}</p>
            </div>

            <!-- Преподаватели -->
            <div class="bg-white max-h-[150px] rounded-lg shadow dark:bg-gray-800 p-6 text-center">
                <i class="bx bx-chalkboard text-4xl text-purple-600 mb-2"></i>
                <p class="text-sm text-gray-500">Всего преподавателей</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $teachersCount }}</p>
            </div>
        </div>
    </div>



    <script>
        const statuses = @json(array_keys($stats));
        const counts = @json(array_values($stats));
        const getChartOptions = () => {
            return {

                // Update series to have 4 values
                series: counts,
                colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
                chart: {
                    height: 300,
                    width: "100%",
                    type: "radialBar",
                    sparkline: {
                        enabled: true,
                    },
                },
                plotOptions: {
                    radialBar: {
                        track: {
                            background: '#E5E7EB',
                        },
                        dataLabels: {
                            show: false,
                        },
                        hollow: {
                            margin: 0,
                            size: "32%",
                        }
                    },
                },
                grid: {
                    show: false,
                    strokeDashArray: 3,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -23,
                        bottom: -20,
                    },
                },
                // Add new label for the fourth circle
                labels: statuses.map(s => {
                    // Можно преобразовать в читаемую форму
                    return ({
                        'pending': 'На проверке',
                        'completed': 'Выполненные',
                        'failed': 'С ошибками',
                    })[s];
                }), legend: {
                    show: true,
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                    labels: {
                        formatter: function (value) {
                            return value + '%';
                        }
                    }
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (document.getElementById("radial-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.querySelector("#radial-chart"), getChartOptions());

                // ⏳ Подождем 300мс и отрисуем график
                setTimeout(() => {
                    chart.render();
                }, 300); // Задержка перед появлением графика
            }
        });
    </script>

@endsection
