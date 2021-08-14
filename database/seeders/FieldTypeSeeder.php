<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //FieldType::factory()->count(10)->create();

        // DB::table('field_types')->insert(
        //     [
        //         [
        //             'name' => "Constatation N°",
        //             'type' => "number",
        //             'isDefault' => true
        //         ],
        //         [
        //             'name' => "LatitudeConstat",
        //             'type' => "GPSCoords",
        //             'isDefault' => true

        //         ],
        //         [
        //             'name' => "LongitudeConstat",
        //             'type' => "GPSCoords",
        //             'isDefault' => true
        //         ],
        //         [
        //             'name' => "DateConstat",
        //             'type' => "date",
        //             'isDefault' => true
        //         ],
        //         [
        //             'name' => "TimeStampConstat",
        //             'type' => "timestamp",
        //             'isDefault' => true
        //         ],
        //         [
        //             'name' => "Comments",
        //             'type' => "longText",
        //             'isDefault' => false
        //         ],
        //         [
        //             'name' => "LatitudeField",
        //             'type' => "GPSCoords",
        //             'isDefault' => false

        //         ],
        //         [
        //             'name' => "LongitudeField",
        //             'type' => "GPSCoords",
        //             'isDefault' => false
        //         ],
        //         [
        //             'name' => "DateField",
        //             'type' => "date",
        //             'isDefault' => false
        //         ],
        //         [
        //             'name' => "TimeStampField",
        //             'type' => "timestamp",
        //             'isDefault' => false
        //         ],
        //         [
        //             'name' => "Plaque arrière",
        //             'type' => "photo",
        //             'isDefault' => false
        //         ],
        //         [
        //             'name' => "Situation Générale",
        //             'type' => "photo",
        //             'isDefault' => false
        //         ],
        //         [
        //             'name' => "Trottoir",
        //             'type' => "photo",
        //             'isDefault' => false
        //         ],
        //         [
        //             'name' => "Végétation",
        //             'type' => "photo",
        //             'isDefault' => false
        //         ],

        //     ]
        //);
    }
}
