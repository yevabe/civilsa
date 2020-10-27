@extends('layout')

@section('title', 'Portafolio CIVILSA')

@section('content')
<?php include('functions/listImgFunctions.php'); ?>
<section class="welcome top bg-cover">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-6">
            @isset($category)
            <div>
                <h1 class="display-4 mb-0">{{ $category->name }}</h1>
                <a href="{{ route('projects.index') }}">Regresar al portafolio</a>
            </div>
            @else
            <div class="icon text-primary mb-3 text-nowrap">
                <h1 class="display-4 mb-0 font-weight-bold" style="text-shadow:0 1px 2px rgba(0, 0, 0, 0.25);"><i class="fas fa-project-diagram text-gray-200"></i> @lang('Projects')</h1>
            </div>
            @endisset
            @can('create', $newProject)
            <a class=" btn btn-primary" href="{{ route('projects.create') }}"><i class="fas fa-plus"></i> Crear proyecto</a>
            @endcan

        </div>
        <p style="text-align: justify" class="lead text-secondary"><i class="fas fa-angle-right text-gray-200"></i> Proyectos realizados...</p>
        <div class="d-flex flex-wrap justify-content-between align-items-start">
            @forelse($projects as $project)
            <div class="card lift lift-lg mb-6 mb-xl-0 shadow-light-lg border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">
                @if($project->id)
                <?php echo listarArchivosAdjuntos($project->id); ?>
                <div class="position-relative">
                    <div class="shape shape-bottom shape-fluid-x svg-shim text-white">
                        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor" />
                        </svg>
                    </div>
                </div>
                @endif
                <div class="card-body">
                    <h3 class="card-title font-weight-bold">
                        <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                    </h3>
                    <h6>{{ $project->client }}</h6>
                    <p class="card-text text-truncate text-dark" style="text-align: justify">{{ $project->description }}
                    </p>
                    <div class="mb-1">
                        <p class="text-black-50 text-secondary">{{ $project->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-primary btn-sm shadow lift">
                            Ver más...
                        </a>
                        @if($project->category_id)
                        <!-- Badge -->
                        <a href="{{ route('categories.show', $project->category) }}" class="badge badge-secondary  badge-pill badge-float badge-float-inside">
                            {{ $project->category->name }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="card">
                <div class="card-body">
                    No hay proyectos para mostrar
                </div>
            </div>
            @endforelse
        </div>
        <div class="mt-4">
            {{ $projects->links() }}
        </div>

        @can('view-deleted-projects')
        <h4 style="text-shadow:0 1px 2px rgba(0, 0, 0, 0.25);" class="font-weight-bold"><i class="fas fa-trash"></i> Papelera</h4>
        <ul class="list-group">
            @foreach($deletedProjects as $deletedProject)
            <li class="list-group-item">
                {{ $deletedProject->project }}
                <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                    &nbsp;&nbsp;
                    @can('restore', $deletedProject)
                    <form method="POST" action="{{ route('projects.restore', $deletedProject) }}" class="d-inline">
                        @csrf @method('PATCH')
                        <button class="btn btn-sm btn-outline-primary">Restaurar</button>
                    </form>
                    &nbsp;&nbsp;
                    @endcan
                    @can('force-delete', $deletedProject)
                    <form method="POST" onsubmit="return confirm('Esta acción no se puede deshacer, ¿Estás seguro de querer elimar el proyecto?')" action="{{ route('projects.force-delete', $deletedProject) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar permanentemente</button>
                    </form>
                    @endcan
                </div>
            </li>
            @endforeach
        </ul>
        @endcan
    </div>
</section>
<br><br>
@endsection