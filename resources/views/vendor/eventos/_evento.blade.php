<article id="eventos" class="eventosShow">
    <div class="bg-primary py-5 text-white mt-1">
        <div class="container">
            <h1>
                {{$evento->titulo}}
            </h1>
            <span>
                {{$evento->tipo->nombre}} {{$evento->nivel?? 'Nivel'}} {{$evento->sector?? 'Sector'}}
            </span>
        </div>
    </div>
    <div class="container py-3 px-5">
        <nav aria-label="Usted esta en eventos lorem ipsum">
            <ol class="breadcrumb bg-unset p-0">
                <li class="breadcrumb-item"><a href="/" class="p-2">Página Principal</a></li>
                @if ($evento->tipo_id == 1)
                <li class="breadcrumb-item"><a href="/eventos" class="p-2">Eventos</a></li>
                @else
                <li class="breadcrumb-item"><a href="/{{$evento->tipo->slug}}" class="p-2">{{
                        $evento->tipo->nombre}}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{$evento->titulo}}</li>
            </ol>
        </nav>
    </div>
</article>

<article id="eventosDescripcion" class="eventosShow mb-5">
    <div class="container py-3">
        <div class="row">
            <div class="mt-5 mt-lg-0 col-md-8 col-lg-7 col-xl-6 p-0">
                <h2>
                    Descripcion General
                </h2>
                <h3>
                    {!! $evento->contenido !!}
                </h3>
                @if ($evento->expositores)

                <h2 class="text-center mt-5">Expositores</h2>
                <div class="row">

                    @foreach ($evento->expositores as $expositor)
                    <div class="col">
                        <h3 class="text-center">
                            {{ $expositor['nombre'] ?? ''}}
                            <br><small>{{ $expositor['titulo'] ?? ''}}</small>
                        </h3>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="col-md-4 col-lg-5 col-xl-6">
                @if($evento->tipo->slug == 'formacion')
                <h2 class="text-center">Datos del curso</h2>
                @else
                <h2 class="text-center">Detalles del Evento</h2>
                @endif
                <div class="col-8 mx-auto">

                    <ul class="list-group">
                        <li class="list-group-item"><strong>Inicio:</strong> {{ $evento->fecha_desde ?
                            $evento->fecha_desde->format('d-m-Y') : ''}}
                            {{
                            $evento->fecha_desde && $evento->fecha_desde->format('h:i') != '00:00' ?
                            $evento->fecha_desde->format('h:i') . 'hs.' :''}}</li>
                        @if ($evento->fecha_hasta)

                        <li class="list-group-item"><strong>Fin:</strong> {{ $evento->fecha_desde ?
                            $evento->fecha_hasta->format('d-m-Y') : ''}} {{
                            $evento->fecha_desde->format('h:i') != '00:00' ?
                            $evento->fecha_desde->format('h:i') . 'hs.' :''}}</li>
                        @endif
                        @if ($evento->pais)
                        <li class="list-group-item"><strong>Lugar:</strong> {{$evento->pais }}</li>
                        @endif
                        @if ($evento->sector)
                        <li class="list-group-item"><strong>Sector:</strong> {{ $evento->sector }}</li>
                        @endif
                        @if ($evento->nivel)
                        <li class="list-group-item"><strong>Nivel:</strong> {{ $evento->nivel }}</li>
                        @endif
                    </ul>
                </div>

            </div>
        </div>
        <div class="row justify-content-center">
            {{-- @dd($evento->campos_extra) --}}
            <a href="{{$evento->links }}" target="_blank" class="btn btn-purple px-4 mt-4"
                @if(isset($evento->campos_extra['link_description']))
                aria-label="{{ $evento->campos_extra['link_description']}}"
                @else
                aria-label="Más información de {{ $evento->titulo }}"
                @endif
                >
                Más información</a>
        </div>
    </div>
</article>
