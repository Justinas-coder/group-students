<?php

namespace App\Http\Controllers\Api;
use App\Models\Student;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiStudentGroupAppController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:8|max:255',
            'project_id' => 'required|numeric',
        ]);

        if($validator->fails()){
            return $validator->messages();
        }

        $student = Student::create([
            'name' => $request->name,
            'project_id' => $request->project_id,
        ]);
        return response()->json(['student' => $student], 201);
    }
}
