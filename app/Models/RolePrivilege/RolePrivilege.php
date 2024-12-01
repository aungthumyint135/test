<?php

namespace App\Models\RolePrivilege;

use App\Foundation\Eloquent\Model;

class RolePrivilege extends Model
{
    protected $fillable = [
        'role_id', 'permission_group_id', 'view', 'edit', 'full',
    ];
}
