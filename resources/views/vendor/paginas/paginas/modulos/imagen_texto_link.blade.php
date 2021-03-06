@if($campos['estilo'] == 1)
<article class="imagen-titulo-link-1">
    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <figure class="figure mb-0">
                    <img class="img-fluid mb-0 rounded-10"
                        src="/images/paginas-grande/{{ isset($campos['imagen']) ? $campos['imagen'] : 'familia.jpg' }}"
                        alt="{{ $campos['alt_imagen'] ?? ''}}">
                </figure>
            </div>
            <div class="col-12 col-sm-6">
                @if(isset($campos['texto']))
                {!! $campos['texto']!!}
                @endif
                <p>
                    DESCARGAR PDF:
                </p>
                <p class="text-center">

                    <a class="btn btn-purple px-5" href="{{isset($campos['link']) ? $campos['link'] : '#'}}"
                        title="{{isset($campos['texto_link']) ? $campos['texto_link'] : 'Falta escribir el texto'}}"
                        aria-label="{{ $campos['link_description'] ?? ''}}"
                        target="{{ $campos['target'] ?? ''}}">{{isset($campos['texto_link']) ?
                        $campos['texto_link'] : 'Falta escribir el texto'}}</a>
                </p>
            </div>
        </div>
    </div>
</article>
@else
<article class="imagen-titulo-link-2">
    <div class="referencia">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 p-0">
                    <figure class="figure mb-0 w-100">
                        <img class="img-fluid mb-0 w-100"
                            src="/images/paginas-grande/{{isset($campos['imagen']) ? $campos['imagen'] : 'familia.jpg'}}"
                            alt="{{ $campos['alt_image'] ?? ''}}">
                    </figure>
                </div>

                <div class="col-12 col-sm-6 py-lg-4 mt-3 mt-sm-0">
                    <h3>
                        @if(isset($campos['texto']))
                        {!! $campos['texto']!!}
                        @else
                        <p>
                            Texto Vacio
                        </p>
                        @endif
                    </h3>
                    <a href="{{$campos['link'] ?? ''}}" aria-label="{{ $campos['link_description'] ?? ''}}"
                        target="{{ $campos['target'] ?? ''}}">
                        @if(isset($campos['texto_link']))
                        <p class="link-p">
                            {{ $campos['texto_link']}}
                        </p>
                        @else
                        <p>
                            Texto Vacio
                        </p>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>
@endif