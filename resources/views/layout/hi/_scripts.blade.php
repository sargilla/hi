<script>
    window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    // 'user' => auth()->guard('clientes')->user(),
    // 'config' => config('clientes'),
	]) !!};
</script>

<script src="{{ mix('hi/all.js') }}"></script>

<script>
    @include('flatlab::helpers.toastr')
</script>

{!! NoCaptcha::renderJs('es') !!}

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-4126279-46"></script>
<script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-4126279-46');
</script>
@stack('plugins_js')
@stack('extra_scripts')
