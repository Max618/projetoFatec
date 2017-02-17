<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = [
        'name', 'descricao', 'cronograma', 'comentarios_prof', 'ancora', 'questao_motriz', 'n_alunos', 'prazo', 'feedback',
        'resultado', 'tags', 'total_visualizacao', 
    ];

    // N projeto - 1 ambito
    public function ambito() 
    {
    	return $this->belongsTo(Ambito::class);
    }

    // N projeto - 1 categoria
    public function categoria() 
    {
    	return $this->belongsTo(Categoria::class);
    }

    // N projeto - 1 ambito
    public function eixo() 
    {
    	return $this->belongsTo(Eixo::class);
    }

    // N - N
    public function execucao()
    {
    	return $this->belongsToMany(Execucao::class, 'execucao_projeto');
    }
}
