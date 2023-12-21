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
                    <div class="card-header">{{ __('Update Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                            </div>

                            <!-- Add more user details as needed -->

                            <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                        </form>

                        <a href="{{ route('profile') }}" class="btn btn-warning text-dark fw-bold mt-3">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
