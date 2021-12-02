@extends('plantilla::layout')
@section('header_title')
@if (! empty($evento->id))
{{ $evento->titulo }} {{ config('app.name') }}
@else
{{ config('app.name') }} - Eventos
@endif
@endsection
{{-- @section('breadcrumbs')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
            @if (! empty($evento->id))
            <li class="breadcrumb-item"><a href="{{ route('eventos', $tipo->slug)}}">{{ $tipo->nombre}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $evento->titulo }}</li>
            @else
            <li class="breadcrumb-item active" aria-current="page">Eventos</li>
            @endif
        </ol>
    </nav>
</div>
@endsection --}}
@section('main-content')
@if (! empty($evento->id))
@include('eventos::_evento')
@else
@include('eventos::_eventos')
@endif
@endsection