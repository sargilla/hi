<div class="my-3">
    <h2 style="color:{{ $tipo->color }}">{{ $tipo->nombre }}</h2>
    {!! $tipo->descripcion !!}
</div>
<div class="row mb-2 align-items-stretch">
    @forelse ($tipo->eventos_publicados as $evento)
    <div class="col-md-6 mb-4">
        <div class="card flex-md-row  shadow-sm h-100">
            <div class="card-body d-flex flex-column align-items-start">
                <h3 class="mb-0">
                    <a class="text-dark" href="{{ $evento->path }}">{{ $evento->titulo}}</a>
                </h3>
                <p class="blog-post-meta">Publicado el {{ $evento->fecha_desde->format('d/m/Y') }} en <a
                        href="{{ $tipo->path }}">{{ $tipo->nombre }}</a></p>
                <div class="card-text mb-auto">{!! $evento->contenido_corto !!}</div>
                <a class="btn btn-primary" href="{{ $evento->path }}">Continuar Leyendo</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block"
                data-src="/images/thumbnoticia/{{ $evento->imagen_principal }}" alt="{{ $evento->titulo}}"
                src="/images/thumbnoticia/{{ $evento->imagen_principal }}" data-holder-rendered="true">
        </div>
    </div>
    @empty
    <div class="alert alert-warning w-100 text-center" role="alert">
        <i class="fas fa-alert"></i> Todavía no hay eventos aquí
    </div>
    @endforelse
</div>
