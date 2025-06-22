@extends('includes.layout')
@section('h2-name', 'Запросы')
@section('content')
    @foreach($requests as $request)
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center bg-white shadow-md rounded-lg p-4 mb-4 gap-4">
            <!-- Информация о заявке -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 w-full">
                <div class="flex items-center">
                <span class="font-bold text-gray-900">
                    {{ $request->user->username }} {{ $request->user->surname }}
                </span>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-700">Группа: {{ $request->group }}</span>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-600">Курс: {{ $request->course->title }}</span>
                </div>
            </div>

            <!-- Форма изменения статуса -->
            <div class="w-full md:w-auto">
                <form action="{{ route('admin.request.update', $request->id) }}" method="post" class="flex flex-col sm:flex-row gap-2 w-full">
                    @csrf
                    @method('PUT')

                    <select name="status" id="status"
                            class="px-4 py-2 border rounded-lg w-full sm:w-auto">
                        <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Ожидаемый</option>
                        <option value="accepted" {{ $request->status == 'accepted' ? 'selected' : '' }}>Принято</option>
                        <option value="rejected" {{ $request->status == 'rejected' ? 'selected' : '' }}>Отклоненный</option>
                    </select>

                    <input type="submit"
                           value="Изменить"
                           class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer" />
                </form>
            </div>
        </div>
    @endforeach

    <!-- Пагинация -->
    <div class="mt-4">
        {{ $requests->links() }}
    </div>
@endsection
