<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
use App\Events\ProjectSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        return view('projects.index', [
            'newProject' => new Project,
            'projects' => Project::with('category')->latest()->paginate(6),
            'deletedProjects' => Project::onlyTrashed()->get()
        ]);
    }

    public function create()
    {
        $this->authorize('create', $project = new Project);

        return view('projects.create', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function store(SaveProjectRequest $request)
    {
        $project = new Project($request->validated());

        $this->authorize('create', $project);

        // $project->image = $request->file('image')->store('images');

        $project->save();

        ProjectSaved::dispatch($project);

        return redirect()->route('projects.index')->with('status', __('The project was created successfully.'));
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        $this->authorize('update', $project);

        if ($request->hasFile('image')) {
            Storage::delete($project->image);

            $project->fill($request->validated());

            $project->image = $request->file('image')->store('images');

            $project->save();

            ProjectSaved::dispatch($project);
        } else {
            $project->update(array_filter($request->validated()));
        }

        return redirect()->route('projects.show', $project)->with('status', __('The project was successfully updated.'));
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect()->route('projects.index')
            ->with('status', __('The project was successfully removed.'));
    }

    public function restore($projectId)
    {
        $project = Project::withTrashed()->where('id', $projectId)->firstOrFail();

        $this->authorize('restore', $project);

        $project->restore();

        return redirect()->route('projects.index')
            ->with('status', __('The project was successfully restored.'));
    }

    public function forceDelete($projectId)
    {
        $project = Project::withTrashed()->where('id', $projectId)->firstOrFail();

        $this->authorize('force-delete', $project);

        Storage::delete($project->image);

        $project->forceDelete();

        return redirect()->route('projects.index')
            ->with('status', __('The project was permanently removed.'));
    }
}
