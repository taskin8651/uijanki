<?php

namespace App\Providers;

use App\Models\ContactEnquiry;
use App\Models\CsrEnquiry;
use App\Models\MessageEnquiry;
use App\Models\PartnerEnquiry;
use App\Models\RegistrationEnquiry;
use App\Models\VolunteerRegistration;
use App\Models\WebsiteSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.*', function ($view) {
            $websiteSetting = Schema::hasTable('website_settings')
                ? WebsiteSetting::current()
                : new WebsiteSetting(WebsiteSetting::defaults());

            $view->with('websiteSetting', $websiteSetting);
        });

        View::composer('layouts.admin', function ($view) {
            $enquiryTypes = [
                ['label' => 'Contact Enquiry', 'model' => ContactEnquiry::class, 'route' => 'admin.contact-enquiries.show'],
                ['label' => 'CSR Enquiry', 'model' => CsrEnquiry::class, 'route' => 'admin.csr-enquiries.show'],
                ['label' => 'Registration Enquiry', 'model' => RegistrationEnquiry::class, 'route' => 'admin.registration-enquiries.show'],
                ['label' => 'Volunteer Registration', 'model' => VolunteerRegistration::class, 'route' => 'admin.volunteer-registrations.show'],
                ['label' => 'Message Enquiry', 'model' => MessageEnquiry::class, 'route' => 'admin.message-enquiries.show'],
                ['label' => 'Partner Enquiry', 'model' => PartnerEnquiry::class, 'route' => 'admin.partner-enquiries.show'],
            ];

            $availableTypes = collect($enquiryTypes)->filter(function (array $type) {
                return Schema::hasTable((new $type['model'])->getTable());
            });

            $adminUnreadEnquiryCount = $availableTypes->sum(function (array $type) {
                return $type['model']::where('is_read', false)->count();
            });

            $adminUnreadEnquiries = $availableTypes
                ->flatMap(function (array $type) {
                    return $type['model']::where('is_read', false)
                        ->latest()
                        ->take(4)
                        ->get()
                        ->map(function (Model $enquiry) use ($type) {
                            return [
                                'id' => $enquiry->id,
                                'label' => $type['label'],
                                'name' => $enquiry->name
                                    ?? $enquiry->contact_person
                                    ?? $enquiry->company_name
                                    ?? $enquiry->organization_name
                                    ?? $enquiry->preferred_contact
                                    ?? 'New Enquiry',
                                'subject' => $enquiry->subject
                                    ?? $enquiry->focus_area
                                    ?? $enquiry->interested_program
                                    ?? $enquiry->interest_area
                                    ?? $enquiry->message_type
                                    ?? $enquiry->partner_type
                                    ?? 'General',
                                'created_at' => $enquiry->created_at,
                                'route' => $type['route'],
                            ];
                        });
                })
                ->sortByDesc('created_at')
                ->take(6)
                ->values();

            $view->with(compact('adminUnreadEnquiryCount', 'adminUnreadEnquiries'));
        });
    }
}
