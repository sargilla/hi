@extends('plantilla::layout')
@section('main-content')
 <article id="actualidadSearch" class="actualidadSearch">
     <h1 class="p-5 text-center bg-primary text-white text-center">
         Resultado de busqueda
     </h1>
     <div class="container py-5 py-lg-3">    
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-unset p-0">
                <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
                <li class="breadcrumb-item"><a href="#" class="p-2">Actualidad</a></li>
                <li class="breadcrumb-item active" aria-current="page">Resultado de busqueda</li>
            </ol>
        </nav>
     </div>
 </article>
 <article id="actualidadSearchContenido" class="actualidadSearch">
     <div class="container py-5 py-lg-3">      
         <ul>  
        <li>   
        <a href="">
            <div class="row mb-3 border py-5">
                <div class="col-6 col-md-4 col-lg-3">
                        <figure class="figure mb-0">
                            <img src="/images/familia.jpg" class="figure-img img-fluid w-100 rounded mb-0" alt="...">
                        </figure>             
                </div>
                <div class="col-6 col-md-8 col-lg-9 py-3">
                    <p class="col-md-6 p-0">Pais</p>
                    <h2>Titulo de la nota</h6>
                </div>
            </div>
        </a>
        </li>
        </li>
        <a href="">
            <div class="row mb-3 border py-5">
                <div class="col-6 col-md-4 col-lg-3">
                        <figure class="figure mb-0">
                            <img src="/images/familia.jpg" class="figure-img img-fluid w-100 rounded mb-0" alt="...">
                        </figure>             
                </div>
                <div class="col-6 col-md-8 col-lg-9 py-3">
                    <p class="col-md-6 p-0">Pais</p>
                    <h2>Titulo de la nota</h2>
                </div>
            </div>
        </a>
        </li>
        <li>
        <a href="">
            <div class="row mb-3 border py-5">
                <div class="col-6 col-md-4 col-lg-3">
                        <figure class="figure mb-0">
                            <img src="/images/familia.jpg" class="figure-img img-fluid w-100 rounded mb-0" alt="...">
                        </figure>             
                </div>
                <div class="col-6 col-md-8 col-lg-9 py-3">
                    <p class="col-md-6 p-0">Pais</p>
                    <h2>Titulo de la nota</h2>
                </div>
            </div>
        </a>
        </li>
        </ul>
     </div>
     
 </article>
@endsection