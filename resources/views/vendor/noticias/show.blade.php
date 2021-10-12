@extends('plantilla::layout')
@section('header_title')
@if (! empty($noticia->id))
{{ config('app.name') }} {{ $noticia->titulo }}
@else
{{ config('app.name') }} Noticias
@endif

@endsection
@section('breadcrumbs')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
            @if (! empty($noticia->id))
            <li class="breadcrumb-item"><a href="{{ route('noticias', $tema->slug)}}">{{ $tema->nombre}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $noticia->titulo }}</li>
            @else
            <li class="breadcrumb-item active" aria-current="page">Noticias</li>
            @endif
        </ol>
    </nav>
</div>
@endsection
@section('main-content')

@if (! empty($noticia->id))
@include('noticias::partials.noticia')
@else
@if (env('NOTICIAS_TEMAS'))
@include('noticias::partials.noticias')
@else
@include('noticias::partials.noticias_sin_temas')
@endif
@endif
@endsection
