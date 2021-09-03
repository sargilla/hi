<article id="actualidad"  class="pt-5 pb-lg-5">
    <h2 class="text-center mb-5">
        Actualidad
    </h2>
    <div class="container pb-5 pb-lg-0">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5" id="div-actualidad">
          @foreach([1,2,3,4,5] as $v)
          <div class="col mb-4">
            <a href="" class="nav-link p-0">
              <div class="card">            
                  <figure class="figure m-0">
                        <img src="/images/familia.jpg" class="card-img-top" alt="...">
                  </figure>               
                  <div class="card-body pt-0">
                      <p class="card-text my-1 border-bottom border-primary">Pais</p>
                      <h3>Lorem ipsum</h3>
                  </div>
              </div>
            </a> 
            </div>
          @endforeach
          </div>
        <div class="text-center mt-2 mt-lg-5">   
            <a href="" class="btn btn-purple px-5 ">
                Ver todas las notas
            </a>
        </div>
    </div>
</article>