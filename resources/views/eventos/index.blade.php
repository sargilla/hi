@extends('plantilla::layout')
@section('main-content')
<article id="eventos" class="eventosIndex">
    <div class="container py-5">
        <h1 class="text-primary">
            Eventos
        </h1>
        <nav aria-label="Usted esta en eventos">
            <ol class="breadcrumb bg-unset p-0">
              <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
              <li class="breadcrumb-item active" aria-current="page">Eventos</li>
            </ol>
          </nav>
        <p class="mt-2 fs-1-2">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.
        </p>
    </div> 
</article>
<article id="eventosFiltros" class="eventosIndex">
    <div class="bg-primary">
        <div class="container py-5 px-5 px-sm-1">
            <p class="text-white">
                Desde aqui podras filtrar eventos por paises y por fecha
            </p>
            <form action="/eventos/search" method="GET" class="form-inline mr-3">
                @csrf 
                <div class="div-group  col-md-4 col-lg-3">
                    <label for="fechas" class="text-white justify-content-start ">Fechas</label>
                    <select name="fechas" id="" class="form-control mb-3 mr-3 mb-md-0 w-100">
                      <option value="">Todas las fechas</option>
                  </select>
                  </div>
                  <div class="div-group  col-md-4 col-lg-3">
                    <label for="fechas" class="text-white  justify-content-start ">Paises</label>
                      <select name="paises" id="" class="form-control mb-3 mr-3 mb-md-0 w-100">
                        <option value="paises">Todas los paises</option>
                    </select>
                  </div>
                  <div class="div-group  col-md-4 col-lg-3">
                    <label for="tematicas" class="text-white  justify-content-start ">Tematicas</label>
                      <select name="tematicas" id="" class="form-control mb-3 mr-3 mb-md-0 w-100">
                        <option value="">Tematicas</option>
                    </select>
                  </div>
                  <div class="col-12 col-lg-3 mt-md-4">
                    <button class="mb-3 mb-md-0 btn btn-purple my-auto col-6 col-sm-4 col-md-3 col-lg-8" type="submit">Filtrar</button>
                  </div>       
            </form>
        </div>
    </div> 
</article>
<article id="eventosContenido" class="eventosIndex">
  <div class="container py-5 px-lg-3">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-4">
                <a href="/eventos/show">
                        <div class="card">
                                <figure class="figure m-0">
                                    <img src="/images/familia.jpg" class="card-img-top" alt="...">
                                </figure>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>              
                                </div>     
                                    <h2 class="mt-3 text-decoration-underline">               
                                        Lorem ipsum dolor sit amet consectetur adipisicing                
                                </h2>
                                <div class="p-3 d-flex justify-content-between align-items-center">
                                    <p class="my-auto">
                                        Tema - Nivel - Sector
                                    </p>
                                    <button href="" class="btn btn-purple px-4">Inscribirse</button>
                                </div>                 
                            </div>
                        </div>
                </a>
            </div>
            <div class="col mb-4">
                <a href="/eventos/show">
                        <div class="card">
                                <figure class="figure m-0">
                                    <img src="/images/familia.jpg" class="card-img-top" alt="...">
                                </figure>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>                
                                </div>     
                                    <h2 class="mt-3 text-decoration-underline">               
                                        Lorem ipsum dolor sit amet consectetur adipisicing                
                                </h2>
                                <div class="p-3 d-flex justify-content-between align-items-center">
                                    <p class="my-auto">
                                        Tema - Nivel - Sector
                                    </p>
                                    <button href="" class="btn btn-purple px-4">Inscribirse</button>
                                </div>                 
                            </div>
                        </div>
                </a>
            </div>
            <div class="col mb-4">
                <a href="/eventos/show">
                        <div class="card">
                                <figure class="figure m-0">
                                    <img src="/images/familia.jpg" class="card-img-top" alt="...">
                                </figure>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>                 
                                </div>     
                                    <h2 class="mt-3 text-decoration-underline">               
                                        Lorem ipsum dolor sit amet consectetur adipisicing                
                                </h2>
                                <div class="p-3 d-flex justify-content-between align-items-center">
                                    <p class="my-auto">
                                        Tema - Nivel - Sector
                                    </p>
                                    <button href="" class="btn btn-purple px-4">Inscribirse</button>
                                </div>                 
                            </div>
                        </div>
                </a>
            </div>
        </div>
    </div>
</article>
@endsection