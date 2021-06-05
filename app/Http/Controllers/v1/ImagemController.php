<?php

namespace App\Http\Controllers;

use app\Services\ImagemService;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ImagemController extends AbstractController
{
    /**
     * @var array
     */
    protected array $searchFields = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected ImagemService $imagemService,
    )
    {
        parent::__construct($imagemService);
    }

    /**
     * @param Request $request
     * @param int $news
     * @return JsonResponse
     */
    public function findByNoticia(Request $request, int $noticiaId): JsonResponse
    {
        try {
            return response()->json(
                $this->imagemService->findByNoticia($noticiaId),
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorMsg($e);
        }
    }

    /**
     * @param Request $request
     * @param int $news
     * @return JsonResponse
     */
    public function deleteByNoticia(Request $request, int $noticiaId): JsonResponse
    {
        try {
            $this->imagemService->deleteByNoticia($noticiaId);

            return response()->json(
                'Registros excluídos com sucesso.',
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorMsg($e);
        }
    }
}
