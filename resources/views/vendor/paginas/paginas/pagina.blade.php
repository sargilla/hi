@extends('plantilla::layout')
@section('header_title')
{{ config('app.name') }} :: {{ $pagina->titulo }}
@endsection
@section('main-content')
@if ($pagina->encabezado)
<div class="header-3">
    @foreach ($pagina->encabezado as $modulo)
    @include("paginas::paginas.modulos.{$modulo['tipo']}",
    [
    'campos' => $modulo['campos'],
    'estilo' => isset($modulo['estilo']) ? $modulo['estilo'] : ''
    ])
    @endforeach
</div>
@endif
<main id="main">

    @foreach ($pagina->contenido as $modulo)
    @include("paginas::paginas.modulos.{$modulo['tipo']}",
    [
    'campos' => $modulo['campos'],
    'estilo' => isset($modulo['estilo']) ? $modulo['estilo'] : ''
    ])
    @endforeach

</main>
@endsection
