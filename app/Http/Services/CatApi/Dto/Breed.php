<?php

declare(strict_types=1);

namespace App\Http\Services\CatApi\Dto;

use App\Contracts\Api\Breed as BreedContract;

class Breed implements BreedContract
{
    public const ID_KEY = 'id';

    public const NAME_KEY = 'name';

    /**
     * Breed constructor.
     */
    public function __construct(
        public readonly int $id,
        public readonly string $name
    ) {
    }

    /**
     * New instance of breed from array
     *
     * @param array{id: int, name: string} $breed
     */
    public static function fromArray(array $breed): Breed
    {
        return new Breed(
            $breed[self::ID_KEY],
            $breed[self::NAME_KEY]
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            self::ID_KEY => $this->id,
            self::NAME_KEY => $this->name
        ];
    }
}
