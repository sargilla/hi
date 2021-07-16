@inject('productos', 'App\Services\ModulosService')
{{-- @forelse($productos->getProductos($campos['productos']) as $producto)
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <a href="/images/original/{{ $producto->imagen }}" data-lightbox="producto{{ $producto->id }}" data-title="{!! $producto->descripcion !!}">
                <img class="card-img-top" src="/images/thumbslide/{{ $producto->imagen }}"  alt="{!!$producto->descripcion !!}" >
            </a>
            <div class="card-body">
                <h5 class="card-title">{!! $producto->descripcion !!}</h5>
                <p class="card-text">Código: {{ $producto->codigo }}</p>
                @auth('clientes')
                    @if (!$producto->precio_oferta)
                        <h3 class="card-title text-center">${{ $producto->precio }}</h3>
                    @else
                        <h3 class="card-title text-center">${{ $producto->precio_oferta }}</h3>
                    @endif
                    <agregar-producto :producto="{{ $producto }}"></agregar-producto>
                @endauth
            </div>
        </div>
    </div>
@empty
    <div class="col-12 mb-3">
        <div class="alert alert-warning" role="alert">
            No hay productos que concuerden
        </div>
    </div>
@endforelse --}}


    <div class="col-md-12">

        <slideshow  :pagedots="false" :autoplay="true">
            @forelse ($productos->getProductos($campos['productos'])->chunk(6) as $chunk)
            {{--  @php
                dd($chunk);
            @endphp  --}}
                <div class="carousel-cell">
                    @foreach ($chunk->chunk(3) as $row)
                        <div class="row">
                            @foreach($row as $producto)
                                <div class="col-sm-6 col-md-4">
                                    <div class="card mb-2 {{ auth('clientes')->check() ? 'user':''}}">
                                        <a href="/images/original/{{ $producto->imagen }}" data-lightbox="producto{{ $producto->id }}" data-title='{{ $producto->descripcion }}'>
                                            <img class="card-img-top" src="/images/thumbslide/{{ $producto->imagen }}"  alt='{{ htmlspecialchars($producto->descripcion) }}' >
                                        </a>
                                        <div class="card-body d-flex justify-content-between flex-column">
                                            <h5 class="card-title">{!! $producto->descripcion !!}</h5>
                                            <p class="card-text">Código: {{ $producto->codigo }}</p>
                                            @auth('clientes')
                                                @if (!$producto->precio_oferta)
                                                    <h3 class="card-title text-center">${{ $producto->precio }}</h3>
                                                @else
                                                    <h3 class="card-title text-center">${{ $producto->precio_oferta }}</h3>
                                                @endif
                                                <agregar-producto :producto="{{ $producto }}"></agregar-producto>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach
                        </div>
                    @endforeach
                </div>
                
            @empty
                <div class="col-12 mb-3">
                    <div class="alert alert-warning" role="alert">
                        No hay productos que concuerden
                    </div>
                </div>
            @endforelse
        </slideshow>

    </div>
