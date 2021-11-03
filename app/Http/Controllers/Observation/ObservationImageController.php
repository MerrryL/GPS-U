<?php

namespace App\Http\Controllers\Observation;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function index(Observation $observation)
    {
        return $observation->images()->get()->toJson();
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
        return $observation->images()->create($request->validate(['name' => 'required']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation, Image $image)
    {
        if($image->observation_id != $observation->id ) {
            abort (404);
        }

        return $image;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation, Image $image)
    {
        if($image->observation_id != $observation->id ) {
            abort (404);
        }

        return $image->update($request->validate(['name' => 'required']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation, Image $image)
    {
        if($image->observation_id != $observation->id ) {
            abort (404);
        }

        return $image->delete();
    }
}
