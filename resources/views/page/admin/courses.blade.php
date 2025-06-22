@extends('includes.layout')
@section('h2-name', 'Курсы')
@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @foreach($courses as $course)
            <a href="{{ route('admin.show.course', $course->id) }}"
               class="bg-white rounded-xl p-4 flex flex-col items-center gap-3 justify-center shadow hover:shadow-md transition h-full">
                <img src="{{ asset('storage/' . $course->logo) }}"
                     alt="{{ $course->title }}"
                     class="object-contain max-h-36 w-full">
                <h4 class="text-md text-center font-medium text-gray-800">{{ $course->title }}</h4>
            </a>
        @endforeach
    </div>
@endsection
