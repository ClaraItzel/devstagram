@extends('layouts.app')

@section('titulo')
{{ $post->titulo }}
@endsection
@section('contenido')
    <div class="container md:px-10 mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{asset('uploads'.'/'.$post->imagen)}}" alt="imagen de {{$post->titulo}}">
            <div class="py-3 flex justify-between">
                <div>
                    <p class="font-bold">{{$post->user->username}}</p>
                    <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}} </p>
                </div>
                <div class="p-3 flex items-center gap-2">
                    @auth()
                    
                        <livewire:like-post :post="$post" />
                       
                    @endauth
                   
                 
                </div>
                
                
                
            </div>
            <div>
                
                
                <p class="mt-5">
                    {{$post->descripcion}}
                </p>
            </div>
            @auth
            @if ($post->user_id === auth()->user()->id)
            <form method="POST" action=" {{route('post.destroy',$post)}} ">
                @csrf
                @method('DELETE')
                <input type="submit"
                value="Eliminar"
                class="bg-red-600 hover:bg-red-800 py-2  px-5 rounded-md text-white font-bold mt-4 cursor-pointer">
            </form>  
            @endif
              
            @endauth
           
        </div>
        <div class="md:w-1/2 md:px-4 pt-5 md:pt-0">
            <div class="shadow bg-white p-5 mb-5">
            @auth
            <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
            
            @if (session('msj'))
            
                <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                    {{ session('msj') }}
                </div>
            @endif
            <form action="{{ route('comentario.store',['post'=>$post,'user'=> $user])}}" method="POST" class="mb-10">
                @csrf
                <div class="mb-5">
                    <label for="comentario" class="mb-3 uppercase text-gray-600 font-bold">
                        Añade un comentario
                    </label>
                    <textarea
                            id="comentario"
                            name="comentario"
                            placeholder="Escribe algo..."
                            class="border mt-3 p-3 w-full rounded-lg @error('comentario') border-red-700 @enderror"
                     
                    ></textarea>  
                    @error('comentario')
                        <p class="font-bold bg-red-700 text-white my-2 p-2 text-center rounded-lg text-sm">{{$message}} </p>
                    @enderror
                </div>
                <input type="submit"
                value="Comentar"
                class="bg-pink-600 hover:bg-pink-900 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl">
            </form>
            @endauth
            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario)
                        <div class="p-5 bg-gray-200 rounded-md border border-gray-400 my-2">
                            <a href="{{route('post.index',$comentario->user) }}" class="font-bold">
                                {{ $comentario->user->username }}
                            </a>
                            <p>{{ $comentario->comentario }}</p>
                            <p class="text-sm text-gray-500 font-bold">{{$comentario->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="p-10 text-center"> No hay comentarios aún </p>
                @endif
               
            </div>
                
            </div>
        </div>
    </div>
@endsection