<?php

namespace App\Http\Controllers\Constatation;

use App\Http\Controllers\Controller;
use App\Models\Constatation;
use App\Models\Field;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ConstatationFieldController extends Controller
{
    protected $defaultRelationships = array('fields.field_group.observation', 'localization', 'images.media', 'images.image_request', 'observers', 'observations.codex', 'observations.field_groups.fields', 'media');

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function index(Constatation $constatation)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Constatation $constatation)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Constatation $constatation, Field $field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constatation $constatation, Field $field)
    {
 $constatation->fields()->updateExistingPivot($field->id, ['value' => $request->input('data')]);
        // $constatation->fields()->where('id', $field->id)->pivot->value =$request->input('data');
        // return $field->id;
        // $constatation->fields()->updateExistingPivot($field->id, ['value' => $request->input('data')]);
        // $constatation->fields()->updateExistingPivot(1, ['value' => "test"]);
        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constatation $constatation, Field $field)
    {
        //
    }
}
