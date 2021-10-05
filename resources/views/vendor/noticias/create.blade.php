@extends('flatlab::layout')

@section('header_title')
{{ __('noticias::noticias.agregar_noticia') }}
@endsection

<!--breadcrumbs start -->
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/gestion"><i class="fa fa-home"></i> </a></li>
        <li class="breadcrumb-item"><a href="{{ route('noticias.index') }}"><i class="fa fa-"></i>
                {{ __('noticias::noticias.nombre') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('noticias::noticias.agregar_noticia') }}</li>
    </ol>
</nav>
@endsection
<!--breadcrumbs end -->

@section('main-content')
<section class="card">
    <header class="card-header">
        {{ __('noticias::noticias.agregar_noticia') }}
    </header>
    <div class="card-body">
        <noticias evento="crear"></noticias>
    </div>
</section>
@endsection
