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
            $table->string('telefone', 11)->nullable();
            $table->string('logradouro', 50)->nullable();
            $table->string('numero_log',5)->nullable();
            $table->string('complemento', 30)->nullable();
            $table->string('cep', 8)->nullable();
            $table->string('cidade', 30)->nullable();
            $table->string('estado', 30)->nullable();
            $table->string('avatar', 200)->nullable();
            $table->integer('instituicao_id')->nullable();
            $table->rememberToken();
            $table->timestampsTz();
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
