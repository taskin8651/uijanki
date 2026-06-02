@extends('layouts.admin')

@section('page-title', 'View Founder Leader')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.founder-leaders.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Founder Leader Profile</h2>

        <p class="admin-page-subtitle">
            Full details for this founder, co-founder or leadership card
        </p>
    </div>

    <div class="show-actions">
        @can('founder_leader_edit')
            <a href="{{ route('admin.founder-leaders.edit', $founderLeader->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Leader
            </a>
        @endcan

        @can('founder_leader_delete')
            <form action="{{ route('admin.founder-leaders.destroy', $founderLeader->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    {{-- LEFT SIDE --}}
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">

                <img src="{{ $founderLeader->leader_image }}"
                     alt="{{ $founderLeader->name }}"
                     class="profile-avatar-lg"
                     style="object-fit: cover; border-radius: 999px;">

                <p class="profile-title">{{ $founderLeader->name ?? '—' }}</p>
                <p class="profile-subtitle">{{ $founderLeader->role_badge ?? 'Leader' }}</p>

                @if($founderLeader->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Active
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Inactive
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Leader ID</p>
                        <p class="stat-mini-value">#{{ $founderLeader->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Focus Points</p>
                        <p class="stat-mini-value">
                            {{ is_array($founderLeader->focus_points) ? count(array_filter($founderLeader->focus_points)) : 0 }}
                        </p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Featured</p>
                        <p class="stat-mini-value-sm">
                            {{ $founderLeader->is_featured ? 'Yes' : 'No' }}
                        </p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value-sm">
                            {{ $founderLeader->sort_order ?? 0 }}
                        </p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Added On</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($founderLeader->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('founder_leader_edit')
                    <a href="{{ route('admin.founder-leaders.edit', $founderLeader->id) }}" class="quick-link primary">
                        <i class="fas fa-user-edit"></i>
                        Edit Leader
                    </a>
                @endcan

                <a href="{{ route('admin.founder-leaders.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Leaders
                </a>

                @can('founder_leader_create')
                    <a href="{{ route('admin.founder-leaders.create') }}" class="quick-link">
                        <i class="fas fa-user-plus"></i>
                        Add New Leader
                    </a>
                @endcan
            </div>
        </div>
    </div>

    {{-- RIGHT SIDE --}}
    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Leader Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $founderLeader->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $founderLeader->name ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Role Badge</span>
                    <span class="detail-value">{{ $founderLeader->role_badge ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">
                        {{ $founderLeader->description ?? '—' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Featured Card</span>

                    @if($founderLeader->is_featured)
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-star text-success"></i>
                            <span class="detail-value">Yes</span>
                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-star text-warning"></i>
                            <span class="detail-value" style="color:#92400E;">No</span>
                        </div>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($founderLeader->status)
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <span class="detail-value">Active</span>
                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-exclamation-circle text-warning"></i>
                            <span class="detail-value" style="color:#92400E;">Inactive</span>
                        </div>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $founderLeader->sort_order ?? 0 }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($founderLeader->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($founderLeader->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head between">
                <div class="d-flex align-items-center gap-2">
                    <div class="detail-section-icon">
                        <i class="fas fa-list-check"></i>
                    </div>

                    <p class="detail-section-title">Focus Points</p>
                </div>

                <span class="status-pill success">
                    {{ is_array($founderLeader->focus_points) ? count(array_filter($founderLeader->focus_points)) : 0 }} added
                </span>
            </div>

            <div class="detail-section-pad-sm">
                @if(!empty($founderLeader->focus_points) && count(array_filter($founderLeader->focus_points)))
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        @foreach($founderLeader->focus_points as $point)
                            @if($point)
                                <span class="role-tag">
                                    <i class="fas fa-check-circle" style="font-size:11px; margin-right:5px;"></i>
                                    {{ $point }}
                                </span>
                            @endif
                        @endforeach
                    </div>

                    <div class="permission-summary">
                        <p class="permission-summary-title">Frontend Display Note</p>

                        <div class="d-flex flex-wrap gap-1">
                            <span class="mini-permission">Image dynamic</span>
                            <span class="mini-permission">Text dynamic</span>
                            <span class="mini-permission">Icons static</span>
                            <span class="mini-permission">Order controlled by sort order</span>
                        </div>
                    </div>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-list-check"></i>
                        </div>

                        <p class="assign-empty-title">No focus points added</p>
                        <p class="assign-empty-text">This leader card has no focus points yet.</p>

                        @can('founder_leader_edit')
                            <a href="{{ route('admin.founder-leaders.edit', $founderLeader->id) }}" class="btn-primary mt-3">
                                <i class="fas fa-plus"></i>
                                Add Focus Points
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection