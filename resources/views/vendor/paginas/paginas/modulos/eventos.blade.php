@inject('eventos', '\Sargilla\Eventos\Evento')
<div class="blogs-2" id="blogs-2">
    <h2 class="title text-center">{{$modulo['nombre']}}</h2>
    <div class="container">
        @foreach($eventos->filtro($campos)->cantidad($campos['cantidad'])->publicados()->get()->chunk($campos['columnas']) as $chunk)
        <div class="row">
            @foreach($chunk as $noticia)
            <div class="col-md-4">
                <div class="card card-plain card-blog">
                    <div class="card-header card-header-image">
                        <a href="{{ $noticia->path }}">
                            <img class="img img-raised" src="/images/thumbnoticia/{{ $noticia->imagen_principal }}" alt="{{ $noticia->titulo }}">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-category" style="color:{{$noticia->tipo->color}}!important;">
                                {{ $noticia->tipo->nombre }}
                            </h6>
                            <h6 class="card-category text-info text-right">
                                <i class="material-icons">event</i><span> {{ $noticia->created_at->format('d/m/Y H:m') }}Hs</span>
                            </h6>
                        </div>
                        <h4 class="card-title">
                            <a href="{{ $noticia->path }}">{{ $noticia->titulo}}</a>
                        </h4>
                        <p class="card-description">
                            {!! $noticia->contenido_corto !!}
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="stats ml-auto">
                            <a href="{{ $noticia->path }}">
                                <span>Leer Más</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
