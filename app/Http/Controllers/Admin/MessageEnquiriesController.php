<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MessageEnquiry;
use Illuminate\Http\Request;

class MessageEnquiriesController extends Controller
{
    public function index()
    {
        $enquiries = MessageEnquiry::latest()->get();

        return view('admin.message-enquiries.index', compact('enquiries'));
    }

    public function show(MessageEnquiry $messageEnquiry)
    {
        $messageEnquiry->update(['is_read' => 1]);

        return view('admin.message-enquiries.show', compact('messageEnquiry'));
    }

    public function destroy(MessageEnquiry $messageEnquiry)
    {
        $messageEnquiry->delete();

        return redirect()->route('admin.message-enquiries.index')->with('message', 'Message enquiry deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:message_enquiries,id',
        ]);

        MessageEnquiry::whereIn('id', $request->ids)->delete();

        return response(null, 204);
    }
}