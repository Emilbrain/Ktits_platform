@extends('includes.layout')
@section('h2-name', 'Теория')
@section('content')
    @forelse($theory as $item)
        <a href="{{route('student.glav.theory', $item->id)}}" class="flex items-center w-full justify-between bg-white rounded-md p-5 mb-4">
            <p>{{$item->title}}</p>
        </a>
    @empty
        Список глав пока пуст
    @endforelse
@endsection
