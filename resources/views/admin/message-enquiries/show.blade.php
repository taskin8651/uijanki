@extends('layouts.admin')

@section('page-title', 'Message Detail')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Message Detail</h2>
        <p class="admin-page-subtitle">View submitted message</p>
    </div>

    <a href="{{ route('admin.message-enquiries.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">{{ $messageEnquiry->message_type }}</p>
        <span class="page-card-note">
            Submitted on {{ $messageEnquiry->created_at?->format('d M Y h:i A') }}
        </span>
    </div>

    <div class="form-card-body">
        <div class="field-grid two">
            <div class="field-group">
                <label class="field-label">Message Type</label>
                <div class="field-input">{{ $messageEnquiry->message_type }}</div>
            </div>

            <div class="field-group">
                <label class="field-label">Preferred Contact</label>
                <div class="field-input">{{ $messageEnquiry->preferred_contact }}</div>
            </div>

            <div class="field-group full">
                <label class="field-label">Message</label>
                <div class="field-input" style="min-height:150px;">
                    {{ $messageEnquiry->message }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection