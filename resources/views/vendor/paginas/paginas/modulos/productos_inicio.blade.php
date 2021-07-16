{{-- <h2 class="text-center w-100 mt-5">Productos destacados</h1>
<div class="row my-5">
    @forelse ($productos as $producto) 
    <div class="col-12 col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <img class="w-100 card-img-right flex-auto d-lg-block" data-src="/images/card{{ $producto->imagen_principal }}" alt="{{ $producto->nombre}}" src="/images/card/{{ $producto->imagen_principal }}" data-holder-rendered="true">
            <div class="card-body">
                <h5 class="card-title">{{$producto->nombre}}</h5>
                <div class="card-text mb-auto">{!! $producto->descripcion_corta !!}</div>
                <a class="btn btn-primary w-100" href="{{ route('productos',[$producto->categoria->slug,$producto->slug])}}">Ver mas</a>
            </div>
        </div>
      </div>
    @endforeach
</div> --}}

<h2 class="text-center w-100 my-5 bg-primary text-white p-5">Productos Destacados</h2>
<div class="row m-0 p-0 col-10 col-sm-7 col-md-8 col-lg-10 mx-auto">
  @foreach($productos as $producto)
    <div class="col-12 col-md-6 col-lg-4 mb-4 ">
      <div class="card h-100">
        <img class="w-100 card-img-right flex-auto d-lg-block" data-src="/images/card{{ $producto->imagen_principal }}" alt="{{ $producto->nombre}}" src="/images/card/{{ $producto->imagen_principal }}" data-holder-rendered="true">
        <div class="card-body">
        <h5 class="card-title">{{$producto->nombre}}</h5>
        <div class="card-text mb-auto">{!! $producto->descripcion_corta !!}</div>
        <a class="btn btn-primary w-100" href="{{ route('productos',[$producto->categoria->slug,$producto->slug])}}">Ver mas</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>