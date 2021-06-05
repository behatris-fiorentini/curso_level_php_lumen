<?php

declare(strict_types=1);

namespace App\Repositories;

/**
 * RepositoryInterface
 */
class RepositoryInterface
{
    /**
     * create
     *
     * @param  mixed $data
     * @return array
     */
    public function create(array $data): array;

    /**
     * findAll
     *
     * @param  int $limit
     * @param  array $orderBy
     * @return array
     */
    public function findAll(int $limit = 10, array $orderBy = []): array;

    /**
     * findOneBy
     *
     * @param  int $id
     * @return array
     */
    public function findOneBy(int $id): array;

    /**
     * editBy
     *
     * @param  string $param
     * @param  array $data
     * @return array
     */
    public function editBy(string $param, array $data): bool;

    /**
     * delete
     *
     * @param  int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * searchBy
     *
     * @param string $string
     * @param array $searchFields
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function searchBy(
        string $string,
        array $searchFields,
        int $limit = 10,
        array $orderBy = []
    ): array;
}
