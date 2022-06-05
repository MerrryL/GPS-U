<?php

namespace App\Http\Controllers;

use App\Models\ImageRequest;
use Illuminate\Http\Request;

class ImageRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ImageRequest::all()->toJson();
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
     * @param  \App\Models\ImageRequest  $ImageRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ImageRequest $imageRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageRequest  $ImageRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageRequest $imageRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageRequest  $ImageRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageRequest $imageRequest)
    {
        //
    }
}
