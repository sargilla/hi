<div class="w-100 bg-primary text-center text-white shadow my-5 p-2">
    @if (isset($campos['titulo']))
        <h2 class="border-bottom border-black py-3">{{ $campos['titulo'] }}</h2>
    @endif
    @if (isset($campos['texto']))
        <div class="pt-2">{!! $campos['texto'] !!}</div>
    @endif
    @if(isset($campos['imagen']))
        <a  href="/images/original/{{ $campos['imagen'] }}" 
            data-lightbox="{{ isset($campos['titulo']) ? $campos['titulo'] : 'galeria' }}" 
            data-title="{{ isset($campos['titulo']) ? $campos['titulo']  : '' }}">
                <img class="img-fluid my-3"  
                    src="/images/paginas-grande/{{ $campos['imagen'] }}" 
                    alt="{{ isset($campos['titulo']) ? $campos['titulo'] : 'imagen'}}">
        </a>
    @endif
</div>


