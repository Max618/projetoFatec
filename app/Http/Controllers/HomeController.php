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
        $curtidas = App\Like::where('user_id',$user->id)->where('like', 'true');
        //return $curtidas;
        return view('home')->with(compact('projetos','curtidas'));
    }
}
