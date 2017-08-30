<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('login-{provider}', 'Auth\RegisterController@redirectToProvider')->name('loginSocial');
Route::get('login-{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('projeto','ProjetosController');

Route::post('/comentar','SocialController@comentar')->name('social.comentar');
Route::get('/compartilhar/{provider}/{id}','SocialController@compartilhar')->name('social.compartilhar');
Route::get('executar/projeto/{id}', 'SocialController@verExecutar')->name('social.mudancas');
Route::post('executar/{id}', 'SocialController@executar')->name('social.executar');
Route::post('mudar/{projeto_id}' ,'SocialController@executarMudancas')->name('social.executar-mudancas');

//Curtir V1
Route::get('curtir/{projeto_id}/{acao?}', 'SocialController@curtir')->name('social.curtir');

//Route::post('curtir', 'SocialController@curtir')->name('social.curtir');

Route::get('{id}/salvar', 'SocialController@save')->name('social.save');

