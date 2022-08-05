<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }
    public function index(){
       return view('perfil.index');
    }
    public function store(Request $request){
    
        $request->request->add(['username'=>Str::slug( $request->username)]);
    $this->validate($request,[
        'username'=>['required','unique:users,username,'.auth()->user()->id,'min:3','max:30','not_in:twitter,elonmusk,editar-perfil']
    ]);
    if($request->img){
        $img= $request->file('img');
       $nombreImagen= Str::uuid().".".$img->extension();

       $imgServidor= Image::make($img);
       $imgServidor->fit(1000,1000);

       $imagenPath= public_path('perfiles').'/'.$nombreImagen;
       $imgServidor->save($imagenPath);
    }

    //Guardando cambios
    $usuario= User::find(auth()->user()->id);
    $usuario->username= $request->username;
    $usuario->imagen= $nombreImagen ?? auth()->user()->imagen ?? null;

    $usuario->save();

    //Redireccionando

    return redirect()->route('post.index', $usuario->username);

    }
    
}
