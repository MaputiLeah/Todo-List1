@extends('layouts.app')

@section('styles')
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background: linear-gradient(90deg, #7F9CF5 0%, #B794F4 100%);
            color: #1E293B;
        }
        #outer{
            width: auto;
            text-align:center;
        }
        .inner{
            display: inline-block;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                @if(Session::has('alert-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    {{ Session::get('alert-success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(Session::has('alert-info'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('alert-info') }}
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <a class="btn btn-sm btn-info" href="{{ route('todos.create') }}">Create Todo</a>

                @if ($todos && count($todos) > 0)
                    <table  class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Completed</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td>{{ $todo->tittle }}</td>
                                    <td>{{ $todo->description }}</td>
                                    <td>
                                        @if ($todo->is_completed == 1)
                                            <a class="btn btn-sm btn-success" href="">Completed</a>
                                        @else    
                                            <a class="btn btn-sm btn-danger" href="">In Completed</a>
                                        @endif 
                                    </td>
                                    <td id="outer">
                                        <a class="inner btn btn-sm btn-success" href="{{ route('todos.show', $todo->id) }}">View</a>
                                        <a class="inner btn btn-sm btn-primary" href="{{ route('todos.edit', $todo->id) }}">Edit</a>
                                        <form method="post" action="{{ route('todos.destroy') }}" class="inner" onsubmit="return confirm('Are you sure you want to delete this todo?');">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                     <h4>no todo are created yet</h4>
                @endif
                    
                    </table>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 5000);
</script>