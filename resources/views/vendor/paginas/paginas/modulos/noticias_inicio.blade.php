@inject('noticias', '\Sigma\Noticias\Noticia')
@if($campos['estilo'] == 1)
<article class="noticias-1 pt-5 pb-lg-5">
    <h2 class="text-center mb-5">
        Actualidad
    </h2>
    <div class="container pb-5 pb-lg-0">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 div-focus">
            @foreach($noticias->delTema($campos['categoria'])->publicadas()->limit(5)->get() as $noticia)
            <div class="col mb-4">
                <a href="{{route('noticias', ['tema'=>$noticia->tema,'noticia'=> $noticia->slug])}}"
                    class="nav-link p-0">
                    <div class="card">
                        <figure class="figure m-0">
                            <img src="/images/paginas-grande/{{$noticia->imagen_principal != 'no-imagen.jpg' ? $noticia->imagen_principal : 'familia.jpg' }}"
                                class="card-img-top" alt="">
                        </figure>
                        <div class="card-body pt-0">
                            <p class="card-text my-1 border-bottom border-primary">{{$noticia->pais}}</p>
                            <h3>{{$noticia->titulo}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-2 mt-lg-5">
            <a href="" class="btn btn-purple px-5 ">
                Ver todas las notas
            </a>
        </div>
    </div>
</article>
@endif
@if($campos['estilo'] == 2)
<article class="noticias-2">
    <div class="container py-5 px-lg-3">
        <div class="row row-cols-2 row-cols-md-2">
            @forelse($noticias->delTema($campos['categoria'])->publicadas()->limit(5)->get() as $noticia)
            <div class="col mb-4">
                <div class="card">
                    <a href="{{route('noticias', $noticia->tema,$noticia)}}" class="nav-link p-0">
                        <figure class="figure m-0">
                            <img src="/images/paginas-grande/{{$noticia->imagen_principal != 'no-imagen.jpg' ? $noticia->imagen_principal : 'familia.jpg' }}"
                                class="card-img-top rounded-10" alt="">
                        </figure>
                        <div class="card-body">
                            <p class="card-text my-1">
                                {{$noticia->pais ?? 'Pais'}}
                            </p>
                            <h2>
                                {{$noticia->titulo ?? 'Titulo vacio'}}
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <div class="alert alert-warning mx-auto">
                SIN NOTICIAS
            </div>
            @endforelse
        </div>
    </div>
</article>
@endif
@if($campos['estilo'] == 3)
<article class="noticias-3">
    <div class="container py-5 expRes">
        <h2 class="text-center">
            Documentos de diagnósticos
        </h2>
        @forelse($noticias->delTema($campos['categoria'])->publicadas()->limit(5)->get() as $noticia)
        <div class="row mb-3 border py-5">
            <div class="col-12 col-md-4 col-lg-3">
                <figure class="figure mb-0">
                    <img src="/images/paginas-grande/{{$noticia->imagen_principal != 'no-imagen.jpg' ? $noticia->imagen_principal : 'familia.jpg' }}"
                        class="figure-img img-fluid w-100 rounded mb-0" alt="">
                </figure>
            </div>
            <div class="col-12 col-md-8 col-lg-9 py-3">
                <p class="col-md-6 p-0">
                    {{$noticia->pais ?? 'Pais'}}
                </p>
                <h3 class="mt-4">
                    {{$noticia->titulo ?? 'Titulo vacio'}}
                </h3>
                <p class="mt-3">
                    <a href="" class="text-white p-2">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Descargar el documento
                    </a>
                </p>
            </div>
        </div>
        @empty
        <div class="alert alert-warning mx-auto">
            SIN NOTICIAS
        </div>
        @endforelse
    </div>
</article>
@endif
@if($campos['estilo'] == 4)
<article class="noticias-4">
    <div class="container py-5 px-lg-3">
        <div class="row">
            @forelse($noticias->delTema($campos['categoria'])->publicadas()->get()->chunk(4) as $chunkNoticia)
            <div class="col-sm-7 col-md-7 mb-4">

                <a href="{{route('noticias',['tema'=>$chunkNoticia->first()->tema,'noticia'=>$chunkNoticia->first()])}}"
                    class="nav-link p-0">
                    <figure class="figure m-0 w-100">
                        <img src="/images/paginas-grande/{{$chunkNoticia->first()->imagen_principal != 'no-imagen.jpg' ? $chunkNoticia->first()->imagen_principal : 'familia.jpg' }}"
                            class="card-img-top  rounded-10" alt="">
                    </figure>
                    <div class="card-body">
                        <p class="card-text my-1 border-bottom border-primary w-50">Pais</p>
                        <h2>{{$chunkNoticia->first()->titulo}}</h2>
                    </div>
                </a>
            </div>
            @if($chunkNoticia->get(1))
            <div class="col-sm-5 col-md-5 mb-4">
                <a href="{{route('noticias',['tema'=>$chunkNoticia->get(1)->tema,'noticia'=>$chunkNoticia->get(1)])}}"
                    class="nav-link p-0">
                    <figure class="figure m-0 w-100">
                        <img src="/images/familia_2.jpg" class="card-img-top  rounded-10" alt="">
                    </figure>
                    <div class="card-body">
                        <p class="card-text my-1 border-bottom border-primary w-75">Pais</p>
                        <h2>{{$chunkNoticia->get(1)->titulo}}</h2>
                    </div>
                </a>
            </div>
            @if($chunkNoticia->get(2))
            <div class="col-sm-5 col-md-5 mb-4">
                <a href="{{route('noticias',['tema'=>$chunkNoticia->get(2)->tema,'noticia'=>$chunkNoticia->get(2)])}}"
                    class="nav-link p-0">
                    <figure class="figure m-0 w-100">
                        <img src="/images/familia_2.jpg" class="card-img-top  rounded-10" alt="">
                    </figure>
                    <div class="card-body">
                        <p class="card-text my-1 border-bottom border-primary w-75">Pais</p>
                        <h2>{{$chunkNoticia->get(2)->titulo}}</h2>
                    </div>
                </a>
            </div>
            @if($chunkNoticia->get(3))
            <div class="col-sm-7 col-md-7 mb-4">
                <a href="{{route('noticias',['tema'=>$chunkNoticia->get(3)->tema,'noticia'=>$chunkNoticia->get(3)])}}"
                    class="nav-link p-0">
                    <figure class="figure m-0 w-100">
                        <img src="/images/familia.jpg" class="card-img-top  rounded-10" alt="">
                    </figure>
                    <div class="card-body">
                        <p class="card-text my-1 border-bottom border-primary w-50">Pais</p>
                        <h2>{{$chunkNoticia->get(3)->titulo}}</h2>
                    </div>
                </a>
            </div>
            @endif
            @endif
            @endif
            @empty
            <div class="alert alert-warning mx-auto">
                SIN NOTICIAS
            </div>
            @endforelse

        </div>
    </div>
</article>
@endif
