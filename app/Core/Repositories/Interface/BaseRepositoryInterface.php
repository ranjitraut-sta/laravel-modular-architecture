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
    public function paginateWithSearch(int $perPage, ?string $search = null, array $searchableFields = ['name'], array $appends = []);
}
