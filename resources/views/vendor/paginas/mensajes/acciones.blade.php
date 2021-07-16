<div class='acciones' data-id='{{ $query->id }}' data-leido='{{ $query->leido }}'>
    <a class='btn btn-warning btn-xs' href="/gestion/mensajes/{{ $query->id }}"><i class='fa fa-eye'></i></a>
    <button class='btn btn-{{ $query->leido ? 'default' : 'success' }} btn-xs' data-action='toggle'><i
            class='fa fa-check'></i></button>
    <button class='btn btn-danger btn-xs' data-action='destroy'><i class='fa fa-times'></i></button>
</div>