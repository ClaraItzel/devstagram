<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @stack('styles')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Dev'stragram-@yield('titulo') </title>
  @livewireStyles

</head>
<body class="bg-gray-100">
<header class="border-b bg-white shadow py-6 px-3">
  <div class="container mx-auto px-6 flex md:justify-between md:flex-row flex-col items-center">
    <a href="/" >
        <div class="flex items-center gap-2">
      <img src="{{ '/img/camara-fotografica.png' }}" class="h-7" alt="">
      <h1 class="text-3xl font-extrabold">Dev'stagram</h1>
    </div>
    </a>



    <nav class=" flex gap-4 text-sm items-center md:mt-0 mt-3">
      @auth

      <a href="{{ route('post.create') }}" class=" flex items-center gap-2 bg-white border rounded-md shadow-sm p-2 text-gray-600 uppercase font-bold cursor-pointer">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        Crear
      </a>
      <a class="font-bold text-center  text-gray-500 text-base" href="{{ route('post.index',auth()->user()->username) }}">Hola <span class=" text-indigo-400"> {{ auth()->user()->username }} </span></a>
      <form action="{{route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="font-bold uppercase text-gray-500 text-sm" href="/logout">Cerrar Sesión</button>
      </form>
      
      @endauth
      @guest
      <a class="font-bold uppercase text-gray-500 text-sm" href="{{ route('login') }}">Login</a>
      <a class="font-bold uppercase text-gray-500 text-sm" href="{{ route('register') }}">Crear cuenta</a>
      @endguest
     
    </nav>
  </div>
    
</header>
<main class="container mx-auto mt-10 px-10">
  <h2 class="font-black text-center text-3xl md:text-4xl text-indigo-700 mb-10">@yield('titulo')</h2>
  @yield('contenido')
</main>
<footer class="text-center mt-10 bg-white p-5 text-gray-500 font-bold uppercase">
  Devs'tagram - todos los derechos reservados {{ now()->year }}
</footer>
@livewireScripts

@stack('script')

</body>
</html>