<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Api\Client;
use App\Contracts\ListBreedsService as ListBreedsServiceContract;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

readonly class ListBreedsService implements ListBreedsServiceContract
{
    /**
     * ListBreedsService constructor.
     */
    public function __construct(
        private Client $client
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(): Collection
    {
        try {
            return $this->client->breeds()->list();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return collect();
        }
    }

    /**
     * Register list breed API service
     */
    public static function register(Application $application): void
    {
        $application->bind(ListBreedsServiceContract::class, ListBreedsService::class);
    }
}
