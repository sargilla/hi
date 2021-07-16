<div class="title text-center pt-5">
    <h2>{{ $modulo['nombre']}}</h2>
</div>
<div class="container mb-5">
    <div class="row">
        @foreach ($campos['imagenes'] as $item)
        <div class="col-md-4">`
            <div class="card card-background" style="background-image: url('/images/thumbnoticia/{{ $item['imagen'] }}')">
                <div class="card-body d-flex flex-column justify-content-around">
                    <a href="{{ $item['link'] }}">
                    <h3 class="card-title">{{ $item['titulo'] }}</h3>
                    </a>
                    <p class="card-description">
                        {{ $item['texto_frontal'] }}
                    </p>
                    <a href="{{ $item['link'] }}" class="btn btn-white btn-link">
                    <i class="material-icons">subject</i> Saber Más
                    <div class="ripple-container"></div></a>

                </div>
            </div>
            {{-- <div class="rotating-card-container">
                <div class="card card-rotate card-background">
                    <div class="front front-background" style="background-image: url('/images/thumbnoticia/{{ $item['imagen'] }}');">
                        <div class="card-body card-body-centered">
                            <a href="#">
                                <h3 class="card-title">{{ $item['titulo'] }}</h3>
                            </a>
                            <p class="card-description">{{ $item['texto_frontal'] }}</p>
                        </div>
                    </div>
                    <div class="back back-background" style="background-image: url('/images/thumbnoticia/{{ $item['imagen'] }}');">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['titulo_atras'] }}</h5>
                            <p class="card-description">{{ $item['texto_reverso'] }}</p>
                            <div class="footer text-center">
                                <a href="{{ $item['link'] }}" class="btn btn-info btn-just-icon btn-fill btn-round">
                                    <i class="material-icons">add_circle</i>
                                </a>
                                <a href="/turnos-escolares" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd">
                                    <i class="material-icons">school</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        @endforeach
    </div>
</div>
