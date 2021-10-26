<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Constatation;

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
        // $request->validate([
        //     'name' => 'required',
        //     'constatationId' => 'required'
        // ]);

        // $image = new Image(['name' =>$request->input('name') ]);
        
        // $constatation = Constatation::find($request->input('constatationId'));

        // $image = $constatation->images()->save($image);

        // return $image;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Image::with(['media'])->find($id);
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
        //return Image::find($id)->delete();
    }
}
