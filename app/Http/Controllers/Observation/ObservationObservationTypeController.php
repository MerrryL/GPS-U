<?php

namespace App\Http\Controllers\Observation;

use App\Http\Controllers\Controller;
use App\Models\Observation;
use App\Models\ObservationType;
use Illuminate\Http\Request;

class ObservationObservationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function index(Observation $observation)
    {
        return $observation->observation_type->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function create(Observation $observation)
    {
        //
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
        $request->validate([
            'observers' => 'array'
        ]);

        $observation->observers()->sync($request->input('observers'));

        return $observation->observers->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\ObservationType  $observationType
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation, ObservationType $observationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\ObservationType  $observationType
     * @return \Illuminate\Http\Response
     */
    public function edit(Observation $observation, ObservationType $observationType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\ObservationType  $observationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation, ObservationType $observationType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\ObservationType  $observationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation, ObservationType $observationType)
    {
        //
    }
}
