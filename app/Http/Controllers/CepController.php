<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Utils\Validar;

class CepController extends Controller
{

    //     Route::get('/', 'CepController@index');
    // Route::post('/buscar', 'CepController@buscar');
    // Route::get('/visualizar/{cep}', 'CepController@visualizar');
    // Route::get('/editar/{cep}', 'CepController@editar');
    // Route::post('/atualizar/{cep}', 'CepController@atualizar');
    // Route::post('/deletar/{cep}', 'CepController@deletar');


    /**
    * Apresenta o formulário de pesquisa.
    * 
    * @return view()
    */
    public function inicio() {

         return view('inicio');
    }


    /**
    * Realiza a pesquisa de ceps, na base 
    * caso não encontre é feita uma busca 
    * na api via cep
    * 
    * @return view()
    */
    public function pesquisar() {

        // Limpa textos da pesquisa mantendo somente números
        $cepClean = preg_replace("/\D/", "", request()->cep);
        request()->merge(['cep' => $cepClean]);


        // Dados inválidos?
        if ($erros = Validar::invalido(new \App\Http\Requests\PesquisarRequest)) {

            
            return view('mensagem', [ 'mss' => 'Dados Inválidos PersonalLocalization', 'erros' => $erros, 'voltar' => true]);
        }



        dd(request()->cep);


        // if ($errors = Validate(new PersonalLocalizationStoreRequest())) 
        //     return view('personal::personal_localization_error', [ 'mss' => 'Dados Inválidos PersonalLocalization', 'errors' => $errors, 'invalid' => true]);

        // if ($user = Auth::user()) {
        //     request()->merge(['user_id' => $user->id]);
        // }
        
        // $cepService = new CepService();
        // $cep = $cepService->getData();

        // if (isset($viaCep['erro']) && $viaCep['erro']) {
        //     $response = Http::get('http://viacep.com.br/ws/'.request()->cep.'/json');
        //     $viaCep = json_decode($response->body(), 1);
         
        //     if (!$viaCep || (isset($viaCep['erro']) && $viaCep['erro'])) {
        //         return view('personal::personal_localization_error', ['mss' => 'Não foi possível localizar o CEP.', 'invalid' => true]);    
        //     }

        //     $viaCep['cep'] = preg_replace("/\D/", "", $viaCep['cep']);

        //     request()->merge(['via_cep' => $viaCep]);

        //     $cep = $cepService->store();
        // }

        // if (is_array($cep))
        //     $cep = reset($cep);


        // request()->merge(['cep_id' => $cep->id]);

        // if ($personal_localization = $this->personal_localization_service->store()) {
        //     return view('personal::personal_localization_success', [ 'mss' => 'Cadastrado com sucesso', 'personal_localization' => $personal_localization]);
        // }

        // return view('personal::personal_localization_error', [ 'mss' => 'Falha ao Cadastrar PersonalLocalization']);


        
        return redirect('visualizar/'.request()->cep);

    }


    /**
    * Apresenta os dados do cep.
    * 
    * @return view()
    */
    public function visualizar($cep) {

         return view('visualizar', ['cep' => $cep]);
    }


    /**
    * Apresenta os dados do cep em formulário
    * preparados para edição
    * 
    * @return view()
    */
    public function editar($cep) {

         return view('editar',  ['cep' => $cep]);
    }



    /**
    * Atualiza os dados dos CEPS
    * 
    * @return view()
    */
    public function atualizar($cep) {

        
        return view('visualizar', ['cep' => $cep]);
    }


    /**
    * Deleta os dados do CEP
    * 
    * @return view()
    */
    public function deletar($cep) {

        return redirect('mensagem/'.request()->cep);
    }


}
