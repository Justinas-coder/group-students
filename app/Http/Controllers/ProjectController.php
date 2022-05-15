<?php

namespace App\Http\Controllers;

use App\Models\Project;

use Illuminate\Http\Request;
use App\Models\Student;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $project_title = Project::all();


        return view('admin.index', [
            'project_title' => $project_title,
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
        $students = Student::all();

        $inputs = $request->validate([
            'project_title' => 'required|min:8|max:255',
            'number_of_groups' => 'required|numeric',
            'student_per_group' => 'required|numeric',
        ]);

        $project = auth()->user()->project()->create($inputs);
        $queried_project = auth()->user()->project()->where('id', $project->id)->get()->all();
        session()->flash('project-created-message', 'Project was Created');
        return  view('admin.index', ['queried_project' => $queried_project, 'students' => $students]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
