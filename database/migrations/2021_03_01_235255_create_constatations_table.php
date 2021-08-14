<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateConstatationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constatations', function (Blueprint $table) {
            $table->id();
            $table->string('comment')->nullable();
            $table->string('modelType')->nullable()->default(null);
            $table->boolean('isValidated')->default(false);
            $table->date('validationDate')->nullable();
            $table->boolean('requiresValidation')->default(false);
            $table->date('requiresValidationDate')->nullable();
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
        Schema::dropIfExists('constatations');
    }
}
