<?php

namespace App\Core\Repositories\Implementation;

use App\Core\Repositories\Interface\BaseRepositoryInterface;
use Illuminate\Support\Facades\Schema;

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


    public function paginateWithSearchFilters(
        int $perPage,
        array $filters = [],
        ?string $filterField = null,
        ?int $filterId = null,
        ?string $sortDir = 'asc',
        ?string $sortBy = null,
        array $searchableFields = [],
        array $appends = []
    ) {
        $query = $this->model->newQuery();


        // Dynamic single ID filter if given
        if (!empty($filterField) && !empty($filterId)) {
            $query->where($filterField, $filterId);
        }

        // Apply normal filters except search and date_filters
        foreach ($filters as $key => $value) {
            if (empty($value) || in_array($key, ['search', 'date_filters'])) {
                continue;
            }
            if (Schema::hasColumn($this->model->getTable(), $key)) {
                $query->where($key, $value);
            }
        }

        // Date range filters (dynamic columns)
        if (!empty($filters['date_filters']) && is_array($filters['date_filters'])) {
            foreach ($filters['date_filters'] as $column => $range) {
                if (!Schema::hasColumn($this->model->getTable(), $column)) {
                    continue;
                }
                if (!empty($range['from'])) {
                    $query->whereDate($column, '>=', $range['from']);
                }
                if (!empty($range['to'])) {
                    $query->whereDate($column, '<=', $range['to']);
                }
            }
        }

        // Search in searchable fields (including relations)
        if (!empty($filters['search']) && !empty($searchableFields)) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search, $searchableFields) {
                foreach ($searchableFields as $field) {
                    if (str_contains($field, '.')) {
                        [$relation, $column] = explode('.', $field);
                        $q->orWhereHas($relation, function ($relationQuery) use ($column, $search) {
                            $relationQuery->where($column, 'like', "%{$search}%");
                        });
                    } else {
                        $q->orWhere($field, 'like', "%{$search}%");
                    }
                }
            });
        }

        // Sorting
        $sortDir = strtolower($sortDir ?? 'asc');
        if (!in_array($sortDir, ['asc', 'desc'])) {
            $sortDir = 'asc';
        }
        // Use default sort column if invalid or missing
        if (!$sortBy || !Schema::hasColumn($this->model->getTable(), $sortBy)) {
            $sortBy = 'id';
        }
        $query->orderBy($sortBy, $sortDir);

        // Return paginated result with appended query params
        return $query->paginate($perPage)->appends(array_merge([
            'length' => $perPage,
        ], $filters, $appends));
    }


}
