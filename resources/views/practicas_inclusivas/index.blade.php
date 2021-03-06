@extends('plantilla::layout')
@section('main-content')
<article id="expPI" class="expPI">
    <div class="bg-primary">
        <div class="container">
            <h1 class="py-5  text-white mt-1">
                Prácticas inclusivas del riesgo de desastre
            </h1>
        </div>
    </div>
    <div class="container mt-5">
        <nav aria-label="Usted esta en practicas inclusivas del riesgo de desastre">
            <ol class="breadcrumb bg-unset">
                <li class="breadcrumb-item"><a href=/" class="p-2">Página Principal</a></li>
                <li class="breadcrumb-item"><a href="#" class="p-2">Experiencias</a></li>
                <li class="breadcrumb-item"><a href="#" class="p-2">Practicas Inclusivas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Prácticas inclusivas del riesgo de desastre</li>
            </ol>
        </nav>
    </div>
</article>
<article id="expPIDescargar" class="expPI">
    <div class="container mt-5">
        <div class="row mt-4">
            <div class="col-12 col-md-6 col-lg-8 py-2">
                <h2>
                    Experiencias de actores sociales y entidades gubernamentales en América Latina
                </h2>
                <p>
                    La publicación “Prácticas inclusivas para la gestión del riesgo de desastres”, ha sido desarrollada
                    por Humanity & Inclusion, Save the Children y COOPI, con el apoyo de USAID, en el marco del proyecto
                    regional “Gestión inclusiva de riesgos de desastres: un enfoque innovador para la inclusión de los
                    grupos de mayor riesgo”. Su objetivo es ilustrar cómo los grupos en situación de mayor
                    vulnerabilidad participan de las intervenciones de gestión del riesgo de desastres.
                </p>
                <p>
                    El documento recoge 12 experiencias de prácticas inclusivas de gestión del riesgo de desastres
                    identificadas de actores sociales y entidades gubernamentales en 6 países de la región
                    latinoamericana. Por cada experiencia, se documentó el contexto, la descripción de la práctica, el
                    impacto generado, el potencial para ser replicado, la sostenibilidad y los desafíos para el futuro.
                </p>
                <p>
                    Compartimos esta primera selección de prácticas, esperando que su lectura sea inspiradora ¡y
                    estimule la difusión de un enfoque inclusivo para la gestión del riesgo de desastres!
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="" class="btn btn-purple">Descargar 12 practicas</a>
            </div>
        </div>
    </div>
</article>
<article id="expPIDescargar" class="expPI">
    <div class="container py-5">
        <div id="practicas">
            <ul>
                @foreach([1,2,3,4,5,6,7,8,9,10,11,12] as $v)
                <li>
                    <a href="" class="nav-link p-0">
                        <div class="row mb-3 py-3">
                            <div class="col-12 col-md-4 col-lg-3">
                                <figure class="figure mb-0">
                                    <img src="/images/familia.jpg" class="figure-img img-fluid w-100 rounded-10 mb-0"
                                        alt="...">
                                </figure>
                            </div>
                            <div class="col-12 col-md-8 col-lg-9 py-3">
                                <h3>{{$v}} - Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, iste!</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempore id recusandae
                                    veritatis. Corrupti est commodi quae placeat, nam asperiores, qui illo harum tempora
                                    atque possimus quam labore natus exercitationem?
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
</article>
@endsection
