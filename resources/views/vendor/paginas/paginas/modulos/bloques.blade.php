@if(request()->pais)
@php
$campos['modulos'] = array_filter($campos['modulos'], function($modulo){
return stristr($modulo['pais'],request()->pais);
});
@endphp
@endif
@if ($campos['columnas'] == 1)
@if($campos['estilo'] == 2)
<article class="noticias-3">
    <div class="container py-5 expRes">
        <h2>
            {{$campos['titulo']??'Documentos'}}
        </h2>
        @foreach($campos['modulos'] as $modulo)
        <div class="row mb-3 border py-5">
            <div class="col-12 col-md-4 col-lg-3">
                <figure class="figure mb-0">
                    <img src="/images/bloques/{{ isset($modulo['imagen']) ? $modulo['imagen'] : 'familia.jpg' }}"
                        class="figure-img img-fluid w-100 rounded mb-0" alt="{{ $modulo['alt_imagen'] ?? '' }}">
                </figure>
            </div>
            <div class="col-12 col-md-8 col-lg-9 py-3">
                <p class="col-md-6 p-0">
                    {{ $modulo['pais'] ?? ''}}
                </p>
                <h3 class="mt-4">
                    {{$modulo['texto']}}
                </h3>
                <p class="mt-3">
                    <a href="{{isset($modulo['link']) ? $modulo['link'] : '#'}}" class="text-white p-2"
                        aria-label="{{$modulo['link_description'] ?? ''}}" target="_blank">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Descargar el documento
                    </a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
</article>
@endif
@else
@if(isset($campos['estilo']))
@if($campos['estilo'] == 1)
<article class="bloques-estilo-1">
    <div class="bg-light">
        <div class="container py-5 {{$campos['color'] == 'Negro' ? 'bloque-texto-dark' : ''}}">
            <h2>
                {{$campos['titulo']}}
            </h2>

            <div
                class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-{{$campos['columnas']}} mt-4 text-center">
                @foreach($campos['modulos'] as $modulo)
                <div class="col mb-4">
                    <div class="card bg-light border-0">
                        <a href="{{isset($modulo['link']) ? $modulo['link'] : '#'}}" class="nav-link p-0"
                            aria-label="{{$modulo['link_description'] ?? ''}}">
                            <figure class="figure m-0">
                                <img src="/images/paginas-grande/{{ isset($modulo['imagen']) ? $modulo['imagen'] : 'familia.jpg' }}"
                                    class="card-img-top rounded-10" alt="{{ $modulo['alt_imagen'] ?? '' }}">
                            </figure>
                            <div class="card-body mt-2">
                                <h3>
                                    {{$modulo['texto']}}
                                </h3>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</article>
@endif
@if($campos['estilo'] == 2)
<article class="bloques-estilo-2">
    <div class="docRec">
        <div class="container mt-3 py-4">
            <h2>
                {{isset($campos['titulo']) ? $campos['titulo'] : 'Titulo Vacio'}}
            </h2>
            <div class="row justify-content-between my-2 my-md-5">
                @foreach($campos['modulos'] as $key => $modulo)
                <div class="col-lg-6 row mb-3  {{$key % 2 == 0 ? 'border-dr' : ''}}">
                    <div class="col-12 col-md-6">
                        <a href="{{isset($modulo['link']) ? $modulo['link'] : '#'}}"
                            aria-label="{{$modulo['link_description'] ??    ''}}" target="_blank">
                            <figure class="figure mb-0">
                                <img class="img-fluid mb-0"
                                    src="/images/bloques/{{ isset($modulo['imagen']) ? $modulo['imagen'] : 'familia.jpg' }}"
                                    alt="{{ $modulo['alt_imagen'] ?? '' }}">
                            </figure>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <h3>
                            {{isset($modulo['texto']) ? $modulo['texto'] : 'Titulo Vacio'}}
                        </h3>
                        <p class="mt-3">
                            <a href=" {{isset($modulo['link']) ? $modulo['link'] : '#'}}" class="text-white p-2"
                                aria-label="{{$modulo['link_description'] ?? ''}}" target="_blank">
                                <i class="fas fa-arrow-right mr-2"></i>
                                Descargar el documento
                            </a>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</article>
@endif
@if($campos['estilo'] == 3)
<article class="bloques-estilo-3">
    <div class="container py-5 px-lg-3">
        <div class="row row-cols-2 row-cols-md-2  row-cols-lg-{{$campos['columnas']}}">
            @foreach($campos['modulos'] as $modulo)
            <div class="col mb-4">
                <div class="card">
                    <a href="" class="nav-link p-0">
                        <figure class="figure m-0">
                            <img src="/images/bloques/{{ isset($campos['imagen']) ? $campos['imagen'] : 'familia.jpg' }}"
                                class="card-img-top rounded-10" alt="{{ $modulo['alt_imagen'] ?? '' }}">
                        </figure>
                        <div class="card-body">
                            <p class="card-text my-1">
                                {{isset($modulo['texto']) ? $modulo['texto'] : 'Pais'}}
                            </p>
                            <h2>
                                {{isset($modulo['titulo']) ? $modulo['titulo'] : 'Titulo vacio'}}
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</article>
@endif
@else
<div class="alert alert-danger">
    SIN ESTILO SELECCIONADO
</div>
@endif
@endif
