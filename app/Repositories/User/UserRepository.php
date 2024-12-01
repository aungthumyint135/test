<?php

namespace App\Repositories\User;

use App\Foundation\Repository\Eloquent\BaseRepository;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function optionsQuery(array $options)
    {
        $query = parent::optionsQuery($options);

        if (! empty($options['search'])) {
            $query->where(function ($query) use ($options) {
                $query->orWhere('name', 'like', "%{$options['search']}%")
                    ->orWhere('email', 'like', "%{$options['search']}%");
            });
        }

        if (! empty($options['role_id'])) {
            $query->where('role_id', $options['role_id']);
        }

        if (! empty($options['status'])) {
            $query->where('status', $options['status']);
        }

        return $query;
    }

    public function connection(): Model
    {
        return new User;
    }
}
