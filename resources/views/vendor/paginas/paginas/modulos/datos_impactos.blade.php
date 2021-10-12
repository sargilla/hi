<article class="datos_impacto pt-5 pb-lg-5">
    <div class="text-center mb-5">
        <h2>{{$campos['titulo_principal'] }}</h2>
    </div>
    <div class="container-fluid">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 g-4">
            @foreach($campos['modulos'] as $key => $modulo)
            <div class="col mb-4">
                <a href="{{$modulo['link']}}" class="nav-link p-0 h-100">
                    <div class="card h-100 bg-light">
                        <div class="card-body p-0">
                            <h3
                                class="rounded-top bg-primary text-white px-2 {{$key == 0 ? 'py-2' : 'py-3'}} mb-0 text-center">
                                {{$modulo['titulo']}}
                            </h3>
                            <p class="text-center mt-3">
                                {{$modulo['texto']}}
                            </p>
                            <div
                                class="d-flex flex-column justify-content-center align-items-center border-datos rounded-circle p-5 mb-2 mx-auto">
                                {{$modulo['porcentaje']}}
                            </div>
                            <p class="px-2 text-decoration-underline text-center mb-5">
                                {{$modulo['texto_link']}}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</article>
