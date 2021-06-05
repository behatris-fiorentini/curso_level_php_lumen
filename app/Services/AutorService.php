<?php

declare(strict_types=1);

namespace App\Services;

use app\Services\AbstractService;

class AutorService extends AbstractService
{
    /**
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        $data['senha'] = encrypt($data['senha']);
        return $this->repository->create($data);
    }

    /**
     * @param string $param
     * @param array $data
     * @return bool
     */
    public function editBy(string $param, array $data): bool
    {
        $data['senha'] = encrypt($data['senha']);
        return $this->repository->editBy($param, $data);
    }
}
