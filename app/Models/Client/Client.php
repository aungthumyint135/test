<?php

namespace App\Models\Client;

use App\Foundation\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    protected $fillable = [
        'name', 'image', 'is_active'
    ];
}
