@if(isset($campos['estilo']) && $campos['estilo'] == 1)
<article class="estilo-1">
    <div class="container py-5 p-lg-3 mt-lg-5">
        <h1>
            {{isset($campos['titulo']) ? $campos['titulo'] : 'Titulo Vacio' }}
        </h1>

        <nav aria-label="Usted esta en {{isset($campos['titulo']) ? $campos['titulo'] : 'Titulo Vacio' }}">
            <ol class="breadcrumb bg-unset p-0">
                @if(isset($campos['pagina_anterior']) && $campos['pagina_anterior'] != 'Pagina Principal')
                <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
                @endif
                @if(isset($campos['pagina_anterior']))
                <li class="breadcrumb-item"><a href="#" class="p-2">{{isset($campos['pagina_anterior'])?
                        $campos['pagina_anterior'] : 'Esta Vacio'}}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{isset($campos['titulo']) ? $campos['titulo'] :
                    'Titulo Vacio' }}</li>
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
                {{isset($campos['titulo']) ? $campos['titulo'] : 'Titulo Vacio' }}
            </h1>

        </div>
    </div>
    <div class="container p-3">
        <nav aria-label="Usted esta en {{isset($campos['titulo']) ? $campos['titulo'] : 'Titulo Vacio' }}">
            <ol class="breadcrumb bg-unset p-0 mt-lg-4">
                <li class="breadcrumb-item"><a href="#" class="p-2">Pagina Principal</a></li>
                @if(isset($campos['pagina_anterior']))
                <li class="breadcrumb-item"><a href="#" class="p-2">{{isset($campos['pagina_anterior'])?
                        $campos['pagina_anterior'] : 'Esta Vacio'}}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{isset($campos['titulo']) ? $campos['titulo'] :
                    'Titulo Vacio' }}</li>
            </ol>
        </nav>
    </div>

</article>
@endif
