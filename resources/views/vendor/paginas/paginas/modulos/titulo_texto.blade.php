<article class="titulo_texto">
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