<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Http\Requests\ProjectRequest;
use App\Models\Lead;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::query()->get();
        return view('admin.projects.index',compact('projects'));
    }

    public function store(ProjectRequest $request) {
        Project::create($request->validated());

        return redirect()->route('admin.projects.index')->with('success','Project created successfully');
    }

    public function update(ProjectRequest $request, Project $project) {
        $project->update($request->validated());
        return redirect()->route('admin.projects.index')->with('success','Project updated successfully');
    }

    public function destroy(Project $project) {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success','Project deleted successfully');
    }
}
