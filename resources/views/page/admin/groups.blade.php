@extends('includes.layout')
@section('h2-name', 'Группы')
@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
        @foreach($groups as $group)
            <div class="relative bg-white rounded-xl p-3 flex flex-col items-center gap-3 h-full">
                <form action="{{ route('admin.group.update', $group->id) }}" method="post" class="w-full flex flex-col gap-3">
                    @csrf
                    @method('PUT')

                    <div class="flex justify-between items-center w-full">
                        <input
                            type="text"
                            name="title"
                            placeholder="Название"
                            value="{{ $group->title }}"
                            class="rounded-lg w-3/5 bg-gray-100 text-black border-none focus:ring-0"
                        />

                        <div class="flex gap-3">
                            <button type="submit" class="hover:text-blue-600">
                                <i class='bx bx-pencil'></i>
                            </button>
                            <button
                                type="button"
                                data-modal-target="popup-modal-{{ $group->id }}"
                                data-modal-toggle="popup-modal-{{ $group->id }}"
                                class="hover:text-red-600"
                            >
                                <i class='bx bx-trash-alt'></i>
                            </button>
                        </div>
                    </div>

                    <input
                        type="text"
                        name="link"
                        placeholder="Ссылка"
                        value="{{ $group->link }}"
                        class="rounded-lg w-full bg-gray-100 text-black border-none focus:ring-0"
                    />
                </form>

                <!-- Модальное окно удаления -->
                <div
                    id="popup-modal-{{ $group->id }}"
                    tabindex="-1"
                    class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
                >
                    <div class="relative w-full max-w-md">
                        <div class="bg-white rounded-lg shadow-lg">
                            <button
                                type="button"
                                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
                                data-modal-hide="popup-modal-{{ $group->id }}"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>

                            <div class="p-6 text-center">
                                <svg class="mx-auto mb-4 w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500">
                                    Вы уверены, что хотите удалить группу «{{ $group->title }}»?
                                </h3>
                                <div class="flex justify-center gap-4">
                                    <form action="{{ route('admin.group.delete', $group->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $group->id }}">
                                        <button
                                            type="submit"
                                            class="px-5 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300"
                                        >
                                            Да, удалить
                                        </button>
                                    </form>
                                    <button
                                        type="button"
                                        data-modal-hide="popup-modal-{{ $group->id }}"
                                        class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-400"
                                    >
                                        Отмена
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Модальное окно -->
            </div>
        @endforeach
    </div>
@endsection
