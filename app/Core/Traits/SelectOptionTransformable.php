<?php

namespace App\Core\Traits;

use Illuminate\Support\Collection;

trait SelectOptionTransformable
{
     // Transforms a collection of DTOs into an array of data for the select option
    public static function transformForSelectOption(Collection $collection, ?callable $custom = null): Collection
    {
       return $collection->map(function ($dto) use ($custom) {
            return $custom ? $custom($dto) : $dto->getDataForSelectOption();
        });
    }
}
