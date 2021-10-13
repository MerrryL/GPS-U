<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Constatation;
use App\Models\Localization;
use App\Models\User;
use App\Models\Image;

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
    public function show($id)
    {
        return Constatation::where(['id' => $id])->with($this->defaultRelationships)->first()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $constatation = Constatation::find($id);
        $constatation->update($request->all());

        return $constatation->with($this->defaultRelationships)->fresh();
    }

    /**
     * Define a thumb image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function defineAThumb(Request $request, $id){
        $request->validate([
            'imageId' => 'required',
        ]);


        $image = Image::find($request->input('imageId'));

        $constatation = Constatation::with($this->defaultRelationships)->find($id);
        $constatation->clearMediaCollection('image');

        $constatation->addMedia($image->getFirstMedia()->getPath())->preservingOriginal()
        ->toMediaCollection('image');

        return Constatation::with($this->defaultRelationships)->find($id);
    }

    /**
     * Update the validation status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function require_validation($id){
        $constatation = Constatation::with($this->defaultRelationships)->find($id);
        $constatation->requiresValidation=true;
        $constatation->requiresValidationDate= now();

        $constatation->save();

        return $constatation;
    }

    /**
     * Update the validation status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validate_constatation($id){
        $constatation = Constatation::with($this->defaultRelationships)->find($id);
        $constatation->requiresValidation=false;
        $constatation->requiresValidationDate= null;
        $constatation->isValidated=true;
        $constatation->validationDate= now();
        $constatation->save();

        return $constatation;
    }

    /**
     * Update the validation status.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function unrequire_validation($id){
        $constatation = Constatation::with($this->defaultRelationships)->find($id);
        $constatation->requiresValidation=false;
        $constatation->requiresValidationDate= null;

        $constatation->save();

        return $constatation;
    }

    /**
     * Update the observers.
     * 
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_observers(Request $request, $id){
        $request->validate([
            'observers' => 'array'
        ]);

        $constatation = Constatation::with($this->defaultRelationships)->find($id);

        $constatation->observers()->sync($request->input('observers'));

        return $constatation->refresh();
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
