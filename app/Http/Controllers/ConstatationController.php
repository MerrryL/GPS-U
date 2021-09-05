<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Constatation;
use App\Models\Localization;
use App\Models\Coordinate;
use App\Models\Address;
use App\Models\Image;

class ConstatationController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getModels()
    {
        return Constatation::where(['modelType' => 'model'])->with($this->defaultRelationships)->orderBy('id', 'desc')->get()->toJson(JSON_PRETTY_PRINT);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $localization = Localization::create(['name' => 'at_creation']);
        // if ($request->filled('location.coords')) {
        //     $coordinate = new Coordinate($request->input('location.coords'));
        //     $localization->coordinate()->save($coordinate);
        // }

        // //return $request->input('location');

        // if ($request->filled('location.address')) {
        //     $address = $request->input('location.address');

        //     if ($request->filled('location.address.geometry')) {
        //         $address['geometry'] = json_encode($address['geometry']);
        //     }

        //     $address = new Address($address);
        //     $localization->address()->save($address);
        // }

        // $constat = Constatation::create();
        // $constat->localization()->save($localization);

        // return Constatation::where(['id' => $constat['id']])->with(['field_groups.fields', 'localization.coords', 'localization.address', 'dossiers', 'actions', 'images', 'observers'])->first();

        //return Localization::where(['id' => $localization['id']])->with(['address', 'coordinate'])->get();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
