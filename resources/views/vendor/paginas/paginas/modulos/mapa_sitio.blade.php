<section class="container mapa-sitio">
    @if (isset($campos['titulo']))
    <h2>
        {{$campos['titulo']}}
    </h2>
    @endif
    @if(isset($campos['texto']))
    <p>
        {{ $campos['texto'] }}
    </p>
    @endif


    <div class="mx-5">
        @foreach($campos['links'] as $link)
        <p>
            @switch($link['nivel'])
            @case(1)
            &bull;
            @break
            @case(2)
            &nbsp;&nbsp;&nbsp;&nbsp; &cir;
            @break
            @case(3)
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &square;
            @break
            @default
            @endswitch
            <a class="p-2" href="{{isset($link['link']) ? $link['link'] : '#'}}"
                aria-label="{{ $link['link_description'] ?? ''}}">
                {{isset($link['texto']) ? $link['texto'] : ''}}
            </a>
        </p>
        @endforeach
    </div>
    </div>
    </div>
</section>
