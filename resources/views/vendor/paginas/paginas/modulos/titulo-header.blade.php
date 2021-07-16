<div
    class="titulo-imagen position-absolute w-100"
    style="background-image: url('images/original/{{ $campos['imagen'] }}');">
</div>
@if (isset($campos['titulo']))
    <div class="titulo-header d-flex container justify-content-center text-white rounded text-center w-100 py-4 z-depth-3">
        <h1 class="text-uppercase">{{ $campos['titulo'] }}</h1>
    </div>
@endif
