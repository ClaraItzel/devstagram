@extends('layouts.app')
@section('titulo')
    {{$user->name}}
@endsection
@section('contenido')

<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-4/12 flex flex-col items-center md:flex-row">
        <div class="w-full sm:w-8/12 lg:w-6/12  flex justify-center">
            <img class="rounded-full shadow-2xl max-h-60" src="{{ $user->imagen ? asset('perfiles').'/'.$user->imagen : asset('img/user_icon.png') }}" alt="imagen del usuario">
        </div>
        <div class="w-full md:w-12/12 lg:w-6/12 flex flex-col px-5 justify-center items-center py-10">
            <div class="w-full justify-center md:justify-start flex items-center gap-2 mb-3">
               <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                @auth
                    @if ($user->id=== auth()->user()->id)
                        <a class="text-gray-500 hover:text-gray-700" 
                        href="{{ route('perfil.index') }}">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </a>
                    @endif
                @endauth 
            </div>
            
            <p class="w-full text-center md:text-left text-gray-800 text-sm mb-3 font-bold">
               {{$user->followers->count()}} <span class="font-normal"> @choice('seguidor|seguidores',$user->followers->count()) </span>
            </p>
            <p class="w-full text-center md:text-left text-gray-800 text-sm mb-3 font-bold">
               {{$user->followings->count()}} <span class="font-normal"> siguiendo </span>
            </p>

            <p class="w-full text-center md:text-left text-gray-800 text-sm mb-3 font-bold">
                {{ $user->posts->count() }} <span class="font-normal">publicaciones</span>
            </p>
            @auth
                @if($user->id !== auth()->user()->id)
                        @if (!$user->siguiendo(auth()->user()))
                            <form action="{{route('users.follow',$user) }}" method="POST" class="w-full" >
                            @csrf
                            <input type="submit" value="follow" class="cursor-pointer w-full mt-5 text-gray-500 hover:text-indigo-700 font-bold border uppercase border-gray-600 hover:border-indigo-700 rounded-md px-3 py-2" />
                            </form>
                        @else
                        <form action="{{route('users.unfollow',$user)}}" method="POST" class="w-full" >
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="unfollow" class="cursor-pointer w-full mt-5 text-red-500 hover:text-red-700 font-bold border uppercase border-red-500 hover:border-red-700 rounded-md px-3 py-2" />
                            </form>  
                        @endif
        
                @endif
                 
            @endauth
           
        </div>
    </div>
</div>

<x-listar-post :posts="$posts"/>
@endsection