<article id="bienvenida" class="pt-3 py-2">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center py-3 px-lg-3">
            <div class="col-md-6 col-xl-7 px-md-3 px-lg-5">
                <h1 class="text-center text-lg-left">
                    {{$campos['titulo']}}

                </h1>
                {!! $campos['texto'] !!}
                @if (isset($campos['link_boton']) && isset($campos['texto_boton']))

                <div>
                    <a href="{{ $campos['link_boton'] }}" class="btn btn-purple px-5">
                        {{  $campos['texto_boton'] }}
                    </a>
                </div>
                @endif
            </div>
            <div class="mt-5 mt-md-0 col-md-5" id="div-video">
                <iframe class="rounded-10" width="100%" height="400" title="video desde vimeo indicacion del video"
                    src="https://www.youtube.com/embed/SzInP8LI-ss" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="text-center mt-md-2">
                    <a href="" class="p-2">Transcripcion de video</a>
                </div>
            </div>
        </div>
    </div>
</article>
