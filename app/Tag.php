<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'descricao',
    ];

    // 1 tag - N projetos
    public function projeto()
    {
        return $this->hasMany('App\Projeto');
    }
}
