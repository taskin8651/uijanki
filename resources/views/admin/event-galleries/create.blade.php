@extends('layouts.admin')

@section('page-title', 'Create Event Gallery')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.event-galleries.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Create Event Gallery</h2>

        <p class="admin-page-subtitle">
            Connect gallery media with an event
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

<form method="POST" action="{{ route('admin.event-galleries.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Event Selection</p>
                    <p class="form-card-subtitle">Album content will use selected event title and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="event_id">
                        Select Event <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-alt icon"></i>

                        <select name="event_id" id="event_id" required class="field-input">
                            <option value="">Select Event</option>

                            @foreach($events as $event)
                                <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
                                    {{ $event->title }} — {{ ucfirst($event->event_type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <p class="field-hint">One event can have one gallery album.</p>
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
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item checked">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               checked>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="form-card-title">Gallery Images</p>
                    <p class="form-card-subtitle">Upload multiple photos for selected event</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="gallery_images">Upload Images</label>

                    <input type="file"
                           name="gallery_images[]"
                           id="gallery_images"
                           accept="image/*"
                           multiple
                           class="field-input">

                    <p class="field-hint">You can select many images together. JPG, PNG, WEBP allowed.</p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-play-circle"></i>
            </div>

            <div>
                <p class="form-card-title">Video Links</p>
                <p class="form-card-subtitle">Add YouTube or Vimeo links</p>
            </div>
        </div>

        <div class="form-card-body">

            <div id="video-url-wrapper">
                <div class="field-group video-url-item">
                    <label class="field-label">Video URL</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text"
                               name="video_urls[]"
                               value=""
                               class="field-input"
                               placeholder="https://www.youtube.com/watch?v=...">
                    </div>
                </div>
            </div>

            <button type="button" class="btn-ghost mt-2" id="add-video-url">
                <i class="fas fa-plus"></i>
                Add More Video
            </button>

        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.event-galleries.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection

@section('scripts')
@parent
<script>
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.getElementById('video-url-wrapper');
    const addBtn = document.getElementById('add-video-url');

    addBtn.addEventListener('click', function () {
        const item = document.createElement('div');
        item.className = 'field-group video-url-item';

        item.innerHTML = `
            <label class="field-label">Video URL</label>
            <div class="input-icon-wrap">
                <i class="fas fa-link icon"></i>
                <input type="text"
                       name="video_urls[]"
                       class="field-input"
                       placeholder="https://www.youtube.com/watch?v=...">
            </div>
            <button type="button" class="btn-ghost mt-2 remove-video-url">
                <i class="fas fa-trash"></i>
                Remove
            </button>
        `;

        wrapper.appendChild(item);
    });

    wrapper.addEventListener('click', function (e) {
        if (e.target.closest('.remove-video-url')) {
            e.target.closest('.video-url-item').remove();
        }
    });
});
</script>
@endsection