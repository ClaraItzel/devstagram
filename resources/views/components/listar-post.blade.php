<div>

  <section class=" container mx-auto mt-10">
   
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

    @if ($posts->count())
          @foreach ($posts as $post)
            <div>
            <a href="{{ route('post.show',['post'=>$post,'user'=> $post->user]) }}">
                <img src="{{ asset('uploads').'/'.$post->imagen }}" alt="imagen de {{ $post->titulo }}">
            </a>    
            </div>
        @endforeach  
    </div>
</div>
    <div class="mt-5">
        {{ $posts->links('pagination::tailwind') }}
    </div>
  
    @else
</div>
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones para mostrar</p>
    @endif

    
</section>
</div>