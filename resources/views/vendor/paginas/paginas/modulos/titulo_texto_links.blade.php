<article class="bloques-estilo-2">
    <div class="docRec">
        <div class="container py-4">
            <h2>
                {{isset($campos['titulo']) ? $campos['titulo'] : 'Titulo Vacio'}}
            </h2>
            @if(isset($campos['texto']))
            {!! $campos['texto']!!}
            @else
            <p>
                Texto Vacio
            </p>
            @endif
            <div class="mt-2">
                @foreach($campos['modulos'] as $modulo)
                <p>
                    <a href="{{isset($modulo['link']) ? $modulo['link'] : '#'}}" class="text-white py-2"
                        aria-label="{{ $modulo['link_description'] ?? ''}}" target="_blank">
                        {{isset($modulo['texto']) ? $modulo['texto'] : 'Texto Vacio'}}
                    </a>
                </p>
                @endforeach
            </div>
        </div>
    </div>
</article>
