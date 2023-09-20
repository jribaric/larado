<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tasks = Task::with('user')->latest('tasks.created_at')->filter(request(['search']))->get();


        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $title = $request->validate([
            'title' => 'required'
        ]);
        // dd($title['title']);

        $task = Task::create(['title' => $title['title'], 'user_id' => auth()->user()->id]);

        $task->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if(auth()->user()->id != $task->user_id){
            abort(403, 'Not your post.');
        }
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $newTitle = $request->title;

        $task->title = $newTitle;
        $task->save();

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {

        if($task->user_id != auth()->user()->id){
            abort(403, 'No.');
        } else {
            $task->delete();
        }

        return redirect('/')->with('message', "{$task->title} deleted succesfully.");
    }
}
