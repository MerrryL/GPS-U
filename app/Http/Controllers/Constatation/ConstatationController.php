<?php

namespace App\Http\Controllers\Constatation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Constatation;
use App\Models\Localization;

class ConstatationController extends Controller
{
    //TODO: verification and error
    //DRY
    protected $defaultRelationships = array('field_groups.fields', 'localization', 'dossiers', 'actions', 'images.media', 'observers', 'media');

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Constatation::where(['modelType' => null])->with($this->defaultRelationships)->orderBy('id', 'desc')->get()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Some constatations are only models to "create from".
     *
     * @return \Illuminate\Http\Response
     */
    public function getModels()
    {
        return Constatation::where(['modelType' => 'model'])->with($this->defaultRelationships)->orderBy('id', 'desc')->get()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: add features
        $constat = Constatation::create();
        $localization = Localization::create(['name' => 'at_creation']);
        $constat->localization()->save($localization);

        return Constatation::where(['id' => $constat['id']])->with($this->defaultRelationships)->first();
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
        ]));

        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Update the validation status.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function require_validation(Constatation $constatation){
        $constatation->requiresValidation=true;
        $constatation->requiresValidationDate=now();

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
        $constatation->requiresValidation=false;
        $constatation->requiresValidationDate= null;

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
        $constatation->requiresValidation=false;
        $constatation->requiresValidationDate=null;
        $constatation->isValidated=true;
        $constatation->validationDate= now();
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
