<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
	<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicons/android-icon-192x192.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileImage" content="{{ asset('favicons/apple-icon-57x57.png') }}/ms-icon-144x144.png">

	<meta name="description" content="Ingeniería Civil y Sanitaria es una empresa Antioqueña especialista en ingeniería, proyectos y construcciones hidrosaniatarias desde 2010, habiendo realizado actuaciones en más de 500 proyectos hidráulicos en el ámbito local y nacional." />
	<meta name="keywords" content="Hidrosanitarios, Ingenieria Civil, Civil, Empresa Antioqueña, Proyectos, Contrucciones" />
	<meta name="robots" content="index, follow" />
	<link rel="author" href="https://plus.google.com/112465322804224047765">
	<!-- <meta name="author" content="Santiago Arango Gutierrez" /> -->
	<meta name="subjetc" content="Ingeniería Civil y Sanitaria es una empresa Antioqueña especialista en ingeniería, proyectos y construcciones hidrosaniatarias desde 2010, habiendo realizado actuaciones en más de 500 proyectos hidráulicos en el ámbito local y nacional." />
	<meta name="revisit-after" content="1 Day" />

	<!-- Theme and site -->
	<meta name="msapplication-TileColor" content="#007bff">
	<meta name="msapplication-TileImage" content="{{ asset('favicons/favicon-32x32.png') }}">
	<meta name="theme-color" content="#007bff">
	<meta name="google-site-verification" content="uv0iOxljSDmdicTwA4I0xcL0JLATOiPdM9VThSntN00" />

	<!-- Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@civilsa">
	<meta name="twitter:creator" content="@civilsa">
	<meta name="twitter:title" content="CIVILSA S.A.S - Ingenieria Civil y Sanitaria" />
	<meta name="twitter:description" content="Ingeniería Civil y Sanitaria es una empresa Antioqueña especialista en ingeniería, proyectos y construcciones hidrosaniatarias desde 2010, habiendo realizado actuaciones en más de 500 proyectos hidráulicos en el ámbito local y nacional.">
	<meta name="twitter:image" content="https://civilsa.com.co/img/gota.jpg">

	<!-- Facebook -->
	<meta property="og:locale" content="es_ES" />
	<meta property="og:url" content="https://civilsa.com.co/">
	<meta property="og:site_name" content="CIVILSA S.A.S - Ingenieria Civil y Sanitaria" />
	<meta property="og:title" content="CIVILSA S.A.S - Ingenieria Civil y Sanitaria">
	<meta property="og:description" content="Ingeniería Civil y Sanitaria es una empresa Antioqueña especialista en ingeniería, proyectos y construcciones hidrosaniatarias desde 2010, habiendo realizado actuaciones en más de 500 proyectos hidráulicos en el ámbito local y nacional.">
	<meta property="article:publisher" content="https://www.facebook.com/@civilsa" />
	<meta property="article:author" content="https://www.facebook.com/@civilsa" />
	<meta property="article:tag" content="CIVILSA S.A.S - Ingenieria Civil y Sanitaria" />
	<meta property="og:type" content="website">
	<meta property="og:image" content="https://civilsa.com.co/img/gota.jpg">
	<meta property="og:image:secure_url" content="https://civilsa.com.co/img/gota.jpg">
	<meta property="og:image:type" content="image/jpg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">

	<link href="{{ asset('css/template.css') }}" rel="stylesheet">
	<link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
	<link href="{{ asset('css/mensajes.css') }}" rel="stylesheet">
	<title>@yield('title', 'Civilsa')</title>
	<script src="{{ asset('/js/jquery-3.4.1.js') }}"></script>
	<script src="{{ asset('/js/pace.min.js') }}"></script>
	<script src="{{ asset('/js/app.js') }}" defer></script>
	<script src="{{ asset('/js/mensajes.js')}}"></script>
	<script src="{{ asset('/js/lottie.min.js')}}"></script>
</head>

<body>
	<div id="app" class="d-flex flex-column h-screen justify-content-between">
		<header>
			@include('partials.nav')
			@include('partials.session-status')
		</header>

		<main class="py-4">
			@yield('content')
		</main>

		@include('partials.footer')

		<!-- <footer class="bg-white text-center text-black-50 py-3 shadow">
			{{ config('app.name') }} | Copyright @ {{ date('Y') }}
		</footer> -->
	</div>
	<a href="https://api.whatsapp.com/send?phone=573104659572&text=Hola%20CIVILSA" target="_blank" class="btn-wpp"><i class="fab fa-whatsapp fa-lg"></i></a>
</body>

</html>