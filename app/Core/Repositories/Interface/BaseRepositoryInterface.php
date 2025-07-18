<?php

namespace App\Core\Repositories\Interface;

interface BaseRepositoryInterface
{
    public function getModel();
    public function getAll();
    public function createRecord(array $data);
    public function editRecord($id);
    public function updateRecord($id, array $data);
    public function deleteRecord($id);

    public function paginateWithSearchFilters(
        int $perPage,
        array $filters = [],
        ?string $filterField = null,
        ?int $filterId = null,
        ?string $sortDir = 'asc',
        ?string $sortBy = null,
        array $searchableFields = [],
        array $appends = []
    );
}
