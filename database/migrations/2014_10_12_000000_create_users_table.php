<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name', 60);
            $table->string('email', 80)->unique();
            $table->string('password', 60)->nullable();
            $table->string('phone', 11);
            $table->string('logradouro', 50);
            $table->string('numero_log',5);
            $table->string('complemento', 30);
            $table->string('cep', 8);
            $table->string('cidade', 30);
            $table->string('estado', 30);
            $table->rememberToken();
            $table->timestamps();
        });
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
