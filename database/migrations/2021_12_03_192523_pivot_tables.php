<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

        Schema::create('image_request_observation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('observation_id')->constrained();
            $table->foreignId('image_request_id')->constrained();
        });


        DB::table('image_request_observation')->insert(
            [
                [
                    'observation_id' => '1',
                    'image_request_id' => '1',
                ],
                [
                    'observation_id' => '1',
                    'image_request_id' => '2',
                ],
                [
                    'observation_id' => '1',
                    'image_request_id' => '3',
                ],
                [
                    'observation_id' => '2',
                    'image_request_id' => '1',
                ],
                [
                    'observation_id' => '2',
                    'image_request_id' => '2',
                ],
                [
                    'observation_id' => '2',
                    'image_request_id' => '4',
                ],
            ]
        );
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
