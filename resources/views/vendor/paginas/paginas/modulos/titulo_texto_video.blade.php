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
                        {{ $campos['texto_boton'] }}
                    </a>
                </div>
                @endif
            </div>
            <div class="mt-5 mt-md-0 col-md-5 pt-2" id="div-video">
                @if (isset($campos['video']))
                <video ref="video" class="video-js vjs-fill vjs-fluid w-100" controls preload="auto"
                    poster="/images/poster/{{ $campos['poster'] ?? ''}}" aria-label="{{$campos['video_alt'] ?? 'gs'}}">
                    <source src="/storage/paginas/videos/{{$campos['video']}}" type="video/mp4" />
                </video>
                @endif
                <div class="text-center mt-md-2">
                    <a href="{{ $campos['transcripcion_link'] ?? ''}}" class="p-2">Transcripcion de video</a>
                </div>
            </div>
        </div>
    </div>
</article>