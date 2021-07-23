@extends('plantilla::layout')
@section('header_title', 'INICIO')
@section('main-content')
    <section>
        @include('home.bienvenida')
        @include('home.actualidad')
        @include('home.datos_impacto')     
    </section>
@endsection