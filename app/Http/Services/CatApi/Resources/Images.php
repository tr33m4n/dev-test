<?php

declare(strict_types=1);

namespace App\Http\Services\CatApi\Resources;

use App\Contracts\Api\Image as ImageContract;
use App\Contracts\Api\ImagesResource;
use App\Http\Method;
use App\Http\Services\CatApi\Client;
use App\Http\Services\CatApi\Dto\Image as ImageDto;

readonly class Images implements ImagesResource
{
    /**
     * Images constructor.
     */
    public function __construct(
        private Client $client
    ) {
    }

    /**
     * @inheritDoc
     */
    public function get(int $imageId): ImageContract
    {
        return ImageDto::fromArray($this->client->send(Method::GET, 'images/' . $imageId)->json());
    }
}
