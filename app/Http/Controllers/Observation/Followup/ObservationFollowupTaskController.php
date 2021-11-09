<?php

namespace App\Http\Controllers\Observation\Followup;

use App\Http\Controllers\Controller;
use App\Models\Followup;
use App\Models\Task;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationFollowupTaskController extends Controller
{
    protected $defaultRelationships = array('operators', 'task_status');

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function index(Observation $observation, Followup $followup)
    {
        if($followup->observation_id != $observation->id ) {
            abort (404);
        }

        return $followup->tasks()->get->toJson();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Observation $observation, Followup $followup)
    {
        if($followup->observation_id != $observation->id ) {
            abort (404);
        }

        $request->validate([
            'name' => 'required', 
            'description' => 'required', 
            'realisation_date' => 'required', 
            'report_date' => 'required', 
            'report_periodicity' => 'required', 
            'task_status_id' => 'required', 
            'operators_id' => 'required'
        ]);

        $task = $followup->tasks()->create($request->all());
        
        $operators = $request->input('operators_id');

        $operators = array_column($operators, 'id');

        $task->operators()->sync($operators);

        return $task->load($this->defaultRelationships);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Followup  $followup
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation, Followup $followup, Task $task)
    {
        if($followup->observation_id != $observation->id ) {
            abort (404);
        }

        if($task->followup_id != $followup->id ) {
            abort (404);
        }

        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Followup  $followup
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation, Followup $followup, Task $task)
    {
        if($followup->observation_id != $observation->id ) {
            abort (404);
        }

        if($task->followup_id != $followup->id ) {
            abort (404);
        }

        return $task->update($request->validate([
            'name' => 'required', 
            'description' => 'required', 
            'realisation_date' => 'required', 
            'report_date' => 'required', 
            'report_periodicity' => 'required', 
            'task_status_id' => 'required', 
            'operators_id' => 'required'
        ]));

        $operators = $request->input('operators_id');

        $$operators = array_column($operators, 'id');

        $task->operators()->sync($operators);

        return $task->load($defaultRelationships);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Followup  $followup
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation, Followup $followup, Task $task)
    {
        if($followup->observation_id != $observation->id ) {
            abort (404);
        }

        if($task->followup_id != $followup->id ) {
            abort (404);
        }

        return $task->delete();
    }
}
