<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VersaoProj extends Model
{
    protected $fillable = ['versao', 'projeto_anterior_id'];

    public function projetoAnterior() 
    {

    }
}
