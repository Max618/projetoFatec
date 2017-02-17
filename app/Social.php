<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	protected $fillable = ['provider_id', 'provider'];

	// N social - 1 user
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
