<?php

namespace App\Modules\StockManagement\Traits;

use Illuminate\Support\Collection;

trait MapForTable
{
    // Transforms a collection of DTOs into an array of data for the table
    public static function mapForTable(Collection $collection): Collection
    {
        return self::mapWith($collection, function ($dto, $original) {
            return $dto->getDataForTable($original);
        });
    }
}
