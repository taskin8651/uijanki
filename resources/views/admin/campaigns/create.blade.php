@extends('layouts.admin')

@section('page-title', 'Create Campaign')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.campaigns.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Create Campaign</h2>

        <p class="admin-page-subtitle">
            Add campaign details for frontend display
        </p>
    </div>
</div>

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

<form method="POST" action="{{ route('admin.campaigns.store') }}" enctype="multipart/form-data">
    @csrf

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
                        <input type="text" name="category" id="category" value="{{ old('category') }}" class="field-input" placeholder="Education">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="field-input" placeholder="Education Support Campaign for Students">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="short_description">Short Description</label>
                    <textarea name="short_description" id="short_description" rows="5" class="field-input ckeditor">{{ old('short_description') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="full_description">Full Description</label>
                    <textarea name="full_description" id="full_description" rows="8" class="field-input ckeditor">{{ old('full_description') }}</textarea>
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
                    <p class="form-card-subtitle">Upload image and visibility settings</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="campaign_image">Campaign Image</label>
                    <input type="file" name="campaign_image" id="campaign_image" accept="image/*" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Featured</label>
                    <label class="role-checkbox-item {{ old('is_featured') ? 'checked' : '' }}">
                        <input type="checkbox" name="is_featured" value="1" class="role-checkbox" {{ old('is_featured') ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Make this campaign featured</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>
                    <label class="role-checkbox-item checked">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" checked>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

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
                    <input type="date" name="start_date" value="{{ old('start_date') }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">End Date</label>
                    <input type="date" name="end_date" value="{{ old('end_date') }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Location</label>
                    <input type="text" name="location" value="{{ old('location') }}" class="field-input" placeholder="Patna">
                </div>

                <div class="field-group">
                    <label class="field-label">Status Badge</label>
                    <input type="text" name="status_badge" value="{{ old('status_badge', 'Active') }}" class="field-input" placeholder="Active">
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
                    <input type="number" name="raised_amount" value="{{ old('raised_amount', 0) }}" step="0.01" class="field-input" placeholder="45000">
                </div>

                <div class="field-group">
                    <label class="field-label">Goal Amount</label>
                    <input type="number" name="goal_amount" value="{{ old('goal_amount', 0) }}" step="0.01" class="field-input" placeholder="60000">
                </div>

                <div class="field-group">
                    <label class="field-label">Supporters</label>
                    <input type="number" name="supporters" value="{{ old('supporters', 0) }}" class="field-input" placeholder="120">
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
                    <input type="text" name="button_one_text" value="{{ old('button_one_text', 'Donate Now') }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button One Link</label>
                    <input type="text" name="button_one_link" value="{{ old('button_one_link', 'donate') }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Two Text</label>
                    <input type="text" name="button_two_text" value="{{ old('button_two_text', 'Details') }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Two Link</label>
                    <input type="text" name="button_two_link" value="{{ old('button_two_link', 'contact') }}" class="field-input">
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