@extends('plantilla::layout')
@section('header_title')
{{ config('app.name') }} Búsqueda en actualidad
@endsection
@section('main-content')
<article id="actualidadSearch" class="actualidadSearch">
    <div class="bg-primary">
        <div class="container">
            <h1 class="py-5  text-white mt-1">
                Resultados de búsqueda de Eventos
            </h1>
        </div>
    </div>
    <div class="container py-5 py-lg-3">
        <nav aria-label="Usted esta en los resultados de búsqueda de eventos">
            <ol class="breadcrumb bg-unset p-0">
                <li class="breadcrumb-item"><a href="/" class="p-2">Página Principal</a></li>
                <li class="breadcrumb-item"><a href="/eventos" class="p-2">Eventos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Resultados de la búsqueda</li>
            </ol>
        </nav>
    </div>
</article>
<article id="actualidadSearchContenido" class="actualidadSearch">
    <div class="container py-5 py-lg-3">
        <ul>
            @foreach($busqueda as $evento)
            <li>
                <a href="/eventos/{{$evento->slug}}" class="nav-link p-0" aria-label="Ir al evento {{$evento->titulo}}">
                    <div class="row mb-3 border py-5">
                        <div class="col-6 col-md-4 col-lg-3">
                            <figure class="figure mb-0">
                                <img src="/images/paginas-grande/{{$evento->imagen_principal != 'no-imagen.jpg' ? $evento->imagen_principal : 'familia.jpg' }}"
                                    class="figure-img img-fluid w-100 rounded mb-0"
                                    alt="Foto del evento {{$evento->titulo}}">
                            </figure>
                        </div>
                        <div class="col-6 col-md-8 col-lg-9 py-3">
                            <p class="col-md-6 p-0">{{$evento->pais}}</p>
                            <h2>{{$evento->titulo}}</h6>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

</article>
@endsection
