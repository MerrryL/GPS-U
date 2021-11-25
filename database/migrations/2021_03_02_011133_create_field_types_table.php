<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFieldTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        
    DB::table('field_types')->insert(
[[ 
            'name' => 'Texte',
            'type' => 'text',
        ],
        [ 
            'name' => 'Mot de passe',
            'type' => 'password',
        ],
        [ 
            'name' => 'Email',
            'type' => 'email',
        ],
        [ 
            'name' => 'Choix',
            'type' => 'select',
        ],
        [ 
            'name' => 'Choix Multiple',
            'type' => 'multi-select',
        ],
        [ 
            'name' => 'Date',
            'type' => 'date',
        ],
        [ 
            'name' => 'Boutons Radio',
            'type' => 'radio',
        ],
        [ 
            'name' => 'Case à cocher',
            'type' => 'checkbox',
        ],]
    );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_types');
    }
}
