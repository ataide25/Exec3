<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{

    public $table = 'instituicao';
    protected $fillable = [
        'name',
        'cnpj',
        'status',
    ];

    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }

    public function canDelete(): bool
    {
        if($this->cursos->isEmpty()){
            return true;
        }
        return false;
    }
}
