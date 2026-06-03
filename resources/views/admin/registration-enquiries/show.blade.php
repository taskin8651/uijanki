@extends('layouts.admin')

@section('page-title', 'Registration Enquiry Detail')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Registration Enquiry Detail</h2>
        <p class="admin-page-subtitle">View submitted registration enquiry</p>
    </div>

    <a href="{{ route('admin.registration-enquiries.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">{{ $registrationEnquiry->name }}</p>
        <span class="page-card-note">
            Submitted on {{ $registrationEnquiry->created_at?->format('d M Y h:i A') }}
        </span>
    </div>

    <div class="form-card-body">
        <div class="field-grid two">
            <div class="field-group">
                <label class="field-label">Name</label>
                <div class="field-input">{{ $registrationEnquiry->name }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Mobile</label>
                <div class="field-input">{{ $registrationEnquiry->mobile }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Email</label>
                <div class="field-input">{{ $registrationEnquiry->email }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Enquiry Type</label>
                <div class="field-input">{{ $registrationEnquiry->enquiry_type }}</div>
            </div>

            <div class="field-group full">
                <label class="field-label">Interested Program</label>
                <div class="field-input">{{ $registrationEnquiry->interested_program }}</div>
            </div>

            <div class="field-group full">
                <label class="field-label">Message</label>
                <div class="field-input" style="min-height:130px;">
                    {{ $registrationEnquiry->message }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection