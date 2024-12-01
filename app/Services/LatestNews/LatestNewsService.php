<?php

namespace App\Services\LatestNews;

use App\Foundation\Exceptions\FatalErrorException;
use App\Repositories\LatestNews\LatestNewsRepositoryInterface;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatestNewsService extends CommonService
{
    public function __construct(
        protected LatestNewsRepositoryInterface $latestNewsRepository
    )
    {

    }

    public function getAllNews(Request $request)
    {
        $data = $this->latestNewsRepository->all($this->params($request));

        $total = $this->latestNewsRepository->totalCount($this->params($request, ['search']));

        return [
            'data' => $data,
            'count' => $total,
        ];
    }

    public function createNews(Request $request)
    {
        $file = $request->file('image');
        $originalName = $file->getClientOriginalName();
        try {
            DB::beginTransaction();

            $filePath = $file->storeAs('uploads/latest-news', $originalName, 'public');

            $data['title_en'] = $request->get('title_en');
            $data['title_ch'] = $request->get('title_ch');
            $data['text_en'] = $request->get('text_en');
            $data['text_ch'] = $request->get('text_ch');
            $data['image'] = $filePath;

            $headingBanner = $this->latestNewsRepository->insert($data);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            throw new FatalErrorException($exception->getMessage());
        }
        return $headingBanner;
    }
}
