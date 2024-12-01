<?php

namespace App\Repositories\Client;

use App\Foundation\Repository\Eloquent\BaseRepository;
use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{

    public function connection(): Model
    {
        return new Client();
    }
}
