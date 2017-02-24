<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prof_aux extends Model
{
    protected $fillable = [
        'name_prof', 'email',
    ];

    // 1 prof_aux - N projetos
    public function projeto()
    {
        return $this->hasMany('App\Projeto');
    }
}
