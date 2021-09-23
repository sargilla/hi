@if(isset($campos['estilo']))
    @if($campos['estilo'] == 1)
        <article class="expIndexHV">   
            <div class="bg-primary">
            <div class="container  py-5 px-5 px-sm-1">
                <p class="text-white">
                    {{$campos['titulo']}}
                </p>
                <form action="/experiencias/historia_vida/search" method="GET" class="form-inline mr-3">
                    @csrf 
                    <div class="div-group  col-md-4 col-lg-3">
                        <label for="fechas" class="text-white justify-content-start ">Fechas</label>
                        <select name="fechas" id="" class="form-control mb-3 mr-3 mb-md-0 w-100">
                        <option value="">Todas las fechas</option>
                    </select>
                    </div>
                    <div class="div-group  col-md-4 col-lg-3">
                        <label for="fechas" class="text-white  justify-content-start ">Paises</label>
                        <select name="paises" id="" class="form-control mb-3 mr-3 mb-md-0 w-100">
                            <option value="paises">Todas los paises</option>
                        </select>
                    </div>
                    <div class="div-group  col-md-4 col-lg-3">
                        <label for="tematicas" class="text-white  justify-content-start ">Tematicas</label>
                        <select name="tematicas" id="" class="form-control mb-3 mr-3 mb-md-0 w-100">
                            <option value="">Tematicas</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-3 mt-md-4">
                        <button class="mb-3 mb-md-0 btn btn-purple my-auto col-6 col-sm-4 col-md-3 col-lg-8" type="submit">Filtrar</button>
                    </div>       
                </form>
            </div>
            </div>
        </article>
    @else 

    @endif
@else 
    <div class="alert alert-warning">
        SIN ESTILO SELECCIONADO
    </div>
@endif