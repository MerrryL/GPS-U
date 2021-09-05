<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localization;

use Spatie\QueryBuilder\QueryBuilder;

class LocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QueryBuilder::for(Localization::class)
            ->allowedFilters('constatation_id')
            ->firstOrFail()
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $localization = Localization::find($id);
        $localization->fill($validated)->save();
        
        return $localization;
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
