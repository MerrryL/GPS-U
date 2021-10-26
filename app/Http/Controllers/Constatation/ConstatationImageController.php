<?php

namespace App\Http\Controllers\Constatation;

use App\Http\Controllers\Controller;
use App\Models\Constatation;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConstatationImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function index(Constatation $constatation)
    {
        return $constatation->images()->with('media')->get()->toJson();
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
        return "test test test";
        return $constatation->images()->create($request->validate(['name' => 'required']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Constatation $constatation, Image $image)
    {
        if($image->constatation_id != $constatation->id ) {
            abort (404);
        }

        return $image->load('media');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constatation $constatation, Image $image)
    {
        return "test test test";
        if($image->constatation_id != $constatation->id ) {
            abort (404);
        }

        return $image->update($request->validate(['name' => 'required']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constatation $constatation, Image $image)
    {
        if($image->constatation_id != $constatation->id ) {
            abort (404);
        }

        return $image->delete();
    }

    /**
     * Upload an image in storage.
     *
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Image  $image
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, Constatation $constatation, Image $image)
    {
        if($image->constatation_id != $constatation->id )
        {
            abort (404);
        }

        $validated = $request->validate([
            'image' => 'required',
            'image.base64' => 'required|base64mimes:jpeg,png,jpg,gif,svg',
        ]);

        $filename = md5(time()) . '.jpg';
        Storage::disk('images')->put($filename, base64_decode($validated['image']['base64']));
        $path = Storage::disk('images')->url($filename);

        $image->addMedia('images/' . $filename)->toMediaCollection('image');

        if($constatation->getMedia('image')->count() == 0)
        {
            $imagePath = $image->getFirstMedia('image')->getPath();
            $constatation->addMedia($imagePath)->preservingOriginal()->toMediaCollection('image');

            return $constatation->load('field_groups.fields', 'localization', 'dossiers', 'actions', 'images.media', 'observers', 'media');
        }

        return $image->load('media');
    }

    
    /**
     * Define a thumb image.
     *
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function defineAsThumb(Constatation $constatation, Image $image)
    {
        if($image->constatation_id != $constatation->id )
        {
            abort (404);
        }
        
        try 
        {
            $imagePath = $image->getFirstMedia('image')->getPath();
        }
        catch(\Exception $e)
        {
            throw $e;
        }

        $constatation->clearMediaCollection('image');
        $constatation->addMedia($imagePath)->preservingOriginal()->toMediaCollection('image');

        return $constatation->load('field_groups.fields', 'localization', 'dossiers', 'actions', 'images.media', 'observers', 'media');
    }
}