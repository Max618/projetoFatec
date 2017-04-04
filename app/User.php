<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telefone', 'logradouro', 'numero_log', 'complemento', 'cep', 'cidade', 'estado','avatar', 'instituicao_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // 1 user - N social
    public function social()
    {
        return $this->hasMany('App\Social');
    }

    // 1 user - N aviso
    public function aviso()
    {
        return $this->hasMany(Aviso::class);
    }

    // N - N
    public function execucao()
    {
        return $this->hasMany('App\Execucao');
    }

    // 1 user - N projetos
    public function projetos()
    {
        return $this->hasMany('App\Projeto');
    }

    // 1 user - N comentarios
    public function comentario() 
    {
        return $this->hasMany('App\Comentario');
    }

    public function instiuicao()
    {
        return $this->hasOne('App\Instituicao');
    }
}
