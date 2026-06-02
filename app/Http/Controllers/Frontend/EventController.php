<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
{
    $upcomingFeaturedEvent = Event::where('status', 1)
        ->where('event_type', 'upcoming')
        ->where('is_featured', 1)
        ->orderBy('sort_order')
        ->first();

    $upcomingEvents = Event::where('status', 1)
        ->where('event_type', 'upcoming')
        ->where('is_featured', 0)
        ->orderBy('sort_order')
        ->get();

    $ongoingFeaturedEvent = Event::where('status', 1)
        ->where('event_type', 'ongoing')
        ->where('is_featured', 1)
        ->orderBy('sort_order')
        ->first();

    $ongoingEvents = Event::where('status', 1)
        ->where('event_type', 'ongoing')
        ->where('is_featured', 0)
        ->orderBy('sort_order')
        ->get();

    $completedFeaturedEvent = Event::where('status', 1)
        ->where('event_type', 'completed')
        ->where('is_featured', 1)
        ->orderBy('sort_order')
        ->first();

    $completedEvents = Event::where('status', 1)
        ->where('event_type', 'completed')
        ->where('is_featured', 0)
        ->orderBy('sort_order')
        ->get();

    $eventCategories = Event::where('status', 1)
        ->whereNotNull('category')
        ->selectRaw('category, COUNT(*) as total')
        ->groupBy('category')
        ->orderByDesc('total')
        ->get();

    $categoryEvents = Event::where('status', 1)
        ->whereNotNull('category')
        ->orderBy('sort_order')
        ->latest()
        ->get()
        ->groupBy('category');

    $totalEvents = Event::where('status', 1)->count();

    $totalCategories = Event::where('status', 1)
        ->whereNotNull('category')
        ->distinct('category')
        ->count('category');

    $upcomingEventCount = Event::where('status', 1)
        ->where('event_type', 'upcoming')
        ->count();

    $ongoingEventCount = Event::where('status', 1)
        ->where('event_type', 'ongoing')
        ->count();

    $completedEventCount = Event::where('status', 1)
        ->where('event_type', 'completed')
        ->count();

    $totalParticipants = Event::where('status', 1)
        ->sum('people_reached');

    $upcomingPercent = $totalEvents > 0 ? round(($upcomingEventCount / $totalEvents) * 100) : 0;
    $ongoingPercent = $totalEvents > 0 ? round(($ongoingEventCount / $totalEvents) * 100) : 0;
    $completedPercent = $totalEvents > 0 ? round(($completedEventCount / $totalEvents) * 100) : 0;

    return view('frontend.event', compact(
        'upcomingFeaturedEvent',
        'upcomingEvents',
        'ongoingFeaturedEvent',
        'ongoingEvents',
        'completedFeaturedEvent',
        'completedEvents',
        'eventCategories',
        'categoryEvents',
        'totalEvents',
        'totalCategories',
        'upcomingEventCount',
        'ongoingEventCount',
        'completedEventCount',
        'upcomingPercent',
        'ongoingPercent',
        'completedPercent',
        'totalParticipants'
    ));
}
}