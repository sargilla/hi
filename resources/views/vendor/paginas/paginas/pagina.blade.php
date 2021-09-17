@extends('plantilla::layout')
@section('header_title')
{{ config('app.name') }} :: {{ $pagina->titulo }}
@endsection
@section('main-content')
@if ($pagina->encabezado)

    @foreach ($pagina->encabezado as $modulo)
    @include("paginas::paginas.modulos.{$modulo['tipo']}",
    [
    'campos' => $modulo['campos'],
    'estilo' => isset($modulo['estilo']) ? $modulo['estilo'] : ''
    ])
    @endforeach
@endif


    @foreach ($pagina->contenido as $modulo)
    @include("paginas::paginas.modulos.{$modulo['tipo']}",
    [
    'campos' => $modulo['campos'],
    'estilo' => isset($modulo['estilo']) ? $modulo['estilo'] : ''
    ])
    @endforeach
@endsection
