<?php

namespace App\Foundation\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Foundation\Repository\EloquentRepositoryInterface;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * Execute the query as a "select" statement.
     *
     * @param array $options
     * @return Builder[]|Collection
     */
    public function all(array $options = [])
    {
        return $this->optionsQuery($options)->get();
    }

    /**
     * Determine the optional query parameter.
     *
     * @param array $options
     * @return Builder
     */
    protected function optionsQuery(array $options)
    {
        $query = $this->connection()->query();

        if (isset($options['limit'])) {
            $query = $query->limit($options['limit']);
        }

        if (isset($options['offset'])) {
            $query = $query->offset($options['offset']);
        }

        if (isset($options['order_by'])) {
            if (is_array($options['order_by'])) {
                foreach ($options['order_by'] as $column => $orderBy) {
                    $query = $query->orderBy($column, $orderBy);
                }
            } else {
                $query = $query->orderBy('created_at', $options['order_by']);
            }
        } else {
            $query = $query->orderBy('created_at', 'desc');
        }

        if (isset($options['with'])) {
            $query = $query->with($options['with']);
        }

        if (isset($options['only'])) {
            $query = $query->select($options['only']);
        }

        if (isset($options['id'])) {
            $query = $query->where('id', '=', $options['id']);
        }

        if (!empty($options['uuid'])) {
            $query = $query->where('uuid', '=', $options['uuid']);
        }

        if (!empty($options['uid'])) {
            $query = $query->where('user_id', '=', $options['uid']);
        }

        if (!empty($options['user_id'])) {
            $query = $query->where('user_id', '=', $options['user_id']);
        }

        if (!empty($options['ignore'])) {
            $query = $query->whereNot('id', $options['ignore']);
        }

        if (!empty($options['status'])) {
            if (is_array($options['status'])) {
                $query = $query->whereIn('status', $options['status']);
            } else {
                $query = $query->where('status', '=', (int) $options['status']);
            }
        }

        if (!empty($options['type'])) {
            if (is_array($options['type'])) {
                $query = $query->whereIn('type', $options['type']);
            } else {
                $query = $query->where('type', '=', (int) $options['type']);
            }
        }

        if (isset($options['is_published'])) {
            $query = $query->where('is_published', '=', (int) $options['is_published']);
        }

        return $query;
    }

    /**
     * @param array $options
     * @param array $relations
     * @return Builder|Model|object|null
     */
    public function getDataByOptions(array $options = [], array $relations = [])
    {
        return $this->optionsQuery($options)->with($relations)->first();
    }

    /**
     * Execute the query and get the first result with id.
     *
     * @param int $id
     * @param array $relations
     * @return Builder|Model|object|null
     */
    public function getDataById(int $id, array $relations = [])
    {
        return $this->connection()->query()->with($relations)->where('id', $id)->first();
    }

    /**
     * Execute the query and get the first result with uuid.
     *
     * @param string $uuid
     * @param array $relations
     * @return Builder|Model|object|null
     */
    public function getDataByUuid($uuid, array $relations = [])
    {
        return $this->connection()->query()->with($relations)->where('uuid', $uuid)->first();
    }

    /**
     * Execute the query and get the first result with first().
     *
     * @param array $relations
     * @return Builder|Model|object|null
     */
    public function getFirstOnly(array $relations = [])
    {
        return $this->connection()->query()->with($relations)->first();
    }

    /**
     * Execute the query and get the first result with first().
     *
     * @param array $options
     * @param array $relations
     * @return Builder|Model|object|null
     */
    public function getLatest(array $options = [], array $relations = [])
    {
        return $this->optionsQuery($options)->with($relations)->latest()->first();
    }

    /**
     * Save a new model and return the instance.
     *
     * @param array $data
     * @return Builder|Model
     */
    public function insert(array $data)
    {
        return $this->connection()->query()->create($data);
    }

    /**
     * Update single record in the database with id.
     *
     * @param array $data
     * @param int $id
     * @return int
     */
    public function update(array $data, int $id): int
    {
        return $this->connection()->query()->where('id', $id)->update($data);
    }

    public function updateByOptions(array $data, array $options = []): int
    {
        return $this->optionsQuery($options)->update($data);
    }

    public function increment($amount, $column, int $id): int
    {
        return $this->connection()->query()->where('id', $id)
            ->increment($column, $amount);
    }

    public function decrement($amount, $column, int $id): int
    {
        return $this->connection()->query()->where('id', $id)
            ->decrement($column, $amount);
    }

    public function incrementByUuid($amount, $column, $uuid): int
    {
        return $this->connection()->query()->where('uuid', $uuid)
            ->increment($column, $amount);
    }

    /**
     * Update records in the database with ids.
     *
     * @param array $data
     * @param array $ids
     * @return int
     */
    public function updateWithIds(array $data, array $ids): int
    {
        return $this->connection()->query()->whereIn('id', $ids)->update($data);
    }

    /**
     * Delete the record from the database with id.
     *
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        return $this->connection()->query()->find($id)->delete();
    }

    public function forceDestroy(int $id)
    {
        return $this->connection()->query()->find($id)->forceDelete();
    }

    /**
     * Delete the models from the database with ids.
     *
     * @param array $ids
     * @return mixed
     */
    public function destroyWithIds(array $ids): mixed
    {
        return $this->connection()->query()->whereIn('id', $ids)->delete();
    }

    /**
     * Delete the models from the database with options
     * @param array $options
     * @return mixed
     */
    public function destroyByOptions(array $options): mixed
    {
        return $this->optionsQuery($options)->delete();
    }

    /**
     * Delete the models from the database with uuids.
     *
     * @param array $uuids
     * @return mixed
     */
    public function destroyWithUuids(array $uuids): mixed
    {
        return $this->connection()->query()->whereIn('uuid', $uuids)->delete();
    }

    /**
     * Get the total row's count.
     *
     * @param array $options
     * @param bool $withTrash
     * @return int
     */
    public function totalCount(array $options = [], bool $withTrash = false): int
    {
        $query = $this->optionsQuery($options);

        if ($withTrash) {
            $query->withTrashed();
        }

        return $query->count();
    }

    public function sum(string $column, array $options = [])
    {
        return $this->optionsQuery($options)->sum($column);
    }

    /**
     * @param array $options
     * @return bool
     */
    public function checkExistsByOptions(array $options = []): bool
    {
        return $this->optionsQuery($options)->exists();
    }

    public function checkExistsWithDeletedAt(array $options = []): bool
    {
        return $this->optionsQuery($options)->withTrashed()->exists();
    }

    /**
     * Model Connection.
     *
     * @return Model
     */
    abstract public function connection(): Model;
}
