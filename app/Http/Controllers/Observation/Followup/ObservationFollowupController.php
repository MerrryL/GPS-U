<?php

namespace App\Http\Controllers\Observation\Followup;

use App\Http\Controllers\Controller;
use App\Models\Followup;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationFollowupController extends Controller
{
    protected $defaultRelationships = array('tasks', 'followup_status', 'supervisors');

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function index(Observation $observation)
    {
        return $observation->followups()->with('tasks', 'followup_status', 'supervisors')->get()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Observation $observation)
    {
        $request->validate([
            'name' => 'required', 
            'description' => 'required', 
            'followup_status_id' => 'required', 
            'supervisors_id' => 'required'
        ]);

        $followup = $observation->followups()->create($request->all());
        
        $supervisors = $request->input('supervisors_id');

        $supervisors = array_column($supervisors, 'id');

        $followup->supervisors()->sync($supervisors);

        return $followup->load('supervisors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation, Followup $followup)
    {
        if($followup->observation_id != $observation->id ) {
            abort (404);
        }

        return $followup->load($this->defaultRelationships);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation, Followup $followup)
    {
        if($followup->observation_id != $observation->id ) {
            abort (404);
        }

        $request->validate([
            'name' => 'required', 
            'description' => 'required', 
            'followup_status_id' => 'required', 
            'supervisors_id' => 'required'
        ]);

        $followup->update($request->all());
        
        $supervisors = $request->input('supervisors_id');

        $supervisors = array_column($supervisors, 'id');

        $followup->supervisors()->sync($supervisors);

        return $followup->load($this->defaultRelationships);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation, Followup $followup)
    {
        if($followup->observation_id != $observation->id ) {
            abort (404);
        }

        //TODO: handle soft deletion and nested deletion

        return $followup->delete();
    }
}
