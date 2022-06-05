<?php

namespace App\Http\Controllers;

use App\Models\ObservationType;
use Illuminate\Http\Request;

class ObservationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ObservationType::all()->toJson();
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
     * @param  \App\Models\ObservationType  $ObservationType
     * @return \Illuminate\Http\Response
     */
    public function show(ObservationType $ObservationType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ObservationType  $ObservationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObservationType $ObservationType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObservationType  $ObservationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObservationType $ObservationType)
    {
        //
    }
}
