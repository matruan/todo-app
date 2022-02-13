<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TasksController extends Controller
{
    public function index() {

        // Retrieve all of the tasks when we visit the homepage

        $tasks = Task::orderBy('completed_at')
           ->orderBy('id', 'DESC')
           ->get();

        // Display / Render all of the tasks that we have

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create() {
        return view('tasks.create');
    }

    public function store() {
        request()->validate([
            'description' => 'required|max:255',
        ]);
        Task::create([
          'description' => request('description'),
        ]);

        // Return to the homepage when a task is created
        
        return redirect('/');
    }

    // Mark a task as completed 
    public function update($id) {
        $task = Task::where('id', $id)->first();
        
        $task->completed_at = now();

        $task->save();

        return redirect('/');
    }

    // Delete a task
    public function delete($id) {
        $task = Task::where('id', $id)->first();

        $task->delete();
        return redirect('/');
    }
}
