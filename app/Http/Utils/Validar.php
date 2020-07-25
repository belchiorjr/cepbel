<?php

namespace App\Http\Utils;

use Illuminate\Support\Facades\Validator;


class Validar {
    
    /**
    * Verifica se os dados enviados estão de acordo.
    *
    * @param $objetoValidador Request
    * @return Array/Boolean
    */
    public static function invalido($objetoRegras) {

        $validator = Validator::make(
            request()->all(), 
            $objetoRegras->rules(),
            $objetoRegras->messages()          
        );

        if ($validator->errors()->messages()) {
            return $validator->errors()->messages();
        }

        return false;
    }
}