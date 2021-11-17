<article class="imagen-titulo-link-2">
    <div class="referencia">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 p-0">
                    <figure class="figure mb-0 w-100">
                        <img class="img-fluid mb-0 w-100"
                            src="/images/paginas-grande/{{isset($campos['imagen']) ? $campos['imagen'] : 'familia.jpg'}}"
                            alt="{{ $campos['alt_imagen'] ?? ''}}">
                    </figure>
                </div>
                <div class="col-12 col-sm-6 py-lg-4 mt-3 mt-sm-0">
                    <h3>
                        @if(isset($campos['titulo']))
                        {!! $campos['titulo']!!}
                        @else
                        <p>
                            Texto Vacio
                        </p>
                        @endif
                    </h3>
                    @foreach ($campos['items'] as $item)
                    <a href="{{$item['link'] ?? ''}}" aria-label="{{ $item['link_description'] ?? ''}}"
                        target="{{ $item['link_target'] ? '_blank' : ''}}">
                        @if(isset($item['texto_link']))
                        <p class="link-p">
                            {{ $item['texto_link']}}
                        </p>
                        @else
                        <p>
                            Texto Vacio
                        </p>
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</article>
