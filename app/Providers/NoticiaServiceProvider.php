<?php

namespace App\Providers;

use App\Models\Noticia;
use app\Repositories\NoticiaRepository;
use app\Services\NoticiaService;
use Illuminate\Support\ServiceProvider;

class NoticiaServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NoticiaService::class, function ($app) {
            return new NoticiaService(new NoticiaRepository(new Noticia()));
         });
    }
}
