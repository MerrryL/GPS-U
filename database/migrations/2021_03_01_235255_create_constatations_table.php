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
            $table->boolean('is_validated')->default(false);
            $table->date('validation_date')->nullable();
            $table->boolean('requires_validation')->default(false);
            $table->date('requires_validation_date')->nullable();
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
