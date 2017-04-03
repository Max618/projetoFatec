<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Share;
use App\Http\Requests\RequestProjetoForm;

class SocialController extends Controller
{
	public function __construct() 
    {
        $this->middleware('auth')->except('compartilhar');
    }

    public function comentar(Request $request) 
    {
        try{
        	$user = auth()->user();
        	$user->comentario()->create($request->only('projeto_id','comentario'));
        	$projeto = App\Projeto::find($request->only('projeto_id'));
        	$projeto[0]->total_coments+=1;
            $projeto[0]->total_visualizacao-=1;
        	$projeto[0]->save();
        	return back();
    	}
        catch(\Exception $e)
        {
            return redirect()->route('home')->with(['erro' => $e]);
        }
    }

    public function compartilhar($provider, $id) 
    {
        $url = env('APP_URL')."/projeto/".$id;
        return redirect(Share::load( $url, 'Olhe este projeto!')->$provider());
        //return redirect(Share::load('http://www.example.com', 'Olhe este projeto!', session('socialUser')->getAvatar())->$provider());

    }

    public function executar(Request $request, $id)
    {
        try
        {
            $projeto = App\Projeto::find($id);
            $user = auth()->user();
            $valor = $request->input('optionsRadios');
            if($valor == 1){
                $execucao = $projeto->execucao()->create([
                        'user_id' => $user->id,
                        'projeto_id' => $id,
                        'instituicao_id' => $user->instituicao_id,
                    ]);
                return redirect()->route('home')->with('sucesso', 'Projeto executado com sucesso!');
            }
            $ambitos = App\Ambito::all()->pluck('name','id');
            $categorias = App\Categoria::all()->pluck('name','id');
            $eixos = App\Eixo::all()->pluck('name','id');
            $instituicoes = App\Instituicao::all()->pluck('name','id');
            return view('projeto.form-executar')->with(compact('projeto','ambitos', 'categorias', 'eixos', 'instituicoes'));
        }
        catch(\Exception $e)
        {
            return redirect()->route('home')->with(['erro' => $e]);
        }
    }
    //CURTIR V1
    public function curtir($projeto_id, $acao = false)
    {
        $user = auth()->user();
        $like = App\Like::updateOrCreate([
                'projeto_id' => $projeto_id,
                'user_id' => $user->id],
                ['like' => $acao]);
        if ($acao == true)
        {
            $projeto = App\Projeto::find($projeto_id);
            $projeto->total_curtidas += 1;
            $projeto->save();
            return back()->with(['retorno' => 'true']);
        }
        $projeto = App\Projeto::find($projeto_id);
        $projeto->total_curtidas -= 1;
        $projeto->save();
        return back()->with(['retorno' => 'false']);
    }

    public function executarMudancas(RequestProjetoForm $request, $projeto_id)
    {
        try
        {
            $projeto = App\Projeto::find($projeto_id);
            $user = auth()->user();
            $versao = App\VersaoProj::create(['projeto_anterior_id' => $projeto_id, 'versao' => $projeto->versao['versao']+1]);
            $novoProjeto = new App\Projeto();
            $novoProjeto->fill($request->only('name', 'resultado', 'descricao', 'instituicao_id', 'eixo_id', 'categoria_id', 'ambito_id', 'cronograma', 'comentarios_prof', 'ancora', 'questao_motriz', 'n_alunos', 'prazo', 'feedback', 'tags'));
            $novoProjeto->fill(['versao_proj_id' => $versao->id, 'user_id' => $user->id]);
            $novoProjeto->save();
            $execucao = $novoProjeto->execucao()->create([
                        'user_id' => $user->id,
                        'projeto_id' => $novoProjeto->id,
                        'instituicao_id' => $user->instituicao_id,
                    ]);
            return redirect()->route('home')->with(['sucesso' => 'Projeto executado com Sucesso!']);
        }
        catch(\Exception $e)
        {
            return redirect()->route('home')->with(['erro' => $e]);
        }
    }
}
