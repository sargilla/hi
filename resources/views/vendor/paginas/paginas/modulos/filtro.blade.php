@if(isset($campos['estilo']))
@if($campos['estilo'] == 1)
<article class="filtro">
    <div class="bg-primary">
        <div class="container  py-5 px-5 px-sm-1">
            <p class="text-white">
                {{isset($campos['titulo']) ? $campos['titulo'] : 'Titulo Vacio' }}
            </p>
            <form action="{{route('filtro')}}" method="GET" class="form-inline mr-3">
                <input type="hidden" name="busqueda" value="{{$campos['busqueda']}}">
                <div class="div-group  col-md-4 col-lg-3">
                    <label for="fecha" class="text-white justify-content-start ">Fechas</label>
                    <select name="fecha" id="fecha" class="form-control mb-3 mr-3 mb-md-0 w-100">
                        <option value="">Todas las fechas</option>
                        @foreach (range(date('Y')-5,date('Y')) as $item)
                        <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="div-group  col-md-4 col-lg-3">
                    <label for="pais" class="text-white  justify-content-start ">Países</label>
                    <select name="pais" id="pais" class="form-control mb-3 mr-3 mb-md-0 w-100">
                        <option value="">Todos los países</option>
                        <option value="colombia">Colombia</option>
                        <option value="ecuador">Ecuador</option>
                        <option value="paraguay">Paraguay</option>
                        <option value="perú">Perú</option>
                    </select>
                </div>
                <div class="col-12 col-lg-3 mt-md-4">
                    <button class="mb-3 mb-md-0 btn btn-purple my-auto col-6 col-sm-4 col-md-3 col-lg-8"
                        type="submit">Filtrar</button>
                </div>
            </form>
        </div>
    </div>
</article>
@else
<article class="filtro">
    <div>
        <div class="bg-primary p-3 p-md-4 p-lg-5">
            <div class="container">
                <form action="{{ $campos['busqueda'] == 'bloques' ? url()->current() : route('filtro') }}" method="GET"
                    class="form-inline mr-3">
                    <p class="text-white">
                        Busqueda por pais
                    </p>
                    <div class="div-group w-100">
                        {{-- <label for="pais" class="text-white  justify-content-start ">Paises</label> --}}
                        <select name="pais" id="pais" class="form-control mb-3 mr-3 mb-md-0 w-25">
                            <option value="">Todos los países</option>
                            <option value="colombia" {{request()->pais == 'colombia' ? 'selected' :''}}>Colombia
                            </option>
                            <option value="paraguay" {{request()->pais == 'paraguay' ? 'selected' :''}}>Paraguay
                            </option>
                            <option value="perú" {{request()->pais == 'perú' ? 'selected' :''}}>Perú</option>
                            <option value="perú" {{request()->pais == 'ecuador' ? 'selected' :''}}>Ecuador</option>
                        </select>
                        <button class="mb-3 mb-md-0 btn btn-purple px-5 my-auto" type="submit">Filtrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</article>
@endif
@else
<div class="alert alert-warning">
    SIN ESTILO SELECCIONADO
</div>
@endif
