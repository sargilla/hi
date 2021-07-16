@extends('flatlab::layout')

@section('header_title')
    Mensajes
@endsection

<!--breadcrumbs start -->
@section('breadcrumbs')
	@component('flatlab::componentes.breadcrumbs')
		<li class="breadcrumb-item active" aria-current="page">Mensajes</li>
	@endcomponent
@endsection
<!--breadcrumbs end -->

@section('main-content')
<div class="card">
	<div class="card-header">
		<i class="fas fa-envelope"></i> Mensajes desde la web
	</div>
	<div class="card-body">

		<div class="adv-table table-responsive">
			<table class="display dataTable hover table table-bordered" id="mensajes">
				<thead>
					<tr>
						<th>Enviado</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Tipo</th>
						<th>Telefono</th>
						<th>Mensaje</th>
                        <th>Archivo</th>
						<th>Acciones</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
@include('flatlab::helpers.modal',['accion'=>'borrar','titulo'=>'Borrar Mensaje','mensaje'=>'Está seguro que quiere borrar este mensaje?'])
@endsection
@push('extra_scripts')
    <script type="text/javascript">
	$(document).ready(function() {
	    mensajes = $('#mensajes').DataTable({
	       "stateSave" : true,
	        "processing": true,
	        "serverSide": true,
	        "ajax": "{{ route('getMensajes') }}",
	        "columns": [
	            {data: 'created_at', name: 'created_at'},
	            {data: 'nombre', name: 'nombre'},
	            {data: 'email', name: 'email'},
	            {data: 'tipo', name: 'tipo'},
	            {data: 'telefono', name: 'telefono'},
	            {data: 'mensaje', name: 'mensaje'},
	            {data: 'archivo', name:'archivo', className: "text-center"},
	            {data: 'acciones', name: 'acciones', orderable: false, searchable: false,  className: "nowrap" }
	        ]
	    }).on('click', '.acciones button', function (e) {

	    	e.preventDefault();

	    	var id = $(this).parent().data("id");

	    	if(!$(this).parent().data("leido")){
	    		var estado = 'leido';
	    	} else {
	    		var estado = 'no leido';
	    	}
        	if($(this).data("action") == 'toggle'){
				axios.post(route('leerMensaje',id))
				.then(response => {
					toastr.success('Mensaje ' + estado )
					mensajes.draw(false);
				})
        	}
        	if($(this).data("action") == 'destroy'){
        		$('#borrar').modal('show')
        		$('.confirma').one('click', function(){
					axios.delete(route('mensajes.destroy',id))
						.then(response => {
							$('#borrar').modal('hide')
							mensajes.draw(false)
							toastr.success('Se borro el mensaje!')
						})
    			});
        	}
   		})
	});
	</script>
@endpush
