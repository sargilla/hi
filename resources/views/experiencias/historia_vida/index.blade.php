@extends('plantilla::layout')
@section('main-content')
<article id="expHV" class="expIndexHV">   
    <div class="container py-5">
        <h1 class="text-primary">
            Historias de vida
        </h1>
        <nav aria-label="Usted esta en historia de vida">
            <ol class="breadcrumb bg-unset p-0">
              <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
              <li class="breadcrumb-item"><a href="#" class="p-2">Experiencias</a></li>
              <li class="breadcrumb-item active" aria-current="page">Historia de vida</li>
            </ol>
          </nav>
        <p class="mt-2">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.
        </p>
    </div>  
</article>
<article id="expHVFiltro" class="expIndexHV">   
    <div class="bg-primary">
      <div class="container  py-5 px-5 px-sm-1">
          <p class="text-white">
              Desde aqui podras filtrar notas por paises y por fecha
          </p>
          <form action="/experiencias/historia_vida/search" method="GET" class="form-inline mr-3">
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
<article id="expHVContenido" class="expIndexHV">
    <div class="container py-5 px-lg-3">
        <div class="row row-cols-2 row-cols-md-2">
          @foreach([1,2,3,4,5] as $v)
            <div class="col mb-4">           
                <div class="card">
                    <a href="/experiencias/historia_vida/show" class="nav-link p-0">
                          <figure class="figure m-0">
                            <img src="/images/familia.jpg" class="card-img-top rounded-10" alt="...">
                          </figure>                   
                          <div class="card-body">
                              <p class="card-text my-1">Pais</p>
                              <h2>Lorem ipsum</h2>
                          </div>
                    </a>
                </div>             
            </div>
            @endforeach
        </div>
    </div>
</article>
@endsection