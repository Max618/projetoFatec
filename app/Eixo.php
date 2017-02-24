<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eixo extends Model
{
    protected $fillable = [
        'name', 'descricao',
    ];

    // 1 eixo - N projetos
    public function projeto()
    {
        return $this->hasMany('App\Projeto');
    }

    // 1 eixo - 1 aviso
    public function aviso()
    {
        return $this->hasOne(Aviso::class);
    }
}
