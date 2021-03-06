@extends('plantilla::layout')
@section('main-content')
<article id="actualidadShow" class="actualidadShow">
    <div class="bg-primary">
        <div class="container">
            <h1 class="py-5 text-white mt-1">
                Titulo de la nota
            </h1>
        </div>
    </div>
    <div class="container py-5 py-lg-3">
        <nav aria-label="Usted esta en actualidad lorem,ipsum dolor">
            <ol class="breadcrumb bg-unset p-0">
                <li class="breadcrumb-item"><a href="/" class="p-2">Página Principal</a></li>
                <li class="breadcrumb-item"><a href="/actualidad" class="p-2">Actualidad</a></li>
                <li class="breadcrumb-item active text-dark" aria-current="page"> Lorem, ipsum dolor</li>
            </ol>
        </nav>
    </div>
</article>
<article id="actualidadImagenCreditos" class="actualidadShow">
    <div class="container py-5 py-lg-3">
        <a href="" class="nav-link p-0">
            <div class="text-center">
                <figure class="figure w-100 mb-3">
                    <img class="figure-img img-fluid w-100 rounded-10  mb-0" src="/images/familia.jpg" alt="">
                </figure>
                <span class="p-2 text-primary">Creditos de la imagen</span>
            </div>
        </a>
        <div class="mt-4">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo
                ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo
                ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo
                ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo
                ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.
            </p>
        </div>
    </div>
</article>
<article id="actualidadImagenCreditos2" class="actualidadShow">
    <div class="container py-5 py-lg-3">
        <div class="row">
            <div class="col-md-6">
                <a href="" class="nav-link p-0">
                    <div class="text-center">
                        <figure class="figure w-100 mb-3">
                            <img class="figure-img img-fluid w-100 rounded-10  mb-0" src="/images/familia.jpg" alt="">
                        </figure>
                        <span class="p-2 text-primary">Creditos de la imagen</span>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="" class="nav-link p-0">
                    <div class="text-center">
                        <figure class="figure w-100 mb-3">
                            <img class="figure-img img-fluid w-100 rounded-10  mb-0" src="/images/familia.jpg" alt="">
                        </figure>
                        <span class="p-2 text-primary">Creditos de la imagen</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="mt-4">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo
                ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo
                ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo
                ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo
                ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.
            </p>
        </div>
    </div>
</article>
<article id="masNoticias" class="actualidadShow">
    <div class="container py-5 py-lg-3">
        <h2 class="text-primary my-5">
            Más Noticias
        </h2>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5" id="mas-noticias">
            @foreach([1,2,3,4,5] as $v)
            <div class="col mb-4">
                <a href="" class="nav-link p-0">
                    <div class="card">
                        <figure class="figure mb-0">
                            <img src="/images/familia.jpg" class="card-img-top rounded-10" alt="...">
                        </figure>
                        <div class="card-body">
                            <p class="card-text my-1">País</p>
                            <h3>Lorem ipsum</h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</article>
@endsection
