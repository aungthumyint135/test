<?php

namespace App\Services\HeadingBanner;

use App\Foundation\Exceptions\FatalErrorException;
use App\Repositories\HeadingBanner\HeadingBannerRepositoryInterface;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $originalName = $file->getClientOriginalName();
        try {
            DB::beginTransaction();

            $filePath = $file->storeAs('uploads/heading-banners', $originalName, 'public');

            $data['name'] = $request->get('name');
            $data['image'] = $filePath;

            $headingBanner = $this->headingBannerRepository->insert($data);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            throw new FatalErrorException($exception->getMessage());
        }
        return $headingBanner;
    }

    public function deleteHeadingBanner(Request $request)
    {

    }

    public function getHeadingBanners(Request $request)
    {
        $data = $this->headingBannerRepository->all($this->params($request));

        $total = $this->headingBannerRepository->totalCount($this->params($request, ['search']));

        return [
            'data' => $data,
            'count' => $total,
        ];
    }
}
