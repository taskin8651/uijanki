<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CsrEnquiry;
use Illuminate\Http\Request;

class CsrEnquiriesController extends Controller
{
    public function index()
    {
        $enquiries = CsrEnquiry::latest()->get();

        return view('admin.csr-enquiries.index', compact('enquiries'));
    }

    public function show(CsrEnquiry $csrEnquiry)
    {
        $csrEnquiry->update(['is_read' => 1]);

        return view('admin.csr-enquiries.show', compact('csrEnquiry'));
    }

    public function destroy(CsrEnquiry $csrEnquiry)
    {
        $csrEnquiry->delete();

        return redirect()->route('admin.csr-enquiries.index')->with('message', 'CSR enquiry deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:csr_enquiries,id',
        ]);

        CsrEnquiry::whereIn('id', $request->ids)->delete();

        return response(null, 204);
    }
}