@extends('flatlab::layout')

@section('header_title')
{{ __('eventos::eventos.agregar_evento') }}
@endsection
<!--breadcrumbs start -->
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/gestion"><i class="fa fa-home"></i> </a></li>
        <li class="breadcrumb-item"><a href="{{ route('eventos.index') }}"><i class="fa fa-newspaper"></i>
                {{ __('eventos::eventos.eventos') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('eventos::eventos.agregar_evento') }}</li>
    </ol>
</nav>
@endsection
<!--breadcrumbs end -->
@section('main-content')
<section class="card">
    <header class="card-header">
        {{ __('eventos::eventos.agregar_evento') }}
    </header>
    <div class="card-body">
        <eventos accion="crear"></eventos>
    </div>
</section>
@endsection
