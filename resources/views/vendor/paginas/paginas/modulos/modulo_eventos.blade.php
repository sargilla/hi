@inject('eventos', '\Sigma\Eventos\Evento')
<article class="eventos">
    <div class="container py-5 px-lg-3">
          <div class="row row-cols-1 row-cols-md-2">
            @forelse($eventos->publicados()->get() as $evento)
              <div class="col mb-4">             
                  <a href="{{$evento->path}}" class="nav-link p-0">
                          <div class="card">
                                  <figure class="figure m-0">
                                      <img src="/images/paginas-grande/{{$evento->imagen_principal != 'no-imagen.jpg' ? $evento->imagen_principal : 'familia.jpg' }}" class="card-img-top" alt="...">
                                  </figure>
                              <div class="card-body">
                                  <div class="d-flex justify-content-between align-items-center">
                                      <small class="card-text my-1 text-uppercase">dia 2 de febrero, 16:00 horas</small>              
                                  </div>     
                                      <h2 class="mt-3 text-decoration-underline">               
                                          {{$evento->titulo}}             
                                  </h2>
                                  <div class="p-3 d-flex justify-content-between align-items-center">
                                      <p class="my-auto">
                                          {{$evento->tipo->nombre}} - {{$evento->nivel?? 'Nivel'}} - {{$evento->sector?? 'Sector'}}
                                      </p>
                                      <button href="" class="btn btn-purple px-4">Inscribirse</button>
                                  </div>                 
                              </div>
                          </div>
                  </a>
              </div>
              @empty 
              <div class="alert alert-warning mx-auto">
                  SIN EVENTOS
              </div>
              @endforelse
          </div>
      </div>
  </article>