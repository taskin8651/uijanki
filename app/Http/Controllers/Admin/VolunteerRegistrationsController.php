<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VolunteerRegistration;
use Illuminate\Http\Request;

class VolunteerRegistrationsController extends Controller
{
    public function index()
    {
        $registrations = VolunteerRegistration::latest()->get();

        return view('admin.volunteer-registrations.index', compact('registrations'));
    }

    public function show(VolunteerRegistration $volunteerRegistration)
    {
        $volunteerRegistration->update(['is_read' => 1]);

        return view('admin.volunteer-registrations.show', compact('volunteerRegistration'));
    }

    public function destroy(VolunteerRegistration $volunteerRegistration)
    {
        $volunteerRegistration->delete();

        return redirect()->route('admin.volunteer-registrations.index')->with('message', 'Volunteer registration deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:volunteer_registrations,id',
        ]);

        VolunteerRegistration::whereIn('id', $request->ids)->delete();

        return response(null, 204);
    }
}