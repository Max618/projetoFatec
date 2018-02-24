<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'name', 'descricao',
    ];

    // 1 categoria - N projetos
    public function projeto()
    {
        return $this->hasMany('App\Projeto','componente_curricular', 'name');
    }

    // 1 categoria - 1 aviso
    public function aviso()
    {
        return $this->hasOne(Aviso::class);
    }
}
