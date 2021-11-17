<?php

namespace App\Http\Controllers;

use Sigma\Noticias\Tema;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TemasController extends Controller
{
    public function store()
    {
        request()->request->add(['slug' => Str::slug(request()->nombre)]);
        request()->validate([
            'nombre'=> 'required',
            'slug' => 'required|min:5|unique:temas'
        ]);
        return Tema::create(request()->all());
    }
}
