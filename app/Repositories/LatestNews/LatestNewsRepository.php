<?php

namespace App\Repositories\LatestNews;

use App\Foundation\Repository\Eloquent\BaseRepository;
use App\Models\LatestNews\LatestNews;
use Illuminate\Database\Eloquent\Model;

class LatestNewsRepository extends BaseRepository implements LatestNewsRepositoryInterface
{

    public function connection(): Model
    {
        return new LatestNews();
    }
}
