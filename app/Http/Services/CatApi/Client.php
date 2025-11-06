<?php

declare(strict_types=1);

namespace App\Http\Services\CatApi;

use App\Contracts\Api\Client as ClientContract;
use App\Http\Method;
use App\Http\Services\CatApi\Resources\Breeds as BreedsResource;
use App\Http\Services\CatApi\Resources\Images as ImagesResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

readonly class Client implements ClientContract
{
    /**
     * Client constructor.
     */
    public function __construct(
        private PendingRequest $request
    ) {
    }

    /**
     * @inheritDoc
     */
    public function breeds(): BreedsResource
    {
        return new BreedsResource($this);
    }

    /**
     * @inheritDoc
     */
    public function images(): ImagesResource
    {
        return new ImagesResource($this);
    }

    /**
     * Send request to Cat API
     *
     * @throws \Illuminate\Http\Client\ConnectionException
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function send(Method $method, string $uri): Response
    {
        return $this->request->send($method->value, $uri)->throw();
    }

    /**
     * Register connector with application
     */
    public static function register(Application $application): void
    {
        $application->bindIf(
            ClientContract::class,
            fn () => new self(
                Http::baseUrl(config('services.cat_api.base_url'))
                    ->withHeaders(['x-api-key' => config('services.cat_api.key')])
                    ->acceptJson()
            )
        );
    }
}
