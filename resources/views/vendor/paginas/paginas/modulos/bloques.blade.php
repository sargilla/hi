@if ($campos['columnas'] == 1)
@foreach (collect($campos['modulos']) as $modulo)
<div class="widget clearfix ">
    <div class="feature-box fbox-border fbox-effect bg-primary text-white shadow">
        <h3>{{ $modulo['titulo'] }}</h3>
        <div class="fbox-icon">
            <a class="text-white" href="#"><i class="{{ $modulo['icono'] }} i-alt"></i></a>
            <p>{{ $modulo['texto'] }}</p>
        </div>
    </div>
</div>

@endforeach
@else
<div class="container clearfix my-5">
    @foreach (collect($campos['modulos'])->chunk($campos['columnas']) as $chunk)
    <div class="row">
        @foreach($chunk as $modulo)
        <div class="col mb-3">
            <div class="feature-box fbox-border fbox-effect border border-black p-2 shadow bg-primary text-white">
                <h3 class="border-bottom border-black">{{ $modulo['titulo'] }} </h3>
                <div class="fbox-icon d-flex p-2">
                    <a class="text-white" href="#"><i class="{{ $modulo['icono'] }} i-alt mr-2"></i></a>
                    <p class="m-0">{{ $modulo['texto'] }} </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
@endif