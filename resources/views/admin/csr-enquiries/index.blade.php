@extends('layouts.admin')

@section('page-title', 'CSR Enquiries')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">CSR Enquiries</h2>
        <p class="admin-page-subtitle">Manage CSR partnership enquiries</p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Enquiries</p>
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
        <p class="stat-label">Today</p>
        <p class="stat-value">{{ $enquiries->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All CSR Enquiries</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Latest enquiries from frontend
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-CsrEnquiry">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Company</th>
                    <th>Contact</th>
                    <th>Focus Area</th>
                    <th>Budget</th>
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
                            <p class="table-main-text">{{ $enquiry->company_name }}</p>
                            <p class="table-sub-text">{{ $enquiry->city }}</p>
                        </td>

                        <td>
                            <p class="table-main-text">{{ $enquiry->contact_person }}</p>
                            <p class="table-sub-text">{{ $enquiry->phone }}</p>
                        </td>

                        <td>{{ $enquiry->focus_area }}</td>
                        <td>{{ $enquiry->budget_range }}</td>

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
                                <a href="{{ route('admin.csr-enquiries.show', $enquiry->id) }}" class="action-btn view">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <form action="{{ route('admin.csr-enquiries.destroy', $enquiry->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="action-btn delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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
    initAdminDataTable('.datatable-CsrEnquiry', {
        canDelete: true,
        massDeleteUrl: "{{ route('admin.csr-enquiries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search CSR enquiries...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ enquiries'
    });
});
</script>
@endsection