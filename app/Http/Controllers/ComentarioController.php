<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post){
       //validando
        $this->validate($request,[
            'comentario'=>['required','max:255']
        ]);
       //almacenando    
       Comentario::create([
        'user_id'=>auth()->user()->id,
        'post_id'=>$post->id,
        'comentario'=> $request->comentario
       ]);
       //mostrando
       return back()->with('msj','Se añadió tu comentario de manera exitosa');
    }
}
