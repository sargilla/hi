<article class="titulo-texto-imagen">
    <div class="container mt-3 py-2">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-4">                   
                    <figure class="figure mb-0 w-100">
                        <img class="img-fluid mb-0 w-100 rounded-10" src="/images/paginas-grande/{{ isset($campos['imagen']) ? $campos['imagen'] : 'familia.jpg' }}" alt="">
                    </figure>                          
                </div>
                <div class="col-12 col-md-6 col-xl-8 mt-4 mt-md-0">
                    <h2 class="titulo">
                        {{isset($campos['titulo']) ? $campos['titulo'] : 'Titulo Vacio'}}
                    </h2>
                    @if(isset($campos['texto']))
                        {!! $campos['texto'] !!}
                    @else 
                        <p>
                            Texto Vacio
                        </p>
                    @endif
                </div>
            </div> 
    </div>
</article>
