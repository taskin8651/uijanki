<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventGallery;
use Illuminate\Http\Request;

class EventGalleriesController extends Controller
{
    public function index()
    {
        $galleries = EventGallery::with('event')
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.event-galleries.index', compact('galleries'));
    }

    public function create()
    {
        $events = Event::where('status', 1)
            ->orderBy('start_date', 'desc')
            ->get();

        return view('admin.event-galleries.create', compact('events'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'event_id' => 'required|exists:events,id|unique:event_galleries,event_id',
            'video_urls' => 'nullable|array',
            'video_urls.*' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['video_urls'] = array_values(array_filter($request->video_urls ?? []));

        $gallery = EventGallery::create($data);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $gallery->addMedia($image)->toMediaCollection('gallery_images');
            }
        }

        return redirect()
            ->route('admin.event-galleries.index')
            ->with('message', 'Event gallery created successfully.');
    }

    public function edit(EventGallery $eventGallery)
    {
        $events = Event::where('status', 1)
            ->orderBy('start_date', 'desc')
            ->get();

        return view('admin.event-galleries.edit', compact('eventGallery', 'events'));
    }

    public function update(Request $request, EventGallery $eventGallery)
    {
        $data = $request->validate([
            'event_id' => 'required|exists:events,id|unique:event_galleries,event_id,' . $eventGallery->id,
            'video_urls' => 'nullable|array',
            'video_urls.*' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['video_urls'] = array_values(array_filter($request->video_urls ?? []));

        $eventGallery->update($data);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $eventGallery->addMedia($image)->toMediaCollection('gallery_images');
            }
        }

        return redirect()
            ->route('admin.event-galleries.index')
            ->with('message', 'Event gallery updated successfully.');
    }

    public function destroy(EventGallery $eventGallery)
    {
        $eventGallery->delete();

        return redirect()
            ->route('admin.event-galleries.index')
            ->with('message', 'Event gallery deleted successfully.');
    }

    public function removeImage(EventGallery $eventGallery, $mediaId)
    {
        $media = $eventGallery->media()
            ->where('id', $mediaId)
            ->firstOrFail();

        $media->delete();

        return redirect()
            ->back()
            ->with('message', 'Gallery image removed successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:event_galleries,id',
        ]);

        EventGallery::whereIn('id', $request->ids)->delete();

        return response(null, 204);
    }
}