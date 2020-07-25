<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Utils\Validar;
use App\Http\Utils\SetParams;
use Illuminate\Support\Carbon;
use App\CEP;

class CepController extends Controller
{

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

        // Trata o parametro de cep enviado na busca
        $_cep = preg_replace("/\D/", "", request()->cep);
        request()->merge(['cep' => $_cep]);

        // Dados inválidos?
        if ($erros = Validar::invalido(new \App\Http\Requests\PesquisarRequest)) {
            return view('mensagem', [ 'mss' => 'Dados Inválidos para pesquisa.', 'erros' => $erros, 'voltar' => true]);
        }

        // Cep encontrado em nossa base?
        if ($cep = CEP::where('cep', request()->cep)->first()) {
            return redirect('visualizar/'.$cep->id);
        }

        // Realiza uma chamada para web-service viacep
        if ($response = Http::get(env('WS_CEP').request()->cep.'/json')) {

            if ($viaCep = json_decode($response->body(), 1)) {
                $cep = new CEP($viaCep);
                $cep->cep = preg_replace("/\D/", "", $viaCep['cep']);
                


                if (!$cep->unidade)
                    unset($cep->unidade);
                
                if (!$cep->gia)
                    unset($cep->gia);

                if (!$cep->ibge)
                    unset($cep->ibge);
    
                if ($cep->save()) {
                    return redirect('visualizar/'.$cep->id);
                }
            }
        }
        
        return view('mensagem', [ 'mss' => 'Cep não encontrado em nossas bases de dados.', 'voltar' => true]);
    }


    /**
    * Apresenta os dados do cep.
    * 
    * @return view()
    */
    public function visualizar($cep_id) {

        if ($cep_id = preg_replace("/\D/", "", $cep_id)) {
           
            $cep = Cep::find($cep_id);
            $cep->incluido_em = Carbon::parse($cep->dta_inc)->format('d/m/Y H:i:s');
            $cep->alterado_em = Carbon::parse($cep->dta_upd)->format('d/m/Y H:i:s');
           
            return view('visualizar', ['cep' => $cep]);   
        }

        return view('mensagem', [ 'mss' => 'Cep não encontrado em nossas bases de dados.', 'voltar' => true]);
    }


    /**
    * Apresenta os dados do cep em formulário
    * preparados para edição
    * 
    * @return view()
    */
    public function editar($cep_id) {

        if ($cep_id = preg_replace("/\D/", "", $cep_id)) {
           
            $cep = Cep::find($cep_id);
            $cep->incluido_em = Carbon::parse($cep->dta_inc)->format('d/m/Y H:i:s');
            $cep->alterado_em = Carbon::parse($cep->dta_upd)->format('d/m/Y H:i:s');
            
            return view('editar', ['cep' => $cep]);   
        }

        return view('mensagem', [ 'mss' => 'Cep não encontrado em nossas bases de dados.', 'voltar' => true]);
    }



    /**
    * Atualiza os dados dos CEPS
    * 
    * @return view()
    */
    public function atualizar($cep_id) {

        if ($cep_id = preg_replace("/\D/", "", $cep_id)) {
           
            if ($cep = Cep::find($cep_id)) {
           
                // Dados inválidos?
                if ($erros = Validar::invalido(new \App\Http\Requests\AtualizarRequest)) {
                    return view('mensagem', [ 'mss' => 'Verifique os dados informados.', 'erros' => $erros, 'voltar' => true]);
                }

                if (SetParams::set($cep)) {
                    
                    if ($cep->save()) {
                        return redirect('visualizar/'.$cep->id);
                    }

                    return view('mensagem', [ 'mss' => 'Cep não encontrado em nossas bases de dados.', 'voltar' => true]);
                }
            }
        }

        return view('mensagem', [ 'mss' => 'Cep não encontrado em nossas bases de dados.', 'voltar' => true]);
    }


    /**
    * Remove os dados do CEP da base de dados da aplicação.
    * 
    * @return view()
    */
    public function deletar($cep_id) {

        if ($cep_id = preg_replace("/\D/", "", $cep_id)) {
           
            $cep = Cep::find($cep_id);
        
            if ($cep->delete()) {
                return view('mensagem', [ 'mss' => 'Cep '.$cep->cep.' foi removido com sucesso da nossa base de dados.']);
            }
        }

        return view('mensagem', [ 'mss' => 'Não possivel remover o Cep '.$cep->cep. ' de nossa base de dados.']);
    }

}
