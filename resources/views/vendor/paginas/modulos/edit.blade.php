@extends('flatlab::layout')

@section('header_title')
    Editar Módulo {{ $modulo->nombre}}
@endsection
<!--breadcrumbs start -->
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gestion.index') }}"><i class="fa fa-home"></i> </a></li>
        <li class="breadcrumb-item " ><a href="{{ route('modulos.index') }}">Modulos</a></li>
        <li class="breadcrumb-item active " aria-current="page">Editar módulo</li>
    </ol>
</nav>
@endsection
<!--breadcrumbs end -->

@section('main-content')
<div class="card">
    <div class="profile-nav alt green-border">
        <section class="card">
            <header class="user-heading alt green-bg">
                <h3>Editar {{ $modulo->nombre}}</h3>
            </header>
            <div class="card-body">
                <modulos evento="editar" :modulo="{{ $modulo }}"></modulos>
            </div>
        </section>
    </div>
</div>
@endsection
