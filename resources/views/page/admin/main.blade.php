@extends('includes.layout')
@section('h2-name', 'Главная страница')
@section('content')
    <div class="flex flex-col lg:flex-row items-start gap-5 flex-wrap">
        <!-- Прогресс -->
        <div class="w-full lg:max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between mb-3">
                <div class="flex items-center">
                    <div class="flex justify-center items-center">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">
                            Прогресс выполнения 4 курс
                        </h5>
                    </div>
                </div>
            </div>
            <div class="py-6" id="radial-chart"></div>
        </div>

        <!-- Карточки статистики -->
        <div class="flex flex-col sm:flex-row flex-wrap gap-5 flex-1">
            <!-- Курсы -->
            <div class="flex-1 min-w-[220px] bg-white rounded-lg shadow dark:bg-gray-800 p-6 text-center">
                <i class="bx bx-book-open text-4xl text-blue-600 mb-2"></i>
                <p class="text-sm text-gray-500">Всего курсов</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $coursesCount }}</p>
            </div>

            <!-- Студенты -->
            <div class="flex-1 min-w-[220px] bg-white rounded-lg shadow dark:bg-gray-800 p-6 text-center">
                <i class="bx bx-user text-4xl text-green-600 mb-2"></i>
                <p class="text-sm text-gray-500">Всего студентов</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $studentsCount }}</p>
            </div>

            <!-- Преподаватели -->
            <div class="flex-1 min-w-[220px] bg-white rounded-lg shadow dark:bg-gray-800 p-6 text-center">
                <i class="bx bx-chalkboard text-4xl text-purple-600 mb-2"></i>
                <p class="text-sm text-gray-500">Всего преподавателей</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $teachersCount }}</p>
            </div>
        </div>
    </div>


    <script>
        const statuses = @json(array_keys($stats));       // ['pending','completed',…]
        const counts = @json(array_values($stats));
        const getChartOptions = () => {
            return {

                // Update series to have 4 values
                series: counts,
                colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
                chart: {
                    height: "380px",
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

        if (document.getElementById("radial-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.querySelector("#radial-chart"), getChartOptions());
            chart.render();
        }
    </script>

    <script>

        const options = {
            chart: {
                height: "100%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 6,
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: 0
                },
            },
            series: [
                {
                    name: "New users",
                    data: [6500, 6418, 6456, 6526, 6356, 6456],
                    color: "#1A56DB",
                },
            ],
            xaxis: {
                categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
        }

        if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("area-chart"), options);
            chart.render();
        }

    </script>
@endsection
