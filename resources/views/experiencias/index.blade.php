@extends('plantilla::layout')
@section('main-content')
<article id="exp" class="expIndex">          
    <div class="container py-5 p-lg-3 mt-lg-5">
      <div class="mb-4">
        <h1 class="text-primary">
            Experiencias
        </h1>
        <nav aria-label="Usted esta en experiencias">
          <ol class="breadcrumb bg-unset">
            <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
            <li class="breadcrumb-item active" aria-current="page">Experiencias</li>
          </ol>
        </nav>
      </div>
    </div>
</article>
<article  id="expContenido" class="expIndex">
  <div class="container py-5 p-lg-3">
        <div class="row row-cols-2 row-cols-md-3">
            <div class="col mb-4">     
                <div class="card">
                  <a href="">
                        <figure class="figure m-0">
                          <img src="/images/familia.jpg" class="card-img-top" alt="...">
                        </figure>                        
                      <div class="card-body">
                          <h2>
                             Practicas inclusivas del riesgo de desastre
                          </h2>
                      </div>
                   </a>  
                </div>     
            </div> 
            <div class="col mb-4">     
                <div class="card">
                  <a href="">
                        <figure class="figure m-0">
                          <img src="/images/familia.jpg" class="card-img-top" alt="...">
                        </figure>                        
                      <div class="card-body">
                          <h2>
                             Historias de vida
                          </h2>
                      </div>
                  </a>  
                </div>     
            </div> 
            <div class="col mb-4">     
                  <div class="card">
                    <a href="">
                          <figure class="figure m-0">
                            <img src="/images/familia.jpg" class="card-img-top" alt="...">
                          </figure>                        
                        <div class="card-body">
                            <h2>
                               Diagnosticos comunitarios inclusivos por paises
                            </h2>
                        </div>
                    </a>  
                  </div>     
            </div> 
            <div class="col mb-4">     
                <div class="card">
                  <a href="">
                        <figure class="figure m-0">
                          <img src="/images/familia.jpg" class="card-img-top" alt="...">
                        </figure>                        
                      <div class="card-body">
                          <h2>
                             Evidencias covid x3
                          </h2>
                      </div>
                  </a>  
                </div>     
            </div>
      </div>
    </div>
</article>
@endsection