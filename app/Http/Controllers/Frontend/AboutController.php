<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
     public function Index()
    {
        $aboutPage = AboutPage::where('status', 1)->first();

        return view('frontend.about', compact('aboutPage'));
    }
}
