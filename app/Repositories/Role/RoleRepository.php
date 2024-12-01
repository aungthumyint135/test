<?php

namespace App\Repositories\Role;

use App\Foundation\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function optionsQuery(array $options): Builder
    {
        $query = parent::optionsQuery($options);

        if (! empty($options['guard_name'])) {
            $query = $query->where('guard_name', $options['guard_name']);
        }

        if (isset($options['status'])) {
            $query = $query->where('status', $options['status']);
        }

        if (! empty($options['search'])) {
            $query = $query->orWhere('name', 'like', "%{$options['search']}%")
                ->orWhere('remark', 'like', "%{$options['search']}%");
        }

        return $query;
    }

    public function connection(): Model
    {
        return new Role;
    }
}
