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
        $instituicoes = App\Instituicao::all();
        return view('projeto.form-novo')
            ->with(compact('ambitos', 'categorias', 'eixos', 'instituicoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projeto = new App\Projeto();
        $projeto->fill($request->only('name', 'descricao', 'ambito_id', 'categoria_id', 'eixo_id', 'cronograma', 'comentarios_prof', 'ancora', 'questao_motriz', 'n_alunos', 'prazo', 'feedback', 'resultado', 'tags'));
        $projeto->ambito_id = $request->input('ambito_id');
        $projeto->categoria_id = $request->input('categoria_id');
        $projeto->eixo_id = $request->input('eixo_id');
        
        if($projeto->save()){
            return "foi";
        }  
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
