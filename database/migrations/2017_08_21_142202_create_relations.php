<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('instituicao_id')
                ->references('id')
                ->on('instituicaos')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });

        Schema::table('comentarios', function(Blueprint $table) {
            $table->foreign('projeto_id')->references('id')
                ->on('projetos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('projetos', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            /*$table->foreign('prof_aux_id')
                ->references('id')
                ->on('prof_aux')
                ->onUpdate('cascade')
                ->onDelete('set null');*/
            $table->foreign('instituicao_id')
                ->references('id')
                ->on('instituicaos')
                ->onUpdate('cascade')
                ->onDelete('set null');
            /*$table->foreign('versao_proj_id')
                ->references('id')
                ->on('versao_proj')
                ->onUpdate('cascade')
                ->onDelete('set null');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
