<div class="acciones">
    <a href="{{ $ruta }}" class="btn btn-xs btn-primary" title="Editar Página">
        <i class="fa fa-pencil-alt"></i>
    </a>
    <button 
        class="btn btn-xs btn-danger btn-xs" 
        data-toggle="modal" 
        data-target="#pagina-modal" 
        data-id="{{ $query->slug }}"
        data-action="borrar" 
        title="Borrar Página">
            <i class="fa fa-times"></i>
    </button>
</div>