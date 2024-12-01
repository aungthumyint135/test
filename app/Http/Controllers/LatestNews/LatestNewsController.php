<?php

namespace App\Http\Controllers\LatestNews;

use App\Http\Controllers\Controller;
use App\Services\LatestNews\LatestNewsService;
use Illuminate\Http\Request;

class LatestNewsController extends Controller
{
    public function __construct(
        protected LatestNewsService $latestNewsService
    )
    {

    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $collection = $this->latestNewsService->getAllNews($request);
            return response()->json($collection);
        }

        return view('latest-news.index');
    }

    public function create()
    {
        return view('latest-news.create');
    }

    public function store(Request $request)
    {
        $this->latestNewsService->createNews($request);
        return redirect()->route('portal.latest-news.index');
    }
}
