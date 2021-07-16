<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{{ config('app.name') }}">
	<meta name="author" content="Estudio Rompecabezas && 3tristestigres">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{--  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-touch-icon.png')}}">
	<meta name="keyword" content="">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png')}}">
	<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-chrome-192x192') }}">
	<link rel="manifest" href="{{ asset('manifest.webmanifest')}}">
	<link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg')}}" color="#333333">
	<meta name="msapplication-TileColor" content="#333333">
	<meta name="theme-color" content="#333333">

	<meta property="og:image:width" content="279">
	<meta property="og:image:height" content="279">
	<meta property="og:title" content="Cablecord">
	<meta property="og:description" content="Materiales El&eacute;ctricos">
	<meta property="og:url" content="https://www.cablecordrosario.com.ar/">
	<meta property="og:image" content="https://www.cablecordrosario.com.ar/og-image.jpg">  --}}

	<title>@yield('header_title', 'Titulo de la Pagina') </title>

    <link href="{{ mix('hi/all.css') }}" rel="stylesheet">

    @stack('extra_css')

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
