<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Resources\Task as TaskResource;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get Tasks
        $tasks = Task::orderBy('status', 'ASC')
                    ->orderBy('updated_at', 'ASC')
                    ->paginate(15);
        
        //return collection of Tasks as a resource
        return TaskResource::collection($tasks); #collection when returning list
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $task = $request->isMethod('put') ? Task::findOrFail
        ($request->task_id) : new Task;

        $task->task_id = $request->input('task_id');
        $task->task_description = $request->input('task_description');
        $task->status = $request->input('status');
        
        if($task->save()){
            return new TaskResource($task);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get Tasks
        $task = Task::findOrFail($id);
        
        //return single Task as a resource
        return new TaskResource($task); 
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get Tasks
        $task = Task::findOrFail($id);
        
        if($task->delete()){
            return new TaskResource($task);
        }
        
    }
}
