<?php
    $contenidos = [
        [
            'texto' => 'Reducción de riesgo de desastre',
            'link' => ''
        ],
        [
            'texto' => 'Discapacidad',
            'link' => '/recursos/discapacidad'
        ],
        [
            'texto' => 'Género',
            'link' => '/recursos/genero'
        ],
        [
            'texto' => 'Edad',
            'link' => ''
        ],
        [
            'texto' => 'Étnico',
            'link' => ''
        ],
        [
            'texto' => 'Enfoque de inclusión',
            'link' => ''
        ],
        [
            'texto' => 'Acción humanitaria inclusiva',
            'link' => ''
        ],
        [
            'texto' => 'Respuesta inclusiva COVID',
            'link' => ''
        ],
    ]
?>

@extends('plantilla::layout')
@section('main-content')
<article id="recursos" class="recursosIndex">
    <div class="container py-5">
        <h1>
            Recursos
        </h1>
        <nav aria-label="Usted esta en recursos">
            <ol class="breadcrumb bg-unset p-0">
                <li class="breadcrumb-item"><a href="/" class="p-2">Página Principal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Recursos</li>
            </ol>
        </nav>
        <p class="mt-2">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.
        </p>
    </div>
</article>
<article id="recursosSecundario" class="recursosIndex">
    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <figure class="figure mb-0">
                    <img class="img-fluid mb-0 rounded-10" src="/images/familia.jpg" alt="">
                </figure>
            </div>
            <div class="col-12 col-sm-6">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto
                    reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis
                    sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?
                </p>
                <p>
                    DESCARGAR PDF:<a class="btn btn-purple px-5" href=""
                        title="Guia para la ayuda humanitaria ante desastres naturales y emergencias"
                        aria-label="descargar guia en pdf abre en una nueva ventana" target="_blank">Guia para la ayuda
                        humanitaria ante desastres naturales y emergencias</a>
                </p>
            </div>
        </div>
    </div>
</article>
<article id="recursosCajaHerramientas" class="recursosIndex">
    <div class="bg-light ">
        <div class="container py-5">
            <h2>
                Caja de herramientas
            </h2>
            <div class="row row-cols-sm-2 row-cols-md-3 mt-4 text-center">
                @foreach(['Herramientas Comunitarias','Herramientas','Herramientas Covid'] as $v)
                <div class="col mb-4">
                    <a href="" class="nav-link p-0">
                        <div class="card bg-light border-0">
                            <figure class="figure m-0">
                                <img src="/images/familia.jpg" class="card-img-top rounded-10" alt="...">
                            </figure>
                            <div class="card-body mt-2">
                                <h5>
                                    {{$v}}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</article>
<article id="recursosGlosario" class="recursosIndex">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <h2>
                    Glosario
                </h2>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad debitis vitae quisquam illo sapiente ex
                    aspernatur non, illum aperiam ab sunt odio sint eum, dignissimos voluptatem itaque ullam quaerat?
                    Nesciunt.
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="https://docs.google.com/document/d/1nXQIt-kov6a68eJOSo02k7aSYkqRZiLA/edit?rtpof=true"
                    class="btn btn-purple px-4">Ver Glosario</a>
            </div>
        </div>
    </div>
</article>
<article id="recursosTematicas" class="recursosIndex">
    <div class="bg-light">
        <div class="container py-5">
            <h2>
                Temáticas
            </h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-4 text-center" id="tematicas">
                @foreach($contenidos as $c)
                <div class="col mb-4">
                    <div class="card bg-light border-0">
                        <a href="{{$c['link']}}" class="nav-link p-0">
                            <figure class="figure m-0">
                                <img src="/images/familia.jpg" class="card-img-top rounded-10" alt="...">
                            </figure>
                            <div class="card-body mt-1">
                                <h5>{{$c['texto']}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</article>
<article id="recursosPaises" class="recursosIndex">
    <div class="container py-5">
        <h2>
            Recursos por países
        </h2>
        <div class="row justify-content-center col-lg-8 mx-auto">
            <div class="col-4">
                <a href="" class="text-center nav-link p-0">
                    <figure class="figure">
                        <img src="/images/col.png" class="figure-img img-fluid " alt="bandera de colombia">
                        Colombia
                    </figure>

                </a>

            </div>
            <div class="col-4">
                <a href="" class="text-center nav-link p-0">
                    <figure class="figure">
                        <img src="/images/peru.png" class="figure-img img-fluid " alt="bandera de perú">
                        Perú
                    </figure>
                </a>
            </div>
            <div class="col-4">
                <a href="" class="text-center nav-link p-0">
                    <figure class="figure">
                        <img src="/images/py.png" class="figure-img img-fluid " alt="bandera de paraguay">
                        Paraguay
                    </figure>
                </a>
            </div>
        </div>
    </div>
</article>
@endsection
