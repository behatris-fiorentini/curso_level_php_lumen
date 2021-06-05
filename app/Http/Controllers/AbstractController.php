<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ServiceInterface;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController extends BaseController
{
    /**
     * @var array
     */
    protected array $searchFields = [];

    public function __construct(
        protected ServiceInterface $service,
    )
    {}

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        // dd('entrou');
        try {
            $result = $this->service->create($request->all());

            return response()->json(
                $result,
                Response::HTTP_CREATED
            );
        } catch (Exception $e) {
            return $this->errorMsg($e);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function findAll(Request $request): JsonResponse
    {
        try {
            $limit = (int) $request->get('limit', 10);
            $orderBy = $request->get('order_by', []);

            // if (!empty($orderBy)) {
            //     $orderBy = OrderByHelper::treatOrderBy($orderBy);
            // }

            $searchString = $request->get('q', '');

            if (!empty($searchString)) {
                return response()->json(
                    $this->service->searchBy(
                        $searchString,
                        $this->searchFields,
                        $limit,
                        $orderBy
                    ),
                    Response::HTTP_PARTIAL_CONTENT
                );
            }

            return response()->json(
                $this->service->findAll($limit, $orderBy),
                Response::HTTP_PARTIAL_CONTENT
            );
        } catch (Exception $e) {
            return $this->errorMsg($e);
        }
    }

    /**
     * @param Request $request
     * @param integer $id
     * @return JsonResponse
     */
    public function findOneBy(Request $request, int $id): JsonResponse
    {
        try {
            return response()->json(
                $this->service->findOneBy($id),
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorMsg($e);
        }
    }

    /**
     * @param Request $request
     * @param string $param
     * @return JsonResponse
     */
    public function editBy(Request $request, string $param): JsonResponse
    {
        try {
            $result = $this->service->editBy(
                $param,
                $request->all()
            );

            return response()->json(
                'Reistro atualizado com sucesso.',
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorMsg($e);
        }
    }

    /**
     * @param integer $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        try {
            $this->service->delete($id);
            return response()->json(
                'Registro excluído com sucesso',
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorMsg($e);
        }
    }

    /**
     * @param Exceptin $e
     * @return Exception
     */
    protected function errorMsg(Exception $e): Exception
    {
        return throw new Exception(
            $e->getMessage(),
            $e->getCode()
        );
    }
}
