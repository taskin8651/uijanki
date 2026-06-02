@extends('layouts.admin')

@section('page-title', 'Add Website Service')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.website-services.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            Add Website Service
        </h2>

        <p class="admin-page-subtitle">
            Create a new dynamic frontend service section
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

<form method="POST" action="{{ route('admin.website-services.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        {{-- MAIN CONTENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-hands-helping"></i>
                </div>

                <div>
                    <p class="form-card-title">Main Content</p>
                    <p class="form-card-subtitle">Badge, heading and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="badge_text">
                        Badge Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="badge_text"
                               id="badge_text"
                               value="{{ old('badge_text') }}"
                               placeholder="Education Awareness"
                               class="field-input {{ $errors->has('badge_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('badge_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('badge_text') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               placeholder="Spreading education awareness for"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="highlight_title">
                        Highlight Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-highlighter icon"></i>

                        <input type="text"
                               name="highlight_title"
                               id="highlight_title"
                               value="{{ old('highlight_title') }}"
                               placeholder="better learning opportunities."
                               class="field-input {{ $errors->has('highlight_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('highlight_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('highlight_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="6"
                              placeholder="Enter service section description"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @else
                        <p class="field-hint">
                            This content will appear on frontend service section.
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- IMAGE SETTINGS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image & Settings</p>
                    <p class="form-card-subtitle">Upload service image and control display</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="service_image">
                        Service Image
                    </label>

                    <input type="file"
                           name="service_image"
                           id="service_image"
                           class="field-input {{ $errors->has('service_image') ? 'error' : '' }}">

                    @if($errors->has('service_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('service_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-image"></i>
                            Recommended: JPG, PNG or WEBP.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               placeholder="0"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @else
                        <p class="field-hint">Lower number will show first.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Featured
                    </label>

                    <label class="role-checkbox-item {{ old('is_featured') ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured') ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Make this service featured</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Status
                    </label>

                    <label class="role-checkbox-item {{ old('status', 1) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', 1) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Active</span>
                    </label>

                    <p class="field-hint">
                        Only active services will show on frontend.
                    </p>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Icons are static on frontend. Only image, text, links and order are dynamic.
                    </p>
                </div>

            </div>
        </div>

    </div>

    {{-- CONTENT POINTS --}}
    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-list-check"></i>
            </div>

            <div>
                <p class="form-card-title">Content Points</p>
                <p class="form-card-subtitle">Three service points shown in frontend section</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label" for="point_one_title">
                        Point 1 Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check-circle icon"></i>

                        <input type="text"
                               name="point_one_title"
                               id="point_one_title"
                               value="{{ old('point_one_title') }}"
                               placeholder="Student Motivation"
                               class="field-input {{ $errors->has('point_one_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('point_one_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('point_one_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_one_text">
                        Point 1 Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="point_one_text"
                               id="point_one_text"
                               value="{{ old('point_one_text') }}"
                               placeholder="Encouraging students to continue learning."
                               class="field-input {{ $errors->has('point_one_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('point_one_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('point_one_text') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_two_title">
                        Point 2 Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check-circle icon"></i>

                        <input type="text"
                               name="point_two_title"
                               id="point_two_title"
                               value="{{ old('point_two_title') }}"
                               placeholder="Community Outreach"
                               class="field-input {{ $errors->has('point_two_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('point_two_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('point_two_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_two_text">
                        Point 2 Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="point_two_text"
                               id="point_two_text"
                               value="{{ old('point_two_text') }}"
                               placeholder="Awareness activities for communities."
                               class="field-input {{ $errors->has('point_two_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('point_two_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('point_two_text') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_three_title">
                        Point 3 Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check-circle icon"></i>

                        <input type="text"
                               name="point_three_title"
                               id="point_three_title"
                               value="{{ old('point_three_title') }}"
                               placeholder="Career Guidance"
                               class="field-input {{ $errors->has('point_three_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('point_three_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('point_three_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_three_text">
                        Point 3 Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="point_three_text"
                               id="point_three_text"
                               value="{{ old('point_three_text') }}"
                               placeholder="Helping youth understand courses and opportunities."
                               class="field-input {{ $errors->has('point_three_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('point_three_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('point_three_text') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>
    </div>

    {{-- BUTTONS --}}
    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-link"></i>
            </div>

            <div>
                <p class="form-card-title">Buttons</p>
                <p class="form-card-subtitle">CTA button text and links</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label" for="button_one_text">
                        Button One Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>

                        <input type="text"
                               name="button_one_text"
                               id="button_one_text"
                               value="{{ old('button_one_text') }}"
                               placeholder="Explore Education Program"
                               class="field-input {{ $errors->has('button_one_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_one_link">
                        Button One Link
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="button_one_link"
                               id="button_one_link"
                               value="{{ old('button_one_link') }}"
                               placeholder="volunter"
                               class="field-input {{ $errors->has('button_one_link') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_two_text">
                        Button Two Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>

                        <input type="text"
                               name="button_two_text"
                               id="button_two_text"
                               value="{{ old('button_two_text') }}"
                               placeholder="Support This Cause"
                               class="field-input {{ $errors->has('button_two_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_two_link">
                        Button Two Link
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="button_two_link"
                               id="button_two_link"
                               value="{{ old('button_two_link') }}"
                               placeholder="contact"
                               class="field-input {{ $errors->has('button_two_link') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- FLOATING CARDS --}}
    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-layer-group"></i>
            </div>

            <div>
                <p class="form-card-title">Floating Cards</p>
                <p class="form-card-subtitle">Small floating content shown over image</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label" for="floating_one_title">
                        Floating One Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-book icon"></i>

                        <input type="text"
                               name="floating_one_title"
                               id="floating_one_title"
                               value="{{ old('floating_one_title') }}"
                               placeholder="Learning Support"
                               class="field-input {{ $errors->has('floating_one_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="floating_one_subtitle">
                        Floating One Subtitle
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="floating_one_subtitle"
                               id="floating_one_subtitle"
                               value="{{ old('floating_one_subtitle') }}"
                               placeholder="Awareness • Motivation"
                               class="field-input {{ $errors->has('floating_one_subtitle') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="floating_two_title">
                        Floating Two Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-patch-check icon"></i>

                        <input type="text"
                               name="floating_two_title"
                               id="floating_two_title"
                               value="{{ old('floating_two_title') }}"
                               placeholder="Better Future"
                               class="field-input {{ $errors->has('floating_two_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="floating_two_subtitle">
                        Floating Two Subtitle
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="floating_two_subtitle"
                               id="floating_two_subtitle"
                               value="{{ old('floating_two_subtitle') }}"
                               placeholder="Guidance • Confidence"
                               class="field-input {{ $errors->has('floating_two_subtitle') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- STATS CARD --}}
    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-chart-line"></i>
            </div>

            <div>
                <p class="form-card-title">Stats Card</p>
                <p class="form-card-subtitle">Small stats card text shown with image</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label" for="stats_title">
                        Stats Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>

                        <input type="text"
                               name="stats_title"
                               id="stats_title"
                               value="{{ old('stats_title') }}"
                               placeholder="Education"
                               class="field-input {{ $errors->has('stats_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="stats_subtitle">
                        Stats Subtitle
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="stats_subtitle"
                               id="stats_subtitle"
                               value="{{ old('stats_subtitle') }}"
                               placeholder="Awareness for social change"
                               class="field-input {{ $errors->has('stats_subtitle') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.website-services.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection