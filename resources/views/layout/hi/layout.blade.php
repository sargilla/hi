<!DOCTYPE html>
<html lang="es">
@section('htmlheader')
@include('plantilla::_htmlheader')
@show

<body>
    <div id="app">
        <header id="header">
            @include('plantilla::_header')
        </header>
        <main id="cprincipal" aria-label="contenido principal">
            <section>
                @yield('main-content')
            </section>
        </main>

        @include('plantilla::_footer')
    </div>
    @section('scripts')
    @include('plantilla::_scripts')
    @show
</body>

</html>
