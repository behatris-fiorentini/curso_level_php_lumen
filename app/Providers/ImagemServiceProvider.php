<?php

namespace App\Providers;

use App\Models\Imagem;
use app\Repositories\ImagemRepository;
use app\Services\ImagemService;
use Illuminate\Support\ServiceProvider;

class ImagemServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImagemService::class, function ($app) {
            return new ImagemService(new ImagemRepository(new Imagem()));
         });
    }
}
