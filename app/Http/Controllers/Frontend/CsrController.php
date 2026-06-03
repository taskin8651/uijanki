<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CsrPartner;

class CsrController extends Controller
{
    public function index()
    {
        $csrPartners = CsrPartner::where('status', 1)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('frontend.csr', compact('csrPartners'));
    }
}