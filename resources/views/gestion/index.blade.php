@extends('flatlab::layout')

@section('header_title','Gestión '. config('app.name'))

@section('main-content')
<h3 class="text-center my-4">{{ config('app.name')}}</h3>
<div class="row state-overview">

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <ul class="d-flex justify-content-around align-items-center pt-4">
                    @can('admin-paginas')

                    <li>
                        <a href="{{ route('paginas.index') }}">
                            <i class="fas fa-sitemap text-primary"></i>
                            Páginas
                        </a>
                    </li>
                    @endcan
                    @can('admin-noticias')

                    <li>
                        <a href="{{ route('noticias.index') }}">
                            <i class="fas fa-newspaper text-info"></i>
                            Noticias
                        </a>
                    </li>
                    @endcan
                    @can('admin-eventos', Model::class)

                    <li>
                        <a href="{{ route('eventos.index') }}">
                            <i class="fas fa-newspaper text-warning"></i>
                            Eventos
                        </a>
                    </li>
                    @endcan

                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <section class="card">
            <div class="symbol terques">
                <i class="fa fa-user"></i>
            </div>
            <div class="value">
                <h1 class="count">{{ $visitasxmes }}</h1>
                <p>Visitas Mensuales</p>
            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="card">
            <div class="symbol blue">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="value">
                <h1 class=" count4">{{ $usuarios_activos }}</h1>
                <p>Usuarios Activos</p>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <section class="card">
            <header class="card-header">
                Vistitas y Páginas Vistas (10 Días)
            </header>
            <div class="card-body text-center">
                <chart url="{{ route('getVisitas') }}"></chart>
            </div>
        </section>
    </div>
</div>
@endsection

@push('extra_css')
<!-- Enviar un css a la vista principal-->
@endpush

@push('plugins_js')
<!-- Enviar un plugin a la vista principal-->
@endpush

@push('extra_scripts')
<!-- Enviar un script a la vista principal-->
@endpush
