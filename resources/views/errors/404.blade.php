<!DOCTYPE html>
<html lang="es">
@section('header_title')
	Uppsssssss!!!!
@endsection
@section('htmlheader')
	@include('flatlab::_htmlheader')
@show
<body class="body-404">
	<div class="container">
		<section class="error-wrapper">
			<i class="icon-404"></i>
			<h1>Uppsssssss!!!!</h1>
			<h2>Error 404 - No encontramos la página</h2>
			<p class="page-404">Algo paso, no encontramos la página o todavia no existe.. <a href="/">Volver al inicio</a></p>
		</section>
	</div>
</body>
</html>

