@extends('includes.layout')
@section('h2-name', $theory->title )
@section('content')

    <div class="bg-white rounded-xl">
        <div class="bg-white rounded-xl">
            <div class="w-full">
                <div class="ql-editor">
                    {!! $theory->theory !!}
                </div>
            </div>
        </div>
    </div>

@endsection
