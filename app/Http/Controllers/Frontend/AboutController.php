<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\FounderLeader;

class AboutController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::where('status', 1)->first();

         $founderLeaders = FounderLeader::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('frontend.about', compact('aboutPage', 'founderLeaders'));
    }
}