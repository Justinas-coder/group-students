@extends('layouts.app')

@section('content')

    @if(session('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif

    @if(session('project-updated-message'))
        <div class="alert alert-success">{{Session::get('project-updated-message')}}</div>
    @endif

    @if(session('asset-created-message'))
        <div class="alert alert-success">{{Session::get('project-created-message')}}</div>
    @endif

    <div class="container">
        <div class="mb-3">
            <h2>Project status page</h2>


                <h5>Project: <strong>{{$project->project_title}}</strong></h5>
                <h5>Number of groups: <strong>{{$project->number_of_groups}}</strong></h5>
                <h5>Student per group: <strong>{{$project->student_per_group}}</strong></h5>

        </div>

        <div>
            <table class="table table-bordered " id="dataTable">
                <thead>
                <tr>
                    <th >Student</th>
                    <th>Group</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student['name']}}</td>
                        <td>{{ ($student->group_id) == NULL ? '-' : $student->group_id }}
                        </td>
                        <td class="d-flex justify-content-end">
                            <form method="post" action="{{route('student.destroy', $student->id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <td>

                <a class="me-2 mb-2 btn btn-primary" href="{{route('student.create', $project->id)}}">New Student</a>


            </td>
        </div>
    </div>

    <div class="mt-5 container">
        <div class="row">
            @foreach($project->groups as $group)
                <div class="col-md-3">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>Group # {{$group->id}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                @foreach($group->students as $assigned_student)
                                    <form action="">
                                        <select name="" id="">
                                            <option value="" selected disabled>{{ $assigned_student->name }}</option>
                                            <option value="{{ $student->id }}">Remove from group</option>
                                        </select>
                                    </form>
                                @endforeach

                                @for($index = 1; $index<=$project['student_per_group'] - $group->students->count(); $index++)
                                    <form action="{{route('student.update', ['group'=>$group->id])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group mb-2">

                                            <select class="form-select" id="student_id" name="student_id" onchange="this.form.submit()">
                                                <option value="" disabled selected>Assign student</option>
                                                @foreach ($students as $student)
                                                    @if(!$student->group()->exists())
                                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                                    @elseif($student->group_id == $group->id)
                                                        <option value="{{$student->id}}" selected>{{$student->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                    </form>
                                @endfor
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            @endforeach



        </div>

    </div>

@endsection

@section('scripts')

@endsection
