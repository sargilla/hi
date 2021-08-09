@extends('plantilla::layout')
@section('main-content')
<article id="eventosShow">
    <div class="p-5 bg-primary text-white">
        <div class="container">
            <h1>
                Lorem Ipsum
            </h1>
            <span>
                Tema Nivel Sector
            </span>
         </div>  
    </div>
      <div class="p-3 p-md-5" >
          <div class="p-md-5">
                <small>
                   <a href="" class="p-2 mr-1">Pagina Principal</a>  > 
                   <a href="" class="p-2 mr-1">  Eventos</a>
                   Lorem Ipsum
                </small>
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
                <div class="mt-5 col-md-8 col-lg-7 col-xl-6 p-0">
                    <h2>
                        Descripcion General
                    </h2>
                    <h3>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis facilis molestiae provident voluptatem quibusdam sequi perspiciatis hic eum labore rerum!
                    </h3>
                </div>
                <div id="expositores" class="mt-5 px-3 px-md-0">
                        <h2>
                            Expositores
                        </h2>
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <a href="">
                                        <figure >
                                            <img width="150px" height="150px" class="rounded-circle" src="/images/familia.jpg" alt="">
                                        </figure>
                                    </a>
                                </div>
                            <div class="ml-3">
                                <p>
                                    Lorem Ipsum
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="">
                                <a href="">
                                    <figure >
                                        <img width="150px" height="150px" class="rounded-circle" src="/images/familia.jpg" alt="">
                                    </figure>
                                </a>
                                
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
      </div>
</article>
@endsection