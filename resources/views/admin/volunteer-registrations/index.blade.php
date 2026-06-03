@extends('layouts.admin')

@section('page-title', 'Volunteer Registrations')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Volunteer Registrations</h2>
        <p class="admin-page-subtitle">Manage volunteer registration requests</p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total</p>
        <p class="stat-value">{{ $registrations->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Unread</p>
        <p class="stat-value">{{ $registrations->where('is_read', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Read</p>
        <p class="stat-value">{{ $registrations->where('is_read', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">{{ $registrations->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Volunteer Registrations</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Frontend volunteer form submissions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-VolunteerRegistration">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th>Interest Area</th>
                    <th>Availability</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($registrations as $registration)
                    <tr data-entry-id="{{ $registration->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $registration->id }}</span></td>

                        <td>
                            <p class="table-main-text">{{ $registration->name }}</p>
                            <p class="table-sub-text">{{ $registration->email }}</p>
                        </td>

                        <td>{{ $registration->mobile }}</td>
                        <td>{{ $registration->city }}</td>
                        <td>{{ $registration->interest_area }}</td>
                        <td>{{ $registration->availability }}</td>

                        <td>
                            @if($registration->is_read)
                                <span class="status-dot active">Read</span>
                            @else
                                <span class="status-dot inactive">Unread</span>
                            @endif
                        </td>

                        <td>{{ $registration->created_at?->format('d M Y') }}</td>

                        <td>
                            <div class="action-row">
                                @can('volunteer_registration_show')
                                    <a href="{{ route('admin.volunteer-registrations.show', $registration->id) }}" class="action-btn view">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endcan

                                @can('volunteer_registration_delete')
                                    <form action="{{ route('admin.volunteer-registrations.destroy', $registration->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display:inline-block;">
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
    initAdminDataTable('.datatable-VolunteerRegistration', {
        canDelete: @can('volunteer_registration_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.volunteer-registrations.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search volunteer registrations...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ registrations'
    });
});
</script>
@endsection