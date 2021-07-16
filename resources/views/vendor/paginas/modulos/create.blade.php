@extends('flatlab::layout')

@section('header_title')
    Paginas
@endsection
<!--breadcrumbs start -->
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gestion.index') }}"><i class="fa fa-home"></i> </a></li>
        <li class="breadcrumb-item " ><a href="{{ route('modulos.index') }}">Modulos</a></li>
        <li class="breadcrumb-item active " aria-current="page">Crear un módulo</li>
    </ol>
</nav>
@endsection
<!--breadcrumbs end -->

@section('main-content')

<section class="card">
    <header class="card-header">
        Creación de Módulos 
    </header>
    <div class="card-body">
        <modulos evento="crear"></modulos>
    </div>
</section>

@endsection