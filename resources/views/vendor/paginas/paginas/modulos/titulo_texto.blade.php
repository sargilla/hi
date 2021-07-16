<div class="w-100 text-center  bg-primary text-white shadow mb-5 p-2">
    @if (isset($campos['titulo']))
        <h1 class="border-bottom border-black py-3">{{ $campos['titulo'] }}</h1>
    @endif
    @if (isset($campos['texto']))
    <div class="pt-2">
        {!! $campos['texto'] !!}

    </div>
    @endif
</div>


