<?php

namespace App\Http\Controllers\Observation\Followup;

use App\Http\Controllers\Controller;
use App\Models\Followup;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationFollowupController extends Controller
{
    protected $defaultRelationships = array('tasks');

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function index(Observation $observation)
    {
        return $observation->followups()->with('tasks')->get()->toJson();

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
        return $observation->followups()->create($request->validate(['name' => 'required', 'description' => 'required']));
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

        return $followup->update($request->validate(['name' => 'required', 'description' => 'required']));
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

        return $followup->delete();
    }
}
