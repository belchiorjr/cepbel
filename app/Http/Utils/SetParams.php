<?php

namespace App\Http\Utils;

use Illuminate\Support\Facades\Validator;


class SetParams {
    
    /**
    * Adiciona valores da requisição no objeto modelo,
    * por inferência.
    *
    * @param $model
    * @return bool
    */
    public static function set(&$model) {

        if (!$model) 
            return false;

        foreach ($model->getFillable() as $keyFill) {
            foreach (request()->all() as $key => $value) {
                if($keyFill == $key) 
                    $model->$keyFill = $value;
            }
        }

        return true;
    }
}