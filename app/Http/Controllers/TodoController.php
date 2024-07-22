<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();

        return view('Todo/App', [
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Todo.App');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Todo::create($request->all());

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todos = Todo::findOrFail('$id');

        return view('Todo.App', [
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Todo::findOrFail($id);
        $task->delete();

        return redirect('/');
    }

    public function search (Request $request) {
        
        $search = $request->input('search');
        $todos = Todo::where('task', 'like', '%' . $search . '%')->get();

        return view('Todo.app', [
            'todos' => $todos,
        ]);


    }
}
