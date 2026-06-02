@extends('layouts.admin')

@section('page-title', 'Add Event')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.events.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Event</h2>

        <p class="admin-page-subtitle">
            Create upcoming, ongoing or completed event
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

<form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Event Information</p>
                    <p class="form-card-subtitle">Basic event details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="event_type">Event Type <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>

                        <select name="event_type"
                                id="event_type"
                                required
                                class="field-input {{ $errors->has('event_type') ? 'error' : '' }}">
                            <option value="">Select Type</option>
                            <option value="upcoming" {{ old('event_type') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="ongoing" {{ old('event_type') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ old('event_type') == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    @if($errors->has('event_type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('event_type') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="category">Category</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="category"
                               id="category"
                               value="{{ old('category') }}"
                               placeholder="Education Awareness"
                               class="field-input {{ $errors->has('category') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               placeholder="Education Awareness & Community Welfare Drive"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="short_description">Description</label>

                    <textarea name="short_description"
                              id="short_description"
                              rows="6"
                              placeholder="Enter event description"
                              class="field-input {{ $errors->has('short_description') ? 'error' : '' }}">{{ old('short_description') }}</textarea>
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
                    <label class="field-label" for="event_image">Event Image</label>

                    <input type="file"
                           name="event_image"
                           id="event_image"
                           class="field-input {{ $errors->has('event_image') ? 'error' : '' }}">

                    <p class="field-hint">Recommended: JPG, PNG or WEBP.</p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Featured</label>

                    <label class="role-checkbox-item {{ old('is_featured') ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured') ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Make this event featured</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', 1) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', 1) ? 'checked' : '' }}>

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
                <i class="fas fa-clock"></i>
            </div>

            <div>
                <p class="form-card-title">Date, Time & Location</p>
                <p class="form-card-subtitle">Schedule and venue details</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label" for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="start_time">Start Time</label>
                    <input type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" placeholder="10:00 AM" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="end_time">End Time</label>
                    <input type="text" name="end_time" id="end_time" value="{{ old('end_time') }}" placeholder="02:00 PM" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="location">Location</label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder="Patna, Bihar" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="status_badge">Status Badge</label>
                    <input type="text" name="status_badge" id="status_badge" value="{{ old('status_badge') }}" placeholder="Running This Week" class="field-input">
                </div>

            </div>
        </div>
    </div>

    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-info-circle"></i>
            </div>

            <div>
                <p class="form-card-title">Info Items</p>
                <p class="form-card-subtitle">Small information blocks for featured event</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label">Info One Title</label>
                    <input type="text" name="info_one_title" value="{{ old('info_one_title') }}" placeholder="Open For All" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Info One Text</label>
                    <input type="text" name="info_one_text" value="{{ old('info_one_text') }}" placeholder="Community participation" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Info Two Title</label>
                    <input type="text" name="info_two_title" value="{{ old('info_two_title') }}" placeholder="Social Impact" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Info Two Text</label>
                    <input type="text" name="info_two_text" value="{{ old('info_two_text') }}" placeholder="Awareness & welfare" class="field-input">
                </div>

            </div>
        </div>
    </div>

    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-chart-line"></i>
            </div>

            <div>
                <p class="form-card-title">Progress & Impact</p>
                <p class="form-card-subtitle">Use progress for ongoing and impact for completed</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                <div class="field-group">
                    <label class="field-label">Progress %</label>
                    <input type="number" name="progress" value="{{ old('progress', 0) }}" min="0" max="100" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">People Reached</label>
                    <input type="number" name="people_reached" value="{{ old('people_reached', 0) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Families Supported</label>
                    <input type="number" name="families_supported" value="{{ old('families_supported', 0) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Youth Guided</label>
                    <input type="number" name="youth_guided" value="{{ old('youth_guided', 0) }}" class="field-input">
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
                    <input type="text" name="button_one_text" value="{{ old('button_one_text') }}" placeholder="View Event Details" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button One Link</label>
                    <input type="text" name="button_one_link" value="{{ old('button_one_link') }}" placeholder="event" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Two Text</label>
                    <input type="text" name="button_two_text" value="{{ old('button_two_text') }}" placeholder="Join Event" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Two Link</label>
                    <input type="text" name="button_two_link" value="{{ old('button_two_link') }}" placeholder="contact" class="field-input">
                </div>

            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.events.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection