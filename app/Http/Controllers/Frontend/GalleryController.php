<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EventGallery;

class GalleryController extends Controller
{
   public function index()
{
    $galleries = EventGallery::with('event')
        ->where('status', 1)
        ->whereHas('event', function ($query) {
            $query->where('status', 1);
        })
        ->orderBy('sort_order')
        ->latest()
        ->get();

    $latestGallery = EventGallery::with('event')
        ->where('status', 1)
        ->whereHas('event', function ($query) {
            $query->where('status', 1);
        })
        ->orderBy('sort_order')
        ->latest()
        ->first();

        $latestVideoGallery = EventGallery::with('event')
    ->where('status', 1)
    ->whereNotNull('video_urls')
    ->whereHas('event', function ($query) {
        $query->where('status', 1);
    })
    ->orderBy('sort_order')
    ->latest()
    ->get()
    ->filter(function ($gallery) {
        return is_array($gallery->video_urls) && count(array_filter($gallery->video_urls)) > 0;
    })
    ->first();

    $galleryCategories = EventGallery::with('event')
    ->where('status', 1)
    ->whereHas('event', function ($query) {
        $query->where('status', 1)
            ->whereNotNull('category');
    })
    ->get()
    ->groupBy(function ($gallery) {
        return $gallery->event->category;
    })
    ->map(function ($items, $category) {
        return (object) [
            'category' => $category,
            'total' => $items->count(),
        ];
    })
    ->values();

    return view('frontend.gallery', compact(
        'galleries',
        'latestGallery',
        'latestVideoGallery',
        'galleryCategories'
    ));
}

    public function show(EventGallery $eventGallery)
    {
        abort_if(!$eventGallery->status, 404);

        $eventGallery->load('event');

        abort_if(!$eventGallery->event || !$eventGallery->event->status, 404);

        $relatedGalleries = EventGallery::with('event')
            ->where('status', 1)
            ->where('id', '!=', $eventGallery->id)
            ->whereHas('event', function ($query) use ($eventGallery) {
                $query->where('status', 1)
                    ->where('category', $eventGallery->event->category);
            })
            ->orderBy('sort_order')
            ->latest()
            ->take(3)
            ->get();

        if ($relatedGalleries->count() < 3) {
            $extraGalleries = EventGallery::with('event')
                ->where('status', 1)
                ->where('id', '!=', $eventGallery->id)
                ->whereNotIn('id', $relatedGalleries->pluck('id'))
                ->whereHas('event', function ($query) {
                    $query->where('status', 1);
                })
                ->orderBy('sort_order')
                ->latest()
                ->take(3 - $relatedGalleries->count())
                ->get();

            $relatedGalleries = $relatedGalleries->merge($extraGalleries);
        }

        return view('frontend.gallery-detail', compact(
            'eventGallery',
            'relatedGalleries'
        ));
    }
}