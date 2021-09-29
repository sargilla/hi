@extends('flatlab::layout')

@section('header_title')
{{ __('eventos::eventos.editar_evento') }}
@endsection
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/gestion"><i class="fa fa-home"></i> </a></li>
        <li class="breadcrumb-item"><a href="{{ route('eventos.index') }}"><i class="fa fa-newspaper"></i>
                {{ __('eventos::eventos.eventos') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('eventos::eventos.editar_evento') }}
            {{ $evento->titulo}}</li>
    </ol>
</nav>

@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <section class="card">
            <header class="card-header">
                {{ __('eventos::eventos.editar_evento') }} {{ $evento->titulo}}
            </header>
            <div class="card-body">
                <eventos accion="editar" :evento="{{$evento}}"></eventos>
            </div>
        </section>
    </div>
</div>
@endsection
