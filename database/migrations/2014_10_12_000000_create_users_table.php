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
            $table->string('bio')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'first_name' => 'Amory',
            'last_name' => 'Delcampe',
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
