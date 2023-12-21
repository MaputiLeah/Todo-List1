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
                <div class="card-header">{{ __('Information About Your Todo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <b>Your Todo title is: </b> {{ $todo->tittle }}
                    <br>
                    <b>Your Todo descrption is: </b> {{ $todo->description }}
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-info" >Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection