<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreateCodexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codexes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('precode');
            $table->string('description');
            $table->timestamps();
        });

        $array = [
            ['name' => "RGP", 'precode' => 'article', 'description' => 'none'],
            ['name' => "Code de la route", 'precode' => 'article', 'description' => 'none'],
            ['name' => "Code environnemental", 'precode' => 'article', 'description' => 'none'],
            ['name' => "Code Voiries", 'precode' => 'article', 'description' => 'none'],
       ];

        DB::table('codexes')->insert($array);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codexes');
    }
}
