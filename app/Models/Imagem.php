<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Imagens
 */
class Imagem extends Model
{
    /**
     * @var string
     */
    protected $table = 'imagens';

    /**
     * @var array
     */
    protected $fillable = [
        'imagem',
        'descricao',
        'noticia_id',
        'st_ativo',
    ];

    /**
     * @var array
     */
    public array $rules = [
        'imagem' => 'required',
        'descricao' => 'required|min:10|max:250',
        'noticia_id' => 'required|numeric',
    ];
}
