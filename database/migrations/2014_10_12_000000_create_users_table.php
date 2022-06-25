<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->boolean('is_user');
            $table->boolean('is_observer');
            $table->boolean('is_responsible');
            $table->string('bio')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            [
                [
                    'first_name' => 'Amory',
                    'last_name' => 'Delcampe',
                    'bio' => 'amateur webdev',
                    'is_user' => true,
                    'is_observer' => true,
                    'is_responsible' => true,
                    'email' => 'amo168@gmail.com',
                    'email_verified_at' => now(),                    
                    'password' => bcrypt("1234"),
                    'remember_token' => Str::random(10),
                ],
                [
                    'first_name' => 'Jimmy',
                    'last_name' => 'Bachy',
                    'bio' => 'GDP',
                    'is_user' => true,
                    'is_observer' => true,
                    'is_responsible' => true,
                    'email' => 'amo1681@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt("1234"),
                    'remember_token' => Str::random(10),
                ],
                [
                    'first_name' => 'Benjamin',
                    'last_name' => 'Delpierre',
                    'bio' => 'GDP',
                    'is_user' => true,
                    'is_observer' => true,
                    'is_responsible' => false,
                    'email' => 'amo1682@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt("1234"),
                    'remember_token' => Str::random(10),
                ],
                [
                    'first_name' => 'Fake',
                    'last_name' => 'Guy',
                    'bio' => 'Nimp',
                    'is_user' => false,
                    'is_observer' => false,
                    'is_responsible' => false,
                    'email' => 'amo1683@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt("1234"),
                    'remember_token' => Str::random(10),
                ],
                [
                    'first_name' => 'Catherine',
                    'last_name' => 'Homerin',
                    'bio' => 'Fonctionnaire de prévention',
                    'is_user' => true,
                    'is_observer' => false,
                    'is_responsible' => true,
                    'email' => 'amo1684@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt("1234"),
                    'remember_token' => Str::random(10),
                ],
                [
                    'first_name' => 'Vincent',
                    'last_name' => 'Palermo',
                    'bio' => 'Bourgmestre',
                    'is_user' => true,
                    'is_observer' => false,
                    'is_responsible' => false,
                    'email' => 'amo1685@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt("1234"),
                    'remember_token' => Str::random(10),
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
        Schema::dropIfExists('users');
    }
}
