<?php

namespace App\Http\Controllers\Constatation;

use App\Http\Controllers\Controller;
use App\Models\Constatation;
use App\Models\Localization;
use Illuminate\Http\Request;

class ConstatationLocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function index(Constatation $constatation)
    {
        //
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
     * @param  \App\Models\Localization  $localization
     * @return \Illuminate\Http\Response
     */
    public function show(Constatation $constatation, Localization $localization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Localization  $localization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constatation $constatation, Localization $localization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Constatation  $constatation
     * @param  \App\Models\Localization  $localization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constatation $constatation, Localization $localization)
    {
        //
    }
}
