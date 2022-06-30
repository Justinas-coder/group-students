<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Project;

use Illuminate\Http\Request;


class StudentController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)

    {
        return view('admin.student_create', ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $project)
    {

            $request->validate([
               'name' => 'required|min:8|max:255|unique:App\Models\Student,name'


        ]);


        Student::create(['name' => $request->name, 'project_id' => $project]);
        session()->flash('student-created-message', 'Student was Created');
        return redirect()->route('project.index', ['project' => $project]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function unassign(Request $request, Student $student)
    {

        $student->update(['group_id' => NULL]);
        return back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $group)
    {
        $student = Student::find($request->student_id);
        $student->group_id = $group;
        $student->update();

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return back();
    }
}
