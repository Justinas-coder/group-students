@extends('layouts.app')

@section('content')

    @if(session('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif

    @if(session('project-updated-message'))
        <div class="alert alert-success">{{Session::get('project-updated-message')}}</div>
    @endif

    @if(session('project-created-message'))
        <div class="alert alert-success">{{Session::get('project-created-message')}}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2>Projects</h2>

            <div style="margin-top:30px"></div>

            <div class="col-md-6">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th >Project</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>
                                <a href="{{route('project.index', ['project'=>$project->id])}}">{{$project->project_title}}</a>
                            </td>
                            <td>
                                <form method="put" action="{{route('project.update', $project->id)}}"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    <button class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('project.destroy', $project->id)}}"
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

                <form method="" action="{{route('project.create')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <button class="btn btn-success">Create New Project</button>
                </form>

        </div>


    </div>



@endsection

@section('scripts')

@endsection
