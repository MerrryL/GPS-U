<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => 'Amory',
            'lastName' => 'Delcampe',
            'bio' => 'amateur webdev',
            'email' => 'amo168@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt("1234"),
            'remember_token' => Str::random(10),
        ]);
        User::factory()->count(10)->create();
    }
}
