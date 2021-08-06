<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinates', function (Blueprint $table) {
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->decimal('altitude', 10, 7)->nullable();
            $table->decimal('accuracy', 10, 7)->nullable();
            $table->decimal('altitudeAccuracy', 10, 7)->nullable();
            $table->decimal('heading', 10, 7)->nullable();
            $table->decimal('speed', 10, 7)->nullable();
            $table->foreignId('localization_id')->nullable()->constrained();
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
        Schema::dropIfExists('coordinates');
    }
}
