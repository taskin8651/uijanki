@extends('layouts.admin')

@section('page-title', 'Contact Enquiry Detail')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Contact Enquiry Detail</h2>
        <p class="admin-page-subtitle">View submitted contact enquiry</p>
    </div>

    <a href="{{ route('admin.contact-enquiries.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">{{ $contactEnquiry->name }}</p>
        <span class="page-card-note">
            Submitted on {{ $contactEnquiry->created_at?->format('d M Y h:i A') }}
        </span>
    </div>

    <div class="form-card-body">
        <div class="field-grid two">
            <div class="field-group">
                <label class="field-label">Name</label>
                <div class="field-input">{{ $contactEnquiry->name }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Mobile</label>
                <div class="field-input">{{ $contactEnquiry->mobile }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Email</label>
                <div class="field-input">{{ $contactEnquiry->email }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Subject</label>
                <div class="field-input">{{ $contactEnquiry->subject }}</div>
            </div>

            <div class="field-group full">
                <label class="field-label">Message</label>
                <div class="field-input" style="min-height:130px;">
                    {{ $contactEnquiry->message }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection