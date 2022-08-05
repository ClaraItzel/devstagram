@extends('layouts.app')

@section('titulo')
    Editar Perfil: <span class="font-normal" > {{ auth()->user()->username }} </span>
@endsection
@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
        <form class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data" action="{{ route("perfil.store") }}">
            @csrf
            <div class="mb-5">
                <label for="username" class="mb-3 uppercase text-gray-600 font-bold">
                    Username
                </label>
                <input type="text"
                        id="username"
                        name="username"
                        placeholder="Pon tu nombre de usuario"
                        class="border mt-3 p-3 w-full rounded-lg  @error('username') border-red-700 @enderror" 
                        value="{{ auth()->user()->username }}"
                >
            </div>
            @error('username')
                    <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{$message}} </p>
                @enderror
            <div class="mb-5">
                <label for="username" class="mb-3 uppercase text-gray-600 font-bold">
                    Imagen de perfil
                </label>
                <input type="file"
                        id="img"
                        name="img"
                        accept=".jpg ,.png ,.jpeg"
                        class="border mt-3 p-3 w-full rounded-lg  @error('username') border-red-700 @enderror" 
                >
            </div>
            @error('img')
                    <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{$message}} </p>
                @enderror
                <input type="submit"
                value="Guardar"
                class="bg-pink-600 hover:bg-pink-900 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl">
        </form>
        </div>
    </div>
@endsection