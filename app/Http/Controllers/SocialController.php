<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

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
    	$projeto[0]->save();
    	return back();
    	} catch(\Exception $e)
    	{
    		return redirect('/');
    	}
    }
}
