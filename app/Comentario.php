<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['projeto_id', 'user_id','comentario'];

    // 1 user - N comentarios
    public function user() 
    {
    	return $this->belongsTo('App\User');
    }

    // 1 projeto - N comentarios
    public function projeto() 
    {
    	return $this->belongsTo('App\User');
    }
}
