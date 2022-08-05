@extends('layouts.app')

@section('titulo')
Inicia sesión en Dev'stagram
@endsection
@section('contenido')
<div class="md:flex md:justify-center md:items-center md:gap-4">
    <div class="md:w-6/12">
    <img src="{{ asset('img/login.jpg') }}" alt="imagen de registro" class="md:gap-4 ">
    </div>

    <div class="md:w-5/12 bg-white rounded-lg p-6 shadow-xl">
    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf
        @if (session('mensaje'))
        <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{session('mensaje')}} </p>
        @endif
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
                <input type="checkbox" name="remember" id="remember"> 
                <label for="remember" class="text-sm text-gray-600 ">
                    Mantener sesión abierta
                </label>
                
            </div>
        <input type="submit"
                value="Inicia sesión"
                class="bg-pink-600 hover:bg-pink-900 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl">
    </form>
   
    </div>

</div>
@endsection
