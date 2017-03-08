<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Share;

class SocialController extends Controller
{
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
}
