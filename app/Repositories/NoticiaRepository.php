<?php

declare(strict_types=1);

namespace app\Repositories;

use App\Repositories\AbstractRepository;

class NoticiaRepository extends AbstractRepository
{

    /**
     * Busca a notícia pelo autor
     *
     * @param integer $autorId
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function findByAutor(int $autorId, int $limit = 10, array $orderBy = []): array
    {
        $result = $this->model::where('autor_id', $autorId);

        foreach ($orderBy as $key => $value) {
            if (strstr($key, '-')) {
                $key = substr($key, 1);
            }

            $result->orderBy($key, $value);
        }

        return $result->paginate($limit)
            ->appends([
                'order_by' => implode(',', array_keys($orderBy)),
                'limit' => $limit
            ])
            ->toArray();
    }

    /**
     * Busca a notícia pelo slug ou id
     *
     * @param string $param
     * @return array
     */
    public function findBy(string $param): array
    {
        $query = $this->model::query();

        if (is_numeric($param)) {
            return $query->findOrFail($param)->toArray();
        }

        return $query->where('slug', $param)
                ->get()
                ->toArray();
    }

    /**
     * Edita a noticía pelo slug ou id
     *
     * @param string $param
     * @param array $data
     * @return boolean
     */
    public function editBy(string $param, array $data): bool
    {
        if (is_numeric($param)) {
            return !!$this->model::findOrFail($param)
                ->update($data);
        }

        return !!$this->model::where('slug', $param)
                ->update($data);
    }

    /**
     * Deleta a notícia pelo slug ou id
     *
     * @param string $param
     * @return boolean
     */
    public function deleteBy(string $param): bool
    {
        if (is_numeric($param)) {
            return !!$this->model::findOrFail($param)
                ->delete();
        }

        return !!$this->model::where('slug', $param)
            ->delete();
    }

    /**
     * Deleta todos as notícias de um autor
     *
     * @param integer $autorId
     * @return boolean
     */
    public function deleteByAutor(int $autorId): bool
    {
        return !!$this->model::where('autor_id', $autorId)
            ->delete();
    }
}
