@if ($campos['columnas'] == 1)
@foreach (collect($campos['modulos']) as $modulo)
<div class="widget clearfix ">
    <div class="feature-box fbox-border fbox-effect bg-primary text-white shadow">
        <h3>{{ $modulo['titulo'] }}</h3>
        <div class="fbox-icon">
            <a class="text-white" href="#"><i class="{{ $modulo['icono'] }} i-alt"></i></a>
            <p>{{ $modulo['texto'] }}</p>
        </div>
    </div>
</div>

@endforeach
@else
<article class="bloques">
    <div class="bg-light">
        <div class="container py-5 {{$campos['color'] == 'Negro' ? 'bloque-texto-dark' : ''}}">
            <h2>
                {{$campos['titulo']}}
            </h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-{{$campos['columnas']}} mt-4 text-center">
                @foreach($campos['modulos'] as $modulo)        
                <div class="col mb-4">  
                    <div class="card bg-light border-0">           
                        <a href="{{isset($modulo['link']) ? $modulo['link'] : '#'}}" class="nav-link p-0">                 
                                <figure class="figure m-0">
                                    <img src="/images/paginas-grande/{{ $modulo['imagen'] }}" class="card-img-top rounded-10" alt="...">
                                </figure>                             
                            <div class="card-body mt-2">
                                <h5>
                                    {{$modulo['texto']}}
                                </h5>                
                            </div>
                        </a>
                    </div>                
                </div>
                @endforeach
            </div>
        </div>
    </div>
 </article>
@endif

