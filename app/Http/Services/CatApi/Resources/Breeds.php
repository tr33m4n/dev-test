<?php

declare(strict_types=1);

namespace App\Http\Services\CatApi\Resources;

use App\Contracts\Api\Breed;
use App\Contracts\Api\Breed as BreedContract;
use App\Contracts\Api\BreedsResource;
use App\Http\Method;
use App\Http\Services\CatApi\Client;
use App\Http\Services\CatApi\Dto\Breed as BreedDto;
use Illuminate\Support\Collection;

readonly class Breeds implements BreedsResource
{
    /**
     * Breeds constructor.
     */
    public function __construct(
        private Client $client
    ) {
    }

    /**
     * @inheritDoc
     */
    public function get(int $breedId): BreedContract
    {
        return BreedDto::fromArray($this->client->send(Method::GET, 'breeds/' . $breedId)->json());
    }

    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return $this->client->send(Method::GET, 'breeds')
            ->collect()
            ->map(static fn (array $breed): Breed => BreedDTO::fromArray($breed));
    }
}
