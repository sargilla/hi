@extends('plantilla::layout')
@section('header_title', 'INICIO')
@section('main-content')
@include('home.bienvenida')
@include('home.actualidad')
@include('home.datos_impacto')
@endsection

@push('extra_scripts')
<script>
    jQuery( window ).load(function() {
    // Run code
    window.matchMedia('screen and (min-resolution: 2dppx)')
        .addEventListener("change", function(e) {
            console.log(window.devicePixelRatio,e)
        if (e.matches) {
        /* devicePixelRatio >= 2 */
        } else {
        /* devicePixelRatio < 2 */
        }

    });
    });
</script>
@endpush
