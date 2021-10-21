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
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('bio')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'firstName' => 'Amory',
            'lastName' => 'Delcampe',
            'bio' => 'amateur webdev',
            'email' => 'amo168@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt("1234"),
            'remember_token' => Str::random(10),
        ]);
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
