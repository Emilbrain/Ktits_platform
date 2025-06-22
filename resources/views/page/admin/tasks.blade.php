@extends('includes.layout')
@section('h2-name', 'Курсы')
@section('content')
    <div class="space-y-4">
        @foreach($tasks as $task)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                {{-- Комментарии --}}
                @if($task->comments->isNotEmpty())
                    <div class="bg-gray-50 border-b border-amber-200 p-4">
                        <h4 class="text-blue-500 font-semibold mb-2">Комментарии:</h4>
                        <div class="space-y-2">
                            @foreach($task->comments as $comment)
                                <div class="flex justify-between text-sm text-gray-700">
                                    <span>{{ $comment->text }}</span>
                                    <time class="text-gray-500">{{ $comment->created_at->format('d.m.Y H:i') }}</time>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Основная часть карточки --}}
                <div class="p-4 flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                    {{-- Левый блок: пользователь и модуль --}}
                    <div class="flex-1 space-y-2">
                        <p class="font-bold text-gray-800">
                            {{ $task->user->username }} {{ $task->user->surname }}
                            <span class="text-sm font-medium text-gray-600">({{ $task->user->group->title }})</span>
                        </p>
                        <p class="text-gray-600">
                            Курс: <span class="font-semibold text-gray-800">{{ $task->module->course->title }}</span>
                        </p>
                        <p class="text-gray-600">
                            Модуль: <span class="font-semibold text-gray-800">{{ $task->module->title }}</span>
                        </p>
                        <p class="text-gray-600">
                            Ссылка:
                            @if($task->user->subdomains->isNotEmpty())
                                <a
                                    href="{{ $task->user->subdomains->first()->title }}/{{ ltrim($task->module->comment, '/') }}"
                                    class="font-semibold text-blue-600 hover:underline"
                                >
                                    {{ $task->module->comment }}
                                </a>
                            @else
                                <span class="font-semibold">поддомен не найден</span>
                            @endif
                        </p>
                    </div>

                    {{-- Правый блок: форма --}}
                    <form
                        action="{{ route('admin.task.update', $task->id) }}"
                        method="post"
                        class="flex flex-col sm:flex-row sm:items-center gap-2 w-full sm:w-auto"
                    >
                        @csrf
                        @method('PUT')
                        <input
                            type="text"
                            name="comment"
                            placeholder="Добавить комментарий"
                            class="border rounded-lg px-3 py-2 flex-1 focus:ring-0 focus:border-gray-300"
                        >
                        <select
                            name="status"
                            class="border rounded-lg px-3 py-2 focus:ring-0 focus:border-gray-300"
                        >
                            <option value="pending"   {{ $task->status=='pending'   ? 'selected' : '' }}>Ожидается</option>
                            <option value="completed" {{ $task->status=='completed' ? 'selected' : '' }}>Выполнено</option>
                            <option value="failed"    {{ $task->status=='failed'    ? 'selected' : '' }}>Ошибка</option>
                        </select>
                        <button
                            type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
                        >
                            Изменить
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

        {{-- Пагинация --}}
        <div class="mt-6">
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
