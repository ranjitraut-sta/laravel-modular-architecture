<?php

namespace App\Core\Traits;

use Illuminate\Support\Collection;

trait TableTransformable
{
    // Transforms a collection of DTOs into an array of data for the table
    public static function transformForTable(Collection $collection, ?callable $custom = null): Collection
    {
        return $collection->map(function ($dto) use ($custom) {
            return $custom ? $custom($dto) : $dto->getDataForTable();
        });
    }
}
