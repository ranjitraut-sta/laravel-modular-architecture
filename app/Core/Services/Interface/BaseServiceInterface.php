<?php

namespace App\Core\Services\Interface;

interface BaseServiceInterface
{
    public function getAll();
    public function createRecord($data);
    public function editRecord(int $id);
    public function updateRecord($data, int $id);
    public function deleteRecord(int $id);
    public function getPaginationLimit(int $perPage);
    public function paginateWithSearch(int $perPage, ?string $search = null, array $searchableFields = ['name'], array $appends = []);
}
