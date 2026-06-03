<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\Campaign;
use App\Models\Event;
use App\Models\EventGallery;
use App\Models\FounderLeader;
use App\Models\HeroSlider;
use App\Models\VolunteerRegistration;

class HomeController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Hero Sliders
        |--------------------------------------------------------------------------
        */
        $heroSliders = HeroSlider::where('status', 1)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | About / NGO Intro / Mission Vision Values
        |--------------------------------------------------------------------------
        */
        $aboutPage = AboutPage::where('status', 1)
            ->latest()
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Focus Area / Campaign Cards
        |--------------------------------------------------------------------------
        */
        $campaigns = Campaign::where('status', 1)
            ->orderBy('sort_order')
            ->latest()
            ->take(8)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Active / Featured Donation Campaign
        |--------------------------------------------------------------------------
        */
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

        /*
        |--------------------------------------------------------------------------
        | Featured Event
        |--------------------------------------------------------------------------
        */
        $featuredEvent = Event::where('status', 1)
            ->where('is_featured', 1)
            ->orderBy('sort_order')
            ->latest()
            ->first();

        if (!$featuredEvent) {
            $featuredEvent = Event::where('status', 1)
                ->orderBy('sort_order')
                ->latest()
                ->first();
        }

        /*
        |--------------------------------------------------------------------------
        | Side Events
        |--------------------------------------------------------------------------
        */
        $sideEvents = Event::where('status', 1)
            ->when($featuredEvent, function ($query) use ($featuredEvent) {
                $query->where('id', '!=', $featuredEvent->id);
            })
            ->orderBy('sort_order')
            ->latest()
            ->take(3)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Featured Founder / Leader
        |--------------------------------------------------------------------------
        */
        $featuredLeader = FounderLeader::where('status', 1)
            ->where('is_featured', 1)
            ->orderBy('sort_order')
            ->latest()
            ->first();

        if (!$featuredLeader) {
            $featuredLeader = FounderLeader::where('status', 1)
                ->orderBy('sort_order')
                ->latest()
                ->first();
        }

        /*
        |--------------------------------------------------------------------------
        | Founder / Co-Founder Cards
        |--------------------------------------------------------------------------
        */
        $founderLeaders = FounderLeader::where('status', 1)
            ->orderBy('sort_order')
            ->latest()
            ->take(2)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Event Galleries
        |--------------------------------------------------------------------------
        | Ek event ke andar jitni gallery images hongi,
        | wo frontend gallery preview grid me individually show hongi.
        */
        $eventGalleries = EventGallery::with('event')
            ->where('status', 1)
            ->whereHas('event', function ($query) {
                $query->where('status', 1);
            })
            ->orderBy('sort_order')
            ->latest()
            ->take(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Gallery Categories
        |--------------------------------------------------------------------------
        */
        $galleryCategories = $eventGalleries
            ->pluck('event.category')
            ->filter()
            ->unique()
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Impact Numbers
        |--------------------------------------------------------------------------
        */
        $impactStats = [
            'beneficiaries_reached' => (int) Event::where('status', 1)->sum('people_reached'),
            'events_completed' => Event::where('status', 1)
                ->where('event_type', 'completed')
                ->count(),
            'active_volunteers' => VolunteerRegistration::count(),
            'donation_campaigns' => Campaign::where('status', 1)->count(),
        ];

        return view('frontend.index', compact(
            'heroSliders',
            'aboutPage',
            'campaigns',
            'activeCampaign',
            'featuredEvent',
            'sideEvents',
            'featuredLeader',
            'founderLeaders',
            'eventGalleries',
            'galleryCategories',
            'impactStats'
        ));
    }
}
