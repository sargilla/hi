<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="author" content="Estudio Rompecabezas && 3tristestigres">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keyword" content="accesibilidad, naciones unidas">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest')}}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

    <meta name="google-site-verification" content="UesCTgi5PNtUtIgWtPKd1X2wuJrS98aWP3girBO1vFY" />

    <meta property="og:image:width" content="279">
    <meta property="og:image:height" content="279">
    <meta property="og:title" content="Gesti&oacute;n inclusiva del riesgo de desastres">
    <meta property="og:description"
        content="Espacio que promueve una gesti&oacute;n del riesgo de desastres con enfoque de inclusi&oacute;n, poniendo a las personas en situaci&oacute;n de mayor vulnerabilidad en el centro de la gesti&oacute;n del riesgo, haci&eacute;ndole part&iacute;cipes como sujetos de derecho, en condiciones de igualdad, sin exclusiones ni discriminaci&oacute;n">
    <meta property="og:url" content="https://girdamericalatina.org/">
    <meta property="og:image" content="https://girdamericalatina.org/images/og-image.jpg">

    <title>@yield('header_title', 'Titulo de la Pagina') </title>

    <link href="{{ mix('hi/all.css') }}" rel="stylesheet">

    @stack('extra_css')

    <!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
