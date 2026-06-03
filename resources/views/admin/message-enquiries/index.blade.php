@extends('layouts.admin')

@section('page-title', 'Message Enquiries')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Message Enquiries</h2>
        <p class="admin-page-subtitle">Manage message form submissions</p>
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
        <p class="stat-label">Today</p>
        <p class="stat-value">{{ $enquiries->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Message Enquiries</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Frontend message form submissions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-MessageEnquiry">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Message Type</th>
                    <th>Preferred Contact</th>
                    <th>Message</th>
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
                        <td>{{ $enquiry->message_type }}</td>
                        <td>{{ $enquiry->preferred_contact }}</td>

                        <td>
                            <p class="table-sub-text">
                                {{ \Illuminate\Support\Str::limit($enquiry->message, 70) }}
                            </p>
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
                                @can('message_enquiry_show')
                                    <a href="{{ route('admin.message-enquiries.show', $enquiry->id) }}" class="action-btn view">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endcan

                                @can('message_enquiry_delete')
                                    <form action="{{ route('admin.message-enquiries.destroy', $enquiry->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display:inline-block;">
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
    initAdminDataTable('.datatable-MessageEnquiry', {
        canDelete: @can('message_enquiry_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.message-enquiries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search messages...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ messages'
    });
});
</script>
@endsection