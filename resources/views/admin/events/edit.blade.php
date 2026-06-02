@extends('layouts.admin')

@section('page-title', 'Edit Event')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.events.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Event</h2>

        <p class="admin-page-subtitle">
            Update event details and frontend display content
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

<form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

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
                            <option value="upcoming" {{ old('event_type', $event->event_type) == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="ongoing" {{ old('event_type', $event->event_type) == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ old('event_type', $event->event_type) == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="category">Category</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="category" id="category" value="{{ old('category', $event->category) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="short_description">Description</label>
                    <textarea name="short_description" id="short_description" rows="6" class="field-input">{{ old('short_description', $event->short_description) }}</textarea>
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

                    <input type="file" name="event_image" id="event_image" class="field-input">

                    <p class="field-hint">Leave empty if you do not want to change image.</p>

                    @if($event->getFirstMedia('event_image'))
                        <div class="mt-3">
                            <img src="{{ $event->event_image }}"
                                 alt="{{ $event->title }}"
                                 style="width: 180px; height: 130px; object-fit: cover; border-radius: 14px; border: 1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $event->sort_order) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Featured</label>

                    <label class="role-checkbox-item {{ old('is_featured', $event->is_featured) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured', $event->is_featured) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Make this event featured</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $event->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $event->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

                @if($event->getFirstMedia('event_image'))
                    <form method="POST"
                          action="{{ route('admin.events.removeImage', $event->id) }}"
                          class="mt-3"
                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
                    <label class="field-label">Start Date</label>
                    <input type="date" name="start_date" value="{{ old('start_date', optional($event->start_date)->format('Y-m-d')) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">End Date</label>
                    <input type="date" name="end_date" value="{{ old('end_date', optional($event->end_date)->format('Y-m-d')) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Start Time</label>
                    <input type="text" name="start_time" value="{{ old('start_time', $event->start_time) }}" placeholder="10:00 AM" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">End Time</label>
                    <input type="text" name="end_time" value="{{ old('end_time', $event->end_time) }}" placeholder="02:00 PM" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Location</label>
                    <input type="text" name="location" value="{{ old('location', $event->location) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Status Badge</label>
                    <input type="text" name="status_badge" value="{{ old('status_badge', $event->status_badge) }}" class="field-input">
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
                    <input type="text" name="info_one_title" value="{{ old('info_one_title', $event->info_one_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Info One Text</label>
                    <input type="text" name="info_one_text" value="{{ old('info_one_text', $event->info_one_text) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Info Two Title</label>
                    <input type="text" name="info_two_title" value="{{ old('info_two_title', $event->info_two_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Info Two Text</label>
                    <input type="text" name="info_two_text" value="{{ old('info_two_text', $event->info_two_text) }}" class="field-input">
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
                    <input type="number" name="progress" value="{{ old('progress', $event->progress) }}" min="0" max="100" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">People Reached</label>
                    <input type="number" name="people_reached" value="{{ old('people_reached', $event->people_reached) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Families Supported</label>
                    <input type="number" name="families_supported" value="{{ old('families_supported', $event->families_supported) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Youth Guided</label>
                    <input type="number" name="youth_guided" value="{{ old('youth_guided', $event->youth_guided) }}" class="field-input">
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
                    <input type="text" name="button_one_text" value="{{ old('button_one_text', $event->button_one_text) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button One Link</label>
                    <input type="text" name="button_one_link" value="{{ old('button_one_link', $event->button_one_link) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Two Text</label>
                    <input type="text" name="button_two_text" value="{{ old('button_two_text', $event->button_two_text) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Two Link</label>
                    <input type="text" name="button_two_link" value="{{ old('button_two_link', $event->button_two_link) }}" class="field-input">
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