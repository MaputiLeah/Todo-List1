@extends('layouts.app')

@section('content')
<style>
    body {
            font-family: 'figtree', sans-serif;
            background: linear-gradient(90deg, #7F9CF5 0%, #B794F4 100%);
            color: #1E293B;
        }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in,') }} {{ Auth::user()->name }}!
                    <br>
                    <div class="container mt-5 text-center">
                        <a class="btn btn-sm btn-info fw-bold text-white" href="{{ route('todos.index') }}">View Todo List</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('todos.create') }}">Create Todo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection