<?php

namespace App\Http\Controllers;
use App\Models\Taskadd;
use Illuminate\Http\Request;

class TaskaddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Taskadd::all();
        return view('taskadd.index', compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taskadd/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required',
        ]);
        $task = new Taskadd();
        $task->task_name = $request->task;
        $task->save();
        return redirect()->route('taskadd.index')->with('success', 'Task Save successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
