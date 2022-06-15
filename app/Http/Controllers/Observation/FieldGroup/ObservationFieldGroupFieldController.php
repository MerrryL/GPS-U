<?php

namespace App\Http\Controllers\Observation\FieldGroup;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\FieldGroup;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationFieldGroupFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function index(Observation $observation, FieldGroup $fieldGroup)
    {
        if($fieldGroup->observation_id != $observation->id ) {
            abort (404);
        }

        return $fieldGroup->fields()->get()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Observation $observation, FieldGroup $fieldGroup)
    {
        if($fieldGroup->observation_id != $observation->id ) {
            abort (404);
        }

        return $fieldGroup->fields()->create($request->validate([
            'name' => 'required',
            'isRequired' => 'required', 
            'defaultValue' => 'nullable'
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation, FieldGroup $fieldGroup, Field $field)
    {
        if($fieldGroup->observation_id != $observation->id ) {
            abort (404);
        }

        if($field->field_group_id != $fieldGroup->id ) {
            abort (404);
        }

        return $field;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation, FieldGroup $fieldGroup, Field $field)
    {
        if($fieldGroup->observation_id != $observation->id ) {
            abort (404);
        }

        if($field->field_group_id != $fieldGroup->id ) {
            abort (404);
        }

        return $field->update($request->validate(['name' => 'required', 'isRequired' => 'required', 'defaultValue' => 'nullable']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation, FieldGroup $fieldGroup, Field $field)
    {
        if($fieldGroup->observation_id != $observation->id ) {
            abort (404);
        }

        if($field->field_group_id != $fieldGroup->id ) {
            abort (404);
        }

        return $field->delete();
    }
}
