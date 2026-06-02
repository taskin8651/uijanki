@extends('layouts.admin')

@section('page-title', 'Events')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Events</h2>
        <p class="admin-page-subtitle">
            Manage upcoming, ongoing and completed events
        </p>
    </div>

    @can('event_create')
        <a href="{{ route('admin.events.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Event
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Events</p>
        <p class="stat-value">{{ $events->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Upcoming</p>
        <p class="stat-value">{{ $events->where('event_type', 'upcoming')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Ongoing</p>
        <p class="stat-value">{{ $events->where('event_type', 'ongoing')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Completed</p>
        <p class="stat-value">{{ $events->where('event_type', 'completed')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Events</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Event">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Event</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Sort</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($events as $event)
                    <tr data-entry-id="{{ $event->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $event->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <img src="{{ $event->event_image }}"
                                     alt="{{ $event->title }}"
                                     class="avatar-circle"
                                     style="object-fit: cover;">

                                <div>
                                    <p class="table-main-text">{{ $event->title ?? '—' }}</p>
                                    <p class="table-sub-text">{{ $event->location ?? 'No location' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ ucfirst($event->event_type ?? '—') }}
                            </span>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $event->category ?? '—' }}
                            </span>
                        </td>

                        <td>
                            <span style="font-size:12.5px; color:#475569;">
                                {{ optional($event->start_date)->format('d M Y') ?? '—' }}
                            </span>
                        </td>

                        <td>
                            @if($event->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#374151;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <span class="id-text">{{ $event->sort_order ?? 0 }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('event_show')
                                    <a href="{{ route('admin.events.show', $event->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('event_edit')
                                    <a href="{{ route('admin.events.edit', $event->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('event_delete')
                                    <form action="{{ route('admin.events.destroy', $event->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-Event', {
        canDelete: @can('event_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.events.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search events...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ events'
    });
});
</script>
@endsection