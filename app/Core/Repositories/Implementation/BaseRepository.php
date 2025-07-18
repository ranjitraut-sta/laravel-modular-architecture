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


     public function paginateWithSearch(
        int $perPage,
        ?int $userId = null,
        ?string $sortDir = 'asc',
        ?string $sortBy = null,
        ?string $search = null,
        array $searchableFields = [],
        array $appends = []
    ) {
        $query = $this->getModel()->newQuery();

        // Filter by user ID if provided
        if (!empty($userId)) {
            $query->where('user_id', $userId);
        }

        // Search condition
        if (!empty($search) && !empty($searchableFields)) {
            $query->where(function ($q) use ($search, $searchableFields) {
                foreach ($searchableFields as $field) {
                    if (str_contains($field, '.')) {
                        // Related model search
                        [$relation, $column] = explode('.', $field);
                        $q->orWhereHas($relation, function ($relationQuery) use ($column, $search) {
                            $relationQuery->where($column, 'like', "%{$search}%");
                        });
                    } else {
                        // Base model search
                        $q->orWhere($field, 'like', "%{$search}%");
                    }
                }
            });
        }

        // --- Apply sorting ---
        // Validate sortDir
        $sortDir = strtolower($sortDir ?? 'asc');
        if (!in_array($sortDir, ['asc', 'desc'])) {
            $sortDir = 'asc';
        }

        // Check if sortBy is provided and is a valid column
        if ($sortBy && Schema::hasColumn($this->getModel()->getTable(), $sortBy)) {
            $query->orderBy($sortBy, $sortDir);
        } else {
            // Default sorting if none provided or invalid
        }

        // Return paginated result
        return $query->paginate($perPage)->appends(array_merge([
            'search' => $search,
            'length' => $perPage,
        ], $appends));
    }

}
