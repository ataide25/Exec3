<?php

namespace App\Http\Requests;

use App\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreInstituicaoRequest extends FormRequest
{
  

    public function rules()
    {
     
        return [
            'name' => ['required'],
            'cnpj' => ['required', 'unique:instituicao'],
            'status' => ['nullable', 'boolean']
            
        ];
    }
}
