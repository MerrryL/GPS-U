<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('short_description');
            $table->string('description');
            $table->string('fine_amount');
            $table->foreignId('codex_id')->nullable()->constrained();
            $table->foreignId('observation_type_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('observations')->insert(
            [[ 
                'code' => '175-176',
                'name' => 'Poubelles',
                'description' => 'Article réglementant les heures de collecte des sacs poubelles.',
                'short_description' => 'Article réglementant les heures de collecte des sacs poubelles.',
                'fine_amount' => 'Jusqu\'à 350€',
                'codex_id' => 1,
                'observation_type_id' => 1,
                'created_at' => now(),
            ],
            [ 
                'code' => '181',
                'name' => 'PMC',
                'description' => 'Article réglementant les heures de collecte des sacs PMC.',
                'short_description' => 'Article réglementant les heures de collecte des sacs PMC.',
                'fine_amount' => 'Jusqu\'à 350€',
                'codex_id' => 1,
                'observation_type_id' => 1,
                'created_at' => now(),

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
        Schema::dropIfExists('observations');
    }
}
