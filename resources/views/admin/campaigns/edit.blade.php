@extends('layouts.admin')

@section('page-title', 'Edit Campaign')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.campaigns.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Campaign</h2>

        <p class="admin-page-subtitle">
            Update campaign details and frontend display content
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Please fix the following errors:</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.campaigns.update', $campaign->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>

                <div>
                    <p class="form-card-title">Campaign Information</p>
                    <p class="form-card-subtitle">Basic campaign details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="category">Category</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="category" id="category" value="{{ old('category', $campaign->category) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" id="title" value="{{ old('title', $campaign->title) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="short_description">Short Description</label>
                    <textarea name="short_description" id="short_description" rows="5" class="field-input ckeditor">{{ old('short_description', $campaign->short_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="full_description">Full Description</label>
                    <textarea name="full_description" id="full_description" rows="8" class="field-input ckeditor">{{ old('full_description', $campaign->full_description) }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image & Settings</p>
                    <p class="form-card-subtitle">Upload image and control visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="campaign_image">Campaign Image</label>

                    <input type="file" name="campaign_image" id="campaign_image" accept="image/*" class="field-input">

                    <p class="field-hint">Leave empty if you do not want to change image.</p>

                    @if($campaign->getFirstMedia('campaign_image'))
                        <div class="mt-3">
                            <img src="{{ $campaign->campaign_image }}"
                                 alt="{{ $campaign->title }}"
                                 style="width: 180px; height: 130px; object-fit: cover; border-radius: 14px; border: 1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $campaign->sort_order) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Featured</label>

                    <label class="role-checkbox-item {{ old('is_featured', $campaign->is_featured) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured', $campaign->is_featured) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Make this campaign featured</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $campaign->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $campaign->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

                @if($campaign->getFirstMedia('campaign_image'))
                    <button type="submit"
                            form="remove-campaign-image-form"
                            class="btn-ghost mt-3"
                            onclick="return confirm('{{ trans('global.areYouSure') }}')">
                        <i class="fas fa-trash"></i>
                        Remove Current Image
                    </button>
                @endif

            </div>
        </div>

    </div>

    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>

            <div>
                <p class="form-card-title">Date & Location</p>
                <p class="form-card-subtitle">Campaign duration and location</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label">Start Date</label>
                    <input type="date" name="start_date" value="{{ old('start_date', optional($campaign->start_date)->format('Y-m-d')) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">End Date</label>
                    <input type="date" name="end_date" value="{{ old('end_date', optional($campaign->end_date)->format('Y-m-d')) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Location</label>
                    <input type="text" name="location" value="{{ old('location', $campaign->location) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Status Badge</label>
                    <input type="text" name="status_badge" value="{{ old('status_badge', $campaign->status_badge) }}" class="field-input">
                </div>

            </div>
        </div>
    </div>

    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-rupee-sign"></i>
            </div>

            <div>
                <p class="form-card-title">Donation Progress</p>
                <p class="form-card-subtitle">Raised amount, goal and supporters</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label">Raised Amount</label>
                    <input type="number" name="raised_amount" value="{{ old('raised_amount', $campaign->raised_amount) }}" step="0.01" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Goal Amount</label>
                    <input type="number" name="goal_amount" value="{{ old('goal_amount', $campaign->goal_amount) }}" step="0.01" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Supporters</label>
                    <input type="number" name="supporters" value="{{ old('supporters', $campaign->supporters) }}" class="field-input">
                </div>

            </div>
        </div>
    </div>

    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-link"></i>
            </div>

            <div>
                <p class="form-card-title">Buttons</p>
                <p class="form-card-subtitle">Frontend CTA links</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label">Button One Text</label>
                    <input type="text" name="button_one_text" value="{{ old('button_one_text', $campaign->button_one_text) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button One Link</label>
                    <input type="text" name="button_one_link" value="{{ old('button_one_link', $campaign->button_one_link) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Two Text</label>
                    <input type="text" name="button_two_text" value="{{ old('button_two_text', $campaign->button_two_text) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Two Link</label>
                    <input type="text" name="button_two_link" value="{{ old('button_two_link', $campaign->button_two_link) }}" class="field-input">
                </div>

            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.campaigns.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@if($campaign->getFirstMedia('campaign_image'))
<form id="remove-campaign-image-form"
      method="POST"
      action="{{ route('admin.campaigns.removeImage', $campaign->id) }}"
      style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endif

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.ckeditor').forEach(function (textarea) {
            CKEDITOR.replace(textarea.id, {
                height: 220
            });
        });
    });
</script>

@endsection