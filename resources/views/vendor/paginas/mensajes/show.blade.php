@extends('flatlab::layout')

@section('header_title')
    Mensaje
@endsection
<!--breadcrumbs start -->
@section('breadcrumbs')
	@component('flatlab::componentes.breadcrumbs')
		<li class="breadcrumb-item"><a href="{{ route('mensajes.index')}}">Mensajes</a></li>
		<li class="breadcrumb-item active">Mensaje de {{ $mensaje->nombre }}</li>
	@endcomponent
@endsection
<!--breadcrumbs end -->
@section('main-content')
<section class="card">
	<div class="inbox-head">
		<h3>Mensaje de {{ $mensaje->nombre}}</h3>
		<div class="pull-right position" action="#">
			<button type="button" class="btn {{($mensaje->leido)? 'btn-default' : 'btn-success' }} toggle-leido"><i class="fa fa-check"></i></button>
		</div>
	</div>
	<div class="inbox-body">
		<div class="heading-inbox row">
			<div class="col-md-8">
				<div class="compose-btn">
					<a class="btn btn-sm btn-primary" href="/gestion/mensajes"><i class="fa fa-reply"></i> Volver a Mensajes</a>
				</div>
			</div>
			<div class="col-md-4 text-right">
			<p class="date"> {{ $mensaje->created_at->diffForHumans()}}</p>
			</div>
			@if ($mensaje->asunto)
				<div class="col-md-12">
					<h4>{{ $mensaje->asunto }}</h4>
				</div>
			@endif
		</div>
		<div class="sender-info">
			<div class="row">
				<div class="col-md-12">Enviado por: 
					<strong>{{ $mensaje->nombre }}</strong>
					<span>[{{ $mensaje->email }}]</span>
				</div>
			</div>
		</div>
		<div class="view-mail">
			<h4>Mensaje</h4>
			<p>{{ $mensaje->mensaje}}</p>
		</div>
		<hr>
		<div class="compose-btn m">
			<h4>Datos de Contacto</h4>
			{!! $mensaje->telefono ? "<p><strong>Teléfono: </strong> $mensaje->telefono</p>" : ''!!}
			@if ($mensaje->empresa)
				<p><strong>Empresa: </strong>{{$mensaje->empresa}} {{ $mensaje->puesto ? "[$mensaje->puesto]" : ''}}</p>
			@endif
			{!! $mensaje->localidad ? "<p><strong>Localidad: </strong> $mensaje->localidad</p>" : ''!!}
			{!! $mensaje->provincia ? "<p><strong>Provincia: </strong> $mensaje->provincia</p>" : ''!!}
			{!! $mensaje->pais ? "<p><strong>País: </strong> $mensaje->pais</p>" : ''!!}
		</div>
	</div>
</section>
@endsection
@push('extra_scripts')
    <script type="text/javascript">
	$(document).ready(function() {
        $('.toggle-leido').click(function() {
            axios.post(route('leerMensaje',{{ $mensaje->id }}))
            .then(response => {
               $('.toggle-leido').toggleClass('btn-default btn-success')
               let leido = ($('.toggle-leido').hasClass('btn-success')) ? 'no leído': 'leído'
                toastr.success('Mensaje el mensaje se marcó como ' + leido )
            })	        	
        })
	});
	</script> 
@endpush
