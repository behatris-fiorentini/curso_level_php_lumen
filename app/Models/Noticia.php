<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Noticias
 */
class Noticia extends Model
{
    /**
     * @var string
     */
    protected $table = 'noticias';

    /**
     * @var array
     */
    protected $fillable = [
        'titulo',
        'subtitulo',
        'descricao',
        'autor_id',
        'dt_publicacao',
        'st_ativo',
    ];

    /**
     * @var array
     */
    protected array $rules = [
        'titulo' => 'required|min:10|max:100|alpha',
        'subtitulo'  => 'required|min:10|max:150|alpha',
        'descricao' => 'required|min:50',
        'autor_id' => 'required|numeric',
        'dt_publicacao' => 'required|date_format:Y-m-d H:i:s',
    ];

    /**
     * @return void
     */
    public function imagens()
    {
        return $this->hasMany(Imagens::class);
    }
}
