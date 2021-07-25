<?php

namespace App\Http\Controllers;

use App\Models\FieldGroup;
use Illuminate\Http\Request;

class FieldGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FieldGroup::with('constatation_field_values')->get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldGroup  $fieldGroup
     * @return \Illuminate\Http\Response
     */
    public function show(FieldGroup $fieldGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldGroup  $fieldGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldGroup $fieldGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FieldGroup  $fieldGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldGroup $fieldGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldGroup  $fieldGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldGroup $fieldGroup)
    {
        //
    }
}
