<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerEnquiry;
use Illuminate\Http\Request;

class PartnerEnquiriesController extends Controller
{
    public function index()
    {
        $enquiries = PartnerEnquiry::latest()->get();

        return view('admin.partner-enquiries.index', compact('enquiries'));
    }

    public function show(PartnerEnquiry $partnerEnquiry)
    {
        $partnerEnquiry->update(['is_read' => 1]);

        return view('admin.partner-enquiries.show', compact('partnerEnquiry'));
    }

    public function destroy(PartnerEnquiry $partnerEnquiry)
    {
        $partnerEnquiry->delete();

        return redirect()->route('admin.partner-enquiries.index')->with('message', 'Partner enquiry deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:partner_enquiries,id',
        ]);

        PartnerEnquiry::whereIn('id', $request->ids)->delete();

        return response(null, 204);
    }
}