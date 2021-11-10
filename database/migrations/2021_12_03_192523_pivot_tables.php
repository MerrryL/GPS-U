<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constatation_dossier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('constatation_id')->constrained();
            $table->foreignId('dossier_id')->constrained();
        });

        Schema::create('constatation_observation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('constatation_id')->constrained();
            $table->foreignId('observation_id')->constrained();
        });

        Schema::create('constatation_field', function (Blueprint $table) {
            $table->id();
            $table->foreignId('constatation_id')->constrained();
            $table->foreignId('field_id')->constrained();
            $table->string('value')->nullable();
        });

        Schema::create('constatation_observer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('constatation_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });

        Schema::create('action_constatation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_id')->constrained();
            $table->foreignId('constatation_id')->constrained();
        });

        Schema::create('observation_image', function (Blueprint $table) {
            $table->id();
            $table->foreignId('observation_id')->constrained();
            $table->foreignId('image_id')->constrained();
        });

        Schema::create('followup_supervisor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('followup_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
        
        Schema::create('task_operator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
        
        Schema::create('followup_task', function (Blueprint $table) {
            $table->id();
            $table->foreignId('followup_id')->constrained();
            $table->foreignId('task_id')->constrained();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
