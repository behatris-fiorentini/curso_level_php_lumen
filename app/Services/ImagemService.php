<?php

declare(strict_types=1);

namespace app\Services;

use App\Repositories\RepositoryInterface;

class ImagemService extends AbstractService
{
    /**
     * Lista todas as imagens de uma notícia
     *
     * @param integer $noticiaId
     * @return array
     */
    public function findByNoticia(int $noticiaId): array
    {
        return $this->repository->findByNoticia($noticiaId);
    }

    /**
     * Deleta todas as imagens de uma notícia
     *
     * @param integer $noticiaId
     * @return boolean
     */
    public function deleteByNoticia(int $noticiaId): bool
    {
        return $this->repository->deleteByNoticia($noticiaId);
    }
}
