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
        $projetos = $user->projetos;
        $curtidas = App\Like::where('user_id',$user->id)->where('like', 1)->get();
        //$curtidas = $curtidas->get(0);
        //$curtidas = App\Like::find(1);
        //dd($curtidas);
        //dd($curtidas->projeto['name']);
        return view('home')->with(compact('projetos','curtidas'));
    }
}
