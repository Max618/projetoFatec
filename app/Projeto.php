<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Tag;
use App;

class Projeto extends Model
{
    protected $fillable = [
        'name',
        'descricao',
        'cronograma',
        //'comentarios_prof',
        //'ancora',
        //'questao_motriz',
        'n_alunos',
        'n_aulas',
        //'prazo',
        //'feedback',
        'projeto',
        //'resultado',
        'tags',
        'total_visualizacao',
        'componente_curricular',
        //'ambito_id',
        //'eixo_id',
        'categoria_id',
        'instituicao_id',
        'user_id',
        'total_coments',
        'total_curtidas',
        'total_comp',
        //'prof_aux_id',
        'arquivo',
        'versao_proj_id',
    ];

    // N projeto - 1 ambito
    public function ambito() 
    {
    	return $this->belongsTo('App\Ambito');
    }

    // N projeto - 1 categoria
    public function categoria() 
    {
    	return $this->belongsTo('App\Categoria','componente_curricular', 'name');
    }

    // N projeto - 1 ambito
    public function eixo() 
    {
    	return $this->belongsTo('App\Eixo');
    }

    // N - N
    public function execucao()
    {
    	return $this->belongsToMany(Execucao::class, 'execucao_projeto');
    }

    // N projeto - N prof_aux
    public function prof_aux()
    {
        return $this->belongsToMany('App\Prof_aux', 'profs_projs');
    }

    // N projeto - 1 user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function instituicao() 
    {
        return $this->belongsTo('App\Instituicao');
    }

    // 1 user - N comentarios
    public function comentario() 
    {
        return $this->hasMany('App\Comentario');
    }

    public function versao()
    {
        return $this->belongsTo('App\VersaoProj', 'versao_proj_id');
    }

    public function curtida()
    {
        return $this->hasMany('App\Like');
    }

    public function tags(){
        $tags = $this->attributes['tags'];
        $tags = explode("/",$tags);
        foreach ($tags as $tag){
            Tag::firstOrCreate(['name' => $tag,'descricao' => 'teste']);
        }
        return $tags;
    }

    public function campos(){
        return $this->hasMany('App\Campo');
    }

    public function prof($var){
        $prof = App\Prof_aux::firstOrCreate($var);
        DB::table('profs_projs')->insert([
            'projeto_id' => $this->attributes['id'],
            'prof_aux_id' => $prof->id
        ]);
    }

    public function populares($take = null){
        $ids = $this->getPopularesIds($take);
        $populares = new Collection();
        foreach ($ids as $id){
            $populares->push(App\Projeto::find($id));
        }
        return $populares;
    }

    public function ultimos($take = null){
        $ultimos = DB::table('projetos')->orderBy('created_at','desc')->where('id','<>',$this->id)->take($take)->get();
        return $ultimos;
    }

    public function iguais($take = null) {
        $iguais = DB::table('projetos')->where(['componente_curricular' => $this->componente_curricular])->where('id','<>',$this->id)->take($take)->get();
        return $iguais;
    }

    private function getPopularesIds($take = null){
        $projetos = DB::table('projetos')->get();
        $medias = [];
        foreach ($projetos as $key => $projeto){
            $medias[$key] = [
                'id' => $projeto->id,
                'media' => ($projeto->total_curtidas*3+$projeto->total_comp*3+$projeto->total_coments*3+$projeto->total_visualizacao)/10
            ];
        }
        $medias = new Collection($medias);
        $ids = $medias->sortByDesc('media')->take($take)->pluck('id');
        return $ids;
    }
}
