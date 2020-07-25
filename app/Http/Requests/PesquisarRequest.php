<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesquisarRequest extends FormRequest
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
     * Regras de Validação
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cep' => ['required', new \App\Rules\CepRule()]
        ];
    }


    /**
     * Mensagens personalizada para regra
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cep.required' =>  'O cep informado não é número de CEP válido.',
        ];
    }
}
