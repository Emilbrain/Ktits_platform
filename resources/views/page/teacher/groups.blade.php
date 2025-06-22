@extends('includes.layout')
@section('h2-name', 'Группы')
@section('content')
    <!-- Main Content -->
        <h2 class="text-2xl font-bold mb-4">Мои группы</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($groups as $group)
                <a
                    href="{{ route('teacher.one.group', $group->group->id) }}"
                    class="bg-white shadow rounded-xl p-4 flex flex-col items-center justify-center gap-4 hover:shadow-lg transition h-full"
                >
                    <img
                        src="{{ asset('images/user.png') }}"
                        alt="{{ $group->group->title }} avatar"
                        class="object-contain h-32 w-full mb-2"
                    >
                    <h4 class="text-md font-semibold text-gray-800 text-center">
                        {{ $group->group->title }}
                    </h4>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-600">
                    Нет ни одной группы в списке
                </p>
            @endforelse
        </div>
{{--    <script>--}}
{{--        const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');--}}

{{--        sideLinks.forEach(item => {--}}
{{--            const li = item.parentElement;--}}
{{--            item.addEventListener('click', () => {--}}
{{--                sideLinks.forEach(i => {--}}
{{--                    i.parentElement.classList.remove('active');--}}
{{--                })--}}
{{--                li.classList.add('active');--}}
{{--            })--}}
{{--        });--}}

{{--        const menuBar = document.querySelector('.content nav .bx.bx-menu');--}}
{{--        const sideBar = document.querySelector('.sidebar');--}}

{{--        menuBar.addEventListener('click', () => {--}}
{{--            sideBar.classList.toggle('close');--}}
{{--        });--}}

{{--        const searchBtn = document.querySelector('.content nav form .form-input button');--}}
{{--        const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');--}}
{{--        const searchForm = document.querySelector('.content nav form');--}}

{{--        searchBtn.addEventListener('click', function (e) {--}}
{{--            if (window.innerWidth < 576) {--}}
{{--                e.preventDefault;--}}
{{--                searchForm.classList.toggle('show');--}}
{{--                if (searchForm.classList.contains('show')) {--}}
{{--                    searchBtnIcon.classList.replace('bx-search', 'bx-x');--}}
{{--                } else {--}}
{{--                    searchBtnIcon.classList.replace('bx-x', 'bx-search');--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}

{{--        window.addEventListener('resize', () => {--}}
{{--            if (window.innerWidth < 768) {--}}
{{--                sideBar.classList.add('close');--}}
{{--            } else {--}}
{{--                sideBar.classList.remove('close');--}}
{{--            }--}}
{{--            if (window.innerWidth > 576) {--}}
{{--                searchBtnIcon.classList.replace('bx-x', 'bx-search');--}}
{{--                searchForm.classList.remove('show');--}}
{{--            }--}}
{{--        });--}}

{{--        const toggler = document.getElementById('theme-toggle');--}}

{{--        toggler.addEventListener('change', function () {--}}
{{--            if (this.checked) {--}}
{{--                document.body.classList.add('dark');--}}
{{--            } else {--}}
{{--                document.body.classList.remove('dark');--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endsection
