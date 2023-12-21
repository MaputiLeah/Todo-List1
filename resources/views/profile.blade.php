@extends('layouts.app')
<style>
    body {
            font-family: 'figtree', sans-serif;
            background: linear-gradient(90deg, #7F9CF5 0%, #B794F4 100%);
            color: #1E293B;
        }
</style>

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Profile') }}</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Name:</strong> {{ Auth::user()->name }}
                        </div>

                        <div class="mb-3">
                            <strong>Email:</strong> {{ Auth::user()->email }}
                        </div>


                        <!-- Add more user details as needed -->

                        <a href="{{ route('profile.update') }}" class="btn btn-success">Update Profile</a>
                        <a href="{{ route('home') }}" class="btn btn-primary">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
