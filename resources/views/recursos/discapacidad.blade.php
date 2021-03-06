@extends('plantilla::layout')
@section('main-content')
<article id="recursosDD" class="recursosDD">
    <div class="p-5 bg-primary text-white mt-1">
        <div class="container">
            <h1>
                Discapacidad
            </h1>

        </div>
    </div>
    <div class="container p-3">
        <nav aria-label="Usted esta en discapacidad">
            <ol class="breadcrumb bg-unset p-0">
                <li class="breadcrumb-item"><a href="/" class="p-2">Página Principal</a></li>
                <li class="breadcrumb-item"><a href="#" class="p-2">Recursos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Discapacidad</li>
            </ol>
        </nav>
    </div>
</article>
<article id="recursosDDTitulo" class="recursosDD">
    <div class="container mt-3 py-2">
        <div class="row">
            <div class="col-12 col-md-6 col-xl-4">
                <figure class="figure mb-0 w-100">
                    <img class="img-fluid mb-0 w-100 rounded-10" src="/images/d_1.jpg" alt="">
                </figure>
            </div>
            <div class="col-12 col-md-6 col-xl-8 mt-4 mt-md-0">
                <h2 id="titulo">
                    Esto seria una breve descripcion de la Dimension y Ambito
                </h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto
                    reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis
                    sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto
                    reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis
                    sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?
                </p>
            </div>
        </div>
    </div>
</article>
<article id="recursosDDContenido1" class="recursosDD">
    <div class="docRec">
        <div class="container mt-3 py-4">
            <h2>
                Documentos recomendados
            </h2>
            <div class="row justify-content-between my-2 my-md-5">
                <div class="col-lg-6 row border-dr mb-3 mb-lg-0  mx-auto">
                    <div class="col-12 col-md-6">
                        <a href="">
                            <figure class="figure mb-0">
                                <img class="img-fluid mb-0" src="/images/d_2.jpg" alt="">
                            </figure>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <h3>
                            Convención sobre los Derechos de las Personas con Discapacidad.
                        </h3>
                        <p class="mt-3">
                            <a href="" class="text-white p-2">
                                <i class="fas fa-arrow-right mr-2"></i>
                                Descargar el documento
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 row mb-3 mb-lg-0  mx-auto">
                    <div class="col-12 col-md-6">
                        <a href="">
                            <figure class="figure mb-0">
                                <img class="img-fluid mb-0" src="/images/d_1.jpg" alt="">
                            </figure>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <h3>
                            OMS, 2011: Informe mundial sobre la discapacidad
                        </h3>
                        <p class="mt-3">
                            <a href="" class="text-white p-2">
                                <i class="fas fa-arrow-right mr-2"></i>
                                Descargar el documento
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<article id="recursosDDContenido2" class="recursosDD">
    <div class="docRec">
        <div class="container py-4">
            <h2>
                Marco normativo
            </h2>
            <p>
                Convecciones y acuerdos internaciones de derecho personas con discapacidad
            </p>
            <p>
                <a href="" class="text-white py-2">
                    Normas Uniformes sobre la igualdad de oportunidades para las personas con discapacidad 1994
                </a>
            </p>
            <p>
                <a href="" class="text-white py-2">
                    Acuerdo de Marrakech 1994
                </a>
            </p>
            <p>
                <a href="" class="text-white py-2">
                    Compendio de Legislación sobre Discapacidad, Marco Internacional, Interamericano y de América Latina
                    PNUD Mexico
                </a>
            </p>
        </div>
    </div>
</article>
<article id="recursosDDReferencia" class="recursosDD">
    <div id="referencia">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 p-0">
                    <a href="">
                        <figure class="figure mb-0">
                            <img class="img-fluid mb-0" src="/images/d_2.jpg" alt="">
                        </figure>
                    </a>
                </div>
                <div class="col-12 col-sm-6 py-lg-4 mt-3 mt-sm-0">
                    <h3>
                        Páginas web de referencia
                    </h3>
                    <p>
                        <a href="" class="text-dark">
                            Red de gestión inclusiva del riesgo de desastres y discapacidad de America latina y el
                            caribe - Red GIRDD-LAC
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
