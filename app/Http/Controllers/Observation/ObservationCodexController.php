<?php

namespace App\Http\Controllers\Observation;

use App\Http\Controllers\Controller;
use App\Models\Codex;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationCodexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function index(Observation $observation)
    {
        return $observation->codex->toJson();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Codex  $codex
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation, Codex $codex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Codex  $codex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation, Codex $codex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Codex  $codex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation, Codex $codex)
    {
        //
    }
}
