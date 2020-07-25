<?php

use Illuminate\Support\Facades\Route;

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

// Grupo de Rotas Relacionadas com CEP
Route::prefix("/")->group(function() {
    Route::get('/', 'CepController@inicio');
    Route::post('/pesquisar', 'CepController@pesquisar');
    Route::get('/visualizar/{cep_id}', 'CepController@visualizar');
    Route::get('/editar/{cep_id}', 'CepController@editar');
    Route::post('/atualizar/{cep_id}', 'CepController@atualizar');
    Route::get('/deletar/{cep_id}', 'CepController@deletar');
});