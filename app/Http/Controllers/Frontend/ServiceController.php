<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\WebsiteService;

class ServiceController extends Controller
{
    public function index()
    {
        $websiteServices = WebsiteService::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('frontend.initiatives', compact('websiteServices'));
    }

    public function show($id)
    {
        $websiteService = WebsiteService::where('status', 1)
            ->where('id', $id)
            ->firstOrFail();

        return view('frontend.service-details', compact('websiteService'));
    }
}