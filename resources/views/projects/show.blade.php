@extends('layout')

@section('title', 'Portafolio | ' . $project->title)

@section('content')
<?php include('functions/listImgFunctions.php'); ?>
<section class="welcome top bg-cover">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-8 mx-auto">
                <div class="card-body bg-white p-5 shadow rounded">
                    @if($project->id)
                    <div id="carouselProjects" class="carousel slide border-0" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php listIndicadores($project->id); ?>
                        </ol>
                        <div class="carousel-inner z-index-200">
                            <?php
                            listImages($project->id);
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselProjects" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselProjects" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                    <div class="position-relative">
                        <div class="shape shape-bottom shape-fluid-x svg-shim text-white">
                            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                    @endif
                    <h1>{{ $project->title }}</h1>
                    <h5>{{ $project->client }}</h5>
                    <p class="text-secondary" style="text-align: justify">{{ $project->description }}
                    </p>
                    <p class="mb-0 text-black-50">{{ $project->created_at->diffForHumans() }}</p>
                    @if($project->category_id)
                    <a href="{{ route('categories.show', $project->category) }}" class="badge badge-secondary  badge-pill badge-float badge-float-inside">
                        {{ $project->category->name }}
                    </a>
                    @endif
                    <div class=" d-flex justify-content-between align-items-center">
                        <a href="{{ route('projects.index') }}" style="color:var(--blue);text-decoration:none;">
                            <i class="fas fa-long-arrow-alt-left"></i> Regresar
                        </a>
                        @auth
                        <div class="btn-group btn-group-sm">
                            @can('update', $project)
                            <a class="btn btn-success" href="{{ route('projects.edit', $project) }}">
                                Editar
                            </a>
                            @endcan
                            @can('delete', $project)
                            <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-project').submit()">
                                Eliminar
                            </a>
                            @endcan
                        </div>
                        @can('delete', $project)
                        <form id="delete-project" class="d-none" method="POST" action="{{ route('projects.destroy', $project) }}">
                            @csrf @method('DELETE')
                        </form>
                        @endcan
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection