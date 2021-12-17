<?php
  $contenidos = [
    [
      'texto' => "Practicas inclusivas del riesgo de desastre",
      'link' => "/experiencias/practicas_inclusivas"
    ],
    [
      'texto' => "Historias de vida",
      'link' => "/experiencias/historia_vida"],
    [
      'texto' => "Diagnosticos comunitarios inclusivos por países",
      'link' => ""
    ],
    [
      'texto' => "Evidencias covid x3",
      'link' => ""
    ],
  ]
?>

@extends('plantilla::layout')
@section('main-content')
<article id="exp" class="expIndex">
    <div class="container py-5 p-lg-3 mt-lg-5">
        <div class="mb-4">
            <h1 class="text-primary">
                Experiencias
            </h1>
            <nav aria-label="Usted esta en experiencias">
                <ol class="breadcrumb bg-unset">
                    <li class="breadcrumb-item"><a href="/" class="p-2">Página Principal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Experiencias</li>
                </ol>
            </nav>
        </div>
    </div>
</article>
<article id="expContenido" class="expIndex">
    <div class="container py-5 p-lg-3">
        <div class="row row-cols-1 row-cols-sm-2 g-4">
            @foreach($contenidos as $c)
            <div class="col mb-4">
                <a href="{{$c['link']}}" class="nav-link p-0 d-inline">
                    <div class="card h-100 h-100">
                        <figure class="figure m-0 h-60">
                            <img src="/images/familia.jpg" class="card-img-top h-100" alt="...">
                        </figure>
                        <div class="card-body">
                            <h2>
                                {{$c['texto']}}
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</article>
@endsection
