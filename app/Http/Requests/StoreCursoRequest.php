<?php

namespace App\Http\Requests;

use App\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class StoreCursoRequest extends FormRequest
{

    public function rules()
    {
        $request = request();
    
        return [
            'name' => ['required'],
            'closure' => ['required', 'date'],
            'status' => ['nullable', 'boolean']
        ];
    }
}