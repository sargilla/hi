@inject('noticias', '\Sargilla\Noticias\Noticia')
<div class="container">
    @foreach($noticias->tipo($campos['tipo'])->cantidad($campos['cantidad'])->publicadas()->get()->chunk($campos['columnas']) as $chunk)
        <div class="row align-items-stretch">
            @foreach($chunk as $noticia) 
                <div class="col-md mb-4">
                    <div class="card flex-md-row box-shadow h-100">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2" style="color:{{ $noticia->tema->color }}">{{ $noticia->tema->nombre}}</strong>
                            <h3 class="mb-0">
                                <a href="{{ $noticia->path }}" class="text-dark">
                                    {{ $noticia->titulo_corto }}
                                </a>
                            </h3>
                            <div class="mb-1 text-muted">{{ $noticia->created_at->format('d \d\e F \d\e\l Y') }}</div>
                            <div class="card-text mb-auto">
                                {!! $noticia->contenido_corto !!}
                            </div>
                            <a href="{{ $noticia->path }}" class="btn btn-primary text-center">Ver Nota</a></div>
                            <img alt="{{ $noticia->titulo }}" src="images/thumbnoticia/{{ $noticia->imagen_principal }}" data-holder-rendered="true" class="card-img-right flex-auto d-none d-lg-block">
                    </div>
                </div>
            @endforeach
         </div>
    @endforeach
</div>

