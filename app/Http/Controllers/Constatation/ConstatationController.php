<?php

namespace App\Http\Controllers\Constatation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Constatation;
use App\Models\Localization;

use Illuminate\Support\Facades\Log;

class ConstatationController extends Controller
{
    //TODO: verification and error
    //DRY
    protected $defaultRelationships = array('fields.field_group.observation', 'localization', 'images.media', 'images.image_request', 'observers', 'observations.codex', 'observations.field_groups.fields', 'media');

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Constatation::with($this->defaultRelationships)->orderBy('id', 'desc')->get()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $constatation = Constatation::create($request->validate([
            'description' => 'required',
            'observers' => 'required',
            'observations' => 'required'
        ]));

        $localization = Localization::create(['name' => 'at_creation', 'given_name' => '', 'formatted_address' => '']);
        $constatation->localization()->save($localization);

        $observations = $request->input('observations');
        $observations = array_column($observations, 'id');
        $constatation->observations()->sync($observations);

        //fields syncing
        $observations = $constatation->load($this->defaultRelationships)->observations;
        $fieldGroups = $observations->map( function ($observation)
        {
            if( $observation->field_groups->count() > 0 )
            {
                return $observation->field_groups;
            }
        })->collapse();
        
        $fields = $fieldGroups->map( function ($fieldGroup)
        {
                return $fieldGroup->fields;

        })->collapse()->pluck('id');

        $constatation->fields()->syncWithPivotValues($fields, ['value' => '']);

        //images syncing
        $image_requests = $observations->map( function ($observation)
        {
            if( $observation->image_requests->count() > 0 )
            {
                return $observation->image_requests;
            }
        })->collapse()->pluck('id');

        $constatation->image_requests()->sync($image_requests);

        //observers syncing
        $observers = $request->input('observers');
        $observers = array_column($observers, 'id');
        $constatation->observers()->sync($observers);

        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Constatation $constatation)
    {
        return $constatation->load($this->defaultRelationships)->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constatation $constatation)
    {
        $constatation->update($request->validate([
            'description' => 'required',
            'observers' => 'required',
            'observations' => 'required'
        ]));

        $observations = $request->input('observations');
        $observations = array_column($observations, 'id');
        $constatation->observations()->sync($observations);

        //fields syncing
        $observations = $constatation->load($this->defaultRelationships)->observations;
        $fieldGroups = $observations->map( function ($observation)
        {
            if( $observation->field_groups->count() > 0 )
            {
                return $observation->field_groups;
            }
        })->collapse();
        
        $fields = $fieldGroups->map( function ($fieldGroup)
        {
                return $fieldGroup->fields;

        })->collapse()->pluck('id');

        $constatation->fields()->syncWithPivotValues($fields, ['value' => '']);

        //images syncing
        $image_requests = $observations->map( function ($observation)
        {
            if( $observation->image_requests->count() > 0 )
            {
                return $observation->image_requests;
            }
        })->collapse()->pluck('id');

        $constatation->image_requests()->sync($image_requests);

        //observers syncing
        $observers = $request->input('observers');
        $observers = array_column($observers, 'id');
        $constatation->observers()->sync($observers);

        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Update the validation status.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function require_validation(Constatation $constatation){
        $constatation->requires_validation=true;
        $constatation->requires_validation_date=now();

        $constatation->save();

        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Update the validation status.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function refuse_validation(Constatation $constatation){
        $constatation->requires_validation=false;
        $constatation->requires_validation_date= null;

        $constatation->save();

        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Update the validation status.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function validate_constatation(Constatation $constatation){
        $constatation->requires_validation=false;
        $constatation->requires_validation_date=null;
        $constatation->is_validated=true;
        $constatation->validation_date= now();
        $constatation->save();

        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
