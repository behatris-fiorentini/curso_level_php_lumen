<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model {

    protected $table = 'noticias';

    protected $fillable = [
        'titulo',
        'subtitulo',
        'descricao',
        'autor_id',
        'dt_publicacao',
        'st_ativo',
    ];
}