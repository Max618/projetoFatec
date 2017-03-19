<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Execucao extends Model
{
    protected $fillable = [
        'user_id', 'projeto_id', 'instituicao_id'
    ];

    // N - N
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    // N - N
    public function projeto()
    {
    	return $this->belongsToMany(Projeto::class, 'execucao_projeto');
    }

    // N - N
    public function instituicao()
    {
    	return $this->belongsTo(Instituicao::class);
    }
}
