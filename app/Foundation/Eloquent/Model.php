<?php

namespace App\Foundation\Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Foundation\Eloquent\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model as LaravelModel;

class Model extends LaravelModel
{
    use SoftDeletes, HasUUID;

    protected $hidden = [
        'deleted_at'
    ];
}
