<div class='acciones' data-marcado='{{$query->marcado}}' data-publicado='{{$query->publicado}}'
    data-slug='{{$query->slug}}'>
    <button class='btn btn-{{$query->publicado ? 'success' : 'default' }} btn-xs' data-action='togglePublicar'><i
            class='fa fa-check'></i></button>
    <button class='btn btn-{{$query->marcado ? 'warning' : 'default' }} btn-xs' data-action='toggleMarcar'><i
            class='fa fa-star'></i></button>
    <button class='btn btn-xs btn-primary' data-action='editar'><i class='fas fa-pen'></i></button>
    <button class='btn btn-danger btn-xs' data-action='borrar'><i class='fas fa-times'></i></button>
</div>
