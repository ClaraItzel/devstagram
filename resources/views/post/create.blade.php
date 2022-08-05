@extends('layouts.app')
@section('titulo')
Crea una nueva publicación
@endsection
@section('contenido')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

<div class="md:flex md:items-center">
    <div class="md:w-1/2 sm:px-0 md:px-10 ">
    <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
        @csrf
    </form>
    </div>
    <div class="md:w-1/2 px-10  bg-white rounded-lg p-6 shadow-xl mt-10 md:mt-0">
        <form action="{{ route('post.store') }}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="Titulo" class="mb-3 uppercase text-gray-600 font-bold">
                    Título
                </label>
                <input type="text"
                        id="titulo"
                        name="titulo"
                        placeholder="Pon un titulo a tu publicación"
                        class="border mt-3 p-3 w-full rounded-lg @error('titulo') border-red-700 @enderror"
                        value="{{ old('titulo') }}"
                />  
                @error('titulo')
                    <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{$message}} </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="mb-3 uppercase text-gray-600 font-bold">
                    Descripcion
                </label>
                <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Describe tu publicacion"
                        class="border mt-3 p-3 w-full rounded-lg @error('descripcion') border-red-700 @enderror"
                 
                >{{ old('descripcion') }}</textarea>  
                @error('descripcion')
                    <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{$message}} </p>
                @enderror
            </div>
            <div class="mb-5">
                <input type="hidden" name="img" value= "{{old('img')}}" />
            </div>
            @error('img')
                <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{$message}} </p>
            @enderror
            <input type="submit"
            value="Publicar"
            class="bg-pink-600 hover:bg-pink-900 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl">
        </form>
    </div>
</div>
@endsection
@push('script')
<script src="{{ asset('js/app.js') }}"></script>
@endpush