<?php

namespace App\Http\Controllers\Followup;

use App\Http\Controllers\Controller;
use App\Models\Followup;
use App\Models\Task;
use Illuminate\Http\Request;

class FollowupTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function index(Followup $followup)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function create(Followup $followup)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Followup $followup)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Followup  $followup
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Followup $followup, Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Followup  $followup
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Followup $followup, Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Followup  $followup
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Followup $followup, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Followup  $followup
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Followup $followup, Task $task)
    {
        //
    }
}
