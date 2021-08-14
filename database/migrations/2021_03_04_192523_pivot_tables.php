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

        Schema::create('constatation_observer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('constatation_id')->constrained();
            $table->foreignId('observer_id')->constrained();
        });
        Schema::create('action_constatation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_id')->constrained();
            $table->foreignId('constatation_id')->constrained();
        });

        Schema::create('observation_field_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('observation_id')->constrained();
            $table->foreignId('field_types_id')->constrained();
        });

        Schema::create('address_component_address_component_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_component_id')->constrained();
            $table->foreignId('address_component_type_id')->constrained();
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
