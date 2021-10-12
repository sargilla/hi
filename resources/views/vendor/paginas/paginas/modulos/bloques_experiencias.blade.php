<article class="bloques bloques_experiencias">
    <div class="container py-5 p-lg-3">
        <div class="row row-cols-1 row-cols-sm-2 g-4">
            @foreach($campos['modulos'] as $modulo)
            <div class="col mb-4">
                <a href="{{$modulo['link']}}" class="nav-link p-0 d-inline">
                    <div class="card h-100 h-100">
                        <figure class="figure m-0 h-60">
                            <img src="/images/paginas-grande/{{ $modulo['imagen'] }}" class="card-img-top h-100" alt="">
                        </figure>
                        <div class="card-body">
                            <h2>
                                {{$modulo['titulo']}}
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</article>
