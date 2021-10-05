@extends('flatlab::layout')

@section('header_title')
    {{ __('noticias::noticias.editar_noticia') }}
@endsection

<!--breadcrumbs start -->
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    	<li  class="breadcrumb-item"><a href="/gestion"><i class="fa fa-home"></i> </a></li>
    	<li  class="breadcrumb-item"><a href="{{ route('noticias.index') }}"><i class="fa fa-"></i> {{ __('noticias::noticias.nombre') }}</a></li>
    	<li class="breadcrumb-item active" aria-current="page">{{ __('noticias::noticias.editar_noticia') }}</li>
	</ol>
</nav>
@endsection
<!--breadcrumbs end -->

{{-- @section('breadcrumbs')
    <ul class="breadcrumb">
    	<li><a href="/gestion"><i class="fa fa-home"></i> </a></li>
    	<li><a href="{{ route('noticias.index') }}"><i class="fa fa-"></i> {{ __('noticias::noticias.nombre') }}</a></li>
    	<li class="active">{{ __('noticias::noticias.editar_noticia') }}</li>
    </ul>
@endsection --}}

@section('main-content')
    <div class="row">
        <div class="col-md-12">
        	<section class="card">
        		<header class="card-header">
        			{{ __('noticias::noticias.editar_noticia') }}
        		</header>
        		<div class="card-body">
        			<noticias evento="editar" :noticia="{{$noticia}}"></noticias>
        		</div>
        	</section>
        </div>
    </div>
@endsection
