<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        return Task::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'sometimes|required|max:255',
            'description' => 'nullable',
            'completed' => 'sometimes|boolean'
        ]);

        $task->update($request->all());

        return $task;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }
}