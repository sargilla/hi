@extends('plantilla::layout')
@section('header_title', 'INICIO')
@section('main-content')
        @include('home.bienvenida')
        @include('home.actualidad')
        @include('home.datos_impacto')     
@endsection