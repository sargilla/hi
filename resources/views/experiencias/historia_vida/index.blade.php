@extends('plantilla::layout')
@section('main-content')
<article id="expHV" class="expIndexHV">   
    <div class="container py-5">
        <h1 class="text-primary">
            Historias de vida
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-unset p-0">
              <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
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
          <form action="" method="GET" class="form-inline mr-3">
              @csrf 
              <div class="div-group">
                <label for="fechas" class="text-white justify-content-start ">Todas las fechas</label>
                <select name="fechas" id="" class="form-control mb-3 mr-3 mb-md-0">
                  <option value="">Fechas</option>
              </select>
              </div>
              <div class="div-group">
                <label for="fechas" class="text-white  justify-content-start ">Todas los paises</label>
                  <select name="paises" id="" class="form-control mb-3 mr-3 mb-md-0">
                    <option value="paises">Paises</option>
                </select>
              </div>
              <div class="div-group">
                <label for="tematicas" class="text-white  justify-content-start ">Tematicas</label>
                  <select name="tematicas" id="" class="form-control mb-3 mr-3 mb-md-0">
                    <option value="">Tematicas</option>
                </select>
              </div>
                <button class="mb-3 mb-md-0 btn btn-purple px-5 my-auto" type="submit">Filtrar</button>
          </form>
      </div>
    </div>
</article>
<article id="expHVContenido" class="expIndexHV">
    <div class="container py-5 px-lg-3">
        <div class="row row-cols-2 row-cols-md-3">
            <div class="col mb-4">           
                <div class="card">
                    <a href="">
                          <figure class="figure m-0">
                            <img src="/images/familia.jpg" class="card-img-top" alt="...">
                          </figure>                   
                          <div class="card-body">
                              <p class="card-text my-1">Pais</p>
                              <h2>Lorem ipsum</h2>
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
                                <p class="card-text my-1">Pais</p>
                                <h2>Lorem ipsum</h2>
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
                                <p class="card-text my-1">Pais</p>
                                <h2>Lorem ipsum</h2>
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
                                <p class="card-text my-1">Pais</p>
                                <h2>Lorem ipsum</h2>
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
                                <p class="card-text my-1">Pais</p>
                                <h2>Lorem ipsum</h2>
                            </div>
                      </a>
                  </div>             
              </div>
          </div>
    </div>
</article>
@endsection