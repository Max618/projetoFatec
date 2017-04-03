<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Vinkla\Facebook\Facades\Facebook;
use Cache;
use App\Http\Requests\RequestProjetoForm;

class ProjetosController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth')->except('show','index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = App\Projeto::orderBy('created_at', 'desc')->paginate(6);
        return view('projeto.ver-todos')->with(compact('projetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ambitos = App\Ambito::all()->pluck('name','id');
        $categorias = App\Categoria::all()->pluck('name','id');
        $eixos = App\Eixo::all()->pluck('name','id');
        $instituicoes = App\Instituicao::all()->pluck('name','id');
        return view('projeto.form-novo')->with(compact('ambitos', 'categorias', 'eixos', 'instituicoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestProjetoForm $request)
    {
      /*  dd(Request::hasFile('imagem'));
        if ($img = $request->file('img')) {
            echo $img;
        }
        else {
            echo "n foi";
        }*/
        try{
            $projeto = new App\Projeto();
            $projeto->fill($request->only('name', 'resultado', 'descricao', 'instituicao_id', 'eixo_id', 'categoria_id', 'ambito_id', 'cronograma', 'comentarios_prof', 'ancora', 'questao_motriz', 'n_alunos', 'prazo', 'feedback', 'tags'));

            $projeto->fill(['user_id' => auth()->user()->id]);

            if(empty($request->only('name_prof', 'email'))){
                $prof_aux = App\Prof_aux::firstOrCreate($request->only('name_prof', 'email'));
                $projeto->prof_aux_id = $prof_aux->id;
            }

            $projeto->save();
        } catch(\Excepition $e){
            return redirect()->route('home')->with(['erro' =>'Erro ao tentar criar o Projeto, por favor confira os dados e tente novamente']);
        }
  
        return redirect()->route('home')->with(['sucesso' => 'Projeto criado com Sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $projeto = App\Projeto::find($id);
        if(! Cache::has($id))
        {
            Cache::add($id, 'contador', 0.30);
            $projeto->total_visualizacao+=1;
            $projeto->save();
        }
        $like = App\Like::where('projeto_id', $projeto->id)->where('user_id', $user->id)->first();
        return  view('projeto.ver-um')->with(compact('projeto','like'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
