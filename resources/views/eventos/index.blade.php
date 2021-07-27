@extends('plantilla::layout')
@section('main-content')
<article id="eventosIndex">
    <div class="container py-5">
        <h1 class="text-primary">
            Eventos
        </h1>
        <small>
            Pagina Principal
            <a href="" class="p-2">Eventos</a>
        </small>
        <p class="mt-2">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.
        </p>
    </div> 
    <div class="bg-primary">
        <div class="container py-5 px-5 px-sm-1">
            <p class="text-white">
                Desde aqui podras filtrar eventos por paises y por fecha
            </p>
            <form action="" method="GET" class="form-inline mr-3">
                @csrf 
                <select name="" id="" class="form-control mb-3 mr-3 mb-md-0">
                    <option value="">Todas las fechas</option>
                </select>
                <select name="" id="" class="form-control mb-3 mr-3 mb-md-0">
                    <option value="">Todas los paises</option>
                </select>
                <select name="" id="" class="form-control mb-3 mr-3 mb-md-0">
                    <option value="">Tematicas</option>
                </select>
                <button class="mb-3 mb-md-0 btn btn-purple px-5" type="submit">Filtrar</button>
            </form>
        </div>
    </div> 
    <div class="container py-5 px-lg-3">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-4">
              <div class="card">
                  <a href="">
                      <figure class="figure m-0">
                        <img src="/images/familia.jpg" class="card-img-top" alt="...">
                      </figure>
                  </a>       
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>
                         <small class="">
                            <a href="" class="p-2 text-dark text-decoration-none">
                                <i class="far fa-calendar "></i>
                                Agregar al calendario
                            </a>
                         </small>
                        
                    </div>     
                        <h5 class="mt-3">
                            <a href="" class="p-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                        </a>                 
                       </h5>
                    <div class="p-3 d-flex justify-content-between align-items-center">
                        <p class="my-auto">
                            Tema - Nivel - Sector
                        </p>
                        <a href="" class="btn btn-purple px-4">Inscribirse</a>
                    </div>
                   
                </div>
              </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <a href="">
                        <figure class="figure m-0">
                          <img src="/images/familia.jpg" class="card-img-top" alt="...">
                        </figure>
                    </a>       
                  <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                          <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>
                          <small class="">
                            <a href="" class="p-2 text-dark text-decoration-none">
                                <i class="far fa-calendar "></i>
                                Agregar al calendario
                            </a>
                         </small>
                          
                      </div>     
                          <h5 class="mt-3">
                              <a href="" class="p-2">
                              Lorem ipsum dolor sit amet consectetur adipisicing
                          </a>                 
                         </h5>
                      <div class="p-3 d-flex justify-content-between align-items-center">
                          <p class="my-auto">
                              Tema - Nivel - Sector
                          </p>
                          <a href="" class="btn btn-purple px-4">Inscribirse</a>
                      </div>
                     
                  </div>
                </div>
              </div>
              <div class="col mb-4">
                <div class="card">
                    <a href="">
                        <figure class="figure m-0">
                          <img src="/images/familia.jpg" class="card-img-top" alt="...">
                        </figure>
                    </a>       
                  <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                          <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>
                          <small class="">
                            <a href="" class="p-2 text-dark text-decoration-none">
                                <i class="far fa-calendar "></i>
                                Agregar al calendario
                            </a>
                         </small>
                          
                      </div>     
                          <h5 class="mt-3">
                              <a href="" class="p-2">
                              Lorem ipsum dolor sit amet consectetur adipisicing
                          </a>                 
                         </h5>
                      <div class="p-3 d-flex justify-content-between align-items-center">
                          <p class="my-auto">
                              Tema - Nivel - Sector
                          </p>
                          <a href="" class="btn btn-purple px-4">Inscribirse</a>
                      </div>
                     
                  </div>
                </div>
              </div>
              <div class="col mb-4">
                <div class="card">
                    <a href="">
                        <figure class="figure m-0">
                          <img src="/images/familia.jpg" class="card-img-top" alt="...">
                        </figure>
                    </a>       
                  <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                          <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>
                          <small class="">
                            <a href="" class="p-2 text-dark text-decoration-none">
                                <i class="far fa-calendar "></i>
                                Agregar al calendario
                            </a>
                         </small>
                          
                      </div>     
                          <h5 class="mt-3">
                              <a href="" class="p-2">
                              Lorem ipsum dolor sit amet consectetur adipisicing
                          </a>                 
                         </h5>
                      <div class="p-3 d-flex justify-content-between align-items-center">
                          <p class="my-auto">
                              Tema - Nivel - Sector
                          </p>
                          <a href="" class="btn btn-purple px-4">Inscribirse</a>
                      </div>
                     
                  </div>
                </div>
              </div>
              <div class="col mb-4">
                <div class="card">
                    <a href="">
                        <figure class="figure m-0">
                          <img src="/images/familia.jpg" class="card-img-top" alt="...">
                        </figure>
                    </a>       
                  <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                          <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>
                          <small class="">
                            <a href="" class="p-2 text-dark text-decoration-none">
                                <i class="far fa-calendar "></i>
                                Agregar al calendario
                            </a>
                         </small>
                          
                      </div>     
                          <h5 class="mt-3">
                              <a href="" class="p-2">
                              Lorem ipsum dolor sit amet consectetur adipisicing
                          </a>                 
                         </h5>
                      <div class="p-3 d-flex justify-content-between align-items-center">
                          <p class="my-auto">
                              Tema - Nivel - Sector
                          </p>
                          <a href="" class="btn btn-purple px-4">Inscribirse</a>
                      </div>
                     
                  </div>
                </div>
              </div>
        </div>
    </div>
</article>
@endsection