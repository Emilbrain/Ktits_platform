@extends('includes.layout')

@section('content')
    <!-- Прелоадер -->
    <img src="{{ asset('images/xloading.gif') }}" alt=""
         class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 mt-[-300px]">

    <!-- Центровка формы -->
    <div class="fixed inset-0 flex items-center justify-center px-4">
        <div id="loginForm"
             class="bg-white p-6 sm:p-8 rounded-lg shadow-lg w-full max-w-md">

            <!-- Логотипы -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-8">
                <img src="{{ asset('images/ckLogo.png') }}" class="w-28 sm:w-36" alt="">
                <img src="{{ asset('images/ktitsLogo.png') }}" class="w-28 sm:w-36" alt="">
            </div>

            <h2 class="text-2xl font-bold mb-6 text-center mt-4">Авторизация</h2>

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <!-- Логин -->
                <div class="mb-4">
                    <label for="login" class="block text-gray-700 font-medium mb-2">Логин</label>
                    <input type="text" id="login" name="login" value="{{ old('login') }}"
                           class="block w-full border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                    @error('login')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Пароль -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Пароль</label>
                    <input type="password" id="password" name="password"
                           class="block w-full border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Кнопка -->
                <button type="submit"
                        class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    Войти
                </button>
            </form>

            <!-- Регистрация (если понадобится) -->
            {{-- <div class="mt-4 text-center">
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Нет аккаунта? Зарегистрироваться</a>
            </div> --}}
        </div>
    </div>
@endsection
