@extends('layout')

@section('title', 'Crear proyecto')

@section('content')
<section class="welcome top bg-cover">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-8 mx-auto">
				@include('partials.validation-errors')

				<form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
					@method('PATCH')
					<h1 class="display-4 mb-0 font-weight-bold" style="text-shadow:0 1px 2px rgba(0, 0, 0, 0.25);">
						@lang('Edit project')
					</h1>
					<hr>
					@include('projects._form', ['btnText' => 'Actualizar'])

				</form>
				<br>
				<h3 class="font-weight-bold" style="text-shadow:0 1px 2px rgba(0, 0, 0, 0.25);"><i class="fas fa-caret-right"></i> Añade las imagenes del proyecto</h3>
				<form class="bg-white py-3 px-4 shadow rounded form-inline" id="formUploadImg" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" action="">
					<!-- <label class="font-weight-bold">Selecciona las imagenes del proyecto:</label> -->
					<div class="container">
						<div class="row">
							<div class="col-8 col-md-8">
								<input type="hidden" readonly name="uploadArch" id="uploadArch" value="1">
								<input type="hidden" readonly name="oidProject" id="oidProject" value="<?php echo $project->id; ?>">
								<input type="file" name="archivo[]" id="archivos" multiple required>
								<small>Seleccione uno o varios archivos</small>
							</div>
							<div class="col-4 col-md-4">
								<button type="submit" class="btn btn-primary-soft btn-block" id="btnSubirImagen">Subir</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-12 col-sm-12 col-lg-9 mx-auto">
				<hr style="width: 50%;">
				<div class="container" style="width:100%;">
					<div class="card">
						<div class="bg-white py-3 px-4 shadow rounded">
							<table class="table_filtered" style="width: 90%;">
								<thead>
									<tr>
										<th style="width: 70%;text-align:center;">Imagen</th>
										<th style="width: 20%;text-align:center;">Principal</th>
										<th style="width: 20%;text-align:center;">Eliminar</th>
									</tr>
								</thead>
								<tbody id="tableProject">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="{{ asset('js/project.js') }}" defer></script>
@endsection