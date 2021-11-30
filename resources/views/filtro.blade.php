@extends('plantilla::layout')
@section('header_title')
{{ config('app.name') }} Búsqueda en actualidad
@endsection
@section('main-content')
<article id="actualidadSearch" class="actualidadSearch">
    <div class="bg-primary">
        <div class="container">
            <h1 class="py-5  text-white mt-1">
                Resultados para {{$tema->nombre ?? ""}}
            </h1>
        </div>
    </div>
    <div class="container py-5 py-lg-3">
        <nav aria-label="Usted esta en los resultados de {{$tema->nombre}}">
            <ol class="breadcrumb bg-unset p-0">
                <li class="breadcrumb-item"><a href="/" class="p-2">Página Principal</a></li>
                <li class="breadcrumb-item"><a href="/{{$tema->slug}}" class="p-2">{{$tema->nombre}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Resultado para {{$tema->nombre}}</li>
            </ol>
        </nav>
    </div>
</article>
<article id="actualidadSearchContenido" class="actualidadSearch">
    <div class="container py-5 py-lg-3">
        <ul>
            @foreach($busqueda as $noticia)
            <li>
                <a href="/{{$noticia->tema->slug}}/{{$noticia->slug}}" class="nav-link p-0">
                    <div class="row mb-3 border py-5">
                        <div class="col-6 col-md-4 col-lg-3">
                            <figure class="figure mb-0">
                                <img src="/images/paginas-grande/{{$noticia->imagen_principal != 'no-imagen.jpg' ? $noticia->imagen_principal : 'familia.jpg' }}"
                                    class="figure-img img-fluid w-100 rounded mb-0" alt="...">
                            </figure>
                        </div>
                        <div class="col-6 col-md-8 col-lg-9 py-3">
                            <p class="col-md-6 p-0">{{$noticia->pais}}</p>
                            <h2>{{$noticia->titulo}}</h6>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

</article>
@endsection
