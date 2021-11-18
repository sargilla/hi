{{-- <article class="datos_impacto pt-5 pb-lg-5">
    <div class="text-center mb-5">
        <h2>{{$campos['titulo_principal'] }}</h2>
    </div>
    <div class="container-fluid">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 g-4">
            @foreach($campos['modulos'] as $key => $modulo)
            <div class="col mb-4">
                <a href="{{$modulo['link']}}" class="nav-link p-0 h-100" target="blank">
                    <div class="card h-100 bg-light">
                        <div class="card-body p-0">
                            <h3
                                class="rounded-top bg-primary text-white px-2 {{$key == 0 ? 'py-2' : 'py-3'}} mb-0 text-center">
                                {{$modulo['titulo']}}
                            </h3>
                            <p class="texto text-center my-3 mx-2">
                                {{$modulo['texto']}}
                            </p>
                            <div
                                class="d-flex flex-column justify-content-center align-items-center border-datos rounded-circle p-5 mb-2 mx-auto grow-1">
                                {{$modulo['porcentaje']}}
                            </div>
                            <p class="px-2 text-decoration-underline text-center mb-3">
                                {{$modulo['texto_link']}}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</article> --}}

<article class="datos_impacto pt-5 pb-lg-5">
    <div class="text-center mb-5">
        <h2>{!!$campos['titulo_principal'] !!}</h2>
    </div>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 g-4">
            @foreach($campos['modulos'] as $key => $modulo)
            <div class="col mb-4">
                <a href="{{$modulo['link'] ?? ''}}" class="nav-link p-0 h-100" target="blank"
                    aria-label="{{$modulo['link_description'] ?? ''}}">
                    <div class="card h-100" style="border:1px solid #1b74af;border-radius:.6rem;">
                        <div class="my-4">
                            <div
                                class="d-flex flex-column justify-content-center align-items-center border-datos rounded-circle p-5 mb-4 mx-auto grow-1 text-bold">
                                {{$modulo['porcentaje']}}
                            </div>
                            <p class="bg-primary text-white p-4 text-decoration-underline text-center mb-3 d-flex align-items-center"
                                style="min-height: 10rem">
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
