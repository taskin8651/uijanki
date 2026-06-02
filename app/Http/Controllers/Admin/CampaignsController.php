<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'status_badge' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'raised_amount' => 'nullable|numeric|min:0',
            'goal_amount' => 'nullable|numeric|min:0',
            'supporters' => 'nullable|integer|min:0',
            'button_one_text' => 'nullable|string|max:255',
            'button_one_link' => 'nullable|string|max:255',
            'button_two_text' => 'nullable|string|max:255',
            'button_two_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'campaign_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['status'] = $request->has('status') ? 1 : 0;

        $campaign = Campaign::create($data);

        if ($request->hasFile('campaign_image')) {
            $campaign->addMediaFromRequest('campaign_image')
                ->toMediaCollection('campaign_image');
        }

        return redirect()
            ->route('admin.campaigns.index')
            ->with('message', 'Campaign created successfully.');
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $data = $request->validate([
            'category' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'status_badge' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'raised_amount' => 'nullable|numeric|min:0',
            'goal_amount' => 'nullable|numeric|min:0',
            'supporters' => 'nullable|integer|min:0',
            'button_one_text' => 'nullable|string|max:255',
            'button_one_link' => 'nullable|string|max:255',
            'button_two_text' => 'nullable|string|max:255',
            'button_two_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'campaign_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['status'] = $request->has('status') ? 1 : 0;

        $campaign->update($data);

        if ($request->hasFile('campaign_image')) {
            $campaign->clearMediaCollection('campaign_image');

            $campaign->addMediaFromRequest('campaign_image')
                ->toMediaCollection('campaign_image');
        }

        return redirect()
            ->route('admin.campaigns.index')
            ->with('message', 'Campaign updated successfully.');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect()
            ->route('admin.campaigns.index')
            ->with('message', 'Campaign deleted successfully.');
    }

    public function removeImage(Campaign $campaign)
    {
        $campaign->clearMediaCollection('campaign_image');

        return redirect()
            ->back()
            ->with('message', 'Campaign image removed successfully.');
    }
}