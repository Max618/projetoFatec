<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class SearchController extends Controller
{
    public function categorias($id){
        $projetos = App\Projeto::orderBy('created_at', 'desc')->where('categoria_id', $id)->paginate(6);;
        $categorias = App\Categoria::all();
        return view('projeto.ver-todos')->with(compact('projetos','categorias'));
    }

    public function tags($id){
        $projetos = App\Projeto::orderBy('created_at', 'desc')->where('tags', 'like', "%".$id."%")->paginate(6);;
        $categorias = App\Categoria::all();
        return view('projeto.ver-todos')->with(compact('projetos','categorias'));
    }
}
