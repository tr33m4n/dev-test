<?php

declare(strict_types=1);

namespace App\Http\Services\CatApi\Dto;

use App\Contracts\Api\Image as ImageContract;

class Image implements ImageContract
{
    public const ID_KEY = 'id';

    public const URL_KEY = 'url';

    /**
     * Image constructor.
     */
    public function __construct(
        public readonly int $id,
        public readonly string $url
    ) {
    }

    /**
     * New instance of image from array
     *
     * @param array{id: int, url: string} $image
     */
    public static function fromArray(array $image): Image
    {
        return new Image(
            $image[self::ID_KEY],
            $image[self::URL_KEY]
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            self::ID_KEY => $this->id,
            self::URL_KEY => $this->url
        ];
    }
}
