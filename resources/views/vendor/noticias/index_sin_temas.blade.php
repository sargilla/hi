@extends('flatlab::layout')
@section('header_title')
{{ __('noticias::noticias.noticias') }}
@endsection

<!--breadcrumbs start -->
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/gestion"><i class="fa fa-home"></i> </a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('noticias::noticias.noticias') }}</li>
    </ol>
</nav>
@endsection
<!--breadcrumbs end -->

@section('main-content')

<!--breadcrumbs start -->
{{-- <ul class="breadcrumb">
	<li><a href="/gestion"><i class="fa fa-home"></i> </a></li>
	<li class="active">{{ __('noticias::noticias.noticias') }}</li>
</ul> --}}
<!--breadcrumbs end -->
<section class="card">
    <header class="card-header">
        {{ __('noticias::noticias.noticias') }}
    </header>
    <div class="card-body">
        <a href="{{ route('noticias.create')}}" class="btn btn-shadow btn-primary"><i class="fa fa-plus"></i>
            {{ __('noticias::noticias.agregar_noticia') }}</a>
        <div class="adv-table table-responsive">
            <table class="display compact nowrap table table-bordered " id="noticias">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>Fecha</th>
                        <th>Titulo</th>
                        <th>Marcada</th>
                        <th>Orden</th>
                        <th>Publicada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

@include('flatlab::helpers.modal',['accion'=>'borrar','titulo'=>'Borrar Noticia','mensaje'=>'Está seguro que quiere
borrar esta noticia?'])
@endsection
@push('extra_scripts')
<script type="text/javascript">
    $(document).ready(function() {
	    noticias = $('#noticias').DataTable({
	        "ajax": "{{ route('getNoticias') }}",
	        "columns": [
				{data: 'reorder', name: 'reorder' , orderable: false, searchable: false},
	            {data: 'created_at', name: 'noticias.created_at'},
	            {data: 'titulo', name: 'noticias.titulo'},
				{data: 'marcada', name: 'noticias.marcada', className: "text-center"},
				{data: 'orden', className: 'text-center nowrap'},
	            {data: 'publicada', name: 'noticias.publicada', className: "text-center"},
	            {data: 'acciones', name: 'acciones', orderable: false, searchable: false, className: "text-center nowrap"}
			],
			"order": [[ 1, "desc" ]],
			rowReorder: {
				selector: '.reorder-marcado',
				dataSrc: 'orden'
			}
		}).on('click', '.acciones button', function (e) {
			e.preventDefault();
			var accion = $(this).data("action")
	    	var slug = $(this).parent().data("slug");
	    	var marcada = $(this).parent().data("marcada");
	    	var publicada = $(this).parent().data("publicada");
			let marca = (marcada) ?  'se desmarcó' : 'se marcó'
			let publicacion = (publicada) ? 'despublicada' : 'publicada'
        	if( accion == 'togglePublicar'){
				axios.post(route('togglePublicarNoticia', slug))
					.then(()=>{
						toastr.success('La noticia fué ' + publicacion)
	              		noticias.draw(false);
					})
        	}
            if(accion == 'toggleMarcar'){
				axios.post(route('toggleMarcarNoticia', slug))
					.then(()=>{
						toastr.success('La noticia ' + marca + ' para verse primero'),
	              		noticias.draw(false);
					})
			}
			if(accion == 'editar'){
		       	window.location.href = route('noticias.edit', slug);
        	}
        	if(accion == 'borrar'){
        		$('#borrar').modal('show')
        		$('.confirma').one('click', function(){
					axios.delete(route('noticias.destroy', slug))
						.then(()=>{
							$('#borrar').modal('hide');
		            		noticias.draw(false);
		            		toastr.success('Se borró la noticia!')
						})
    			});
        	}
   		}).on('row-reorder', function (e, details) {
            if(details.length) {
                let rows = [];
                details.forEach(element => {
                    rows.push({
                        id: noticias.row(element.node).data().id,
                        orden: element.newData
                    });
                });
                $.ajax({
                    headers: {'x-csrf-token': window.Laravel.csrfToken},
                    method: 'POST',
                    url: route('noticias.reorder'),
                    data: { rows }
                }).done(function () { noticias.draw(false) });
            }
        });
    });
</script>
@endpush
