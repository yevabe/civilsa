@extends('layout')

@section('title', 'About')

@section('content')
<section class="welcome bg-cover">
	<div id="carouselExampleIndicators" class="carousel slide border-0" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php
			$ruta = "img/about";
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
			$ruta = "img/about/";
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
							$template = '<div class="carousel-item ' . $active . '">';
							$template .= "<img class='img-fluid' src='/img/about/{$file}' alt='Imagen {$count}' width='100%'>";
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
		<br>
		<div class="row">
			<div class="col-12 col-lg-12">
				<p style="text-align: justify" class="lead text-secondary">
					<span class="navbar-brand" style="color:var(--green);">CIVILSA S.A.S.</span> Ingeniería Civil y Sanitaria es una empresa Antioqueña especialista en ingeniería, proyectos y construcciones hidrosaniatarias desde 2010, habiendo realizado actuaciones en más de 500 proyectos hidráulicos en el ámbito local y nacional.
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
	</div>
</section>
@endsection