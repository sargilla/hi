@inject('eventos', '\Sigma\Eventos\Evento')
<article class="eventos">
    <div class="container py-5 px-lg-3">

        <div class="row row-cols-1 row-cols-md-2">
            @forelse($eventos->whereTipoId($campos['tipo_id'])->publicados()->get() as $evento)
            <div class="col mb-4">
                <a href="{{$evento->path}}" class="nav-link p-0">
                    <div class="card">
                        {{-- <figure class="figure m-0"> --}}
                            <img src="/images/paginas-grande/{{$evento->imagen_principal != 'no-imagen.jpg' ? $evento->imagen_principal : 'familia.jpg' }}"
                                class="card-img-top"
                                alt="{{ $evento->imagenes && isset($evento->imagenes[0]) && isset($evento->imagenes[0]['alt']) ? $evento->imagenes[0]['alt'] : $evento->titulo }}">
                            {{--
                        </figure> --}}
                        <div class="card-body">
                            @if (isset($evento->fecha_desde))

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="card-text my-1 text-uppercase">{{ $evento->fecha_desde->format('l j \de F
                                    \de Y')
                                    }} {{ $evento->fecha_desde->format('h:i') != '00:00' ?
                                    'a las ' . $evento->fecha_desde->format('h:i') . ' horas' :''}}</small>
                            </div>
                            @endif
                            <h2 class="mt-3 text-decoration-underline">
                                {{$evento->titulo}}
                            </h2>
                            <div class="p-3 d-flex justify-content-between align-items-center">
                                <p class="my-auto">
                                    {{-- @if ($evento->tipo->nombre != 'General')
                                    {{$evento->tipo->nombre}}
                                    @endif --}}
                                    @if ($evento->nivel)
                                    {{$evento->nivel }}
                                    @endif
                                    @if ($evento->nivel && $evento->sector)
                                    &nbsp;-&nbsp;
                                    @endif
                                    @if ($evento->sector)
                                    {{$evento->sector }}
                                    @endif
                                </p>
                                <a class="btn btn-purple px-4" href="{{$evento->path}}"
                                    aria-label="Más información de {{ $evento->titulo }}">Más información</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="alert alert-warning mx-auto">
                No hay eventos de momento
            </div>
            @endforelse
        </div>
    </div>
</article>
