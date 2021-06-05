<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autores extends Model {

    protected $table = 'autores';

    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'senha',
        'sexo',
        'st_ativo',
    ];
}