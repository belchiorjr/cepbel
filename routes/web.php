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
    Route::get('/visualizar/{cep}', 'CepController@visualizar');
    Route::get('/editar/{cep}', 'CepController@editar');
    Route::get('/mensagem/{mensagem}', 'CepController@mensagem');
    Route::post('/atualizar/{cep}', 'CepController@atualizar');
    Route::get('/deletar/{cep}', 'CepController@deletar');
});