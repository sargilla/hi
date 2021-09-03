@extends('plantilla::layout')
@section('main-content')
<article id="eventos" class="eventosShow">
    <div class="bg-primary py-5 text-white mt-1">
        <div class="container">
            <h1>
                Lorem Ipsum
            </h1>
            <span>
                Tema Nivel Sector
            </span>
         </div> 
    </div>
    <div class="py-3 px-5">
        <nav aria-label="Usted esta en eventos lorem ipsum">
            <ol class="breadcrumb bg-unset p-0">
              <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
              <li class="breadcrumb-item"><a href="#" class="p-2">Eventos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Lorem Ipsum</li>
            </ol>
          </nav>
     </div> 
</article>
<article id="eventosCalendario" class="eventosShow">
      <div class="py-3 px-5 ">            
                <div class="d-flex flex-wrap justify-content-between mt-3">
                    <p class="text-uppercase">
                        dia 2 de febrero, 16:00 horas
                    </p>
                    <p>
                        <a href="" class="p-2 text-dark text-decoration-none">
                            <i class="far fa-calendar "></i>
                            Agregar al calendario
                        </a>                 
                    </p>
                </div>
        </div>
</article>
<article id="eventosDescripcion" class="eventosShow">
    <div class="py-3 px-5 ">
            <div class="mt-5 mt-lg-0 col-md-8 col-lg-7 col-xl-6 p-0">
                <h2>
                    Descripcion General
                </h2>
                <h3>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis facilis molestiae provident voluptatem quibusdam sequi perspiciatis hic eum labore rerum!
                </h3>
            </div>
    </div>
</article>
<article id="eventosExpositores" class="eventosShow">
    <div class="py-3 px-5 mb-5"> 
                <div id="expositores" class="mt-5 px-3 px-md-0">
                        <h2>
                            Expositores
                        </h2>
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="">                                
                                        <figure >
                                            <img width="150px" height="150px" class="rounded-circle" src="/images/familia.jpg" alt="">
                                        </figure>
                                </div>
                            <div class="ml-3">
                                <p>
                                    Lorem Ipsum
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="">                             
                                    <figure >
                                        <img width="150px" height="150px" class="rounded-circle" src="/images/familia.jpg" alt="">
                                    </figure>
                                                     
                            </div>
                            <div class="ml-3">
                                <p>
                                    Lorem Ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                        <a href="" class="btn btn-purple px-4 mt-4">Inscribirse</a>
                </div>
        </div>
</article>
@endsection