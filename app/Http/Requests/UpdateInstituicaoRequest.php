<?php

namespace App\Http\Requests;

use App\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
class UpdateInstituicaoRequest extends FormRequest
{
  

    public function rules()
    {
        $request = request();
    
        return [
            'name' => ['required'],
            'cnpj' => ['required', 
            Rule::unique('instituicao')->ignore($request->id),
        ],
            'status' => ['nullable', 'boolean']
        ];
    }
}
