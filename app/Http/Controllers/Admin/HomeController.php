<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\ContactEnquiry;
use App\Models\CsrEnquiry;
use App\Models\Event;
use App\Models\MessageEnquiry;
use App\Models\PartnerEnquiry;
use App\Models\RegistrationEnquiry;
use App\Models\VolunteerRegistration;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    public function index()
    {
        $enquiryTypes = [
            [
                'title' => 'Contact Enquiries',
                'model' => ContactEnquiry::class,
                'route' => 'admin.contact-enquiries.index',
                'show_route' => 'admin.contact-enquiries.show',
                'icon' => 'fa-envelope-open-text',
                'color' => 'blue',
            ],
            [
                'title' => 'CSR Enquiries',
                'model' => CsrEnquiry::class,
                'route' => 'admin.csr-enquiries.index',
                'show_route' => 'admin.csr-enquiries.show',
                'icon' => 'fa-handshake',
                'color' => 'green',
            ],
            [
                'title' => 'Registration Enquiries',
                'model' => RegistrationEnquiry::class,
                'route' => 'admin.registration-enquiries.index',
                'show_route' => 'admin.registration-enquiries.show',
                'icon' => 'fa-clipboard-list',
                'color' => 'purple',
            ],
            [
                'title' => 'Volunteer Registrations',
                'model' => VolunteerRegistration::class,
                'route' => 'admin.volunteer-registrations.index',
                'show_route' => 'admin.volunteer-registrations.show',
                'icon' => 'fa-people-carry-box',
                'color' => 'orange',
            ],
            [
                'title' => 'Message Enquiries',
                'model' => MessageEnquiry::class,
                'route' => 'admin.message-enquiries.index',
                'show_route' => 'admin.message-enquiries.show',
                'icon' => 'fa-comments',
                'color' => 'cyan',
            ],
            [
                'title' => 'Partner Enquiries',
                'model' => PartnerEnquiry::class,
                'route' => 'admin.partner-enquiries.index',
                'show_route' => 'admin.partner-enquiries.show',
                'icon' => 'fa-building-ngo',
                'color' => 'rose',
            ],
        ];

        $enquiryCards = collect($enquiryTypes)->map(function (array $type) {
            $model = $type['model'];

            return [
                'title' => $type['title'],
                'count' => $model::count(),
                'unread' => $model::where('is_read', false)->count(),
                'today' => $model::whereDate('created_at', today())->count(),
                'route' => $type['route'],
                'show_route' => $type['show_route'],
                'icon' => $type['icon'],
                'color' => $type['color'],
                'model' => $model,
            ];
        });

        $totalEnquiries = $enquiryCards->sum('count');
        $unreadEnquiries = $enquiryCards->sum('unread');
        $todayEnquiries = $enquiryCards->sum('today');

        $campaignRaised = (float) Campaign::sum('raised_amount');
        $campaignGoal = (float) Campaign::sum('goal_amount');

        $eventStats = [
            'total' => Event::count(),
            'active' => Event::where('status', true)->count(),
            'upcoming' => Event::where('event_type', 'upcoming')->count(),
            'ongoing' => Event::where('event_type', 'ongoing')->count(),
            'completed' => Event::where('event_type', 'completed')->count(),
            'featured' => Event::where('is_featured', true)->count(),
        ];

        $campaignStats = [
            'total' => Campaign::count(),
            'active' => Campaign::where('status', true)->count(),
            'featured' => Campaign::where('is_featured', true)->count(),
            'raised' => $campaignRaised,
            'goal' => $campaignGoal,
            'supporters' => (int) Campaign::sum('supporters'),
            'progress' => $campaignGoal > 0 ? min(round(($campaignRaised / $campaignGoal) * 100), 100) : 0,
        ];

        $recentEvents = Event::latest()->take(5)->get();
        $recentCampaigns = Campaign::latest()->take(5)->get();

        $recentEnquiries = $enquiryCards
            ->flatMap(function (array $type) {
                return $type['model']::latest()->take(4)->get()->map(function (Model $enquiry) use ($type) {
                    return [
                        'id' => $enquiry->id,
                        'title' => $type['title'],
                        'name' => $this->enquiryName($enquiry),
                        'subject' => $this->enquirySubject($enquiry),
                        'is_read' => (bool) $enquiry->is_read,
                        'created_at' => $enquiry->created_at,
                        'show_route' => $type['show_route'],
                    ];
                });
            })
            ->sortByDesc('created_at')
            ->take(8)
            ->values();

        return view('home', compact(
            'enquiryCards',
            'totalEnquiries',
            'unreadEnquiries',
            'todayEnquiries',
            'eventStats',
            'campaignStats',
            'recentEvents',
            'recentCampaigns',
            'recentEnquiries'
        ));
    }

    private function enquiryName(Model $enquiry): string
    {
        return $enquiry->name
            ?? $enquiry->contact_person
            ?? $enquiry->company_name
            ?? $enquiry->organization_name
            ?? $enquiry->preferred_contact
            ?? 'New Enquiry';
    }

    private function enquirySubject(Model $enquiry): string
    {
        return $enquiry->subject
            ?? $enquiry->focus_area
            ?? $enquiry->interested_program
            ?? $enquiry->interest_area
            ?? $enquiry->message_type
            ?? $enquiry->partner_type
            ?? 'General';
    }
}
