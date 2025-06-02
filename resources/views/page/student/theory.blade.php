@extends('includes.layout')
@section('h2-name', 'Теория')
@section('content')
    <div class="flex flex-col">
        @forelse($theories as $theory)
            <div class="mb-6">
                <a
                    href="{{route('student.theory.modules', $theory->id)}}"
                    class="flex items-center justify-between bg-white rounded-md p-5 shadow hover:shadow-md transition"
                >
                    <p class="font-medium text-lg">{{$theory->title}}</p>
                    <img src="{{ asset('storage/' . $theory->logo) }}" alt="PHP" class="w-12 h-12 object-contain">
                </a>
            </div>
        @empty
            <h2>
                Список модулей пуст
            </h2>
        @endforelse


    </div>
@endsection
