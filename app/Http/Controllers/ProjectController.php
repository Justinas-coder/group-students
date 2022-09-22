<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectValidationRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Project  $project
     */
    public function index(ProjectService $service, Project $project)
    {
        $students = $service->showAllProjectStudents($project);
        $groups = $service->showAllProjectGroups($project);

        return view('admin.index', [
            'project' => $project,
            'students' => $students,
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectValidationRequest $request, ProjectService $service)
    {
        $service->storeNewProject(
            auth()->user()->id,
            $request->project_title,
            $request->number_of_groups,
            $request->student_per_group
        );

        $project = $service->storeProjectGroups(Project::all());
        session()->flash('project-created-message', 'Project was Created');
        return redirect()->route('project.index', ['project' => $project]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(ProjectService $service)
    {
        $projects = $service->showAllUserProjects(Project::all());

        return view('admin.projects_list', ['projects' => $projects]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        $project->delete();
        Session::flash('message', 'Project was deleted');
        return back();
    }
}
