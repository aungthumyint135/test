<?php

namespace App\Http\Controllers\HeadingBanner;

use App\Http\Controllers\Controller;
use App\Services\HeadingBanner\HeadingBannerService;
use Illuminate\Http\Request;

class HeadingBannerController extends Controller
{

    public function __construct(
        protected HeadingBannerService $service
    )
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $collection = $this->service->getHeadingBanners($request);
            return response()->json($collection);
        }

        return view('heading-banner.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('heading-banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->service->createHeadingBanner($request);
        return redirect()->route('portal.heading-banners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
