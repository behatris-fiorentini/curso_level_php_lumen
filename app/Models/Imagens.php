<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagens extends Model {

    protected $table = 'imagens';

    protected $fillable = [
        'imagem',
        'descricao',
        'noticia_id',
        'st_ativo',
    ];
}