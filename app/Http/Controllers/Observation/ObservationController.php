<?php

namespace App\Http\Controllers\Observation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Observation;

class ObservationController extends Controller
{
    //TODO: verification and error
    //DRY
    protected $defaultRelationships = array('codex', 'field_groups.fields', 'followups.supervisors', 'followups.tasks.task_status', 'followups.tasks.operators', 'followups.followup_status');

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Observation::all()->load($this->defaultRelationships)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Observation::create(['name' => 'test', 'codex_id' => '1', 'code' => '123', 'short_description' => 'none', 'description' => 'none', 'fine_amount'=> "Jusque 500€"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation)
    {
        return $observation->load($this->defaultRelationships);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation)
    {
        $observation->update($request->validate([
            'codex_id' => 'required',
            'fine_amount' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]));
        
        return $observation->load($this->defaultRelationships);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation)
    {
        //
    }
}
