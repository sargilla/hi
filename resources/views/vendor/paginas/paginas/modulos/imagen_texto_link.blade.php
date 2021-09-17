<article class="recursosIndex">
    <div class="container mb-5">          
            <div class="row mt-5">
                <div class="col-12 col-sm-6">                
                        <figure class="figure mb-0">
                            <img class="img-fluid mb-0 rounded-10" src="/images/paginas-grande/{{ $campos['imagen'] }}" alt="">
                        </figure>             
                </div>
                <div class="col-12 col-sm-6">
                    @if(isset($campos['texto']))
                    {!! $campos['texto']!!}
                    @endif             
                    <p>
                        DESCARGAR PDF:<a class="btn btn-purple px-5" href="{{isset($campos['link']) ? $campos['link'] : '#'}}" title="{{isset($campos['texto_link']) ? $campos['texto_link'] : 'Falta escribir el texto'}}" aria-label="descargar guia en pdf abre en una nueva ventana" target="_blank">{{isset($campos['texto_link']) ? $campos['texto_link'] : 'Falta escribir el texto'}}</a>
                    </p>
                </div>
            </div>
    </div>
 </article>