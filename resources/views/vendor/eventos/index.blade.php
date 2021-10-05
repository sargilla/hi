@extends('flatlab::layout')
@section('header_title')
{{ __('eventos::eventos.eventos') }}
@endsection

@section('breadcrumbs')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/gestion"><i class="fa fa-home"></i> </a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ __('eventos::eventos.eventos') }}</li>
	</ol>
</nav>
@endsection

@section('main-content')
<section class="card">
	<header class="card-header">
		{{ __('eventos::eventos.eventos') }}
	</header>
	<div class="card-body">
		<a href="{{ route('eventos.create')}}" class="btn btn-shadow btn-primary"><i class="fa fa-plus"></i>
			{{ __('eventos::eventos.agregar_evento') }}</a>
		<div class="adv-table table-responsive">
			<table class="display compact nowrap table table-bordered " id="eventos">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Titulo</th>
						<th>Sección</th>
						<th>Marcado</th>
						<th>Publicado</th>
						<th>Acciones</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</section>
@include('flatlab::helpers.modal',['accion'=>'borrar','titulo'=>'Borrar Evento','mensaje'=>'Está seguro que quiere
borrar este evento?'])
@endsection
@push('extra_scripts')
<script type="text/javascript">
	$(document).ready(function() {
	    eventos = $('#eventos').DataTable({
	        "ajax": "{{ route('getEventos') }}",
	        "columns": [
	            {data: 'created_at', name: 'eventos.created_at'},
	            {data: 'titulo', name: 'eventos.titulo'},
	            {data: 'tipo.nombre', name: 'tipo.nombre', className: "text-center"},
	            {data: 'marcado', name: 'eventos.marcado', className: "text-center"},
	            {data: 'publicado', name: 'eventos.publicado', className: "text-center"},
	            {data: 'acciones', name: 'acciones', orderable: false, searchable: false, className: "text-center nowrap"}
	        ]
		}).on('click', '.acciones button', function (e) {
			e.preventDefault();
			var accion = $(this).data("action")
	    	var slug = $(this).parent().data("slug");
	    	var marcado = $(this).parent().data("marcado");
	    	var publicado = $(this).parent().data("publicado");
			let marca = (marcado) ?  'se desmarcó' : 'se marcó'
			let publicacion = (publicado) ? 'despublicado' : 'publicado'
        	if( accion == 'togglePublicar'){
				axios.post(route('togglePublicarEvento', slug))
					.then(()=>{
						toastr.success('El evento fué ' + publicacion)
	              		eventos.draw(false);
					})
        	}
            if(accion == 'toggleMarcar'){
				axios.post(route('toggleMarcarEvento', slug))
					.then(()=>{
						toastr.success('El evento ' + marca + ' para verse primero'),
	              		eventos.draw(false);
					})
			}
			if(accion == 'editar'){
		       	window.location.href = route('eventos.edit', slug);
        	}
        	if(accion == 'borrar'){
        		$('#borrar').modal('show')
        		$('.confirma').one('click', function(){
					axios.delete(route('eventos.destroy', slug))
						.then(()=>{
							$('#borrar').modal('hide');         		
		            		eventos.draw(false);    
		            		toastr.success('Se borró el evento!')
						})
    			});
        	}     	
   		})
    });
</script>
@endpush