<?php

namespace App\Http\Controllers\Constatation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Constatation;
use App\Models\Localization;

use Illuminate\Support\Facades\Log;

class ConstatationController extends Controller
{
    //TODO: verification and error
    //DRY
    protected $defaultRelationships = array('fields.field_group', 'localization', 'dossiers', 'actions', 'images.media', 'observers', 'observations.field_groups.fields', 'observations.followups.followup_status', 'observations.followups.supervisors', 'observations.followups.tasks.task_status','observations.followups.tasks.operators', 'media');

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Constatation::where(['modelType' => null])->with($this->defaultRelationships)->orderBy('id', 'desc')->get()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Some constatations are only models to "create from".
     *
     * @return \Illuminate\Http\Response
     */
    public function getModels()
    {
        return Constatation::where(['modelType' => 'model'])->with($this->defaultRelationships)->orderBy('id', 'desc')->get()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: add features
        $constatation = Constatation::create();
        $localization = Localization::create(['name' => 'at_creation']);
        $constatation->localization()->save($localization);

        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Constatation $constatation)
    {
        return $constatation->load($this->defaultRelationships)->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constatation $constatation)
    {
        $constatation->update($request->validate([
            'description' => 'required',
            'observers' => 'required',
            'observations' => 'required'
        ]));

        $observations = $request->input('observations');
        $observations = array_column($observations, 'id');
        $constatation->observations()->sync($observations);

        $observations = $constatation->load($this->defaultRelationships)->observations;

        //TODO: remove reliance on $this->defaultRelationships to preload the observations nested trees
        //fields syncing
        $fieldGroups = $observations->map( function ($observation)
        {
            if( $observation->field_groups->count() > 0 )
            {
                return $observation->field_groups;
            }
        })->collapse();
        
        $fields = $fieldGroups->map( function ($fieldGroup)
        {
                return $fieldGroup->fields;

        })->collapse()->pluck('id');

        $constatation->fields()->sync($fields);

        //followups and tasks syncing
        $followups = $observations->map( function ($observation)
        {
            if( $observation->followups->count() > 0 )
            {
                return $observation->followups;
            }
        })->collapse();





        //return $tasks;

        // $followups = $followups->map( function ($followup)
        // {
        //     return ['id' => $followup->id, 'followup' => $followup->replicate()];
        // });
        

        // $constatation->followups()->saveMany($followups->pluck('followup'));
        $followups = $followups->map( function ($followup)
        {
            return $followup->replicate(['observation_id']);
        });
        

        $constatation->followups()->saveMany($followups);

        $tasks = $followups->map( function ($followup)
        {
            $taskss = $followup->tasks;
            $taskss = $taskss->map( function ($task)
            {
                    return $task->replicate();
            });

            $followup->tasks()->saveMany($taskss);
            return $taskss;
        })->collapse();

        return $tasks;





        return $followups;
        $followups = $followups->map( function ($followup)
        {
            return null;

        });

        return $constatation->load('followups.tasks');




        $observers = $request->input('observers');
        $observers = array_column($observers, 'id');
        $constatation->observers()->sync($observers);



        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Update the validation status.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function require_validation(Constatation $constatation){
        $constatation->requiresValidation=true;
        $constatation->requiresValidationDate=now();

        $constatation->save();

        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Update the validation status.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function refuse_validation(Constatation $constatation){
        $constatation->requiresValidation=false;
        $constatation->requiresValidationDate= null;

        $constatation->save();

        return $constatation->load($this->defaultRelationships);
    }

    /**
     * Update the validation status.
     *
     * @param  \App\Models\Constatation  $constatation
     * @return \Illuminate\Http\Response
     */
    public function validate_constatation(Constatation $constatation){
        $constatation->requiresValidation=false;
        $constatation->requiresValidationDate=null;
        $constatation->isValidated=true;
        $constatation->validationDate= now();
        $constatation->save();

        return $constatation->load($this->defaultRelationships);
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
