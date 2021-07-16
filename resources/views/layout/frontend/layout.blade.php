<!DOCTYPE html>
<html lang="es">
@section('htmlheader')
    @include('plantilla::_htmlheader')
@show
<body>
    <div id="app">
        @include('plantilla::_header')
        @yield('main-content')
        @include('plantilla::_footer')
    </div>
  	@section('scripts')
        @include('plantilla::_scripts')
    @show
</body>
</html>
