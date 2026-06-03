@extends('layouts.admin')

@section('page-title', 'Edit Hero Slider')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Edit Hero Slider</h2>
        <p class="admin-page-subtitle">Update homepage hero slider image</p>
    </div>

    <a href="{{ route('admin.hero-sliders.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<form method="POST"
      action="{{ route('admin.hero-sliders.update', $heroSlider->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

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
                           value="{{ old('title', $heroSlider->title) }}"
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
                           value="{{ old('alt_text', $heroSlider->alt_text) }}"
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
                           value="{{ old('sort_order', $heroSlider->sort_order) }}">

                    @error('sort_order')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field-group">
                    <label class="field-label">Replace Slider Image</label>
                    <input type="file"
                           name="slider_image"
                           class="field-input"
                           accept="image/*">

                    @error('slider_image')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Current Image</label>

                <div style="width:240px;height:150px;border-radius:20px;overflow:hidden;background:#f8fafc;border:1px solid #e5e7eb;margin-bottom:14px;">
                    <img src="{{ $heroSlider->slider_image }}"
                         alt="{{ $heroSlider->alt_text ?? $heroSlider->title }}"
                         style="width:100%;height:100%;object-fit:cover;">
                </div>

                @if($heroSlider->getFirstMedia('slider_image'))
                    <form id="remove-slider-image-form"
                          method="POST"
                          action="{{ route('admin.hero-sliders.removeImage', $heroSlider->id) }}"
                          style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>

                    <button type="submit"
                            form="remove-slider-image-form"
                            class="btn-danger"
                            onclick="return confirm('{{ trans('global.areYouSure') }}')">
                        <i class="fas fa-trash"></i>
                        Remove Image
                    </button>
                @endif
            </div>

            <div class="field-group">
                <label class="switch-row">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           {{ old('status', $heroSlider->status) ? 'checked' : '' }}>
                    <span>Active</span>
                </label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i>
                    Update Slider
                </button>
            </div>

        </div>
    </div>
</form>
@endsection