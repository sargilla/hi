@extends('plantilla::layout')
@section('main-content')
<article id="actualidadIndex">   
    <div class="container py-5">
          <h1 class="text-primary">
            Actualidad
        </h1>
        <small>
           <a href="" class="p-2 mr-1">Pagina Principal</a>  > 
            Actualidad
        </small>
        <p class="mt-2">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.
        </p>
        </div>      
    <div class="bg-primary">
      <div class="container py-5 px-5 px-sm-1">
          <p class="text-white">
            Desde aqui podras filtrar notas por paises y por fecha
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