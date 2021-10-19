@extends('plantilla::layout')
@section('header_title')
{{ config('app.name') }} Buscando {{ request()->busqueda }}
@endsection
@section('main-content')
<article id="busqueda" class="actualidadSearch">
    <div class="bg-primary">
        <div class="container">
            <h1 class="py-5  text-white mt-1">
                Resultado de su búsqueda por "{{ request()->busqueda }}"
            </h1>
        </div>
    </div>
    <div class="container py-5 py-lg-3">
        <nav aria-label="Usted esta en los resultados de búsqueda en experiencias">
            <ol class="breadcrumb bg-unset p-0">
                <li class="breadcrumb-item"><a href="/" class="p-2">Página Principal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Resultado de búsqueda de "{{ request()->busqueda
                    }}"</li>
            </ol>
        </nav>
    </div>
</article>
<article id="busquedaContenido" class="actualidadSearch">
    <div class="container py-5 py-lg-3">
        <h3>Novedades</h3>
        <ul>
            @forelse($noticias as $noticia)
            <li>
                <a href="" class="nav-link p-0">
                    <div class="row mb-3 border py-5">
                        <div class="col-6 col-md-4 col-lg-3">
                            <figure class="figure mb-0">
                                <img src="/images/paginas-grande/{{$noticia->imagen_principal != 'no-imagen.jpg' ? $noticia->imagen_principal : 'familia.jpg' }}"
                                    class="figure-img img-fluid w-100 rounded mb-0" alt="...">
                            </figure>
                        </div>
                        <div class="col-6 col-md-8 col-lg-9 py-3">
                            <p class="col-md-6 p-0 border">{{$noticia->pais?? 'Pais'}}</p>
                            <h4>{{$noticia->titulo}}</h4>
                            {!! truncateHtml($noticia->contenido) !!}
                        </div>
                    </div>
                </a>
            </li>
            @empty
            <div class="alert alert-warning w-100 text-center" role="alert">
                <i class="fas fa-alert"></i> No hay novedades que concuerden con "{{ request()->busqueda
                }}"
            </div>
            @endforelse
        </ul>
    </div>
    <div class="container py-5 py-lg-3">
        <h3>Eventos</h3>
        <ul>
            @forelse($eventos as $evento)
            <li>
                <a href="" class="nav-link p-0">
                    <div class="row mb-3 border py-5">
                        <div class="col-6 col-md-4 col-lg-3">
                            <figure class="figure mb-0">
                                <img src="/images/paginas-grande/{{$evento->imagen_principal != 'no-imagen.jpg' ? $evento->imagen_principal : 'familia.jpg' }}"
                                    class="figure-img img-fluid w-100 rounded mb-0" alt="...">
                            </figure>
                        </div>
                        <div class="col-6 col-md-8 col-lg-9 py-3">
                            <h4>{{$evento->titulo}}</h4>
                            {!! truncateHtml($evento->contenido) !!}
                        </div>
                    </div>
                </a>
            </li>
            @empty
            <div class="alert alert-warning w-100 text-center" role="alert">
                <i class="fas fa-alert"></i> No hay novedades que concuerden con "{{ request()->busqueda }}"
            </div>
            @endforelse
        </ul>
    </div>
    <div class="container py-5 py-lg-3">
        <h3>Contenido</h3>
        <ul>
            @forelse($paginas as $pagina)
            <li>
                <a href="" class="nav-link p-0">
                    <div class="col-6 col-md-8 col-lg-9">
                        <h4>{{$pagina->titulo}}</h4>
                    </div>
                </a>
            </li>
            @empty
            <div class="alert alert-warning w-100 text-center" role="alert">
                <i class="fas fa-alert"></i> No hay contenidos que concuerden con "{{ request()->busqueda
                }}"
            </div>
            @endforelse
        </ul>
    </div>
</article>
@endsection
@push('extra_scripts')
@endpush
