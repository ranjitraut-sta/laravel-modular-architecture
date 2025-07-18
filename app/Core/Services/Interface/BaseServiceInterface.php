<?php

namespace App\Core\Services\Interface;

interface BaseServiceInterface
{
    public function getAll();
    public function createRecord($data);
    public function editRecord(int $id);
    public function updateRecord($data, int $id);
    public function deleteRecord(int $id);
    public function paginateWithSearchFilters(int $perPage, array $filters = [], ?string $filterField = null, ?int $filterId = null, ?string $sortDir = 'asc', ?string $sortBy = null, array $searchableFields = [], array $appends = []);
}
