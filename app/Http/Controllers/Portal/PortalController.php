<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Repositories\Client\ClientRepositoryInterface;
use App\Repositories\HeadingBanner\HeadingBannerRepositoryInterface;
use App\Repositories\LatestNews\LatestNewsRepositoryInterface;
use App\Services\Client\ClientService;
use App\Services\HeadingBanner\HeadingBannerService;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function __construct(
        protected HeadingBannerRepositoryInterface $headingBannerRepository,
        protected ClientRepositoryInterface $clientRepository,
        protected LatestNewsRepositoryInterface $latestNewsRepository
    )
    {

    }
    public function index()
    {
        $headingBanner = $this->headingBannerRepository->getDataByOptions(['is_active' => 1]);
        $clients = $this->clientRepository->all();
        $latestNews = $this->latestNewsRepository->all(['limit' => 3]);
        return view('welcome')->with([
            'heading' => $headingBanner,
            'clients' => $clients,
            'news' => $latestNews
        ]);
    }

    public function mctPaymentServices()
    {
        $headingBanner = $this->headingBannerRepository->getDataByOptions(['is_active' => 1]);

        return view('public.mct-payment-service.mct-payment-services')->with([
            'heading' => $headingBanner,
        ]);
    }
}
