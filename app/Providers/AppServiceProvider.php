<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Services\CatApi\Client;
use App\Services\GetBreedService;
use App\Services\GetImageService;
use App\Services\ListBreedsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Client::register($this->app);
        GetBreedService::register($this->app);
        ListBreedsService::register($this->app);
        GetImageService::register($this->app);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
