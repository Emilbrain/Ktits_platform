@extends('includes.layout')
@section('h2-name', 'Группа '.  $group->title )
@section('content')
    <div class="  mt-1 p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Группа: {{ $group->title }}</h2>
        @if($group->link)
            <a href="{{$group->link}}"
               class="inline-block bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition duration-300">
                Перейти к студентам группы
            </a>
        @else
            У группы нет журнала
        @endif

    </div>

    <h3 class="mb-3 text-lg mt-5 ml-2 font-bold">Доступные для проверки</h3>
    <div class="flex flex-col">
        @forelse($tasks as $task)
            @if(count($task->comments)>0)
                <div class="flex flex-col bg-white rounded-t-xl p-4 border-b-2 border-amber-200">
                    <h4 class="text-blue-200">Комментарии:</h4>
                    @foreach($task->comments as $item)
                        <div class="flex w-full justify-between">
                            <p>{{ $item->text }}</p>
                            <p>{{ $item->created_at }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
            <div
                class="flex justify-between items-center bg-white shadow-md @if($task->comments->isNotEmpty()) rounded-b-lg @else rounded-lg @endif p-4 mb-4">


                <div class="flex flex-col">
                    <div class="flex gap-2 flex-col">
                        <span
                            class="font-bold">{{ $task->user->username }} {{ $task->user->surname }} {{$task->user->group->title}}</span>
                        <p class="text-gray-600">Курс: <span
                                class="text-black font-bold">{{ $task->module->course->title }}</span>
                        </p>
                    </div>
                    <div class="flex gap-2 flex-col">
                        <p class="text-gray-600">Модуль: <span
                                class="text-black font-bold">{{ $task->module->title}}</span></p>
                    </div>
                    @if($task->user->subdomains->isNotEmpty())
                        <a class="text-black font-bold"
                           href="{{ $task->user->subdomains->first()->title }}{{ $task->module->comment }}"><span
                                class="text-gray-600">Ссылка: </span> {{ $task->module->comment }}</a>
                    @else
                        <span class="text-gray-600">Ссылка: </span>Поддомен не найден
                    @endif
                </div>
                <div>
                    <form action="{{ route('teacher.task.update', $task->id) }}" method="post"
                          class="flex gap-2 items-center">
                        @csrf
                        @method('PUT')
                        <input type="text" name="comment" id="" placeholder="Добавить комментарий" class="rounded-lg">
                        <select name="status" id="status" class="px-4 py-2 border rounded-lg">
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Ожидаемый
                            </option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Выполнено
                            </option>
                            <option value="failed" {{ $task->status == 'failed' ? 'selected' : '' }}>Ошибка выполнения
                            </option>
                        </select>
                        <input type="submit" value="Изменить"
                               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">
                    </form>
                </div>
            </div>
    </div>

    @empty
        <h2 class="text-lg font-semibold text-gray-700 my-6">
            Нет заданий для проверки
        </h2>
    @endforelse
    <div class="mt-4">
        {{ $tasks->links() }}
    </div>

@endsection
