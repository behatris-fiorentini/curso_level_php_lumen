<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Autores
 */
class Autores extends Model 
{    
    /**
     * @var string
     */
    protected $table = 'autores';
    
    /**
     * @var array
     */
    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'senha',
        'sexo',
        'st_ativo',
    ];
    
    /**
     * @var array
     */
    protected $hidden = [
        'senha'
    ];

    /**
     * @var array
     */
    public array $rules = [
        'nome' => 'required|min:2|max:50|alpha',
        'sobrenome' => 'required|min:2, max:100|alpha',
        'email' => 'required|email|max:150|unique:autores|email:rfc,dns',
        'senha' => 'required|between:8,10',
        'sexo' => 'required|alpha|max:1',
    ];

    /**
     * @return void
     */
    public function noticias()
    {
        return $this->hasMany(Noticias::class);
    }
}