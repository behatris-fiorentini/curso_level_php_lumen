<?php

declare(strict_types=1);

namespace app\Services;

class NoticiaService extends AbstractService
{
    /**
     * Busca notícias por autor
     *
     * @param integer $autor_id
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function findByAutor(int $autor_id, int $limit = 10, array $orderBy = []): array
    {
        return $this->repository->findByAutor($autor_id, $limit, $orderBy);
    }

    /**
     * Busca notícias pelo seu Id ou slug
     *
     * @param string $param
     * @return array
     */
    public function findBy(string $param): array
    {
        return $this->repository->findBy($param);
    }

    /**
     * Deleta notícia por id ou slug
     *
     * @param string $param
     * @return boolean
     */
    public function deleteBy(string $param): bool
    {
        return $this->repository->deleteBy($param);
    }

    /**
     * Deleta todas as notícias pertencentes a um autor
     *
     * @param integer $autorId
     * @return boolean
     */
    public function deleteByAutor(int $autorId): bool
    {
        return $this->repository->deleteByAutor($autorId);
    }
}
