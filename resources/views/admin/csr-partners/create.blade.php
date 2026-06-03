@extends('layouts.admin')

@section('page-title', 'Add CSR Partner')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Add CSR Partner</h2>
        <p class="admin-page-subtitle">Create new CSR partner logo</p>
    </div>

    <a href="{{ route('admin.csr-partners.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

<form method="POST"
      action="{{ route('admin.csr-partners.store') }}"
      enctype="multipart/form-data">
    @csrf

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
                       value="{{ old('title') }}"
                       placeholder="Corporate Partner">
            </div>

            <div class="field-group">
                <label class="field-label">Short Description</label>
                <textarea name="short_description"
                          class="field-input"
                          rows="4"
                          placeholder="Education awareness support partner">{{ old('short_description') }}</textarea>
            </div>

            <div class="field-grid two">
                <div class="field-group">
                    <label class="field-label">Approval Status</label>
                    <select name="approval_status" class="field-input">
                        <option value="approved" {{ old('approval_status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="pending" {{ old('approval_status', 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           class="field-input"
                           value="{{ old('sort_order', 0) }}">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Partner Logo</label>
                <input type="file"
                       name="partner_logo"
                       class="field-input"
                       accept="image/*">
            </div>

            <div class="field-group">
                <label class="switch-row">
                    <input type="checkbox" name="status" value="1" checked>
                    <span>Active</span>
                </label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i>
                    Save Partner
                </button>
            </div>

        </div>
    </div>
</form>
@endsection