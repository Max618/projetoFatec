<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Vinkla\Facebook\Facades\Facebook;

class ProjetosController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ambitos = App\Ambito::all()->pluck('name','id');
        //dd($ambitos);
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
    public function store(Request $request)
    {
        try
        {
            $prof_aux = App\Prof_aux::firstOrCreate($request->only('name_prof', 'email'));
            $projeto = $prof_aux->projeto()->create($request->only('name', 'descricao', 'instituicao_id', 'eixo_id', 'categoria_id', 'ambito_id', 'cronograma', 'comentarios_prof', 'ancora', 'questao_motriz', 'n_alunos', 'prazo', 'feedback', 'tags'));
        } catch (\Exception $e)
        {
            return redirect()->route('projeto.create')->with(['erro' =>'Erro ao tentar criar o Projeto, por favor confira os dados e tente novamente']);
        }
        return redirect()->route('projeto.create')->with(['sucesso' => 'Projeto criado com Sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
