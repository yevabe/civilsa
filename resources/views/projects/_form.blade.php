@csrf

<div class="form-group">
	<label for="category_id" class="font-weight-bold">Categoría del Proyecto</label>
	<select name="category_id" id="category_id" class="form-control border-0 bg-light shadow-sm">
		<option value="">Seleccione</option>
		@foreach($categories as $id => $name)
		<option value="{{ $id }}" @if($id==old('category_id', $project->category_id)) selected @endif>
			{{ $name }}
		</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	<label for="client" class="font-weight-bold">Cliente</label>
	<input class="form-control border-0 bg-light shadow-sm" type="text" name="client" value="{{ old('client', $project->client) }}" require>
</div>

<div class="form-group">
	<label for="project" class="font-weight-bold">Nombre del proyecto</label>
	<input class="form-control border-0 bg-light shadow-sm" type="text" name="project" value="{{ old('project', $project->project) }}" require>
</div>

<div class="form-group">
	<label for="description" class="font-weight-bold">Descripción del proyecto</label>
	<textarea class="form-control border-0 bg-light shadow-sm" name="description" require>{{ old('description', $project->description) }}</textarea>
</div>

<div class="row">
	<div class="col-md-6">
		<button class="btn btn-primary shadow lift mr-1 btn-block">
			{{ $btnText }}
		</button>
	</div>
	<div class="col-md-6">
		<a class="btn btn-outline-danger shadow lift mr-1 btn-block" href="{{ route('projects.index') }}">
			Cancelar
		</a>
	</div>
</div>