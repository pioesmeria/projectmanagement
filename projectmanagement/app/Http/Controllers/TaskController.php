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
        $tasks = Task::paginate(15);
        
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
        ($request->Task_id) : new Task;

        $task->id = $request->input('Task_id');
        $task->title = $request->input('title');
        $task->body = $request->input('body');
        
        if($task->save()){
            return new TaskResource($Task);
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
