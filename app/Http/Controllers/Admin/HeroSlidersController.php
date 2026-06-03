<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;

class HeroSlidersController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.hero-sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.hero-sliders.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'slider_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['status'] = $request->has('status') ? 1 : 0;

        $slider = HeroSlider::create($data);

        if ($request->hasFile('slider_image')) {
            $slider->addMediaFromRequest('slider_image')
                ->toMediaCollection('slider_image');
        }

        return redirect()
            ->route('admin.hero-sliders.index')
            ->with('message', 'Hero slider created successfully.');
    }

    public function edit(HeroSlider $heroSlider)
    {
        return view('admin.hero-sliders.edit', compact('heroSlider'));
    }

    public function update(Request $request, HeroSlider $heroSlider)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'slider_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['status'] = $request->has('status') ? 1 : 0;

        $heroSlider->update($data);

        if ($request->hasFile('slider_image')) {
            $heroSlider->clearMediaCollection('slider_image');

            $heroSlider->addMediaFromRequest('slider_image')
                ->toMediaCollection('slider_image');
        }

        return redirect()
            ->route('admin.hero-sliders.index')
            ->with('message', 'Hero slider updated successfully.');
    }

    public function destroy(HeroSlider $heroSlider)
    {
        $heroSlider->delete();

        return redirect()
            ->route('admin.hero-sliders.index')
            ->with('message', 'Hero slider deleted successfully.');
    }

    public function removeImage(HeroSlider $heroSlider)
    {
        $heroSlider->clearMediaCollection('slider_image');

        return redirect()
            ->back()
            ->with('message', 'Hero slider image removed successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:hero_sliders,id',
        ]);

        HeroSlider::whereIn('id', $request->ids)->delete();

        return response(null, 204);
    }
}