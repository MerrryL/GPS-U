<?php

namespace App\Http\Controllers\Observation;

use App\Http\Controllers\Controller;
use App\Models\ImageRequest;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationImageRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function index(Observation $observation)
    {
        return $observation->image_requests()->get()->toJson();
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
        return $observation->image_requests()->create($request->validate(['name' => 'required', 'description' => 'required']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation, ImageRequest $imageRequest)
    {
        if($imageRequest->observation_id != $observation->id ) {
            abort (404);
        }

        return $imageRequest;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation, ImageRequest $imageRequest)
    {
        if($imageRequest->observation_id != $observation->id ) {
            abort (404);
        }

        return $imageRequest->update($request->validate(['name' => 'required', 'description' => 'required']));
    }

    /**
     * Attach an image request to an observation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function attach(Request $request, Observation $observation, ImageRequest $imageRequest)
    {
        return $observation->image_requests()->attach($imageRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observation  $observation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation, ImageRequest $imageRequest)
    {
        if($imageRequest->observation_id != $observation->id ) {
            abort (404);
        }

        return $imageRequest->delete();
    }
}
