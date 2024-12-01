<?php

namespace App\Repositories\RolePrivilege;

use App\Foundation\Repository\Eloquent\BaseRepository;
use App\Models\RolePrivilege\RolePrivilege;
use Illuminate\Database\Eloquent\Model;

class RolePrivilegeRepository extends BaseRepository implements RolePrivilegeRepositoryInterface
{
    protected function optionsQuery(array $options)
    {
        $query = parent::optionsQuery($options);

        if (! empty($options['role_id'])) {
            $query->where('role_id', $options['role_id']);
        }

        if (! empty($options['permission_group_id'])) {
            $query->where('permission_group_id', $options['permission_group_id']);
        }

        return $query;
    }

    public function connection(): Model
    {
        return new RolePrivilege;
    }
}
