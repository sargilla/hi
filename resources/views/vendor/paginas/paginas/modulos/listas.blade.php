@if ($campos['estilo'] == 'estilo-1')
    <div class="row clearfix col-12 my-5" id="{{ $campos['link']}}">
        @foreach ($campos['listas'] as $lista)
            <div class="{{$campos['columnas']}}">
                <div class="text-center border border-black p-2 bg-primary text-white shadow" >
                    <div class="border-bottom border-black py-2">
                        <a class="text-white" href="#"><i class="{{ $lista['icono_titulo'] }}"></i></a>
                        <h3 class=" ">{{ $lista['titulo']}}</h3>
                    </div>
                    <ul class="m-0 p-2" style="text-align:left;">
                        @foreach ($lista['items'] as $item)
                            <li class="nav-link p-0 text-left" ><i  class="{{ $lista['icono_items'] }}"></i>
                                {!! $item['texto'] !!}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="row clearfix" id="{{ $campos['link']}}">
        @foreach ($campos['listas'] as $lista)
            <div class="{{$campos['columnas']}} bottommargin">
                <div class="feature-box fbox-small fbox-plain fadeIn animated" data-animate="fadeIn">
                    <div class="fbox-icon">
                        <a href="#"><i class="{{ $lista['icono_titulo'] }}"></i></a>
                    </div>
                <h3>{{ $lista['titulo']}}</h3>
                    <ul class="iconlist iconlist-color nobottommargin">
                        @foreach ($lista['items'] as $item)
                            <li><i class="{{ $lista['icono_items'] }}"></i>
                                {!! $item['texto'] !!}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endif
