<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Api\Breed;
use App\Contracts\Api\Client;
use App\Contracts\GetBreedService as GetBreedServiceContract;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Log;

readonly class GetBreedService implements GetBreedServiceContract
{
    /**
     * GetBreed constructor.
     */
    public function __construct(
        private Client $client
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(int $breedId): ?Breed
    {
        try {
            return $this->client->breeds()->get($breedId);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return null;
        }
    }

    /**
     * Register breed API service
     */
    public static function register(Application $application): void
    {
        $application->bind(GetBreedServiceContract::class, GetBreedService::class);
    }
}
