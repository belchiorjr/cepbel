<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtualizarRequest extends FormRequest
{
    /**
     * Permissão total
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Regras de validações para editar os dados do cep
     *
     * @return array
     */
    public function rules()
    {
        return [
            "logradouro" => 'required',
            "bairro" => 'required',
            "localidade" => 'required',
            "uf" => 'required'
        ];
    }



    /**
    * Mensagens de erros personalizadas
    *
    * @return array
    */
    public function messages()
    {
        return [
            "logradouro.required" => 'Informe um logradouro.',
            "bairro.required" => 'Informe um bairro.',
            "localidade.required" => 'Informe uma localidade.',
            "uf.required" =>  'Informe uma Unidade de Federação'
        ];
    }
}
