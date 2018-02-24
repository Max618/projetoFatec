<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prof_aux extends Model
{
    protected $fillable = [
        'name_prof', 'email',
    ];

    // N prof_aux - N projetos
    public function projeto()
    {
        return $this->belongsToMany('App\Projeto', 'profs_projs');
    }
}
