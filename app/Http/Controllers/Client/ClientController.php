<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(
        protected ClientService $clientService
    )
    {

    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $collection = $this->clientService->getAllClients($request);
            return response()->json($collection);
        }

        return view('client.index');
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $this->clientService->createClient($request);
        return redirect()->route('portal.clients.index');
    }
}
