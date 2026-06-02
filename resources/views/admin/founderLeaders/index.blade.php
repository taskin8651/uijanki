@extends('layouts.admin')

@section('page-title', 'Founder Leaders')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Founder Leaders</h2>
        <p class="admin-page-subtitle">
            Manage founder, co-founder and leadership cards shown on frontend
        </p>
    </div>

    @can('founder_leader_create')
        <a href="{{ route('admin.founder-leaders.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Leader
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Leaders</p>
        <p class="stat-value">{{ $founderLeaders->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $founderLeaders->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $founderLeaders->where('is_featured', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $founderLeaders->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Founder Leaders</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-FounderLeader">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Leader</th>
                    <th>Role</th>
                    <th>Focus Points</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Sort</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($founderLeaders as $leader)
                    <tr data-entry-id="{{ $leader->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $leader->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <img src="{{ $leader->leader_image }}"
                                     alt="{{ $leader->name }}"
                                     class="avatar-circle"
                                     style="object-fit: cover;">

                                <div>
                                    <p class="table-main-text">{{ $leader->name ?? '—' }}</p>
                                    <p class="table-sub-text">Leadership Member</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $leader->role_badge ?? '—' }}
                            </span>
                        </td>

                        <td>
                            <div class="tag-wrap">
                                @forelse(($leader->focus_points ?? []) as $point)
                                    @if($point)
                                        <span class="role-tag">{{ $point }}</span>
                                    @endif
                                @empty
                                    <span style="font-size:12px; color:#94A3B8;">—</span>
                                @endforelse
                            </div>
                        </td>

                        <td>
                            @if($leader->is_featured)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#374151;">
                                        Yes
                                    </span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">
                                        No
                                    </span>
                                </div>
                            @endif
                        </td>

                        <td>
                            @if($leader->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#374151;">
                                        Active
                                    </span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">
                                        Inactive
                                    </span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <span class="id-text">{{ $leader->sort_order ?? 0 }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('founder_leader_show')
                                    <a href="{{ route('admin.founder-leaders.show', $leader->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('founder_leader_edit')
                                    <a href="{{ route('admin.founder-leaders.edit', $leader->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('founder_leader_delete')
                                    <form action="{{ route('admin.founder-leaders.destroy', $leader->id) }}"
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
    initAdminDataTable('.datatable-FounderLeader', {
        canDelete: @can('founder_leader_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.founder-leaders.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search founder leaders...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ leaders'
    });
});
</script>
@endsection