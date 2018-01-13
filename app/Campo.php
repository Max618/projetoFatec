<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    protected $fillable = [
        'name',
        'val',
        'projeto_id'
    ];

    public function projeto(){
        return $this->belongsTo('App\Projeto');
    }
}
