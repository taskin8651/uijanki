<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteService;
use Gate;
use Illuminate\Http\Request;

class WebsiteServicesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('website_service_access'), 403);

        $websiteServices = WebsiteService::orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.websiteServices.index', compact('websiteServices'));
    }

    public function create()
    {
        abort_if(Gate::denies('website_service_create'), 403);

        return view('admin.websiteServices.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('website_service_create'), 403);

        $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'highlight_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'point_one_title' => 'nullable|string|max:255',
            'point_one_text' => 'nullable|string',
            'point_two_title' => 'nullable|string|max:255',
            'point_two_text' => 'nullable|string',
            'point_three_title' => 'nullable|string|max:255',
            'point_three_text' => 'nullable|string',

            'button_one_text' => 'nullable|string|max:255',
            'button_one_link' => 'nullable|string|max:255',
            'button_two_text' => 'nullable|string|max:255',
            'button_two_link' => 'nullable|string|max:255',

            'floating_one_title' => 'nullable|string|max:255',
            'floating_one_subtitle' => 'nullable|string|max:255',
            'floating_two_title' => 'nullable|string|max:255',
            'floating_two_subtitle' => 'nullable|string|max:255',

            'stats_title' => 'nullable|string|max:255',
            'stats_subtitle' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer',
            'service_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $websiteService = WebsiteService::create([
            'badge_text' => $request->badge_text,
            'title' => $request->title,
            'highlight_title' => $request->highlight_title,
            'description' => $request->description,

            'point_one_title' => $request->point_one_title,
            'point_one_text' => $request->point_one_text,
            'point_two_title' => $request->point_two_title,
            'point_two_text' => $request->point_two_text,
            'point_three_title' => $request->point_three_title,
            'point_three_text' => $request->point_three_text,

            'button_one_text' => $request->button_one_text,
            'button_one_link' => $request->button_one_link,
            'button_two_text' => $request->button_two_text,
            'button_two_link' => $request->button_two_link,

            'floating_one_title' => $request->floating_one_title,
            'floating_one_subtitle' => $request->floating_one_subtitle,
            'floating_two_title' => $request->floating_two_title,
            'floating_two_subtitle' => $request->floating_two_subtitle,

            'stats_title' => $request->stats_title,
            'stats_subtitle' => $request->stats_subtitle,

            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('service_image')) {
            $websiteService
                ->addMediaFromRequest('service_image')
                ->toMediaCollection('service_image');
        }

        return redirect()->route('admin.website-services.index')
            ->with('message', 'Website service created successfully.');
    }

    public function show(WebsiteService $websiteService)
    {
        abort_if(Gate::denies('website_service_show'), 403);

        return view('admin.websiteServices.show', compact('websiteService'));
    }

    public function edit(WebsiteService $websiteService)
    {
        abort_if(Gate::denies('website_service_edit'), 403);

        return view('admin.websiteServices.edit', compact('websiteService'));
    }

    public function update(Request $request, WebsiteService $websiteService)
    {
        abort_if(Gate::denies('website_service_edit'), 403);

        $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'highlight_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'point_one_title' => 'nullable|string|max:255',
            'point_one_text' => 'nullable|string',
            'point_two_title' => 'nullable|string|max:255',
            'point_two_text' => 'nullable|string',
            'point_three_title' => 'nullable|string|max:255',
            'point_three_text' => 'nullable|string',

            'button_one_text' => 'nullable|string|max:255',
            'button_one_link' => 'nullable|string|max:255',
            'button_two_text' => 'nullable|string|max:255',
            'button_two_link' => 'nullable|string|max:255',

            'floating_one_title' => 'nullable|string|max:255',
            'floating_one_subtitle' => 'nullable|string|max:255',
            'floating_two_title' => 'nullable|string|max:255',
            'floating_two_subtitle' => 'nullable|string|max:255',

            'stats_title' => 'nullable|string|max:255',
            'stats_subtitle' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer',
            'service_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $websiteService->update([
            'badge_text' => $request->badge_text,
            'title' => $request->title,
            'highlight_title' => $request->highlight_title,
            'description' => $request->description,

            'point_one_title' => $request->point_one_title,
            'point_one_text' => $request->point_one_text,
            'point_two_title' => $request->point_two_title,
            'point_two_text' => $request->point_two_text,
            'point_three_title' => $request->point_three_title,
            'point_three_text' => $request->point_three_text,

            'button_one_text' => $request->button_one_text,
            'button_one_link' => $request->button_one_link,
            'button_two_text' => $request->button_two_text,
            'button_two_link' => $request->button_two_link,

            'floating_one_title' => $request->floating_one_title,
            'floating_one_subtitle' => $request->floating_one_subtitle,
            'floating_two_title' => $request->floating_two_title,
            'floating_two_subtitle' => $request->floating_two_subtitle,

            'stats_title' => $request->stats_title,
            'stats_subtitle' => $request->stats_subtitle,

            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('service_image')) {
            $websiteService->clearMediaCollection('service_image');

            $websiteService
                ->addMediaFromRequest('service_image')
                ->toMediaCollection('service_image');
        }

        return redirect()->route('admin.website-services.index')
            ->with('message', 'Website service updated successfully.');
    }

    public function destroy(WebsiteService $websiteService)
    {
        abort_if(Gate::denies('website_service_delete'), 403);

        $websiteService->delete();

        return redirect()->route('admin.website-services.index')
            ->with('message', 'Website service deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('website_service_delete'), 403);

        WebsiteService::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    public function removeImage(WebsiteService $websiteService)
    {
        abort_if(Gate::denies('website_service_edit'), 403);

        $websiteService->clearMediaCollection('service_image');

        return redirect()->route('admin.website-services.edit', $websiteService->id)
            ->with('message', 'Image removed successfully.');
    }
}