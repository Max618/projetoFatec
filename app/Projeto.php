<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = [
        'name', 'descricao', 'cronograma', 'comentarios_prof', 'ancora', 'questao_motriz', 'n_alunos', 'prazo', 'feedback',
        'resultado', 'tags', 'total_visualizacao', 'ambito_id', 'eixo_id', 'categoria_id', 'instituicao_id', 'user_id', 'total_coments', 'total_curtidas', 'total_comp', 'prof_aux_id', 'arquivo',
    ];

    // N projeto - 1 ambito
    public function ambito() 
    {
    	return $this->belongsTo('App\Ambito');
    }

    // N projeto - 1 categoria
    public function categoria() 
    {
    	return $this->belongsTo('App\Categoria');
    }

    // N projeto - 1 ambito
    public function eixo() 
    {
    	return $this->belongsTo('App\Eixo');
    }

    // N - N
    public function execucao()
    {
    	return $this->belongsToMany(Execucao::class, 'execucao_projeto');
    }

    // N projeto - 1 prof_aux
    public function prof_aux()
    {
        return $this->belongsTo('App\Prof_aux');
    }

    // N projeto - 1 user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function instituicao() 
    {
        return $this->belongsTo('App\Instituicao');
    }

    // 1 user - N comentarios
    public function comentario() 
    {
        return $this->hasMany('App\Comentario');
    }
}
