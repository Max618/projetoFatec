<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Share;

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
    	} catch(\Exception $e)
    	{
    		return redirect('/');
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
        $projeto = App\Projeto::find($id);
        $user = auth()->user();
        //dd($request->only('optionsRadios'));
        $execucao = App\Execucao::find(6);
        $valor = $request->input('optionsRadios');
        //dd($valor);
        if($valor == 1){
            $execucao = $projeto->execucao()->create([
                    'user_id' => $user->id,
                    'projeto_id' => $id,
                    'instituicao_id' => $user->instituicao_id,
                ]);
            return redirect()->route('home')->with('sucesso', 'Projeto executado com sucesso!');
        }
        return 'Valor = 2, com mudanças';
        //return view('projeto.form-executar')->with('mensagem','aki');
    }
//CURTIR V1
    public function curtir($projeto_id, $acao = true)
    {
        $user = auth()->user();
        $like = App\Like::updateOrCreate([
                'projeto_id' => $projeto_id,
                'user_id' => $user->id,
                'like' => $acao,
            ]);
        $projeto = App\Projeto::find($projeto_id);
        $projeto->total_curtidas += 1;
        $projeto->save();
        if ($acao == 'true')
        {
            return response()->json(['retorno' => 'true']);
        }
        return response()->json(['retorno' => 'false']);
    }
}
