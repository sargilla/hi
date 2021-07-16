<h2 class="text-center w-100 mb-5 bg-primary text-white p-5">Noticias Destacadas</h2>
<div class="row m-0 p-0 col-10 col-sm-7 col-md-8 col-lg-10 mx-auto ">
  @foreach($noticias as $noticia)
    <div class="col-12 col-md-6 col-lg-4 mb-4">
      <div class="card h-100">
        <img class="w-100 card-img-right flex-auto d-lg-block" data-src="/images/card{{ $noticia->imagen_principal }}" alt="{{ $noticia->titulo}}" src="/images/card/{{ $noticia->imagen_principal }}" data-holder-rendered="true">
        <div class="card-body">
          <h5 class="card-title">{{$noticia->titulo}}</h5>
          <p class="blog-post-meta">Publicado el {{ $noticia->created_at->format('d/m/Y') }} en  <a href="{{ $noticia->tema->path }}">{{ $noticia->tema->nombre }}</a></p>
          <div class="card-text mb-auto">{!! $noticia->contenido_corto !!}</div>
          <a class="btn btn-primary w-100" href="{{ $noticia->path }}">Continuar Leyendo</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>