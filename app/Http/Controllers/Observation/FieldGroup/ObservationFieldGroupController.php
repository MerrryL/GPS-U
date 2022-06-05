<?php

namespace App\Http\Controllers\Observation\FieldGroup;

use App\Http\Controllers\Controller;
use App\Models\FieldGroup;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationFieldGroupController extends Controller
{
    protected $defaultRelationships = array('fields');
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function index(Observation $observation)
    {
        return $observation->field_groups()->with('fields')->get()->toJson();
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
        return $observation->field_groups()->create($request->validate(['name' => 'required', 'type' => 'required']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\FieldGroup  $fieldGroup
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation, FieldGroup $fieldGroup)
    {
        if($fieldGroup->observation_id != $observation->id ) {
            abort (404);
        }

        return $fieldGroup->load($this->defaultRelationships);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\FieldGroup  $fieldGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation, FieldGroup $fieldGroup)
    {
        if($fieldGroup->observation_id != $observation->id ) {
            abort (404);
        }

        return $fieldGroup->update($request->validate(['name' => 'required', 'type' => 'required']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\FieldGroup  $fieldGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation, FieldGroup $fieldGroup)
    {
        if($fieldGroup->observation_id != $observation->id ) {
            abort (404);
        }

        return $fieldGroup->delete();
    }
}
