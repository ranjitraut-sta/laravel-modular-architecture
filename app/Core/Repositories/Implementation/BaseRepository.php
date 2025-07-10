<?php

namespace App\Core\Repositories\Implementation;

use App\Core\Repositories\Interface\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getAll()
    {
        return $this->model->latest()->get();
    }

    public function createRecord(array $data)
    {
        return $this->model->create($data);
    }

    public function editRecord($id)
    {
        return $this->model->findOrFail($id);
    }

    public function updateRecord($id, array $data)
    {
        $record = $this->editRecord($id);
        $record->update($data);
        return $record;
    }

    public function deleteRecord($id)
    {
        return $this->editRecord($id)->delete();
    }


    public function paginateWithSearch(
        int $perPage,
        ?string $search = null,
        array $searchableFields = [],
        array $appends = []
    ) {
        $query = $this->getModel()->newQuery();

        if (!empty($search) && !empty($searchableFields)) {
            $query->where(function ($q) use ($search, $searchableFields) {
                foreach ($searchableFields as $field) {
                    if (str_contains($field, '.')) {
                        // Handle relation (e.g., destination.name)
                        [$relation, $column] = explode('.', $field);
                        $q->orWhereHas($relation, function ($relationQuery) use ($column, $search) {
                            $relationQuery->where($column, 'like', "%{$search}%");
                        });
                    } else {
                        // Direct field
                        $q->orWhere($field, 'like', "%{$search}%");
                    }
                }
            });
        }

        return $query->paginate($perPage)->appends(array_merge([
            'search' => $search,
            'length' => $perPage,
        ], $appends));
    }

}
