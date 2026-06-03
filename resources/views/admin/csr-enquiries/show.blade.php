@extends('layouts.admin')

@section('page-title', 'CSR Enquiry Detail')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">CSR Enquiry Detail</h2>
        <p class="admin-page-subtitle">View submitted CSR partnership enquiry</p>
    </div>

    <a href="{{ route('admin.csr-enquiries.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">{{ $csrEnquiry->company_name }}</p>
        <span class="page-card-note">
            Submitted on {{ $csrEnquiry->created_at?->format('d M Y h:i A') }}
        </span>
    </div>

    <div class="form-card-body">
        <div class="field-grid two">
            <div class="field-group">
                <label class="field-label">Company / Organization</label>
                <div class="field-input">{{ $csrEnquiry->company_name }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Contact Person</label>
                <div class="field-input">{{ $csrEnquiry->contact_person }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Email</label>
                <div class="field-input">{{ $csrEnquiry->email }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Phone</label>
                <div class="field-input">{{ $csrEnquiry->phone }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">City</label>
                <div class="field-input">{{ $csrEnquiry->city }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Budget Range</label>
                <div class="field-input">{{ $csrEnquiry->budget_range }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Focus Area</label>
                <div class="field-input">{{ $csrEnquiry->focus_area }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Partnership Type</label>
                <div class="field-input">{{ $csrEnquiry->partnership_type }}</div>
            </div>

            <div class="field-group full">
                <label class="field-label">Message</label>
                <div class="field-input" style="min-height:120px;">
                    {{ $csrEnquiry->message }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection