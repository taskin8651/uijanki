@extends('layouts.admin')

@section('page-title', 'Partner Enquiries')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Partner Enquiries</h2>
        <p class="admin-page-subtitle">Manage partner and collaboration enquiries</p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total</p>
        <p class="stat-value">{{ $enquiries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Unread</p>
        <p class="stat-value">{{ $enquiries->where('is_read', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Read</p>
        <p class="stat-value">{{ $enquiries->where('is_read', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">With Attachment</p>
        <p class="stat-value">{{ $enquiries->whereNotNull('attachment')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Partner Enquiries</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Frontend partner form submissions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-PartnerEnquiry">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Person</th>
                    <th>Organization</th>
                    <th>Partner Type</th>
                    <th>City</th>
                    <th>Attachment</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($enquiries as $enquiry)
                    <tr data-entry-id="{{ $enquiry->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $enquiry->id }}</span></td>

                        <td>
                            <p class="table-main-text">{{ $enquiry->name }}</p>
                            <p class="table-sub-text">{{ $enquiry->phone }}</p>
                        </td>

                        <td>
                            <p class="table-main-text">{{ $enquiry->organization_name }}</p>
                            <p class="table-sub-text">{{ $enquiry->email }}</p>
                        </td>

                        <td>{{ $enquiry->partner_type }}</td>
                        <td>{{ $enquiry->city }}</td>

                        <td>
                            @if($enquiry->attachment_url)
                                <a href="{{ $enquiry->attachment_url }}" target="_blank" class="status-dot active">
                                    View
                                </a>
                            @else
                                <span class="status-dot inactive">No File</span>
                            @endif
                        </td>

                        <td>
                            @if($enquiry->is_read)
                                <span class="status-dot active">Read</span>
                            @else
                                <span class="status-dot inactive">Unread</span>
                            @endif
                        </td>

                        <td>{{ $enquiry->created_at?->format('d M Y') }}</td>

                        <td>
                            <div class="action-row">
                                @can('partner_enquiry_show')
                                    <a href="{{ route('admin.partner-enquiries.show', $enquiry->id) }}" class="action-btn view">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endcan

                                @can('partner_enquiry_delete')
                                    <form action="{{ route('admin.partner-enquiries.destroy', $enquiry->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete">
                                            <i class="fas fa-trash"></i>
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
    initAdminDataTable('.datatable-PartnerEnquiry', {
        canDelete: @can('partner_enquiry_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.partner-enquiries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search partner enquiries...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ enquiries'
    });
});
</script>
@endsection