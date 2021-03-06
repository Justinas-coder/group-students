@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-4">

            <form action="{{route('student.store', $project)}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describeby="" placeholder="" autofocus="autofocus">

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif

        </div>


    </div>
@endsection
