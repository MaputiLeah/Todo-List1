<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;

class TodoController extends Controller
{
     /**
     * Display a listing of the user's todos.
     *
     * @return \Illuminate\View\View
     */
    public function index(){
         // Retrieve the authenticated user's todos
        $todos = Auth::user()->todos;
        // Return the view with the user's todos
        return view('todos.index', [
            'todos' => $todos,
        ]);
    }
    /**
     * Show the form for creating a new todo.
     *
     * @return \Illuminate\View\View
     */
    public function create(){
        // Return the view for creating a new todo
        return view('todos.create');
    }
     /**
     * Store a newly created todo in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TodoRequest $request){
        // Get the authenticated user
        $user = Auth::user();
        // Create a new todo for the user
        $user->todos()->create([
            'tittle' => $request->tittle,
            'description' => $request->description,
            'is_completed' => 0
        ]);
         // Flash a success message to the session
        $request->session()->flash('alert-success', 'Todo Created Successfully');
        // Redirect to the index page for todos
        return redirect()->route('todos.index');
    }
    /**
     * Display the specified todo.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id){
        // Find the specified todo by ID
        $todo = Todo::find($id);
       
        // Check if the todo exists
        if(! $todo){
            // Flash an error message to the session
            $request->session()->flash('error', 'Unable to locate Todo');
            // Redirect to the index page for todos with an error message
            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate Todo List'
            ]);
        }
        // Return the view with the specified todo
        return view('todos.show', ['todo' => $todo]);
        
    }
     /**
     * Show the form for editing the specified todo.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id){
        // Find the specified todo by ID
        $todo = Todo::find($id);

        // Check if the todo exists
        if(! $todo){

            // Flash an error message to the session
            session()->flash('error', 'Unable to locate Todo');
            
            // Redirect to the index page for todos with an error message
            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate Todo'
            ]);
        }
        return view('todos.edit', ['todo' => $todo]);
    }
    /**
     * Update the specified todo in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TodoRequest $request){
        // Find the specified todo by ID
        $todo = Todo::find($request->todo_id);

         // Check if the todo exists
        if(! $todo){
            // Flash an error message to the session
            session()->flash('error', 'Unable to locate Todo');

            // Redirect to the index page for todos with an error message
            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate Todo'
            ]);
        }
        // Update the specified todo with the provided data
        $todo->update([
            'tittle' => $request->tittle,
            'description' => $request->description,
            'is_completed' => $request->is_completed
        ]);
         // Flash an info message to the session
        session()->flash('alert-info', 'Todo updated Successfully');
        return redirect()->route('todos.index');
    }
      /**
     * Remove the specified todo from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request){

        // Find the specified todo by ID
        $todo = Todo::find($request->todo_id);

        
        // Check if the todo exists
        if(! $todo){
            // Flash an error message to the session
            session()->flash('error', 'Unable to locate Todo');

             // Redirect to the index page for todos with an error message
            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate Todo List'
            ]);
        }
         // Delete the specified todo
        $todo->delete();
        // Flash a success message to the session
        session()->flash('alert-success', 'Todo deleted successfully');

        // Redirect to the index page for todos
        return redirect()->route('todos.index');
    }
    
}