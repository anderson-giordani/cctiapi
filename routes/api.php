<?php

use Illuminate\Http\Request;
// use Illuminate\Routing\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/** 
 * Animais
*/
Route::resource('animais', 'Animal\AnimalController', ['only' => ['store', 'show', 'index']]);

/*
*Pessoa Física
*/
Route::resource('pessoas-fisicas', 'PessoaFisica\PessoaFisicaController', ['except' => ['create', 'edit', 'update']]);
Route::resource('pessoas-fisicas.animais', 'PessoaFisica\PessoaFisicaAnimalController', ['only' => ['index', 'store']]);

/** 
 * Pessoas_jurudica
 */
Route::resource('pessoas-juridicas', 'PessoaJuridica\PessoaJuridicaController', ['only' => ['index', 'show', 'store']]);
Route::resource('pessoas-juridicas.animais', 'PessoaJuridica\PessoaJuridicaAnimalController', ['only' => ['index', 'store']]);
Route::get('pessoas-juridicas/{PessoaJuridica}/representantes', 'PessoaJuridica\PessoaJuridicaRepresentanteController@index');