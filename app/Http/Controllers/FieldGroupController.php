<?php

namespace App\Http\Controllers;

use App\Models\FieldGroup;
use App\Models\Constatation;

use Illuminate\Http\Request;

use Spatie\QueryBuilder\QueryBuilder;


class FieldGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QueryBuilder::for(FieldGroup::class)
            ->allowedFilters('constatation_id')
            ->with('fields')
            ->get()
            ->toJson();
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
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'logical_operator' => 'required',
            'constatationId' => 'required'
        ]);
        $validated = $request->only(['name', 'type', 'logical_operator']);

        $field_group = new FieldGroup($validated);

        $constatation = Constatation::find($request->input('constatationId'));

        $field_group = $constatation->field_groups()->save($field_group);

        return $field_group;
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
