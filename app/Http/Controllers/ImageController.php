<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Constatation;
use Illuminate\Support\Facades\Storage;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Image::All()->toJson();
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

        // $encoded_image = $request->input()['image']['uri'];
        // Storage::put('file.jpg', base64_decode($encoded_image));

        //return $request->input()['image'];
        $request->validate([
            'image' => 'required',
            'image.base64' => 'required|base64mimes:jpeg,png,jpg,gif,svg'
        ]);

        // $request->validate([
        //     'image' => 'required| mimes:jpeg,png,jpg,gif,svg'
        // ]);
        //$code_base64 = str_replace('data:image/jpeg;base64,', '', $request->input()['image']);
        //$code_binary = base64_decode($code_base64);

        //return ['request', $request->input()['image']['base64']];



        $filename = md5(time()) . '.jpg';
        Storage::disk('images')->put($filename, base64_decode($request->input()['image']['base64']));
        $path = Storage::disk('images')->url($filename);

        //return $path;
        $document = new Image(['name' => 'test', 'constatation_id' => 1]);
        //$document->save();
        $constatation = Constatation::where(['id' => 1])->first();

        //return $document;
        //return $constatation;
        $constatation->images()->save($document);

        $document->addMedia('images/' . $filename)->toMediaCollection();

        //$document->getMedia();
        //$document->images = $document->getMedia();
        $mediaItems = $document->getMedia();
        $publicUrl = $mediaItems[0]->getUrl();
        return $publicFullUrl = $mediaItems[0]->getFullUrl();
        return $document::with('media');
        return $document->getMedia();
        return $document->getPath();
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
        //
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
