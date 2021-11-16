<article class="bloques-estilo-1">
    <div class="container py-5">
        <h2 class="mb-5">
            {{$campos['titulo']}}
        </h2>
        <div class="row justify-content-center col-lg-8 mx-auto">
            @foreach($campos['modulos'] as $modulo)
            <div class="col-4">
                <a href="{{isset($modulo['link']) ? $modulo['link'] : '#'}}" class="text-center nav-link p-0"
                    aria-label="{{ $modulo['link_description'] ?? ''}}">
                    <figure class="figure">
                        <img src="/images/paginas-grande/{{ $modulo['imagen'] }}" class="figure-img img-fluid "
                            alt="{{ $modulo['alt_image'] ?? ''}}">
                        <span>{{isset($modulo['texto']) ? $modulo['texto'] :
                            ''}}</span>
                    </figure>

                </a>
            </div>
            @endforeach
        </div>
    </div>
</article>
