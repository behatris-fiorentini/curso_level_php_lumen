<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository implements RepositoryInterface
{

    public function __construct(
        protected Model $model,
    )
    {}

    /**
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        return $this->model::create($data)
            ->toArray();
    }

    /**
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function findAll(int $limit = 10, array $orderBy = []): array
    {
        $result = $this->model::query();

        foreach ($orderBy as $key => $value) {
            if (strstr($key, '-')) {
                $key = substr($key, 1);
            }

            $result->orderBy($key, $value);
        }

        return $result->paginate($limit)
            ->appends([
                'order_by' => implode(',', array_keys($orderBy)),
                'limit' => $limit,
            ])
            ->toArray();

        /**
         * @todo teste
         * return $this->model::all()->orderBy($orderBy)->paginate($limit);
         */
    }

    /**
     * @param integer $id
     * @return array
     */
    public function findOneBy(int $id): array
    {
        return $this->model::findOrFail($id)
            ->toArray();
    }

    /**
     * @param string $param
     * @param array $data
     * @return array
     */
    public function editBy(string $param, array $data): bool
    {
        return !!$this->model::find($param)
            ->update($data);
    }

    /**
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        return !!$this->model::findOrFail($id)
            ->delete();
    }

    /**
     * @param string $string
     * @param array $searchFields
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function searchBy(string $string, array $searchFields, int $limit = 10, array $orderBy = []): array
    {
        /**
         * @todo Teste
         * $count = 0;
         * foreach ($searchFields as $key => $field) {
         *     if ($count == 0) {
         *         $result = $this->model::where($key, 'like', "% {$field} %");
         *     }
         *     $result->orWhere($key, 'like', "% {$field} %");
         *     $count++;
         * }
         */

        $results = $this->model::where($searchFields[0], 'like', '%' . $string . '%');

        if (count($searchFields) > 1) {
            foreach ($searchFields as $field) {
                $results->orWhere($field, 'like', '%' . $string . '%');
            }
        }

        foreach ($orderBy as $key => $value) {
            if (strstr($key, '-')) {
                $key = substr($key, 1);
            }

            $results->orderBy($key, $value);
        }

        return $results->paginate($limit)
            ->appends([
                'order_by' => implode(',', array_keys($orderBy)),
                'q' => $string,
                'limit' => $limit
            ])
            ->toArray();
    }
}
