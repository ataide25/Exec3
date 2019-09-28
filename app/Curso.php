<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    public $table = 'cursos';
    protected $fillable = [
        'name',
        'instituicao_id',
        'closure',
        'status',
    ];
    
    public function instituicao()
    {
        return $this->belongsTo('App\Instituicao');     
    }

    public function alunos()
    {
        return $this->hasMany('App\Aluno');
    }

    public function canDelete(): bool
    {
        if($this->alunos->isEmpty()){
            return true;
        }
        return false;
    }
}
