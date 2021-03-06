<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            /*$table->string('email', 80)->unique();
            $table->string('telefone', 11);
            $table->string('logradouro', 50);
            $table->string('numero_log',5);
            $table->string('complemento', 30);
            $table->string('cep', 8);
            $table->string('cidade', 30);
            $table->string('estado', 30);*/
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('instituicaos');
    }
}
