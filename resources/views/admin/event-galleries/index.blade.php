@extends('layouts.admin')

@section('page-title', 'Event Gallery')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Event Gallery</h2>
        <p class="admin-page-subtitle">
            Manage event-wise photo and video albums
        </p>
    </div>

    @can('gallery_create')
        <a href="{{ route('admin.event-galleries.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Gallery
        </a>
    @endcan
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Albums</p>
        <p class="stat-value">{{ $galleries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active Albums</p>
        <p class="stat-value">{{ $galleries->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Total Photos</p>
        <p class="stat-value">{{ $galleries->sum('photo_count') }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Total Videos</p>
        <p class="stat-value">{{ $galleries->sum('video_count') }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Event Albums</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Event title and description are shown from event records
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-EventGallery">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Album</th>
                    <th>Event Type</th>
                    <th>Photos</th>
                    <th>Videos</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($galleries as $gallery)
                    <tr data-entry-id="{{ $gallery->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $gallery->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div style="width:52px;height:42px;border-radius:12px;overflow:hidden;background:#f1f5f9;border:1px solid #e5e7eb;flex-shrink:0;">
                                    <img src="{{ $gallery->cover_image }}"
                                         alt="{{ $gallery->event?->title }}"
                                         style="width:100%;height:100%;object-fit:cover;">
                                </div>

                                <div>
                                    <p class="table-main-text">
                                        {{ $gallery->event?->title ?? 'No Event' }}
                                    </p>

                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($gallery->event?->short_description), 55) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="tag-wrap">
                                <span class="role-tag">{{ $gallery->event?->event_type ?? '—' }}</span>
                                @if($gallery->event?->category)
                                    <span class="role-tag">{{ $gallery->event->category }}</span>
                                @endif
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $gallery->photo_count }}
                        </td>

                        <td style="color:#475569;">
                            {{ $gallery->video_count }}
                        </td>

                        <td>
                            @if($gallery->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#047857;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('gallery_show')
                                    <a href="{{ route('frontend.gallery.show', $gallery->id) }}"
                                       target="_blank"
                                       class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('gallery_edit')
                                    <a href="{{ route('admin.event-galleries.edit', $gallery->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('gallery_delete')
                                    <form action="{{ route('admin.event-galleries.destroy', $gallery->id) }}"
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
    initAdminDataTable('.datatable-EventGallery', {
        canDelete: @can('gallery_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.event-galleries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search galleries...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ galleries'
    });
});
</script>
@endsection