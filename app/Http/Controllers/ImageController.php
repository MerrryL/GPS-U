<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Constatation;
use Illuminate\Support\Facades\Storage;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use Spatie\QueryBuilder\QueryBuilder;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return QueryBuilder::for(Image::class)
            ->allowedFilters('constatation_id')
            ->with('media')
            ->get()
            ->toJson();
    }

    //TODO: do it later?
    // public function getFromConst($constatationId)
    // {
    //     return Image::where(['constatation_id' => $constatationId])->with('media')->get();
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'constatationId' => 'required'
        ]);

        $image = new Image(['name' =>$request->input('name') ]);
        
        $constatation = Constatation::find($request->input('constatationId'));

        $image = $constatation->images()->save($image);

        return $image;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required',
            'image.base64' => 'required|base64mimes:jpeg,png,jpg,gif,svg',
        ]);

        $filename = md5(time()) . '.jpg';
        Storage::disk('images')->put($filename, base64_decode($request->input()['image']['base64']));
        $path = Storage::disk('images')->url($filename);

        //return $path;
        $image = Image::find($id);
        $image->addMedia('images/' . $filename)->toMediaCollection('image');

        //TODO: if constatation has no thumb yet, define it as thumb
        //$constatation_medias = Constatation::find($image['constatation_id'])->getMedia();

        
        return $image->load('media');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Image::with(['media'])->find($id);
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
        return Image::find($id)->delete();
    }
}
