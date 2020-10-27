@extends('layout')

@section('title', 'Home')

@section('content')
<section class="welcome bg-cover py-4 py-md-7">
	<div id="carouselExampleIndicators" class="carousel slide border-0" data-ride="carousel" role="listbox">
		<ol class="carousel-indicators">
			<?php
			$ruta = "img/home";
			if (is_dir($ruta)) {
				if ($dh = opendir($ruta)) {
					$count = 0;
					while ($file = readdir($dh)) {
						if ($file != "." && $file != "..") {
							if ($count == 0) {
								$active = "class='active'";
							} else {
								$active = "";
							}
							$template = '<li data-target="#carouselExampleIndicators" data-slide-to="' . $count . '" ' . $active . '></li>';
							echo $template;
							$count++;
						}
					}
				}
				closedir($dh);
			}
			?>
		</ol>
		<div class="carousel-inner z-index-200">
			<?php
			$ruta = "img/home/";
			if (is_dir($ruta)) {
				if ($dh = opendir($ruta)) {
					$count = 0;
					while ($file = readdir($dh)) {
						if ($file != "." && $file != "..") {
							if ($count == 0) {
								$active = "active";
							} else {
								$active = "";
							}
							$template = '<div class="carousel-item imgSlider ' . $active . '">';
							$template .= '<img class="d-block w-100 img-fluid" src="' . $ruta . $file . '" height="250px !important;min-height:200px!important;" >';
							$template .= '</div>';
							echo $template;
							$count++;
						}
					}
					closedir($dh);
				}
			}
			?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Anterior</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Siguiente</span>
		</a>
	</div>
	<br>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-md-12 col-lg-12 order-md-1" data-aos="fade-up">
				<p style="text-align: justify" class="lead text-secondary">
					<span class="navbar-brand" style="color:var(--green);">CIVILSA S.A.S.</span><br>
					Ingeniería Civil y Sanitaria es una empresa joven, cuyo objetivo es aplicar talento humano como mayor herramienta y la constancia en el mejoramiento y aseguramiento de sus procesos, los refuerza con capital humano calificado en las siguientes unidades de negocio:
					<ul class="lead text-secondary home firsLetter" class="Home"><i class="fas fa-tint gota"></i> Diseño Hidrosanitarios.</ul>
					<ul class="lead text-secondary home firsLetter"><i class="fas fa-tint gota"></i> Construccion, Mantenimiento Preventivo y/o Correctivo de Redes Hidrosanitarias.</ul>
					<ul class="lead text-secondary home firsLetter"><i class="fas fa-tint gota"></i> PTAP – Plantas de Tratamiento de Agua Potable.</ul>
					<ul class="lead text-secondary home firsLetter"><i class="fas fa-tint gota"></i> Lavado y Mantenimiento de Tanques de Agua Potable y Residual.</ul>
					<ul class="lead text-secondary home firsLetter"><i class="fas fa-tint gota"></i> PRFV – Productos en Fibra de Vidrio.</ul>
					<ul class="lead text-secondary home firsLetter"><i class="fas fa-tint gota"></i> Suministro, Montaje y Mantenimiento de Equipos de Bombeo para Agua Potable y Agua Residual.</ul>
				</p>
				<br>
				<!-- Buttons -->
				<div class="text-center text-md-center btn-group-lg">
					<a href="{{ route('contact') }}" class="btn btn-primary shadow lift mr-1">
						Contáctanos <i class="fas fa-arrow-right d-none d-md-inline ml-3"></i>
					</a>
					<a href="{{ route('projects.index') }}" class="btn btn-outline-primary shadow lift mr-1">
						Portafolio <i class="fe fe-arrow-right d-none d-md-inline ml-3"></i>
					</a>
				</div>
			</div>
		</div>
	</div> <!-- / .row -->
	</div> <!-- / .container -->
</section>
<br><br>
@endsection