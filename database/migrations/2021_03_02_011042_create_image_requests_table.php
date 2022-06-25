<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateImageRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        DB::table('image_requests')->insert(
            [
                [
                    'name' => 'Photo principale',
                    'description' => 'Photo d\'illustration principale: Essayez de prendre la situation observée dans son entier.',
                ],
                [
                    'name' => 'Photo rapprochée',
                    'description' => 'Photo d\'illustration secondaire: Prenez une photographie de la situation mettant en évidence les détails.',
                ],
                [
                    'name' => 'Photo des sacs-poubelle',
                    'description' => 'Plus précis pour ce cas là.',
                ],
                [
                    'name' => 'Photo des sacs PMC',
                    'description' => 'Plus précis pour ce cas là.',
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
        Schema::dropIfExists('image_requests');
    }
}
