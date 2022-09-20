<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user', function (Blueprint $table) {
            $table->id('iduser');
            $table->string('userdesc');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->timestamps();
        });

        DB::table('tb_user')->insert([
            'userdesc' => 'Admin Aplikasi',
            'email' => 'azzamazizi09@gmail.com',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

        DB::table('tb_user')->insert([
            'userdesc' => 'User Aplikasi',
            'email' => 'azzamazizi94@gmail.com',
            'password' => 'user123',
            'role' => 'user',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_user');
    }
}
