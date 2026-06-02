@extends('layouts.admin')

@section('page-title', 'View Event')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.events.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Event Details</h2>

        <p class="admin-page-subtitle">
            Full details for selected event
        </p>
    </div>

    <div class="show-actions">
        @can('event_edit')
            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Event
            </a>
        @endcan

        @can('event_delete')
            <form action="{{ route('admin.events.destroy', $event->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <img src="{{ $event->event_image }}"
                     alt="{{ $event->title }}"
                     class="profile-avatar-lg"
                     style="object-fit: cover; border-radius: 24px;">

                <p class="profile-title">{{ $event->title ?? '—' }}</p>
                <p class="profile-subtitle">{{ ucfirst($event->event_type ?? 'Event') }}</p>

                @if($event->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Active
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Inactive
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Event ID</p>
                        <p class="stat-mini-value">#{{ $event->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Type</p>
                        <p class="stat-mini-value-sm">{{ ucfirst($event->event_type ?? '—') }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Progress</p>
                        <p class="stat-mini-value-sm">{{ $event->progress ?? 0 }}%</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value-sm">{{ $event->sort_order ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('event_edit')
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Event
                    </a>
                @endcan

                <a href="{{ route('admin.events.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Events
                </a>

                @can('event_create')
                    <a href="{{ route('admin.events.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Event
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <p class="detail-section-title">Event Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $event->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $event->title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Category</span>
                    <span class="detail-value">{{ $event->category ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Location</span>
                    <span class="detail-value">{{ $event->location ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Start Date</span>
                    <span class="detail-value">{{ optional($event->start_date)->format('d M Y') ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">End Date</span>
                    <span class="detail-value">{{ optional($event->end_date)->format('d M Y') ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Time</span>
                    <span class="detail-value">{{ $event->start_time ?? '—' }} - {{ $event->end_time ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $event->short_description ?? '—' }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <p class="detail-section-title">Impact & CTA</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">People Reached</span>
                    <span class="detail-value">{{ $event->people_reached ?? 0 }}+</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Families Supported</span>
                    <span class="detail-value">{{ $event->families_supported ?? 0 }}+</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Youth Guided</span>
                    <span class="detail-value">{{ $event->youth_guided ?? 0 }}+</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Button 1</span>
                    <span class="detail-value">{{ $event->button_one_text ?? '—' }} / {{ $event->button_one_link ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Button 2</span>
                    <span class="detail-value">{{ $event->button_two_text ?? '—' }} / {{ $event->button_two_link ?? '—' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection