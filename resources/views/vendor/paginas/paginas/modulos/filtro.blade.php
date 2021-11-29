@if(isset($campos['estilo']))
@if($campos['estilo'] == 1)
@if($campos['busqueda'] == 'actualidad' || $campos['busqueda'] == 'experiencias')
@inject('modelo','\Sigma\Noticias\Tema')
@else
@inject('modelo','\Sigma\Eventos\Tipo')
@endif
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
                    <label for="pais" class="text-white  justify-content-start ">Paises</label>
                    <select name="pais" id="pais" class="form-control mb-3 mr-3 mb-md-0 w-100">
                        <option value="">Todas los paises</option>
                        <option value="colombia">Colombia</option>
                        <option value="paraguay">Paraguay</option>
                        <option value="perú">Perú</option>
                    </select>
                </div>
                {{-- <div class="div-group  col-md-4 col-lg-3">
                    <label for="tematica" class="text-white  justify-content-start ">Tematicas</label>
                    <select name="tematica" id="tematica" class="form-control mb-3 mr-3 mb-md-0 w-100">
                        <option value="">Tematicas</option>
                        @foreach($modelo->all() as $object)
                        <option value="{{$object->id}}">{{$object->nombre}}</option>
                        @endforeach
                    </select>
                </div> --}}
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
                <p class="text-white">
                    Busqueda por pais
                </p>
                <form action="{{route('filtro')}}" method="GET" class="form-inline mr-3">

                    <div class="div-group w-100">
                        <label for="pais" class="text-white  justify-content-start ">Paises</label>
                        <select name="pais" id="" class="form-control mb-3 mr-3 mb-md-0 w-25">
                            <option value="paises">Todos los paises</option>
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
