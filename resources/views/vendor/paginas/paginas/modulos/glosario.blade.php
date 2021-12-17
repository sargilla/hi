<article class="">
    <div>
        <div class="container py-4">
            @if (isset($campos['titulo']))
            <h2 class="text-center">
                {{$campos['titulo']}}
            </h2>
            @endif
            @if(isset($campos['texto']))
            <p class="text-center">{{ $campos['texto']}}</p>
            @endif
            @php
            $glosario = collect($campos['modulos'])->groupBy(function($link){
            return strtolower(substr($link['titulo'],0,1));
            })->sortKeys();

            $letras =
            ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z'];
            @endphp
            <div class="d-flex justify-content-between">
                @foreach($letras as $letra)
                @if ($glosario->has($letra))
                <a href="#{{$letra}}">{{ucfirst($letra)}}</a>
                @else
                <span>{{ucfirst($letra)}}</span>
                @endif
                @endforeach
            </div>
            <div class="mt-4">
                @foreach($glosario as $letra => $definiciones)
                <h3 class="text-center mt-5" id="{{$letra}}">{{ucfirst($letra)}}</h3>
                @foreach ($definiciones->sortBy('titulo') as $definicion)
                <h4 class="mt-5">{{isset($definicion['titulo']) ? $definicion['titulo'] : ''}}</h4>
                @if (isset($definicion['texto']))
                {!! $definicion['texto'] !!}
                @endif
                @endforeach

                @endforeach
            </div>
        </div>
    </div>
</article>
