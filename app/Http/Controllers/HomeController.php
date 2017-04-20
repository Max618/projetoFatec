<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if(count($user->projetos) > 0)
        {
            $projetos = $user->projetos;
            $curtidas = App\Like::where('user_id',$user->id)->where('like', 1)->get();
            $execucoes = $user->execucao;
            foreach ($execucoes as $execucao) {
                $projetos_ex[] = App\Projeto::find($execucao['projeto_id']);
            }
            $projetos_ex = array_unique($projetos_ex);
            foreach ($projetos as $projeto) {
                foreach ($projeto->execucao as $ex) {
                    $execucoes_projetos[] = $ex;
                }
            }
        }
        else
        {
            $projetos = null;
            $curtidas = null;
            $projetos_ex = null;
            $execucoes_projetos = null;
        }
        return view('home')->with(compact('projetos','curtidas','projetos_ex','execucoes_projetos'));
    }
}
