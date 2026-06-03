@extends('layouts.admin')

@section('page-title', 'CSR Partners')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">CSR Partners</h2>
        <p class="admin-page-subtitle">Manage CSR partner logos and approval status</p>
    </div>

    <a href="{{ route('admin.csr-partners.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Partner
    </a>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Partners</p>
        <p class="stat-value">{{ $partners->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Approved</p>
        <p class="stat-value">{{ $partners->where('approval_status', 'approved')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Pending</p>
        <p class="stat-value">{{ $partners->where('approval_status', 'pending')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $partners->where('status', 1)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All CSR Partners</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Approved partner logos will show on frontend
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-CsrPartner">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Title</th>
                    <th>Approval</th>
                    <th>Status</th>
                    <th>Sort</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($partners as $partner)
                    <tr data-entry-id="{{ $partner->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $partner->id }}</span>
                        </td>

                        <td>
                            <div style="width:70px;height:50px;border-radius:12px;overflow:hidden;background:#f8fafc;border:1px solid #e5e7eb;">
                                <img src="{{ $partner->partner_logo }}" alt="{{ $partner->title }}" style="width:100%;height:100%;object-fit:contain;padding:6px;">
                            </div>
                        </td>

                        <td>
                            <p class="table-main-text">{{ $partner->title }}</p>
                            <p class="table-sub-text">
                                {{ \Illuminate\Support\Str::limit($partner->short_description, 55) }}
                            </p>
                        </td>

                        <td>
                            @if($partner->approval_status === 'approved')
                                <span class="status-dot active">Approved</span>
                            @else
                                <span class="status-dot inactive">Pending</span>
                            @endif
                        </td>

                        <td>
                            @if($partner->status)
                                <span class="status-dot active">Active</span>
                            @else
                                <span class="status-dot inactive">Inactive</span>
                            @endif
                        </td>

                        <td>{{ $partner->sort_order }}</td>

                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.csr-partners.edit', $partner->id) }}" class="action-btn edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.csr-partners.destroy', $partner->id) }}"
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
    initAdminDataTable('.datatable-CsrPartner', {
        canDelete: true,
        massDeleteUrl: "{{ route('admin.csr-partners.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search CSR partners...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ partners'
    });
});
</script>
@endsection