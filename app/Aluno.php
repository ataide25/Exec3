<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{

    public $table = 'alunos';
    protected $fillable = [
        'curso_id',
        'name',
        'cpf',
        'birth',
        'email',
        'phone',
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
        'status'
    ];
    
    public function curso()
    {
        return $this->belongsTo('App\Curso');     
    }

}
