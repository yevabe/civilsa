@extends('layout')

@section('title', 'Contact')

@section('content')
<script src="{{ asset('/js/contact.js') }}" defer></script>
<div class="container top">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-8 mx-auto">

			<form class="bg-white shadow rounded py-3 px-4" id="formContact">
				<input type="hidden" name="enviarContacto" value="1">
				@csrf
				<h1 class="display-4 text-primary font-weight-bold" style="text-shadow:0 1px 2px rgba(0, 0, 0, 0.25);"><i class="fas fa-envelope-open-text text-gray-200"></i> {{ __('Contact') }}</h1>
				<hr>
				<div class="form-group">
					<label for="name" class="font-weight-bold">Nombre</label>
					<input class="form-control bg-light shadow-sm" id="nombre" name="nombre" placeholder="Escribe aquí tu nombre completo..." required>
				</div>
				<div class="form-group">
					<label for="email" class="font-weight-bold">Email</label>
					<input class="form-control bg-light shadow-sm" id="email" name="email" placeholder="Escribe aquí tu e-mail..." required maxlength="99">
				</div>
				<div class="form-group">
					<label for="subject" class="font-weight-bold">Asunto</label>
					<input class="form-control bg-light shadow-sm" id="asunto" name="asunto" placeholder="Escribe aquí el asunto de tu mensaje..." required maxlength="170">
				</div>
				<div class="form-group">
					<label for="content" class="font-weight-bold">Contenido</label>
					<textarea class="form-control bg-light shadow-sm" id="contenido" name="contenido" placeholder="Escribe aquí el contenido de tu mensaje..." required maxlength="450"></textarea>
				</div>
				<button type="submit" class="btn btn-primary shadow lift btn-lg btn-block" id="btnEnviar">Enviar</button>
			</form>
		</div>
	</div>
</div>
@endsection