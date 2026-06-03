@extends('layouts.admin')

@section('page-title', 'Edit CSR Partner')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Edit CSR Partner</h2>
        <p class="admin-page-subtitle">Update CSR partner logo and approval status</p>
    </div>

    <a href="{{ route('admin.csr-partners.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<form method="POST"
      action="{{ route('admin.csr-partners.update', $csrPartner->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-handshake"></i>
            </div>
            <div>
                <p>CSR Partner Details</p>
                <span>Logo, title and approval status</span>
            </div>
        </div>

        <div class="form-card-body">

            <div class="field-group">
                <label class="field-label">Partner Title</label>
                <input type="text"
                       name="title"
                       class="field-input"
                       value="{{ old('title', $csrPartner->title) }}">
            </div>

            <div class="field-group">
                <label class="field-label">Short Description</label>
                <textarea name="short_description"
                          class="field-input"
                          rows="4">{{ old('short_description', $csrPartner->short_description) }}</textarea>
            </div>

            <div class="field-grid two">
                <div class="field-group">
                    <label class="field-label">Approval Status</label>
                    <select name="approval_status" class="field-input">
                        <option value="approved" {{ old('approval_status', $csrPartner->approval_status) == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="pending" {{ old('approval_status', $csrPartner->approval_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           class="field-input"
                           value="{{ old('sort_order', $csrPartner->sort_order) }}">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Current Logo</label>

                <div style="width:150px;height:90px;border:1px solid #e5e7eb;border-radius:16px;overflow:hidden;background:#f8fafc;margin-bottom:12px;">
                    <img src="{{ $csrPartner->partner_logo }}" alt="{{ $csrPartner->title }}" style="width:100%;height:100%;object-fit:contain;padding:10px;">
                </div>

                @if($csrPartner->getFirstMedia('partner_logo'))
                    <form id="remove-logo-form"
                          method="POST"
                          action="{{ route('admin.csr-partners.removeLogo', $csrPartner->id) }}"
                          style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>

                    <button type="submit"
                            form="remove-logo-form"
                            class="btn-danger"
                            onclick="return confirm('{{ trans('global.areYouSure') }}')">
                        <i class="fas fa-trash"></i>
                        Remove Logo
                    </button>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label">Replace Logo</label>
                <input type="file"
                       name="partner_logo"
                       class="field-input"
                       accept="image/*">
            </div>

            <div class="field-group">
                <label class="switch-row">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           {{ old('status', $csrPartner->status) ? 'checked' : '' }}>
                    <span>Active</span>
                </label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i>
                    Update Partner
                </button>
            </div>

        </div>
    </div>
</form>
@endsection