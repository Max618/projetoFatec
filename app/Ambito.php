<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambito extends Model
{
    protected $fillable = [
        'name', 'descricao',
    ];

    // 1 ambito - N projetos
    public function projeto()
    {
        return $this->hasMany(Projeto::class);
    }
}
