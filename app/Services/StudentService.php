<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentService {

    public function storeNewStudent(
        string $name,
        int $project_id
    ) :Student
    {
        $student = Student::create([
            'name' => $name,
            'project_id' => $project_id]);

        return $student;
    }



}

