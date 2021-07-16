@extends('flatlab::layout')
@section('header_title')
    Editar Pagina {{ $pagina->titulo}}
@endsection
@section('breadcrumbs')
    @component('flatlab::componentes.breadcrumbs')
        <li class="breadcrumb-item " aria-current="page">
            <a href="{{ route('paginas.index')}}"><i class="fa fa-page"></i>Paginas</a>
        </li>
        <li class="breadcrumb-item active">Editar Pagina</li>
    @endcomponent
@endsection
@section('main-content')
    <section class="card">
        <header class="card-header">
            Editar {{ $pagina->titulo}}
        </header>
        <div class="card-body">
            <paginas evento="editar" :pagina="{{ $pagina }}"></paginas>
        </div>
    </section>
@endsection
