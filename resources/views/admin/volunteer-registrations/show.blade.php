@extends('layouts.admin')

@section('page-title', 'Volunteer Registration Detail')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Volunteer Registration Detail</h2>
        <p class="admin-page-subtitle">View submitted volunteer registration</p>
    </div>

    <a href="{{ route('admin.volunteer-registrations.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">{{ $volunteerRegistration->name }}</p>
        <span class="page-card-note">
            Submitted on {{ $volunteerRegistration->created_at?->format('d M Y h:i A') }}
        </span>
    </div>

    <div class="form-card-body">
        <div class="field-grid two">
            <div class="field-group">
                <label class="field-label">Name</label>
                <div class="field-input">{{ $volunteerRegistration->name }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Mobile</label>
                <div class="field-input">{{ $volunteerRegistration->mobile }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Email</label>
                <div class="field-input">{{ $volunteerRegistration->email }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Age</label>
                <div class="field-input">{{ $volunteerRegistration->age }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">City</label>
                <div class="field-input">{{ $volunteerRegistration->city }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Interest Area</label>
                <div class="field-input">{{ $volunteerRegistration->interest_area }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Availability</label>
                <div class="field-input">{{ $volunteerRegistration->availability }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Experience</label>
                <div class="field-input">{{ $volunteerRegistration->experience }}</div>
            </div>

            <div class="field-group full">
                <label class="field-label">Address</label>
                <div class="field-input" style="min-height:90px;">
                    {{ $volunteerRegistration->address }}
                </div>
            </div>

            <div class="field-group full">
                <label class="field-label">Message</label>
                <div class="field-input" style="min-height:130px;">
                    {{ $volunteerRegistration->message }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection