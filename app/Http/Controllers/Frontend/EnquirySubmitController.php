<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\CsrEnquiry;
use App\Models\MessageEnquiry;
use App\Models\PartnerEnquiry;
use App\Models\RegistrationEnquiry;
use App\Models\VolunteerRegistration;
use Illuminate\Http\Request;

class EnquirySubmitController extends Controller
{
    public function csrStore(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'nullable|string|max:255',
            'budget_range' => 'nullable|string|max:255',
            'focus_area' => 'required|string|max:255',
            'partnership_type' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        CsrEnquiry::create($data);

        return redirect()->back()->with('message', 'CSR enquiry submitted successfully.');
    }

    public function registrationStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'enquiry_type' => 'nullable|string|max:255',
            'interested_program' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        RegistrationEnquiry::create($data);

        return redirect()->back()->with('message', 'Enquiry submitted successfully.');
    }

    public function contactStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactEnquiry::create($data);

        return redirect()->back()->with('message', 'Message submitted successfully.');
    }

    public function volunteerStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'age' => 'nullable|integer|min:1|max:100',
            'city' => 'required|string|max:255',
            'interest_area' => 'required|string|max:255',
            'availability' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'message' => 'required|string',
        ]);

        VolunteerRegistration::create($data);

        return redirect()->back()->with('message', 'Volunteer registration submitted successfully.');
    }

    public function messageStore(Request $request)
    {
        $data = $request->validate([
            'message_type' => 'required|string|max:255',
            'preferred_contact' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        MessageEnquiry::create($data);

        return redirect()->back()->with('message', 'Message submitted successfully.');
    }

    public function partnerStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'organization_name' => 'nullable|string|max:255',
            'partner_type' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            'consent' => 'required',
        ]);

        $data['consent'] = $request->has('consent') ? 1 : 0;

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('partner-attachments', 'public');
        }

        PartnerEnquiry::create($data);

        return redirect()->back()->with('message', 'Partner enquiry submitted successfully.');
    }
}