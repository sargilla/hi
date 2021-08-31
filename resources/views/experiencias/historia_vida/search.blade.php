@extends('plantilla::layout')
@section('main-content')
 <article id="expSearchHV" class="expSearchHV">
     <div class="bg-primary text-white mb-0 p-3 p-lg-5">
         <div class="container">
            <h1>
                Diagnósticos comunitarios inclusivos
            </h1>
         </div>
    </div>  
     <div class="bg-white p-3 px-lg-5">
         <div class="container">
            <nav aria-label="Usted esta en diagnosticos comunitarios inclusivos">
                <ol class="breadcrumb bg-unset p-0">
                  <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
                  <li class="breadcrumb-item"><a href="#" class="p-2">Experiencias</a></li>
                  <li class="breadcrumb-item"><a href="#" class="p-2">Historia de vida</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Diagnósticos comunitarios inclusivos</li>
                </ol>
            </nav>
         </div>     
    </div> 
 </article>
 <article id="expSearchHVFiltro" class="expSearchHV">
    <div>
        <div class="bg-primary p-3 p-md-4 p-lg-5">
            <div class="container">
            <p class="text-white">
                Busqueda por pais
            </p>
            <form action="" method="GET" class="form-inline mr-3">
                @csrf 
                  <div class="div-group">
                    <label for="fechas" class="text-white  justify-content-start ">Todos los paises</label>
                      <select name="paises" id="" class="form-control mb-3 mr-3 mb-md-0">
                        <option value="paises">Todos los paises</option>
                    </select>
                </div>
                    <button class="mb-3 mb-md-0 btn btn-purple px-5 my-auto" type="submit">Filtrar</button>
            </form>
            </div>
        </div>
    </div>
</article>
<article id="expSearchHVDD" class="expSearchHV">
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
                <h3 class="mt-4">
                    <a href="" class="text-white p-2">
                        Titulo de la nota
                    </a>
                </h3>
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
                <h3 class="mt-4">
                    <a href="" class="text-white p-2">
                        Titulo de la nota
                    </a>
                </h3>
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
                <h3 class="mt-4">
                    <a href="" class="text-white p-2">
                        Titulo de la nota
                    </a>
                </h3>
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