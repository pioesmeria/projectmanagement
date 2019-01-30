<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectTask;
use App\Http\Resources\ProjectTask as ProjectTaskResource;
class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //get Tasks
        $projectTasks = ProjectTask::where('project_id', $id)
                                ->paginate(15);
        
        //return collection o3f Tasks as a resource
        return ProjectTaskResource::collection($projectTasks); #collection when returning list
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
        $projectTask = $request->isMethod('put') ? ProjectTask::findOrFail
        ($request->task_id) : new ProjectTask;

        $projectTask->task_id = $request->input('task_id');
        $projectTask->project_id = $request->input('project_id');
        
        if($projectTask->save()){
            return new ProjectTaskResource($projectTask);
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
        $projectTask = ProjectTask::findOrFail($id);
        
        //return single Task as a resource
        return new ProjectTaskResource($projectTask); 
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
        $projectTask = ProjectTask::findOrFail($id);
        
        if($projectTask->delete()){
            return new ProjectTaskResource($projectTask);
        }
        
    }
    
}
