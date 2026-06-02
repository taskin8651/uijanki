@extends('layouts.admin')

@section('page-title', 'About Page CMS')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">
            About Page CMS
        </h2>

        <p class="admin-page-subtitle">
            Manage NGO background, mission, vision and purpose section content
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
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

<form method="POST" action="{{ route('admin.about-page.update') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        {{-- NGO BACKGROUND SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-building"></i>
                </div>

                <div>
                    <p class="form-card-title">NGO Background Section</p>
                    <p class="form-card-subtitle">Main about section content and image</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="section_badge">
                        Section Badge
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="section_badge"
                               id="section_badge"
                               value="{{ old('section_badge', $aboutPage->section_badge) }}"
                               placeholder="NGO Background"
                               class="field-input {{ $errors->has('section_badge') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('section_badge'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('section_badge') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="heading">
                        Heading
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="heading"
                               id="heading"
                               value="{{ old('heading', $aboutPage->heading) }}"
                               placeholder="Building an aware, skilled and"
                               class="field-input {{ $errors->has('heading') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('heading'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('heading') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="highlight_heading">
                        Highlight Heading
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-highlighter icon"></i>
                        <input type="text"
                               name="highlight_heading"
                               id="highlight_heading"
                               value="{{ old('highlight_heading', $aboutPage->highlight_heading) }}"
                               placeholder="empowered society."
                               class="field-input {{ $errors->has('highlight_heading') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('highlight_heading'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('highlight_heading') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description_one">
                        Description One
                    </label>

                    <textarea name="description_one"
                              id="description_one"
                              rows="5"
                              placeholder="Enter first paragraph"
                              class="field-input {{ $errors->has('description_one') ? 'error' : '' }}">{{ old('description_one', $aboutPage->description_one) }}</textarea>

                    @if($errors->has('description_one'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description_one') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description_two">
                        Description Two
                    </label>

                    <textarea name="description_two"
                              id="description_two"
                              rows="5"
                              placeholder="Enter second paragraph"
                              class="field-input {{ $errors->has('description_two') ? 'error' : '' }}">{{ old('description_two', $aboutPage->description_two) }}</textarea>

                    @if($errors->has('description_two'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description_two') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- IMAGE AND FLOATING CONTENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image & Floating Card</p>
                    <p class="form-card-subtitle">Upload image and manage badge text</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="background_image">
                        Background Image
                    </label>

                    <input type="file"
                           name="background_image"
                           id="background_image"
                           class="field-input {{ $errors->has('background_image') ? 'error' : '' }}">

                    @if($errors->has('background_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('background_image') }}
                        </p>
                    @endif

                    @if($aboutPage->getFirstMedia('background_image'))
                        <div class="mt-3">
                            <img src="{{ $aboutPage->background_image }}"
                                 style="width: 180px; height: 110px; object-fit: cover; border-radius: 14px; border: 1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="floating_title">
                        Floating Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heart icon"></i>
                        <input type="text"
                               name="floating_title"
                               id="floating_title"
                               value="{{ old('floating_title', $aboutPage->floating_title) }}"
                               placeholder="Social Impact"
                               class="field-input {{ $errors->has('floating_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('floating_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('floating_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="floating_subtitle">
                        Floating Subtitle
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>
                        <input type="text"
                               name="floating_subtitle"
                               id="floating_subtitle"
                               value="{{ old('floating_subtitle', $aboutPage->floating_subtitle) }}"
                               placeholder="Education • Skills • Welfare"
                               class="field-input {{ $errors->has('floating_subtitle') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('floating_subtitle'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('floating_subtitle') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_badge">
                        Image Badge Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check-circle icon"></i>
                        <input type="text"
                               name="image_badge"
                               id="image_badge"
                               value="{{ old('image_badge', $aboutPage->image_badge) }}"
                               placeholder="Community Development Focus"
                               class="field-input {{ $errors->has('image_badge') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('image_badge'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image_badge') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Status
                    </label>

                    <label class="role-checkbox-item {{ old('status', $aboutPage->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $aboutPage->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Active</span>
                    </label>

                    <p class="field-hint">
                        <i class="fas fa-info-circle"></i>
                        Disable this if you want to hide the about content from frontend.
                    </p>
                </div>

            </div>
        </div>

    </div>

    {{-- BACKGROUND POINTS --}}
    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-list-check"></i>
            </div>

            <div>
                <p class="form-card-title">Background Points</p>
                <p class="form-card-subtitle">Three highlighted points shown in the about section</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label" for="point_one_title">
                        Point 1 Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-book icon"></i>
                        <input type="text"
                               name="point_one_title"
                               id="point_one_title"
                               value="{{ old('point_one_title', $aboutPage->point_one_title) }}"
                               placeholder="Education Awareness"
                               class="field-input {{ $errors->has('point_one_title') ? 'error' : '' }}">
                    </div>
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
                               value="{{ old('point_one_text', $aboutPage->point_one_text) }}"
                               placeholder="Learning support, student motivation and outreach programs."
                               class="field-input {{ $errors->has('point_one_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_two_title">
                        Point 2 Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tools icon"></i>
                        <input type="text"
                               name="point_two_title"
                               id="point_two_title"
                               value="{{ old('point_two_title', $aboutPage->point_two_title) }}"
                               placeholder="Skill & Vocational Training"
                               class="field-input {{ $errors->has('point_two_title') ? 'error' : '' }}">
                    </div>
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
                               value="{{ old('point_two_text', $aboutPage->point_two_text) }}"
                               placeholder="Practical training for livelihood and self-reliance."
                               class="field-input {{ $errors->has('point_two_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_three_title">
                        Point 3 Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-users icon"></i>
                        <input type="text"
                               name="point_three_title"
                               id="point_three_title"
                               value="{{ old('point_three_title', $aboutPage->point_three_title) }}"
                               placeholder="Community Welfare"
                               class="field-input {{ $errors->has('point_three_title') ? 'error' : '' }}">
                    </div>
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
                               value="{{ old('point_three_text', $aboutPage->point_three_text) }}"
                               placeholder="Public participation, social awareness and welfare campaigns."
                               class="field-input {{ $errors->has('point_three_text') ? 'error' : '' }}">
                    </div>
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
                    <label class="field-label" for="button_one_text">Button 1 Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>
                        <input type="text"
                               name="button_one_text"
                               id="button_one_text"
                               value="{{ old('button_one_text', $aboutPage->button_one_text) }}"
                               placeholder="Know More About Us"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_one_link">Button 1 Link</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text"
                               name="button_one_link"
                               id="button_one_link"
                               value="{{ old('button_one_link', $aboutPage->button_one_link) }}"
                               placeholder="about"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_two_text">Button 2 Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-user-plus icon"></i>
                        <input type="text"
                               name="button_two_text"
                               id="button_two_text"
                               value="{{ old('button_two_text', $aboutPage->button_two_text) }}"
                               placeholder="Join As Volunteer"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_two_link">Button 2 Link</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text"
                               name="button_two_link"
                               id="button_two_link"
                               value="{{ old('button_two_link', $aboutPage->button_two_link) }}"
                               placeholder="volunter"
                               class="field-input">
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- MISSION VISION PURPOSE --}}
    <div class="admin-form-grid mt-4">

        {{-- Mission --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-rocket"></i>
                </div>

                <div>
                    <p class="form-card-title">Mission</p>
                    <p class="form-card-subtitle">Mission card content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="mission_title">Mission Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="mission_title"
                               id="mission_title"
                               value="{{ old('mission_title', $aboutPage->mission_title) }}"
                               placeholder="Our Mission"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="mission_description">Mission Description</label>
                    <textarea name="mission_description"
                              id="mission_description"
                              rows="5"
                              placeholder="Enter mission description"
                              class="field-input">{{ old('mission_description', $aboutPage->mission_description) }}</textarea>
                </div>

                @php
                    $missionPoints = old('mission_points', $aboutPage->mission_points ?? []);
                @endphp

                @for($i = 0; $i < 3; $i++)
                    <div class="field-group">
                        <label class="field-label">Mission Point {{ $i + 1 }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-check-circle icon"></i>
                            <input type="text"
                                   name="mission_points[]"
                                   value="{{ $missionPoints[$i] ?? '' }}"
                                   placeholder="Enter mission point"
                                   class="field-input">
                        </div>
                    </div>
                @endfor

            </div>
        </div>

        {{-- Vision --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-eye"></i>
                </div>

                <div>
                    <p class="form-card-title">Vision</p>
                    <p class="form-card-subtitle">Vision card content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="vision_title">Vision Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="vision_title"
                               id="vision_title"
                               value="{{ old('vision_title', $aboutPage->vision_title) }}"
                               placeholder="Our Vision"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="vision_description">Vision Description</label>
                    <textarea name="vision_description"
                              id="vision_description"
                              rows="5"
                              placeholder="Enter vision description"
                              class="field-input">{{ old('vision_description', $aboutPage->vision_description) }}</textarea>
                </div>

                @php
                    $visionPoints = old('vision_points', $aboutPage->vision_points ?? []);
                @endphp

                @for($i = 0; $i < 3; $i++)
                    <div class="field-group">
                        <label class="field-label">Vision Point {{ $i + 1 }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-check-circle icon"></i>
                            <input type="text"
                                   name="vision_points[]"
                                   value="{{ $visionPoints[$i] ?? '' }}"
                                   placeholder="Enter vision point"
                                   class="field-input">
                        </div>
                    </div>
                @endfor

            </div>
        </div>

    </div>

    <div class="admin-form-grid mt-4">

        {{-- Purpose --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-heart"></i>
                </div>

                <div>
                    <p class="form-card-title">Purpose</p>
                    <p class="form-card-subtitle">Purpose card content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="purpose_title">Purpose Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="purpose_title"
                               id="purpose_title"
                               value="{{ old('purpose_title', $aboutPage->purpose_title) }}"
                               placeholder="Our Purpose"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="purpose_description">Purpose Description</label>
                    <textarea name="purpose_description"
                              id="purpose_description"
                              rows="5"
                              placeholder="Enter purpose description"
                              class="field-input">{{ old('purpose_description', $aboutPage->purpose_description) }}</textarea>
                </div>

                @php
                    $purposePoints = old('purpose_points', $aboutPage->purpose_points ?? []);
                @endphp

                @for($i = 0; $i < 3; $i++)
                    <div class="field-group">
                        <label class="field-label">Purpose Point {{ $i + 1 }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-check-circle icon"></i>
                            <input type="text"
                                   name="purpose_points[]"
                                   value="{{ $purposePoints[$i] ?? '' }}"
                                   placeholder="Enter purpose point"
                                   class="field-input">
                        </div>
                    </div>
                @endfor

            </div>
        </div>

        {{-- Help Box --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">CMS Help</p>
                    <p class="form-card-subtitle">Important notes</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Icons are static on frontend as requested. Only text and image are dynamic.
                    </p>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-image"></i>
                        Background image is handled using Spatie Media Library.
                    </p>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-link"></i>
                        For internal links, use values like <strong>about</strong>, <strong>volunter</strong>, <strong>contact</strong>.
                    </p>
                </div>

                @if($aboutPage->getFirstMedia('background_image'))
                    <form method="POST"
                          action="{{ route('admin.about-page.removeImage') }}"
                          class="mt-3"
                          onsubmit="return confirm('Are you sure you want to remove this image?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-ghost">
                            <i class="fas fa-trash"></i>
                            Remove Current Image
                        </button>
                    </form>
                @endif

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update About Page
        </button>

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection