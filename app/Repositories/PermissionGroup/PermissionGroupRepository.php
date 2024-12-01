<?php

namespace App\Repositories\PermissionGroup;

use App\Foundation\Repository\Eloquent\BaseRepository;
use App\Models\PermissionGroup\PermissionGroup;
use Illuminate\Database\Eloquent\Model;

class PermissionGroupRepository extends BaseRepository implements PermissionGroupRepositoryInterface
{
    protected function optionsQuery(array $options)
    {
        $query = parent::optionsQuery($options);

        if (! empty($options['group_by'])) {
            $query->groupBy($options['group_by']);
        }

        return $query;
    }

    public function connection(): Model
    {
        return new PermissionGroup;
    }
}
