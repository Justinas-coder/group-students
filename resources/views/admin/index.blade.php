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

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2>Project status page</h2>

            @foreach($projects as $project)
                <h5>Project: {{$project['project_title']}}</h5>
                <h5>Number of groups: {{$project['number_of_groups']}}</h5>
                <h5>Student per group: {{$project['student_per_group']}}</h5>
            @endforeach
        </div>
        <div style="margin-top:30px"></div>

        <div class="col-md-6">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th >Student</th>
                    <th>Group</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student['name']}}</td>
                        <td></td>
                        <td>
                            <form method="post" action="{{route('student.destroy', $student->id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>2
            </table>
            <td>
                <form method="post" action="{{route('student.create', ['project'=>$project])}}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <button class="btn btn-primary">New Student</button>
                </form>
            </td>
        </div>
    </div>

    <br>

    <div>
        <div class="row justify-content-center">
            <div style="margin-top:30px"></div>

            <div class="col-md-2">

                @for($group = 1; $group<=$project['number_of_groups']; $group++)
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Group # {{$group}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>                                @for($student_select = 1; $student_select<=$project['student_per_group']; $student_select++)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    </div>
                                    <select class="custom-select" id="student" name="student">
                                        <option selected>Assign Student</option>
                                        @foreach ($students as $student)
                                            <option value="{{$student->name}}">{{$student->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endfor
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endfor

            </div>

        </div>

    </div>

@endsection

@section('scripts')

@endsection
