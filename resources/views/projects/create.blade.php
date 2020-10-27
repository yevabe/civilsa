@extends('layout')

@section('title', 'Crear proyecto')

@section('content')
<section class="welcome top bg-cover">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-8 mx-auto">

				@include('partials.validation-errors')

				<form class="bg-white py-3 px-4 shadow rounded" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('projects.store') }}">
					<h1 class="font-weight-bold" style="text-shadow:0 1px 2px rgba(0, 0, 0, 0.25);"><i class="fas fa-angle-right"></i> @lang('New project')</h1>
					<hr>
					@include('projects._form', ['btnText' => 'Guardar'])

				</form>
			</div>
		</div>
	</div>
</section>
@endsection