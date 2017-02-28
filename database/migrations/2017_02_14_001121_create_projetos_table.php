<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('name', 60);
            $table->string('descricao', 30);
            $table->integer('ambito_id');
            $table->integer('categoria_id');
            $table->integer('eixo_id');
            $table->text('cronograma');
            $table->text('comentarios_prof');
            $table->text('ancora');
            $table->text('questao_motriz');
            $table->string('n_alunos', 2);
            $table->string('prazo', 2);
            $table->text('feedback');
            $table->text('resultado')->nullable();
            $table->string('tags', 150);
            $table->integer('prof_aux_id');
            $table->integer('total_curtidas')->default(0);
            $table->integer('total_comp')->default(0);
            $table->integer('total_coments')->default(0);
            $table->integer('total_visualizacao')->default(0);
            $table->integer('instituicao_id');
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
        Schema::dropIfExists('projetos');
    }
}
