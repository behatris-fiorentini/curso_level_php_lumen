<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use app\Services\NoticiaService;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;

class NoticiaController extends AbstractController
{
    /**
     * @var array
     */
    protected array $searchFields = [
        'titulo',
        'slug',
        'subtitulo',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected NoticiaService $noticiaService,
    )
    {
        parent::__construct($noticiaService);
    }

    /**
     * @param Request $request
     * @param integer $autorId
     * @return JsonResponse
     */
    public function findByAutor(Request $request, int $autorId): JsonResponse
    {
        try {
            $limit = (int) $request->get('limit', 10);
            $orderBy = $request->get('order_by', []);

            $result = $this->service->findByAuthor($autorId, $limit, $orderBy);

            return request()->json(
                $result,
                Response::HTTP_PARTIAL_CONTENT
            );
        } catch (Exception $e) {
            $this->errorMsg($e);
        }
    }

    /**
     * @param string $param
     * @return JsonResponse
     */
    public function findBy(string $param): JsonResponse
    {
        try {
            return response()->json(
                $this->noticiaService->findBy($param),
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorMsg($e);
        }
    }

    /**
     * @param integer $autorId
     * @return boolean
     */
    public function deleteByAutor(int $autorId): bool
    {
        try {
            return request()->json(
                $this->noticiaService->deleteByAutor($autorId),
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            $this->errorMsg($e);
        }
    }
}
