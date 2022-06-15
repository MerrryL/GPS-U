<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;



class CreateConstatationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $files = Storage::disk('images')->directories();
        foreach ($files as $file) {
            Storage::disk('images')->deleteDirectory($file);
        }

        Schema::create('constatations', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->boolean('isValidated')->default(false);
            $table->date('validationDate')->nullable();
            $table->boolean('requiresValidation')->default(false);
            $table->date('requiresValidationDate')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
