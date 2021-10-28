<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Geocoder\Geocoder;

class GeoCordinateController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAddressForCoordinates(Request $request)
    {
        $request->validate([
            'lat' => 'required',
            'lng' => 'required'
        ]);
    
        $client = new \GuzzleHttp\Client([
            'verify' => base_path('cacert.pem'),
        ]);
    
        $geocoder = new Geocoder($client);
        $geocoder->setApiKey(config('geocoder.key'));
        $geocoder->setLanguage(config('geocoder.language'));
        $geocoder->setRegion(config('geocoder.region'));
        $geocoder->setBounds(config('geocoder.bounds'));
    
        return $geocoder->getAddressForCoordinates($request['lat'], $request['lng']);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getCoordinatesForAddress(Request $request)
    {
        $request->validate([
            'formatted_address' => 'required',
        ]);
    
        $client = new \GuzzleHttp\Client([
            'verify' => base_path('cacert.pem'),
        ]);
    
        $geocoder = new Geocoder($client);
        $geocoder->setApiKey(config('geocoder.key'));
        $geocoder->setLanguage(config('geocoder.language'));
        $geocoder->setRegion(config('geocoder.region'));
        $geocoder->setBounds(config('geocoder.bounds'));
    
        return $geocoder->getCoordinatesForAddress($request['formatted_address']);
    }
}
