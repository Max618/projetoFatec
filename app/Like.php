<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['projeto_id', 'user_id', 'like'];

    protected $casts = [
    	'like' => 'boolean',
    ];

    public function projeto()
    {
    	return $this->belongsTo('App\Projeto');	
    }
}
