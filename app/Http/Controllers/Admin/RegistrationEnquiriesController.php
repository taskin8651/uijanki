<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegistrationEnquiry;
use Illuminate\Http\Request;

class RegistrationEnquiriesController extends Controller
{
    public function index()
    {
        $enquiries = RegistrationEnquiry::latest()->get();

        return view('admin.registration-enquiries.index', compact('enquiries'));
    }

    public function show(RegistrationEnquiry $registrationEnquiry)
    {
        $registrationEnquiry->update(['is_read' => 1]);

        return view('admin.registration-enquiries.show', compact('registrationEnquiry'));
    }

    public function destroy(RegistrationEnquiry $registrationEnquiry)
    {
        $registrationEnquiry->delete();

        return redirect()->route('admin.registration-enquiries.index')->with('message', 'Registration enquiry deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:registration_enquiries,id',
        ]);

        RegistrationEnquiry::whereIn('id', $request->ids)->delete();

        return response(null, 204);
    }
}