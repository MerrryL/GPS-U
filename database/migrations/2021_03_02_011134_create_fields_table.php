<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('options')->nullable();
            $table->string('default_value')->nullable();
            $table->boolean('is_required')->nullable();
            $table->foreignId('field_group_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('fields')->insert(
            [
                [
                    'field_group_id' => '1',
                    'name' => 'Combien y a t il de sacs poubelles',
                    'default_value' => '1',
                    'is_required' => true,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '1',
                    'name' => 'Description',
                    'default_value' => '',
                    'is_required' => false,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '1',
                    'name' => 'Y en a t il des percés',
                    'default_value' => 'Non',
                    'is_required' => false,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '2',
                    'name' => 'Quel était l\'adresse du dépôt',
                    'default_value' => '',
                    'is_required' => true,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '2',
                    'name' => 'Avez-vous toqué à cette adresse',
                    'default_value' => 'Oui',
                    'is_required' => true,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '2',
                    'name' => 'A-t-on répondu?',
                    'default_value' => 'Oui',
                    'is_required' => true,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '3',
                    'name' => 'Avez-vous toqué aux environs?',
                    'default_value' => 'Oui',
                    'is_required' => true,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '3',
                    'name' => 'A-t-on répondu?',
                    'default_value' => 'Non',
                    'is_required' => true,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '4',
                    'name' => 'Combien y a t il de sacs PMC',
                    'default_value' => '1',
                    'is_required' => true,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '4',
                    'name' => 'Description',
                    'default_value' => '',
                    'is_required' => false,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '4',
                    'name' => 'Y en a t il des percés',
                    'default_value' => 'Non',
                    'is_required' => false,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '5',
                    'name' => 'Quel était l\'adresse du dépôt',
                    'default_value' => '',
                    'is_required' => true,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '5',
                    'name' => 'Avez-vous toqué à cette adresse',
                    'default_value' => 'Oui',
                    'is_required' => true,
                    'created_at' => now(),
                ],
                [
                    'field_group_id' => '5',
                    'name' => 'A-t-on répondu?',
                    'default_value' => 'Oui',
                    'is_required' => true,
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
        Schema::dropIfExists('fields');
    }
}
