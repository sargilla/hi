@extends('plantilla::layout')
@section('main-content')
<article id="actualidadTitulo" class="actualidadIndex">   
    <div class="container py-5">
          <h1 class="text-primary">
            Actualidad
        </h1>
        <nav aria-label="Usted esta en Actualidad">
          <ol class="breadcrumb bg-unset p-0">
            <li class="breadcrumb-item"><a href="/" class="p-2">Pagina Principal</a></li>
            <li class="breadcrumb-item active" aria-current="page">Actualidad</li>
          </ol>
        </nav>
        <p class="mt-2 fs-1-2 ">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.
        </p>
      </div> 
</article>    
<article id="actualidadFiltro" class="actualidadIndex">
  <div class="bg-primary">
      <div class="container py-5 px-5 px-sm-1">
          <p class="text-white">
            Desde aqui podras filtrar notas por paises y por fecha
        </p>
        <form action="/actualidad/search" method="GET" class="form-inline mr-3 align-items-center">
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
<article id="actualidadContentido" class="actualidadIndex">
    <div class="container py-5 px-lg-3">
      <div class="row">
        <div class="col-sm-7 col-md-7 mb-4">
              <a href="/actualidad/show">
                  <figure class="figure m-0 w-100">
                    <img src="/images/familia.jpg" class="card-img-top  rounded-10" alt="...">
                  </figure>         
                  <div class="card-body">
                      <p class="card-text my-1 border-bottom border-primary w-50">Pais</p>
                      <h2>Lorem ipsum</h2>
                  </div>
              </a>  
        </div>
        <div class="col-sm-5 col-md-5 mb-4">
              <a href="/actualidad/show">
                  <figure class="figure m-0 w-100">
                    <img src="/images/familia_2.jpg" class="card-img-top  rounded-10" alt="...">
                  </figure>         
                  <div class="card-body">
                      <p class="card-text my-1 border-bottom border-primary w-75">Pais</p>
                      <h2>Lorem ipsum</h2>
                  </div>
              </a>  
        </div>
        <div class="col-sm-5 col-md-5 mb-4">    
              <a href="/actualidad/show">
                  <figure class="figure m-0 w-100">
                    <img src="/images/familia_2.jpg" class="card-img-top  rounded-10" alt="...">
                  </figure>         
                  <div class="card-body">
                      <p class="card-text my-1 border-bottom border-primary w-75">Pais</p>
                      <h2>Lorem ipsum</h2>
                  </div>
              </a>  
          </div>
        <div class="col-sm-7 col-md-7 mb-4">      
              <a href="/actualidad/show">
                  <figure class="figure m-0 w-100">
                    <img src="/images/familia.jpg" class="card-img-top  rounded-10" alt="...">
                  </figure>         
                  <div class="card-body">
                      <p class="card-text my-1 border-bottom border-primary w-50">Pais</p>
                      <h2>Lorem ipsum</h2>
                  </div>
              </a>  
        </div>
      </div>
    </div>
</article>
@endsection