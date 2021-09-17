<article class="titulo_texto_link">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <h2>
                   {{isset($campos['titulo']) ? $campos['titulo'] : 'Titulo vacio' }}
                </h2>
                @if(isset($campos['texto']))
                 {!! $campos['texto']!!}
                @endif
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="{{isset($campos['link']) ? $campos['link'] : '#'}}" class="btn btn-purple px-4">{{isset($campos['texto_link']) ? $campos['texto_link'] : 'Texto Vacio'}}</a>
            </div>
        </div>       
    </div>
 </article>