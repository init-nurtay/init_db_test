<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index(Request $request)
    {

        $orderBy = $request->input('orderBy', 'started_at');
        $orderSort = $request->input('orderSort', 'asc');
        $query = $request->input('name');
        if (!in_array($orderSort, ['asc', 'desc'])) {
            $orderSort = 'asc'; // or throw an exception or set to a default sort order
        }
        $clients = Client::all();
        $projects = Project::query()
            ->with(['client', 'country'])
            ->where($orderBy, 'like', $query)
            ->orderBy($orderBy, $orderSort)
            ->simplePaginate(20)
            ->get();

        return view('admin.projects.index', compact('projects', 'clients'));
    }

    public function store(ProjectRequest $request)
    {
        Project::create($request->validated());

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully');
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully');
    }
}
