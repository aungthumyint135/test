<?php

namespace App\Repositories\HeadingBanner;

use App\Foundation\Repository\Eloquent\BaseRepository;
use App\Models\HeadingBanner\HeadingBanner;
use Illuminate\Database\Eloquent\Model;

class HeadingBannerRepository extends BaseRepository implements HeadingBannerRepositoryInterface
{

    public function connection(): Model
    {
        return new HeadingBanner();
    }
}
