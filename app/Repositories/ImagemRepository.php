<?php

declare(strict_types=1);

namespace app\Repositories;

use App\Repositories\AbstractRepository;

class ImagemRepository extends AbstractRepository
{

    /**
     * Lista imagens pela notícia
     *
     * @param int $noticia_id
     * @return array
     */
    public function findByNoticia(int $noticia_id): array
    {
        return $this->model::where('noticia_id'. $noticia_id)
            ->get()
            ->toArray();
    }

    /**
     * Deleta todas as imagens de uma notícia
     *
     * @param integer $noticia_id
     * @return boolean
     */
    public function deleteByNoticia(int $noticia_id):bool
    {
        return !!$this->model::where('noticia_id', $noticia_id)
            ->delete();
    }
}
