<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CepRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Verifica se o cep é valida para ser pesquisado
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (strlen($value) === 8) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O Cep Informado não é válido para pesquisa.';
    }
}
