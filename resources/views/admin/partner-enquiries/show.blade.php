@extends('layouts.admin')

@section('page-title', 'Partner Enquiry Detail')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Partner Enquiry Detail</h2>
        <p class="admin-page-subtitle">View submitted partner enquiry</p>
    </div>

    <a href="{{ route('admin.partner-enquiries.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">{{ $partnerEnquiry->name }}</p>
        <span class="page-card-note">
            Submitted on {{ $partnerEnquiry->created_at?->format('d M Y h:i A') }}
        </span>
    </div>

    <div class="form-card-body">
        <div class="field-grid two">
            <div class="field-group">
                <label class="field-label">Contact Person</label>
                <div class="field-input">{{ $partnerEnquiry->name }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Phone</label>
                <div class="field-input">{{ $partnerEnquiry->phone }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Email</label>
                <div class="field-input">{{ $partnerEnquiry->email }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Organization / Company</label>
                <div class="field-input">{{ $partnerEnquiry->organization_name }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Partner Type</label>
                <div class="field-input">{{ $partnerEnquiry->partner_type }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">City</label>
                <div class="field-input">{{ $partnerEnquiry->city }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Consent</label>
                <div class="field-input">
                    {{ $partnerEnquiry->consent ? 'Yes' : 'No' }}
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Attachment</label>
                <div class="field-input">
                    @if($partnerEnquiry->attachment_url)
                        <a href="{{ $partnerEnquiry->attachment_url }}" target="_blank">
                            View Attachment
                        </a>
                    @else
                        No attachment uploaded
                    @endif
                </div>
            </div>

            <div class="field-group full">
                <label class="field-label">Message</label>
                <div class="field-input" style="min-height:130px;">
                    {{ $partnerEnquiry->message }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection