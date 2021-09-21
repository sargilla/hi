@if($campos['estilo'] == 1)
<article class="estilo-1">
    <div class="container py-5 p-lg-3 mt-lg-5">
           <h1>
            {{ $campos['titulo'] }}
           </h1>
           <nav aria-label="Usted esta en recursos">
               <ol class="breadcrumb bg-unset p-0">
                 <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
                 <li class="breadcrumb-item active" aria-current="page">{{ $campos['titulo'] }}</li>
               </ol>
             </nav>
             @if(isset($campos['texto']))
                <div class="mt-2">
                    {!! $campos['texto'] !!}
                </div>
           @endif
    </div>
</article>
@else 
<article class="estilo-2">
  <div class="p-5 bg-primary text-white mt-1">
      <div class="container">
          <h1>
              {{$campos['titulo']}}
          </h1>
          
      </div>         
  </div>
  <div class="container p-3">
      <nav aria-label="Usted esta en discapacidad">
          <ol class="breadcrumb bg-unset p-0">
            <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
            <li class="breadcrumb-item"><a href="#" class="p-2">Recursos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$campos['titulo']}}</li>
          </ol>
        </nav>
  </div>
</article>
@endif