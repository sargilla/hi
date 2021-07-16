@extends('flatlab::layout')

@section('header_title')
    Paginas
@endsection
<!--breadcrumbs start -->
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gestion.index') }}"><i class="fa fa-home"></i> </a></li>
        <li  class="breadcrumb-item active" aria-current="page">Paginas</li>
    </ol>
</nav>
@endsection
<!--breadcrumbs end -->
@section('main-content')

<div class="card">
        <div class="card-header">
            <i class="fas fa-sitemap"></i> Paginas
        </div>
            <div class="card-body">
                <div class="adv-table table-responsive">
                     <div class="clearfix">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-shadow" href="{{ route('paginas.create')}}">Crear Página</a>
                        </div>      
                    </div>
                    <table class="display nowrap dataTable  hover table table-bordered" id="paginas">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
</div>
@include('flatlab::helpers.form-modal',['accion'=>'pagina-modal','titulo'=>'Borrar Página','body'=>'<paginas tipo="borrar"></paginas>'])
@endsection

@push('extra_scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        paginas = $('#paginas').DataTable({       
            "ajax": "{{ route('getPaginas') }}",
            "columns": [
                {data: 'titulo', name: 'titulo'},
                {data: 'acciones', name: 'acciones', orderable: false, searchable: false,  className: "nowrap text-center" }
            ]
        }).on('click', '.acciones button', function (e) {
            e.preventDefault();
            var id = $(this).data("id");
            if($(this).data("action") == 'borrar'){
                Event.$emit('borrarPagina', id);
            }    
        })
    });

    </script> 
@endpush
