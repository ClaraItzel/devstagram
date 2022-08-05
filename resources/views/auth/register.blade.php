@extends('layouts.app')

@section('titulo')
Registrate en Dev'stagram
@endsection
@section('contenido')
<div class="md:flex md:justify-center md:items-center">
    <div class="md:w-6/12">
    <img src="{{ asset('img/registrar.jpg') }}" alt="imagen de registro" class="md:gap-4 ">
    </div>

    <div class="md:w-5/12 bg-white rounded-lg p-6 shadow-xl">
    <form action="{{ route('register') }}" method="POST" novalidate>
        @csrf
        <div class="mb-5">
            <label for="name" class="mb-3 uppercase text-gray-600 font-bold">
                Nombre
            </label>
            <input type="text"
                    id="name"
                    name="name"
                    placeholder="Pon tu nombre"
                    class="border mt-3 p-3 w-full rounded-lg @error('name') border-red-700 @enderror"
                    value="{{ old('name') }}"
            />  
            @error('name')
                <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{$message}} </p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="username" class="mb-3 uppercase text-gray-600 font-bold">
                Username
            </label>
            <input type="text"
                    id="username"
                    name="username"
                    placeholder="Pon tu nombre de usuario"
                    class="border mt-3 p-3 w-full rounded-lg  @error('username') border-red-700 @enderror" 
                    value="{{ old('username') }}"
            >
        </div>
        @error('username')
                <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{$message}} </p>
            @enderror
        <div class="mb-5">
            <label for="email" class="mb-3 uppercase text-gray-600 font-bold">
                Email
            </label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Ej: correo@correo.com"
                    class="border mt-3 p-3 w-full rounded-lg  @error('email') border-red-700 @enderror"
                    value="{{ old('email') }}"
            >
        </div>
        @error('email')
                <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{$message}} </p>
            @enderror
        <div class="mb-5">
            <label for="password" class="mb-3 uppercase text-gray-600 font-bold">
                Password
            </label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Pon un password seguro"
                    class="border mt-3 p-3 w-full rounded-lg  @error('password') border-red-700 @enderror"
            >
        </div>
        @error('password')
                <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{$message}} </p>
            @enderror
        <div class="mb-5">
            <label for="password_confirmation" class="mb-3 uppercase text-gray-600 font-bold">
               Repetir Password
            </label>
            <input type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Repite tu password"
                    class="border mt-3 p-3 w-full rounded-lg"
            >
        </div>
        <input type="submit"
                value="Crear cuenta"
                class="bg-pink-600 hover:bg-pink-900 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl">
    </form>
    </div>

</div>
@endsection
