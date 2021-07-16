<!DOCTYPE html>
<html lang="es">
@section('header_title')
    Pfffffffsshhhh!
@endsection
@section('htmlheader')
@include('flatlab::_htmlheader')
@show
<body class="body-500">
    <div class="container">
        <section class="error-wrapper">
            <i class="icon-500"></i>
            <h1>Pfffffffsshhhh!</h1>
            <h2>Error 500</h2>
            <p class="page-500">Se rompio todo. <a href="/">Volver</a></p>
        </section>
    </div>
</body>
</html>

