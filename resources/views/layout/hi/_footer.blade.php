<footer class="bg-primary text-white" aria-label="Pie de pagina: creditos y contactos">
    <div class="container-fluid py-4">
        <div class="row justify-content-between">
            <div class="col-lg-6 border-md py-5 py-lg-2 py-xl-2 px-lg-3 px-xl-5">
                <p>
                    Este sitio web y sus contenidos son parte de un proyecto
                    regional que promueve una gestión del riesgo con enfoque de inclusión y protección, liderado por
                    <span lang="en">Humanity & inclusion </span> en consorcio con <abbr
                        title="cooperazione internazionale">COOPI </abbr> y <span lang="en">Save the Children </span>
                    Perú
                </p>
                <p>
                    La Realización de este sitio web y de sus contenidos fue posible gracias al apoyo
                    del pueblo de los Estados Unidos de América, proporcionada mediante la Oficina
                    de Asistencia Humanitaria de la Agencia de los Estados Unidos para el
                    Desarrollo Internacional (<abbr title="">USAID </abbr> / <abbr title="">BHA</abbr> ) y del Programa
                    <abbr title=""> ECHO </abbr> la Unión
                    Europea.
                    <br>
                    El contenido aquí expresado es responsabilidad de las instituciones
                    imprementadoras y no necesariamente refleja las opiniones de <abbr title="">USAID </abbr>, del
                    Gobierno de los Estados Unidos o de la Unión Europea.
                </p>
            </div>
            <div class="d-flex flex-wrap col-lg-6 px-lg-4 px-xl-5 pt-5 pb-3 py-lg-0">
                <h2 class="align-self-center col-12 col-md-11 col-lg-12 mx-auto">
                    Redes sociales
                </h2>
                <ul class="col-8 col-sm-6 col-lg-7 col-xl-6 px-md-5 px-lg-0" id="lista-rs">
                    <li class="d-flex flex-wrap align-items-start mb-4">
                        <i class="fab fa-facebook-f border-2x border-white p-2"></i>
                        <ul>
                            <li class="mb-2">
                                <a href="https://www.facebook.com/HumanityInclusionPeru/"
                                    class="p-2 text-decoration-underline" target="_blank">Facebook Peru</a>
                            </li>
                            <li class="mb-2">
                                <a href="https://www.facebook.com/Handicapinternationalcolombia"
                                    class="p-2 text-decoration-underline" target="_blank">Facebook Colombia</a>
                            </li>
                            <li class="mb-2">
                                <a href="https://www.facebook.com/HIBoliviaProgramaAmericaLatina/"
                                    class="p-2 text-decoration-underline" target="_blank">Facebook America Latina</a>
                            </li>
                            <li class="mb-2">
                                <a href="https://www.facebook.com/HumanityAndInclusionEnCuba/"
                                    class="p-2 text-decoration-underline" target="_blank">Facebook Cuba</a>
                            </li>
                        </ul>
                    </li>
                    <li class="d-flex flex-wrap align-items-start mb-4">
                        <i class="fas fa-play border-2x border-white p-2"></i>
                        <ul>
                            <li class="mb-2">
                                <a href="https://www.youtube.com/channel/UC5gL04rHxQ0iuN3_cFcVuBg"
                                    class="p-2 text-decoration-underline" target="_blank">Youtube Colombia</a>
                            </li>
                            <li class="mb-2">
                                <a href="https://www.youtube.com/channel/UCDpSpt75YbDD3nV3TQTE4ug"
                                    class="p-2 text-decoration-underline" target="_blank">Youtube Cuba</a>
                            </li>
                        </ul>
                    </li>
                    <li class="d-flex flex-wrap align-items-start">
                        <i class="fab fa-instagram border-2x border-white p-2"></i>
                        <ul>
                            <li class="mb-2">
                                <a href="https://www.instagram.com/internationalhandicapcolombia/?hl=es-la"
                                    class="p-2 text-decoration-underline" target="_blank">Instagram Cuba</a>
                            </li>
                        </ul>

                    </li>
                </ul>
                <div class="col-4 col-sm-6 col-lg-5 col-xl-6 align-self-center text-center mb-5">
                    <a href="">
                        <figure class="figure">
                            <img class="figure-img img-fluid" src="/images/logo-hi.png"
                                alt="logo de humanity and inclusion">
                        </figure>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white" id="logos">
        <div class="container">
            <div class="row py-2">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    @foreach([1,2] as $v)
                    <div class="col-6">
                        <a href="" class="nav-link p-0">
                            <figure>
                                <img src="/images/logo_{{$v}}.png" alt="logo de USAID" width="100%">
                            </figure>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="col-12 col-md-6 d-flex flex-wrap align-items-center justify-content-between">
                    @foreach([3,5,4] as $v)
                    <div class="col-6 col-sm-4">
                        <a href="" class="nav-link p-0">
                            <figure>
                                <img src="/images/logo_{{$v}}.png" alt="logo de humanity and inclusion" width="100%">
                            </figure>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="bg-dark p-4 px-md-0 py-md-3 mb-4em" id="copyright">
        <div class="d-md-flex flex-wrap justify-content-between">
            <div class="col-12 col-lg-6 border-md text-center py-4 py-md-2 py-lg-0">
                <span>
                    Humanity & inclusion © Copyright 2021
                </span>
            </div>
            <div class="col-12 col-lg-6 text-center my-3 my-md-2 my-lg-0">
                <nav>
                    <ul class="d-flex justify-content-center">
                        <li>
                            <a href="/" class="p-2">Índice del sitio</a> -
                        </li>
                        <li>
                            <a href="/politicas-de-privacidad" class="p-2">Políticas y privacidad</a> -
                        </li>
                        <li>
                            <a href="/accesibilidad" class="p-2">Accesibilidad</a>
                        </li>
                        <li id="li-smu">
                            <a class="skip-main-up py-2 px-4" id="irAlMenuPrincipal" href="#header">Ir al menu
                                principal</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

</footer>
