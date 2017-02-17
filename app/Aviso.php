<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    protected $fillable = [
        'tags',
    ];

   	// N aviso - 1 user
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    // 1 aviso - 1 categoria
    public function categoria()
    {
    	return $this->belongsTo(Categoria::class);
    }

    // 1 aviso - 1 eixo
    public function eixo()
    {
    	return $this->belongsTo(Eixo::class);
    }
}
