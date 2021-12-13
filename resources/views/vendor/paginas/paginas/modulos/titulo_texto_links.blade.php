<article class="bloques-estilo-2">
    <div class="{{ isset($campos['estilo']) ? '' :'docRec' }}">
        <div class="container py-4">
            @if (isset($campos['titulo']))

            <h2>
                {{$campos['titulo']}}
            </h2>
            @endif
            @if(isset($campos['texto']))
            {!! $campos['texto']!!}
            @endif
            <div class="mt-2">
                @foreach($campos['modulos'] as $modulo)
                <p>
                    <a href="{{isset($modulo['link']) ? $modulo['link'] : '#'}}" class="py-2"
                        aria-label="{{ $modulo['link_description'] ?? ''}}" target="_blank">
                        {{isset($modulo['texto']) ? $modulo['texto'] : ''}}
                    </a>
                </p>
                @endforeach
            </div>
        </div>
    </div>
</article>
