<?php

namespace App\Http\Controllers\Constatation;

use App\Http\Controllers\Controller;
use App\Models\Constatation;
use App\Models\Localization;
use Illuminate\Http\Request;

class ConstatationLocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function index(Constatation $constatation)
    {
        return $constatation->localization()->get()->toJson();
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
        $validated = $request->validate([
            'accuracy' => 'nullable',
            'address_components' => 'nullable',
            'altitude' => 'nullable',
            'altitudeAccuracy' => 'nullable',
            'constatation_id' => 'nullable',
            'formatted_address' => 'nullable',
            'given_name' => 'nullable',
            'heading' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'place_id' => 'nullable',
            'speed' => 'nullable',
            'viewport' => 'nullable',
        ]);

        // return ["test", $validated];

        // $localization = Localization::create($request->all());

        $constatation->localization()->update($validated);
        
        return $constatation->localization()->get()->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Localization  $localization
     * @return \Illuminate\Http\Response
     */
    public function show(Constatation $constatation, Localization $localization)
    {
        if($localization->constatation_id != $constatation->id ) {
            abort (404);
        }

        return $localization;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Localization  $localization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constatation $constatation, Localization $localization)
    {
        if($localization->constatation_id != $constatation->id ) {
            abort (404);
        }

        $validated = $request->validate([
            'accuracy' => 'nullable',
            'address_components' => 'nullable',
            'altitude' => 'nullable',
            'altitudeAccuracy' => 'nullable',
            'constatation_id' => 'nullable',
            'formatted_address' => 'nullable',
            'given_name' => 'nullable',
            'heading' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'place_id' => 'nullable',
            'speed' => 'nullable',
            'viewport' => 'nullable',
        ]);

        $localization->fill($validated)->save();
        
        return $localization;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Localization  $localization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constatation $constatation, Localization $localization)
    {
        //
    }
}
