<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('constatation_id')->nullable()->constrained();
            $table->decimal('accuracy', 10, 7)->nullable();
            $table->json('address_components')->nullable();
            $table->decimal('altitude', 10, 7)->nullable();
            $table->decimal('altitudeAccuracy', 10, 7)->nullable();
            $table->string('formatted_address')->default('');
            $table->string('given_name')->default('');
            $table->decimal('heading', 10, 7)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string("place_id")->nullable();
            $table->decimal('speed', 10, 7)->nullable();
            $table->json('viewport')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localizations');
    }
}

