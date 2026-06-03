<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        $websiteSetting = WebsiteSetting::firstOrCreateDefault();

        return view('admin.websiteSettings.index', compact('websiteSetting'));
    }

    public function update(Request $request)
    {
        $websiteSetting = WebsiteSetting::firstOrCreateDefault();

        $data = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'phone_number' => 'nullable|string|max:50',
            'phone_display' => 'nullable|string|max:50',
            'whatsapp_number' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'short_address' => 'nullable|string|max:255',
            'full_address' => 'nullable|string',
            'map_query' => 'nullable|string',
            'map_embed_url' => 'nullable|string',
            'facebook_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|string|max:255',
            'footer_description' => 'nullable|string',
            'copyright_text' => 'nullable|string|max:255',
            'footer_credit' => 'nullable|string|max:255',
            'volunteer_url' => 'nullable|string|max:255',
            'donate_url' => 'nullable|string|max:255',
            'contact_url' => 'nullable|string|max:255',
            'logo' => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'favicon' => 'nullable|file|mimes:jpg,jpeg,png,webp,ico|max:2048',
        ]);

        unset($data['logo'], $data['favicon']);

        $data['status'] = $request->has('status') ? 1 : 0;

        $websiteSetting->update($data);

        if ($request->hasFile('logo')) {
            $websiteSetting->clearMediaCollection('logo');
            $websiteSetting->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

        if ($request->hasFile('favicon')) {
            $websiteSetting->clearMediaCollection('favicon');
            $websiteSetting->addMediaFromRequest('favicon')->toMediaCollection('favicon');
        }

        return redirect()
            ->route('admin.website-settings.index')
            ->with('message', 'Website settings updated successfully.');
    }

    public function removeLogo()
    {
        WebsiteSetting::firstOrCreateDefault()->clearMediaCollection('logo');

        return redirect()
            ->route('admin.website-settings.index')
            ->with('message', 'Logo removed successfully.');
    }

    public function removeFavicon()
    {
        WebsiteSetting::firstOrCreateDefault()->clearMediaCollection('favicon');

        return redirect()
            ->route('admin.website-settings.index')
            ->with('message', 'Favicon removed successfully.');
    }
}
