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
            $table->integer('constatation_id');
            $table->integer('dossier_id');
        });

        Schema::create('constatation_observation', function (Blueprint $table) {
            $table->id();
            $table->integer('constatation_id');
            $table->integer('observation_id');
        });

        Schema::create('constatation_observer', function (Blueprint $table) {
            $table->id();
            $table->integer('constatation_id');
            $table->integer('observer_id');
        });
        Schema::create('action_constatation', function (Blueprint $table) {
            $table->id();
            $table->integer('action_id');
            $table->integer('constatation_id');
        });

        Schema::create('observation_field_types', function (Blueprint $table) {
            $table->id();
            $table->integer('observation_id');
            $table->integer('field_types_id');
        });

        Schema::create('address_component_address_component_type', function (Blueprint $table) {
            $table->id();
            $table->integer('address_component_id');
            $table->integer('address_component_type_id');
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
