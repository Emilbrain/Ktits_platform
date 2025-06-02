@extends('includes.layout')
@section('h2-name', 'Группы')
@section('content')
    <!-- Main Content -->
    <div class="grid grid-cols-4 gap-5">
        @forelse($groups as $group)
            <a href="{{route('teacher.one.group', $group->group->id)}}" class="w-full bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center">
                {{--                        php--}}
                <img src="{{ asset('images/user.png') }}" alt="" class="h-28">
                <h4 class="text-md">{{$group->group->title}} </h4>
            </a>
        @empty
            <h2 class="col-span-4">Нет ни одной группы в списке </h2>
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
