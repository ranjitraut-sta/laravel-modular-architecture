<?php

namespace App\Core\Services\Implementation;

class BaseService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function createRecord($data)
    {
        $data = $this->convertToArray($data);
        return $this->repository->createRecord($data);
    }

    public function editRecord(int $id)
    {
        if (!$id) {
            return false;
        }
        return $this->repository->editRecord($id);
    }

    public function updateRecord($data, int $id)
    {
        if (!$id) {
            return false;
        }
        $data = $this->convertToArray($data);
        return $this->repository->updateRecord($id, $data);
    }

    public function deleteRecord(int $id)
    {
        if (!$id) {
            return false;
        }
        return $this->repository->deleteRecord($id);
    }

    protected function convertToArray($data)
    {
        if (is_object($data) && method_exists($data, 'toArray')) {
            return $data->toArray();
        }
        return (array) $data;
    }

   public function paginateWithSearchFilters(int $perPage, array $filters = [], ?string $filterField = null, ?int $filterId = null, ?string $sortDir = 'asc', ?string $sortBy = null, array $searchableFields = [], array $appends = [])
   {
       return $this->repository->paginateWithSearchFilters($perPage, $filters, $filterField, $filterId, $sortDir, $sortBy, $searchableFields, $appends);
   }

}
