@extends('layouts.admin')

@section('page-title', 'Website Services')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Website Services</h2>
        <p class="admin-page-subtitle">
            Manage dynamic website service sections shown on frontend
        </p>
    </div>

    @can('website_service_create')
        <a href="{{ route('admin.website-services.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Service
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Services</p>
        <p class="stat-value">{{ $websiteServices->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $websiteServices->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $websiteServices->where('is_featured', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $websiteServices->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Services</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-WebsiteService">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Service</th>
                    <th>Badge</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Sort</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($websiteServices as $service)
                    <tr data-entry-id="{{ $service->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $service->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <img src="{{ $service->service_image }}"
                                     alt="{{ $service->title }}"
                                     class="avatar-circle"
                                     style="object-fit: cover;">

                                <div>
                                    <p class="table-main-text">{{ $service->title ?? '—' }}</p>
                                    <p class="table-sub-text">{{ $service->highlight_title ?? 'Website Section' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $service->badge_text ?? '—' }}
                            </span>
                        </td>

                        <td>
                            @if($service->is_featured)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#374151;">Yes</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">No</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            @if($service->status)
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
                            <span class="id-text">{{ $service->sort_order ?? 0 }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('website_service_show')
                                    <a href="{{ route('admin.website-services.show', $service->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('website_service_edit')
                                    <a href="{{ route('admin.website-services.edit', $service->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('website_service_delete')
                                    <form action="{{ route('admin.website-services.destroy', $service->id) }}"
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
    initAdminDataTable('.datatable-WebsiteService', {
        canDelete: @can('website_service_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.website-services.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search services...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ services'
    });
});
</script>
@endsection