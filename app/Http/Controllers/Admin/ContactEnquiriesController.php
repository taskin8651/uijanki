<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class ContactEnquiriesController extends Controller
{
    public function index()
    {
        $enquiries = ContactEnquiry::latest()->get();

        return view('admin.contact-enquiries.index', compact('enquiries'));
    }

    public function show(ContactEnquiry $contactEnquiry)
    {
        $contactEnquiry->update(['is_read' => 1]);

        return view('admin.contact-enquiries.show', compact('contactEnquiry'));
    }

    public function destroy(ContactEnquiry $contactEnquiry)
    {
        $contactEnquiry->delete();

        return redirect()->route('admin.contact-enquiries.index')->with('message', 'Contact enquiry deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:contact_enquiries,id',
        ]);

        ContactEnquiry::whereIn('id', $request->ids)->delete();

        return response(null, 204);
    }
}