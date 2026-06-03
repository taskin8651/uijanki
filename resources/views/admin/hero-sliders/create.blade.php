@extends('layouts.admin')

@section('page-title', 'Add Hero Slider')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Add Hero Slider</h2>
        <p class="admin-page-subtitle">Upload new homepage hero slider image</p>
    </div>

    <a href="{{ route('admin.hero-sliders.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

<form method="POST"
      action="{{ route('admin.hero-sliders.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-images"></i>
            </div>
            <div>
                <p>Hero Slider Details</p>
                <span>Image, title, alt text and sorting</span>
            </div>
        </div>

        <div class="form-card-body">

            <div class="field-grid two">
                <div class="field-group">
                    <label class="field-label">Title</label>
                    <input type="text"
                           name="title"
                           class="field-input"
                           value="{{ old('title') }}"
                           placeholder="Education Awareness Program">

                    @error('title')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field-group">
                    <label class="field-label">Alt Text</label>
                    <input type="text"
                           name="alt_text"
                           class="field-input"
                           value="{{ old('alt_text') }}"
                           placeholder="Janki Social Foundation Social Work">

                    @error('alt_text')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field-grid two">
                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           class="field-input"
                           value="{{ old('sort_order', 0) }}"
                           placeholder="0">

                    @error('sort_order')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field-group">
                    <label class="field-label">Slider Image <span class="req">*</span></label>
                    <input type="file"
                           name="slider_image"
                           class="field-input"
                           accept="image/*"
                           required>

                    @error('slider_image')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>
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
                    Save Slider
                </button>
            </div>

        </div>
    </div>
</form>
@endsection