@extends('plantilla::layout')
@section('header_title')
{{ config('app.name') }} Resultado de la búsqueda de eventos
@endsection
@section('main-content')
<article class="eventosSearch">
    <div class="bg-primary">
        <div class="container">
            <h1 class="py-5  text-white mt-1">
                Resultado de busqueda de eventos
            </h1>
        </div>
    </div>
</article>
<article class="eventosSearch">
    <div class="container py-5 px-lg-3">
        <div class="row row-cols-1 row-cols-md-2">
            @foreach($busqueda as $b)
            <div class="col mb-4">
                <a href="/eventos/show" class="nav-link p-0">
                    <div class="card">
                        <figure class="figure m-0">
                            <img src="/images/paginas-grande/{{$b->imagen_principal != 'no-imagen.jpg' ? $b->imagen_principal : 'familia.jpg' }}"
                                class="card-img-top" alt="...">
                        </figure>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>
                            </div>
                            <h2 class="mt-3 text-decoration-underline">
                                {{$b->titulo}}
                            </h2>
                            <div class="p-3 d-flex justify-content-between align-items-center">
                                <p class="my-auto">
                                    {{$b->tipo->nombre}} - {{$evento->nivel?? 'Nivel'}} - {{$evento->sector?? 'Sector'}}
                                </p>
                                <button href="" class="btn btn-purple px-4">Inscribirse</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</article>
@endsection
