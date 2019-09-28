<?php

namespace App\Http\Requests;

use App\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
class StoreAlunoRequest extends FormRequest
{
  

    public function rules()
    {
        return [
            'name' => ['required'],
            'curso_id' => ['required', 'integer', 
            Rule::exists('cursos', 'id')->where(function ($q) {
                $q->where('status', 1);
            })],
            'cpf' => ['required', 'max: 14'],
            'birth' => ['required', 'date'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'max:17'],
            'street' => ['required', 'max:255'],
            'number' => ['required', 'integer'],
            'neighborhood' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'state' => ['required', 'max:2'],
            'status' => ['nullable', 'boolean']
        ];
    }
}
