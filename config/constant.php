<?php

return [
    'is_published' => [
        'no' => 0,
        'yes' => 1,
    ],

    'sort' => [
        'normal' => 0,
        'desc' => 1,
        'asc'  => 2,
    ],

    'status' => [
        'active' => 1,
        'inactive' => 2,
    ],

    'qtn_status' => [
        'hold' => 1,
        'release' => 2,
    ],

    'is_qtn' => [
        'no' => 0,
        'yes' => 1,
    ],

    'pg_type' => [
        'task'   => 1,
        'config' => 2,
        'setting' => 3,
    ],

    'can_delete' => [
        'yes' => 1,
        'no'  => 2,
    ],

    'can_update' => [
        'yes' => 1,
        'no'  => 2,
    ],

    'permissions' => [
        'view' => 1,
        'edit' => 2,
        'create' => 3,
        'disable' => 4,
        'other' => 5,
        'check' => 6,
        'app_update' => 7
    ],

    'acc_status' => [
        'active' => 1,
        'disabled' => 0,
    ],

    'is_enable' => [
        'no' => 1,
        'yes' => 2,
    ],

];
