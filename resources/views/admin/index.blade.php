@extends('layouts.app')

@section('content')

    @if(session('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif

    @if(session('asset-updated-message'))
        <div class="alert alert-success">{{Session::get('asset-updated-message')}}</div>
    @endif

    @if(session('asset-created-message'))
        <div class="alert alert-success">{{Session::get('asset-created-message')}}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2>Project status page</h2>
            @foreach($queried_project as $project)
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
                </tbody>
            </table>
            <td>
                <form method="post" action="{{route('student.create')}}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <button class="btn btn-primary">New Student</button>
                </form>
            </td>
        </div>



    </div>

@endsection

{{--@section('scripts')--}}

{{--@endsection--}}
