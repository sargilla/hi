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
        <div class="row row-cols-1 row-cols-sm-2 g-4">
            <div class="col mb-4">
              <a href="">     
                <div class="card h-100 h-100">             
                        <figure class="figure m-0">
                          <img src="/images/familia.jpg" class="card-img-top" alt="...">
                        </figure>                        
                      <div class="card-body">
                          <h2>
                             Practicas inclusivas del riesgo de desastre
                          </h2>
                      </div>                 
                </div>  
              </a>     
            </div> 
            <div class="col mb-4">
              <a href="">     
                <div class="card h-100">          
                        <figure class="figure m-0">
                          <img src="/images/familia.jpg" class="card-img-top" alt="...">
                        </figure>                        
                      <div class="card-body">
                          <h2>
                             Historias de vida
                          </h2>
                      </div>                   
                </div>
              </a>     
            </div> 
            <div class="col mb-4">  
              <a href="">   
                  <div class="card h-100">                  
                          <figure class="figure m-0">
                            <img src="/images/familia.jpg" class="card-img-top" alt="...">
                          </figure>                        
                        <div class="card-body">
                            <h2>
                               Diagnosticos comunitarios inclusivos por paises
                            </h2>
                        </div>           
                  </div> 
                </a>      
            </div> 
            <div class="col mb-4">   
              <a href="">  
                <div class="card h-100">
                 
                        <figure class="figure m-0">
                          <img src="/images/familia.jpg" class="card-img-top" alt="...">
                        </figure>                        
                      <div class="card-body">
                          <h2>
                             Evidencias covid x3
                          </h2>
                      </div>          
                </div>  
              </a>     
            </div>
      </div>
    </div>
</article>
@endsection