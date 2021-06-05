<?php

declare(strict_types=1);

namespace app\Repositories;

use App\Repositories\AbstractRepository;

class ImagemRepository extends AbstractRepository
{

    /**
     * Lista imagens pela notícia
     *
     * @param int $noticiaId
     * @return array
     */
    public function findByNoticia(int $noticiaId): array
    {
        return $this->model::where('noticia_id'. $noticiaId)
            ->get()
            ->toArray();
    }

    /**
     * Deleta todas as imagens de uma notícia
     *
     * @param integer $noticiaId
     * @return boolean
     */
    public function deleteByNoticia(int $noticiaId):bool
    {
        return !!$this->model::where('noticia_id', $noticiaId)
            ->delete();
    }
}
