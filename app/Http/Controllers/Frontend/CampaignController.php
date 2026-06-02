<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::where('status', 1)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $campaignCategories = Campaign::where('status', 1)
            ->whereNotNull('category')
            ->selectRaw('category, COUNT(*) as total')
            ->groupBy('category')
            ->orderBy('category')
            ->get();

            $activeCampaign = Campaign::where('status', 1)
    ->where('is_featured', 1)
    ->orderBy('sort_order')
    ->latest()
    ->first();

if (!$activeCampaign) {
    $activeCampaign = Campaign::where('status', 1)
        ->orderBy('sort_order')
        ->latest()
        ->first();
}

        return view('frontend.campaign', compact(
            'campaigns',
            'campaignCategories',
            'activeCampaign'

        ));
    }

    public function show(Campaign $campaign)
{
    abort_if(!$campaign->status, 404);

    $relatedCampaigns = Campaign::where('status', 1)
        ->where('id', '!=', $campaign->id)
        ->where('category', $campaign->category)
        ->orderBy('sort_order')
        ->latest()
        ->take(3)
        ->get();

    if ($relatedCampaigns->count() < 3) {
        $extraCampaigns = Campaign::where('status', 1)
            ->where('id', '!=', $campaign->id)
            ->whereNotIn('id', $relatedCampaigns->pluck('id'))
            ->orderBy('sort_order')
            ->latest()
            ->take(3 - $relatedCampaigns->count())
            ->get();

        $relatedCampaigns = $relatedCampaigns->merge($extraCampaigns);
    }

    return view('frontend.campaign-detail', compact(
        'campaign',
        'relatedCampaigns'
    ));
}
}