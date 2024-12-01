<?php

namespace App\Services\Client;

use App\Foundation\Exceptions\FatalErrorException;
use App\Repositories\Client\ClientRepositoryInterface;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientService extends CommonService
{
    public function __construct(
        protected ClientRepositoryInterface $clientRepository
    )
    {

    }

    public function getAllClients(Request $request)
    {
        $data = $this->clientRepository->all($this->params($request));

        $total = $this->clientRepository->totalCount($this->params($request, ['search']));

        return [
            'data' => $data,
            'count' => $total,
        ];
    }

    public function createClient(Request $request)
    {
        $file = $request->file('image');
        $originalName = $file->getClientOriginalName();
        try {
            DB::beginTransaction();

            $filePath = $file->storeAs('uploads/clients', $originalName, 'public');

            $data['name'] = $request->get('name');
            $data['image'] = $filePath;

            $headingBanner = $this->clientRepository->insert($data);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            throw new FatalErrorException($exception->getMessage());
        }
        return $headingBanner;
    }

}
