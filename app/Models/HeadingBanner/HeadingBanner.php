<?php

namespace App\Models\HeadingBanner;

use App\Foundation\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeadingBanner extends Model
{
    protected $fillable =[
      'is_active',
      'image',
      'name',
    ];
}
