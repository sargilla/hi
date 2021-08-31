<?php 
    $campos = [
        [
        'h3' => "Desastres ocurridos en el mundo entre 1997 y 2017",
        'p'=>  "Corresponden América latina",
        'div' => "25%",
        'a' => "Informe de evaluacion regional del año 2021",
        'href' => "https://www.undrr.org/sites/default/files/inline-files/RAR-LAC%202021%20ESP.pdf"
        ],
        [
        'h3' => "Personas con discapacidad",
        'p'=>  "En el mundo existen",
        'div' => "15%",
        'a' => "Informe sobre discapacidad organizacion panaamericana de la salud",
        'href' => "https://www.paho.org/es/temas/discapacidad"
        ],
        [
        'h3' => "Violencia fisica o sexual en mujeres",
        'p'=>  "Han sufrido violencia al menos una vez",
        'div' => "33%",
        'a' => "Maria Noel Valeza, Dia internacional emilinacion de la violencia con la mujer 2019",
        'href' => "https://lac.unwomen.org/es/noticias-y-eventos/articulos/2019/11/editorial-directora-regional-onu-mujeres"
        ],
        [
        'h3' => "Pueblo indigenas",
        'p'=>  "Poblacion en America Latina",
        'div' => "8%",
        'a' => "Reseña Latinoamericana indigena en el siglo 21 Banco Mundial",
        'href' => "https://www.undrr.org/sites/default/files/inline-files/RAR-LAC%202021%20ESP.pdf"
        ],
        [
        'h3' => "Situacion de Pobreza",
        'p'=>  " Porcentaje de la poblacion",
        'div' => "34%",
        'a' => "Informe panorama social de America Latina por CEPAL 2020",
        'href' => "https://www.undrr.org/sites/default/files/inline-files/RAR-LAC%202021%20ESP.pdf"
        ],
    ]
?>
<article id="datos_impacto" class="pt-5 pb-lg-5">
    <h2 class="text-center  mb-5">
        Datos de impacto
    </h2>
    <div class="container-fluid">
        <div class="d-flex flex-wrap justify-content-xl-between align-items-strech">
            @foreach($campos as $c)
            <div class="col-sm-6 col-lg-4 col-xl-2 d-flex flex-column mb-5 mb-xl-0 p-xl-0">   
                <a href="{{$c['href']}}"></a>      
                    <h3 class="rounded-top bg-primary text-white p-2 text-center mb-0">
                        {{$c['h3']}}
                    </h3>
                    <div class="bg-light py-3 flex-grow-1 ">
                        <p class="text-center">
                            {{$c['p']}}
                        </p>
                        <div class="border-datos rounded-circle p-5 mb-2 mx-auto">                
                            {{$c['div']}}              
                       </div>  
                        <p class="px-2 text-decoration-underline">
                                {{$c['a']}}
                        </p>                     
                    </div>                                                                           
            </div>
            @endforeach        
        </div>
    </div>
</article>