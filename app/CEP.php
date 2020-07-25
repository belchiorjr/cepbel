<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CEP extends Model
{
    const CREATED_AT = 'dta_inc';
    const UPDATED_AT = 'dta_upd';
    
    protected $table = "cep";
    protected $fillable = ['cep', 'logradouro', 'bairro', 'localidade', 'uf', 'unidade', 'ibge', 'gia'];
    
}
