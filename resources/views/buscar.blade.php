@extends('plantilla::layout')
@section('header_title')
{{ config('app.name') }} Buscando {{ request()->busqueda}}
@endsection
@section('main-content')
Busqueda
@endsection
@push('extra_scripts')
@endpush
