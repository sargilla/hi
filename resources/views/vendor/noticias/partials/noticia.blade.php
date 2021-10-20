@inject('noticias', '\Sigma\Noticias\Noticia')
<article class="expShowHV">
    <div class="bg-primary">
        <div class="container">
            <h1 class="py-5 text-white mt-1">
                {{ $noticia->titulo }}
            </h1>
        </div>
    </div>
    <div class="container py-5">
        <nav aria-label="Usted esta en historia de muestra">
            <ol class="breadcrumb bg-unset p-0">
                <li class="breadcrumb-item"><a href="/" class="p-2">Página Principal</a></li>
                <li class="breadcrumb-item"><a href="/{{ $noticia->tema->slug }}" class="p-2">{{
                        $noticia->tema->nombre }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $noticia->titulo }}</li>
            </ol>
        </nav>
    </div>
</article>
<article id="expShowHVCredito1" class="expShowHV">
    <div class="container py-5 py-lg-3">
        <a href="" class="nav-link p-0">
            <div class="text-center">
                <figure class="figure w-100 mb-3">
                    <img class="figure-img img-fluid w-100 rounded-10  mb-0"
                        src="/images/paginas-grande/{{$noticia->imagen_principal != 'no-imagen.jpg' ? $noticia->imagen_principal : 'familia.jpg' }}"
                        alt="{{$noticia->imagenes[0]['alt'] ?? ''}}">
                </figure>
                <span class="p-2 text-primary">{{$noticia->imagenes[0]['creditos'] ?? ''}}</span>
            </div>
        </a>
        <div class="mt-4">
            {!! $noticia->contenido !!}
        </div>
    </div>
    </div>
</article>
{{-- <article id="expShowHVCredito2" class="expShowHV">
    <div class="container py-5 py-lg-3">
        <div class="row">
            @if(isset($noticia->imagenes[1]))
            <div class="col-md-6">
                <a href="" class="nav-link p-0">
                    <div class="text-center">
                        <figure class="figure w-100 mb-3">
                            <img class="figure-img img-fluid w-100 rounded-10  mb-0"
                                src="/images/paginas-grande/{{$noticia->imagenes[1]['imagen']}}" alt="">
                        </figure>
                        <span class="p-2 text-primary">Creditos de la imagen</span>
                    </div>
                </a>
            </div>
            @else
            <div class="col-md-6">
                <a href="" class="nav-link p-0">
                    <div class="text-center">
                        <figure class="figure w-100 mb-3">
                            <img class="figure-img img-fluid w-100 rounded-10  mb-0"
                                src="/images/paginas-grande/{{$noticia->imagen_principal != 'no-imagen.jpg' ? $noticia->imagen_principal : 'familia.jpg' }}"
                                alt="">
                        </figure>
                        <span class="p-2 text-primary">Creditos de la imagen</span>
                    </div>
                </a>
            </div>
            @endif
            @if(isset($noticia->imagenes[2]))
            <div class="col-md-6">
                <a href="" class="nav-link p-0">
                    <div class="text-center">
                        <figure class="figure w-100 mb-3">
                            <img class="figure-img img-fluid w-100 rounded-10  mb-0"
                                src="/images/paginas-grande/{{$noticia->imagenes[2]['imagen']}}" alt="">
                        </figure>
                        <span class="p-2 text-primary">Creditos de la imagen</span>
                    </div>
                </a>
            </div>
            @endif
        </div>
        <div class="mt-4">
            {!! $noticia->contenido !!}
        </div>
    </div>
</article> --}}
<article class="expShowHV">
    <div class="container py-5 py-lg-3">
        <h2 class="text-primary my-5">
            Más notas de {{ $noticia->tema->nombre }}
        </h2>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5" id="mas-noticias">
            @foreach($noticias->delTema($noticia->tema->slug)->inRandomOrder()->limit(5)->get() as $not)
            <div class="col mb-4">
                <a href="/{{$noticia->tema->slug}}/{{ $not->slug}}" class="nav-link p-0">
                    <div class="card">
                        <figure class="figure mb-0">
                            <img src="/images/paginas-grande/{{$not->imagen_principal != 'no-imagen.jpg' ? $not->imagen_principal : 'familia.jpg' }}"
                                class="card-img-top rounded-10" alt="...">
                        </figure>
                        <div class="card-body">
                            <p class="card-text my-1">{{$not->pais?? 'Pais'}}</p>
                            <h3>{{$not->titulo?? 'Titulo Vacio'}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</article>
