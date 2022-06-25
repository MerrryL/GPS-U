<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateFieldGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('observation_id')->nullable()->constrained();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('field_groups')->insert(
            [
                [
                    'observation_id' => '1',
                    'name' => 'Poubelles',
                    'description' => 'Description des sacs poubelles.',
                    'created_at' => now(),
                ],
                [
                    'observation_id' => '1',
                    'name' => 'Responsable des sacs poubelles',
                    'description' => 'Pour déterminer l\'identité du responsable.',
                    'created_at' => now(),
                ],
                [
                    'observation_id' => '1',
                    'name' => 'Environs',
                    'description' => 'Description des environs',
                    'created_at' => now(),
                ],
                [
                    'observation_id' => '2',
                    'name' => 'Sacs PMC',
                    'description' => 'Description des sacs PMC..',
                    'created_at' => now(),
                ],
                [
                    'observation_id' => '2',
                    'name' => 'Responsable des sacs PMC',
                    'description' => 'Pour déterminer l\'identité du responsable.',
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
        //Schema::dropIfExists('field_groups');
    }
}
