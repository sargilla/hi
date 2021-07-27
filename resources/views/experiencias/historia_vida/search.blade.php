@extends('plantilla::layout')
@section('main-content')
 <article id="expSearchHV">
     <div class="bg-primary text-white mb-0 p-3 p-lg-5">
         <div class="container">
            <h1>
                Diagnósticos comunitarios inclusivos
            </h1>
         </div>
    </div>  
     <div class="bg-white p-3 px-lg-5">
         <div class="container">
            <small class="text-dark">
                Principal principal > Experiencias > <a href="" class="p-2">Diagnósticos comunitarios inclusivos</a>
            </small>
         </div>     
    </div> 
    <div>
        <div class="bg-primary p-3 p-md-4 p-lg-5">
            <div class="container">
            <p class="text-white">
                Busqueda por pais
            </p>
            <form action="" method="GET" class="form-inline mr-3">
                @csrf 
                <select name="" id="" class="form-control mb-3 mr-3 mb-md-0">
                    <option value="">Todas los paises</option>
                </select>
                <button class="mb-3 mb-md-0 btn btn-purple px-5" type="submit">Filtrar</button>
            </form>
            </div>
        </div>
    </div>
     <div class="container py-5" id="expRes">  
         <h2 class="text-center">
            Documentos de diagnósticos     
        </h2>                 
        <div class="row mb-3 border py-5">
            <div class="col-12 col-md-4 col-lg-3">
                <a href="">
                    <figure class="figure mb-0">
                        <img src="/images/familia.jpg" class="figure-img img-fluid w-100 rounded mb-0" alt="...">
                      </figure>
                </a>              
            </div>
            <div class="col-12 col-md-8 col-lg-9 py-3">
                <p class="col-md-6 p-0">Pais</p>
                <h3>Titulo de la nota</h3>
                <p class="mt-3">
                    <a href="" class="text-white p-2">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Descargar el documento
                    </a>            
                </p>
            </div>
        </div>
        <div class="row mb-3 border py-5">
            <div class="col-12 col-md-4 col-lg-3">
                <a href="">
                    <figure class="figure mb-0">
                        <img src="/images/familia.jpg" class="figure-img img-fluid w-100 rounded mb-0" alt="...">
                      </figure>
                </a>              
            </div>
            <div class="col-12 col-md-8 col-lg-9 py-3">
                <p class="col-md-6 p-0">Pais</p>
                <h3>Titulo de la nota</h3>
                <p class="mt-3">
                    <a href="" class="text-white p-2">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Descargar el documento
                    </a>            
                </p>
            </div>
        </div>
        <div class="row mb-3 border py-5">
            <div class="col-12 col-md-4 col-lg-3">
                <a href="">
                    <figure class="figure mb-0">
                        <img src="/images/familia.jpg" class="figure-img img-fluid w-100 rounded mb-0" alt="...">
                      </figure>
                </a>              
            </div>
            <div class="col-12 col-md-8 col-lg-9 py-3">
                <p class="col-md-6 p-0">Pais</p>
                <h3>Titulo de la nota</h3>
                <p class="mt-3">
                    <a href="" class="text-white p-2">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Descargar el documento
                    </a>            
                </p>
            </div>
        </div>
     </div>
 </article>
@endsection