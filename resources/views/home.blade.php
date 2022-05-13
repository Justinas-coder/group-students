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
            </div>
        </div>
        <div style="margin-top:30px"></div>
        <div class="col-md-8">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link btn btn-outline-secondary" href="{{route('project.create')}}">Create
                        Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-secondary" href="{{route('project.index')}}">View
                        Projects</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
