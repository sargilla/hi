<div class='acciones' data-marcada='{{$query->marcada}}' data-publicada='{{$query->publicada}}'
    data-slug='{{$query->slug}}'>
    <button class='btn btn-{{$query->publicada ? "success" : "default" }} btn-xs' data-action='togglePublicar'><i
            class='fas fa-check'></i></button>
    {{-- <button class='btn btn-{{$query->marcada ? ' warning' : 'default' }} btn-xs' data-action='toggleMarcar'><i
            class='fas fa-star'></i></button> --}}
    <button class='btn btn-xs btn-primary' data-action='editar'><i class='fas fa-pen'></i></button>
    <button class='btn btn-danger btn-xs' data-action='borrar'><i class='fas fa-times'></i></button>
</div>
