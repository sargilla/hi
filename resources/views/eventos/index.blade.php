@extends('plantilla::layout')
@section('main-content')
<article id="eventos" class="eventosIndex">
    <div class="container py-5">
        <h1 class="text-primary">
            Eventos
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-unset">
              <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
              <li class="breadcrumb-item active" aria-current="page">Eventos</li>
            </ol>
          </nav>
        <p class="mt-2">
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
</article>
<article id="eventosContenido" class="eventosIndex">
  <div class="container py-5 px-lg-3">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-4">
                <a href="">
                        <div class="card">
                                <figure class="figure m-0">
                                    <img src="/images/familia.jpg" class="card-img-top" alt="...">
                                </figure>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>
                                    <small class="">
                                        <button class="p-2 text-dark btn-calendario">
                                            <i class="far fa-calendar "></i>
                                            Agregar al calendario
                                        </button>
                                    </small>                     
                                </div>     
                                    <h2 class="mt-3">               
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
                <a href="">
                        <div class="card">
                                <figure class="figure m-0">
                                    <img src="/images/familia.jpg" class="card-img-top" alt="...">
                                </figure>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>
                                    <small class="">
                                        <button class="p-2 text-dark btn-calendario">
                                            <i class="far fa-calendar "></i>
                                            Agregar al calendario
                                        </button>
                                    </small>                     
                                </div>     
                                    <h2 class="mt-3">               
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
                <a href="">
                        <div class="card">
                                <figure class="figure m-0">
                                    <img src="/images/familia.jpg" class="card-img-top" alt="...">
                                </figure>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>
                                    <small class="">
                                        <button class="p-2 text-dark btn-calendario">
                                            <i class="far fa-calendar "></i>
                                            Agregar al calendario
                                        </button>
                                    </small>                     
                                </div>     
                                    <h2 class="mt-3">               
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