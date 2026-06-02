@extends('layouts.admin')

@section('page-title', 'Campaigns')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Campaigns</h2>
        <p class="admin-page-subtitle">
            Manage website donation, awareness and social impact campaigns
        </p>
    </div>

    @can('campaign_create')
        <a href="{{ route('admin.campaigns.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Campaign
        </a>
    @endcan
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Campaigns</p>
        <p class="stat-value">{{ $campaigns->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $campaigns->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $campaigns->where('is_featured', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Total Raised</p>
        <p class="stat-value">₹{{ number_format($campaigns->sum('raised_amount'), 0) }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Campaigns</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Manage frontend campaign listing
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Campaign">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Campaign</th>
                    <th>Category</th>
                    <th>Raised</th>
                    <th>Goal</th>
                    <th>Progress</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($campaigns as $campaign)
                    <tr data-entry-id="{{ $campaign->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $campaign->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div style="
                                    width:52px;
                                    height:42px;
                                    border-radius:12px;
                                    overflow:hidden;
                                    background:#f1f5f9;
                                    border:1px solid #e5e7eb;
                                    flex-shrink:0;
                                ">
                                    <img src="{{ $campaign->campaign_image }}"
                                         alt="{{ $campaign->title }}"
                                         style="width:100%;height:100%;object-fit:cover;">
                                </div>

                                <div>
                                    <p class="table-main-text">
                                        {{ $campaign->title }}
                                    </p>

                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($campaign->short_description), 55) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($campaign->category)
                                <div class="tag-wrap">
                                    <span class="role-tag">{{ $campaign->category }}</span>
                                </div>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td style="color:#475569;">
                            ₹{{ number_format($campaign->raised_amount, 0) }}
                        </td>

                        <td style="color:#475569;">
                            ₹{{ number_format($campaign->goal_amount, 0) }}
                        </td>

                        <td>
                            <div style="min-width:130px;">
                                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px;">
                                    <span style="font-size:12.5px;font-weight:800;color:#0f172a;">
                                        {{ $campaign->progress_percentage }}%
                                    </span>

                                    @if($campaign->is_featured)
                                        <span style="font-size:11px;font-weight:800;color:#2563eb;">
                                            Featured
                                        </span>
                                    @endif
                                </div>

                                <div style="height:7px;background:#e5e7eb;border-radius:999px;overflow:hidden;">
                                    <span style="
                                        display:block;
                                        width:{{ $campaign->progress_percentage }}%;
                                        height:100%;
                                        border-radius:999px;
                                        background:linear-gradient(90deg,#2563eb,#14b8a6);
                                    "></span>
                                </div>
                            </div>
                        </td>

                       

                        <td>
                            @if($campaign->status)
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
                                @can('campaign_show')
                                    <a href="{{ route('frontend.campaigns.show', $campaign->id) }}"
                                       target="_blank"
                                       class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('campaign_edit')
                                    <a href="{{ route('admin.campaigns.edit', $campaign->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('campaign_delete')
                                    <form action="{{ route('admin.campaigns.destroy', $campaign->id) }}"
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
    initAdminDataTable('.datatable-Campaign', {
        canDelete: @can('campaign_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.campaigns.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search campaigns...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ campaigns'
    });
});
</script>
@endsection