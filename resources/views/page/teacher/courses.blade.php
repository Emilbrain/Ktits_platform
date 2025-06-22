@extends('includes.layout')
@section('h2-name', 'Курсы')
@section('content')
        <h2 class="text-2xl font-bold mb-4">Мои курсы</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($courses as $course)
                <a
                    href="{{ route('teacher.show.course', $course->course->id) }}"
                    class="bg-white shadow rounded-xl p-4 flex flex-col items-center justify-center gap-4 hover:shadow-lg transition h-full"
                >
                    <img
                        src="{{ asset('storage/' . $course->course->logo) }}"
                        alt="{{ $course->course->title }} logo"
                        class="object-contain h-32 w-full mb-2"
                    >
                    <h4 class="text-md font-semibold text-gray-800 text-center">
                        {{ $course->course->title }}
                    </h4>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-600">
                    Вы не ведёте ни одного курса
                </p>
            @endforelse
        </div>
@endsection
