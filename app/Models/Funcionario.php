<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = ['nome','usuario','senha','admin','ativado'];

    public function operacoes() {
        return $this->hasMany('App\Models\Operacao');
    }
}
