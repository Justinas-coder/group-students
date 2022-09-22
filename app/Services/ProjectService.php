<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use http\Encoding\Stream\Inflate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProjectService
{
    public function storeNewProject(
        int $user_id,
        string $project_title,
        int $number_of_groups,
        int $student_per_group,
    ) : Project

    {
        $project = Project::create([
            'user_id' => $user_id,
            'project_title' => $project_title,
            'number_of_groups' =>  $number_of_groups,
            'student_per_group' => $student_per_group
        ]);

        return $project;
    }

    public function showAllProjectStudents($project){

        $students = Student::all()->where('project_id', $project->id);

        return $students;
    }

    public function showAllProjectGroups($project){

        $groups = Group::all()->where('project_id', $project->id);

        return $groups;
    }

    public function storeProjectGroups($project){

        $project = Project::latest()->first();

        for ($group = 1; $group<=$project['number_of_groups']; $group++){
            Group::create(['project_id'=> $project->id]);
        }

        return $project;
    }

    public function showAllUserProjects($project){

        $projects = Project::all()->where('user_id', Auth::user()->id);

        return $projects;
    }


}
