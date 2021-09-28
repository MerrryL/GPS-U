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

        Schema::create('constatation_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('constatation_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
        Schema::create('action_constatation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_id')->constrained();
            $table->foreignId('constatation_id')->constrained();
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
