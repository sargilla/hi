@extends('flatlab::layout')

@section('header_title')
    Paginas
@endsection
<!--breadcrumbs start -->
@section('breadcrumbs')
    @component('flatlab::componentes.breadcrumbs')
        <li class="breadcrumb-item " aria-current="page">
            <a href="{{ route('paginas.index')}}"><i class="fa fa-page"></i>Paginas</a></li>
        <li class="breadcrumb-item active">Crear una pagina</li>
    @endcomponent
@endsection
<!--breadcrumbs end -->
@section('main-content')
    <section class="card">
        <header class="card-header">
            Creación de Páginas 
        </header>
        <div class="card-body">
            <paginas evento="crear"></paginas>
        </div>
    </section>
@endsection