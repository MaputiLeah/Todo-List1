<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;

class TodoController extends Controller
{

    public function index(){
        $todos = Auth::user()->todos;
        return view('todos.index', [
            'todos' => $todos,
        ]);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(TodoRequest $request){
        $user = Auth::user();
    
        $user->todos()->create([
            'tittle' => $request->tittle,
            'description' => $request->description,
            'is_completed' => 0
        ]);
    
        $request->session()->flash('alert-success', 'Todo Created Successfully');
    
        return redirect()->route('todos.index');
    }

    public function show($id){
        $todo = Todo::find($id);
        if(! $todo){
            $request->session()->flash('error', 'Unable to locate Todo');
            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate Todo List'
            ]);
        }
        return view('todos.show', ['todo' => $todo]);
        
    }
    
    public function edit($id){
        $todo = Todo::find($id);

        if(! $todo){
            session()->flash('error', 'Unable to locate Todo');
            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate Todo'
            ]);
        }
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request){
        $todo = Todo::find($request->todo_id);
        if(! $todo){
            session()->flash('error', 'Unable to locate Todo');
            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate Todo'
            ]);
        }
        $todo->update([
            'tittle' => $request->tittle,
            'description' => $request->description,
            'is_completed' => $request->is_completed
        ]);
        session()->flash('alert-info', 'Todo updated Successfully');
        return redirect()->route('todos.index');
    }
    
    public function destroy(Request $request){
        $todo = Todo::find($request->todo_id);

        if(! $todo){
            session()->flash('error', 'Unable to locate Todo');
            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate Todo List'
            ]);
        }
        $todo->delete();
        session()->flash('alert-success', 'Todo deleted successfully');
        return redirect()->route('todos.index');
    }
    
}