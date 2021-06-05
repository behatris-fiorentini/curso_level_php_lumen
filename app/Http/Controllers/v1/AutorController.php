<?php

declare(strict_types=1);

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Services\AutorService;

class AutorController extends AbstractController
{
    /**
     * @var array
     */
    protected array $searchFields = [
        'nome',
        'sobrenome',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected AutorService $autorService,
    )
    {
        parent::__construct($autorService);
    }
}
