<?php

namespace App\Http\Controllers;

use App\Models\Codex;
use Illuminate\Http\Request;

class CodexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Codex::all()->toJson();
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
     * @param  \App\Models\Codex  $codex
     * @return \Illuminate\Http\Response
     */
    public function show(Codex $codex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codex  $codex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codex $codex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codex  $codex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codex $codex)
    {
        //
    }
}
