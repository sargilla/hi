<div class="my-3">
    <h2 style="color:{{ $tema->color }}">{{ $tema->nombre }}</h2>
    {!! $tema->descripcion !!}
</div>
<div class="row mb-2 align-items-stretch">
    @forelse ($tema->noticias_publicadas as $noticia)
        <div class="col-md-6 mb-4">
            <div class="card flex-md-row  shadow-sm h-100">
                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="mb-0">
                        <a class="text-dark" href="{{ $noticia->path }}">{{ $noticia->titulo}}</a>
                    </h3>
                    <p class="blog-post-meta">Publicado el {{ $noticia->created_at->format('d/m/Y') }} en  <a href="{{ $tema->path }}">{{ $tema->nombre }}</a></p>
                    <div class="card-text mb-auto">{!! $noticia->contenido_corto !!}</div>
                    <a class="btn btn-primary" href="{{ $noticia->path }}">Continuar Leyendo</a>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block" data-src="/images/thumbnoticia/{{ $noticia->imagen_principal }}" alt="{{ $noticia->titulo}}" src="/images/thumbnoticia/{{ $noticia->imagen_principal }}" data-holder-rendered="true">
            </div>
        </div>
    @empty
        <div class="alert alert-warning w-100 text-center" role="alert">
            <i class="fas fa-alert"></i> Todavía no hay noticias aquí
        </div>
    @endforelse
</div>
