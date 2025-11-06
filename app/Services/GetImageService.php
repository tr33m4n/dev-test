<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Api\Client;
use App\Contracts\Api\Image;
use App\Contracts\GetImageService as GetImageServiceContract;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Log;

readonly class GetImageService implements GetImageServiceContract
{
    /**
     * GetImageService constructor.
     */
    public function __construct(
        private Client $client
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(int $imageId): ?Image
    {
        try {
            return $this->client->images()->get($imageId);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return null;
        }
    }

    /**
     * Register get breed API service
     */
    public static function register(Application $application): void
    {
        $application->bind(GetImageServiceContract::class, GetImageService::class);
    }
}
