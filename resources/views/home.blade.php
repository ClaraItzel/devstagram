@extends('layouts.app')
@section('titulo')
<h2 class="text-3xl md:text-4xl text-center text-pink-600 font-black my-10"> Publicaciones </h2>
@endsection
@section('contenido')
  
<x-listar-post :posts="$posts"/>
@endsection