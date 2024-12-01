<?php

namespace App\Repositories\HeadingBanner;

use App\Foundation\Repository\Eloquent\BaseRepository;
use App\Models\HeadingBanner\HeadingBanner;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class HeadingBannerRepository extends BaseRepository implements HeadingBannerRepositoryInterface
{

    public function connection(): Model
    {
        return new HeadingBanner();
    }

    public function optionsQuery(array $options): Builder
    {
        $query = parent::optionsQuery($options);


        if (isset($options['is_active'])) {
            $query = $query->where('is_active', $options['is_active']);
        }

        if (! empty($options['search'])) {
            $query = $query->orWhere('name', 'like', "%{$options['search']}%");
        }

        return $query;
    }
}
