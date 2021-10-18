@extends('plantilla::layout')
@section('header_title')
{{ config('app.name') }} Resultados de búsqueda de experiencias
@endsection
@section('main-content')
<article id="actualidadSearch" class="actualidadSearch">
    <div class="bg-primary">
        <div class="container">
            <h1 class="py-5  text-white mt-1">
                Resultado de busqueda
            </h1>
        </div>
    </div>
    <div class="container py-5 py-lg-3">
        <nav aria-label="Usted esta en los resultados de búsqueda en experiencias">
            <ol class="breadcrumb bg-unset p-0">
                <li class="breadcrumb-item"><a href="/" class="p-2">Página Principal</a></li>
                <li class="breadcrumb-item"><a href="/experiencias" class="p-2">Experiencias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Resultado de búsqueda de experiencias</li>
            </ol>
        </nav>
    </div>
</article>
<article id="actualidadSearchContenido" class="actualidadSearch">
    <div class="container py-5 py-lg-3">
        <ul>
            @foreach($busqueda as $b)
            <li>
                <a href="" class="nav-link p-0">
                    <div class="row mb-3 border py-5">
                        <div class="col-6 col-md-4 col-lg-3">
                            <figure class="figure mb-0">
                                <img src="/images/paginas-grande/{{$b->imagen_principal != 'no-imagen.jpg' ? $b->imagen_principal : 'familia.jpg' }}"
                                    class="figure-img img-fluid w-100 rounded mb-0" alt="...">
                            </figure>
                        </div>
                        <div class="col-6 col-md-8 col-lg-9 py-3">
                            <p class="col-md-6 p-0">{{$b->pais?? 'Pais'}}</p>
                            <h2>{{$b->titulo}}</h6>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

</article>
@endsection
