
@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-4">

             <form action="{{route('project.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="project_title">Project Title</label>
                <input type="text" name="project_title" class="form-control" id="project_title" aria-describeby="" placeholder="">
            </div>
            <div class="form-group mb-3">
                <label for="number_of_groups">Number Of Groups</label>
                <input type="number" name="number_of_groups" class="form-control" id="number_of_groups" aria-describeby=""
                       placeholder="">
            </div>
            <div class="form-group mb-3">
                <label for="student_per_group">Student Per Group</label>
                <input type="number" name="student_per_group" class="form-control" id="student_per_group" aria-describeby=""
                       placeholder="">
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif

        </div>


    </div>
@endsection
