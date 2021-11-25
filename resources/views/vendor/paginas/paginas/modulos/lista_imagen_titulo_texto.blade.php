@if($campos['estilo'] == 1)
<article class="lista-imagen-titulo-texto-1">
    <div class="container py-5">
        <div id="practicas">
            <ul>
                @foreach($campos['modulos'] as $key=> $modulo)

                <li>
                    <div class="row mb-3 py-3">
                        <div class="col-12 col-md-4 col-lg-3">
                            <figure class="figure mb-0">
                                <img src="/images/paginas-grande/{{isset($modulo['imagen']) ? $modulo['imagen'] : 'familia.jpg'}}"
                                    class="figure-img img-fluid w-100 rounded-10 mb-0"
                                    alt="{{ $modulo['alt_image'] ?? ''}}">
                            </figure>
                        </div>
                        <div class="col-12 col-md-8 col-lg-9 py-3">
                            <h3>{{$key + 1}} - {{isset($modulo['titulo']) ? $modulo['titulo'] : 'Titulo Vacio'}}
                            </h3>
                            <p>
                                @if(isset($modulo['texto']))
                                {{$modulo['texto']}}
                                @else
                                Texto Vacio
                                @endif
                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
</article>
@else
@endif