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
            @forelse($noticias->delTema($campos['categoria'])->publicadas()->limit(5)->latest()->get() as $noticia)
            <div class="col mb-4">
                <div class="card">
                    <a href="{{route('noticias', ['tema'=>$noticia->tema,'noticia'=>$noticia->slug]) }}"
                        class="nav-link p-0">
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
        @forelse ($noticias->delTema($campos['categoria'])->publicadas()->get()->chunk(2) as $chunkNoticia)
        <div class="row">
            @foreach ($chunkNoticia as $noticia)
            <div class="col-md-{{($loop->parent->index % 2 XOR $loop->index) ? '5':'7'}} mb-4">
                <a href="{{route('noticias',['tema'=>$noticia->tema,'noticia'=>$noticia->slug])}}" class="nav-link p-0">
                    <figure class="figure m-0 w-100">
                        <img src="/images/paginas-grande/{{$noticia->imagen_principal != 'no-imagen.jpg' ? $noticia->imagen_principal : 'familia.jpg' }}"
                            class="card-img-top  rounded-10" alt="{{$noticia->titulo}}">
                    </figure>
                    <div class="card-body">
                        <p
                            class="card-text my-1 border-bottom border-primary w-{{($loop->parent->index % 2 XOR $loop->index) ? '50':'75'}}">
                            {{ $noticia->pais }}</p>
                        <h2>{{$noticia->titulo}}</h2>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        @empty
        <div class="alert alert-warning mx-auto">
            SIN NOTICIAS
        </div>
        @endforelse
    </div>
</article>
@endif
