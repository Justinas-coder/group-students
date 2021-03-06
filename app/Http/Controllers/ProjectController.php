<?php

namespace App\Http\Controllers;

use App\Models\Project;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Group;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Project  $project
     */
    public function index(Project $project)
    {
        $students = Student::all()->where('project_id', $project->id);
        $groups = Group::all()->where('project_id', $project->id);

        return view('admin.index', [
            'project' => $project,
            'students' => $students,
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'project_title' => 'required|min:8|max:255',
            'number_of_groups' => 'required|numeric',
            'student_per_group' => 'required|numeric',
        ]);

        $project = auth()->user()->project()->create($inputs);

        for ($group = 1; $group<=$project['number_of_groups']; $group++){
           Group::create(['project_id'=> $project->id]);
        }

        session()->flash('project-created-message', 'Project was Created');
        return redirect()->route('project.index', ['project' => $project]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $projects = Project::all()->where('user_id', Auth::user()->id);

        return view('admin.projects_list', ['projects' => $projects]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        Session::flash('message', 'Project was deleted');
        return back();
    }
}
