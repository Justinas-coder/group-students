@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome back!') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $user->name }}
                </div>
                <div class="card-footer">
                    <a class="me-2 mb-2 btn btn-primary" href="{{route('project.create')}}">Create
                        Project</a>
                    <a class="me-2 mb-2 btn btn-primary" href="{{route('project.list')}}">View
                        Projects</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
