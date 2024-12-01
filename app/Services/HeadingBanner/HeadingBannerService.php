<?php

namespace App\Services\HeadingBanner;

use App\Repositories\HeadingBanner\HeadingBannerRepositoryInterface;
use App\Services\CommonService;
use Illuminate\Http\Request;

class HeadingBannerService extends CommonService
{
    public function __construct(
        protected HeadingBannerRepositoryInterface $headingBannerRepository
    )
    {
    }

    public function createHeadingBanner(Request $request)
    {
        $file = $request->file('image');

        dd($file);

    }

    public function deleteHeadingBanner(Request $request)
    {

    }

    public function getHeadingBanners(Request $request)
    {
        return $this->headingBannerRepository->all($request->all());
    }
}
