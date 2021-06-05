<?php

declare(strict_types=1);

namespace app\Http\Controllers;

use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;

interface ControllerInterface
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function findAll(Request $request): JsonResponse;

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function findOneBy(Request $request, int $id): JsonResponse;

    /**
     * @param Request $request
     * @param string $param
     * @return JsonResponse
     */
    public function editBy(Request $request, string $param): JsonResponse;

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function delete(Request $request, int $id): JsonResponse;
}
