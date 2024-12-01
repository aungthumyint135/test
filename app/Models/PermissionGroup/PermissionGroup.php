<?php

namespace App\Models\PermissionGroup;

use App\Foundation\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use App\Models\RolePrivilege\RolePrivilege;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PermissionGroup extends Model
{
    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class);
    }

    public function rolePrivilege($roleId = null)
    {
        return $this->hasOne(RolePrivilege::class)->where('role_id', $roleId);
    }
}
