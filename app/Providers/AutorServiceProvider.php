<?php

namespace App\Providers;

use App\Models\Autor;
use app\Repositories\AutorRepository;
use App\Services\AutorService;
use Illuminate\Support\ServiceProvider;

class AutorServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AutorService::class, function ($app) {
            return new AutorService(new AutorRepository(new Autor()));
         });
    }
}
