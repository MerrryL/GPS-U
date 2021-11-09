<?php

namespace App\Http\Controllers\Constatation;

use App\Http\Controllers\Controller;
use App\Models\Constatation;
use App\Models\Observation;
use Illuminate\Http\Request;

class ConstatationObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function index(Constatation $constatation)
    {
        return $constatation->observations()->get()->toJson();
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
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function show(Constatation $constatation, Observation $observation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constatation $constatation, Observation $observation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constatation $constatation, Observation $observation)
    {
        //
    }
}
