@extends('flatlab::layout')

@section('header_title')
    Modulos
@endsection

<!--breadcrumbs start -->
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gestion.index') }}"><i class="fa fa-home"></i> </a></li>
        <li  class="breadcrumb-item active" aria-current="page">Modulos</li>
    </ol>
</nav>
@endsection
<!--breadcrumbs end -->
@section('main-content')

<div class="card">
    <div class="card-header">
	    <i class="fas fa-cubes"></i> Modulos
	</div>
            <div class="card-body">
                <div class="adv-table table-responsive">
                     <div class="clearfix">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-shadow" href="{{ route('modulos.create')}}">Crear Modulo</a>
                        </div>      
                    </div>
                    <table class="display nowrap dataTable  hover table table-bordered" id="modulos">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Posición</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
</div>
@include('flatlab::helpers.form-modal',['accion'=>'modulo-modal','titulo'=>'Borrar Módulo','body'=>'<modulos tipo="borrar"></modulos>'])
@endsection

@push('extra_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            modulos = $('#modulos').DataTable({       
                "ajax": "{{ route('getModulos') }}",
                "columns": [
                    {data: 'nombre', name: 'nombre'},
                    {data: 'tipo', name: 'tipo'},
                    {data: 'posicion', name: 'posicion'},
                    {data: 'acciones', name: 'acciones', orderable: false, searchable: false,  className: "nowrap" }
                ]
            }).on('click', '.acciones button', function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                if($(this).data("action") == 'borrar'){
                    Event.$emit('borrarModulo', id);
                }    
            })
        });
    </script> 
@endpush
