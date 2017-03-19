<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $fillable = [
        'name', 'email', 'telefone', 'logradouro', 'numero_log', 'complemento', 'cep', 'cidade', 'estado',
    ];

    // N - N
    public function execucao()
    {
    	return $this->belongsToMany(Execucao::class, 'execucao_instituicao');
    }

    public function projetos()
    {
    	return $this->hasMany('App\Projeto');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
