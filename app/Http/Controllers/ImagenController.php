<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
       $img= $request->file('file');
       $nombreImagen= Str::uuid().".".$img->extension();

       $imgServidor= Image::make($img);
       $imgServidor->fit(1000,1000);

       $imagenPath= public_path('uploads').'/'.$nombreImagen;
       $imgServidor->save($imagenPath);
       return response()->json(['img'=>$nombreImagen]);
    }
}
