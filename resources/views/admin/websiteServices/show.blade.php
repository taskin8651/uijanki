@extends('layouts.admin')

@section('page-title', 'View Website Service')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.website-services.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Website Service Details</h2>

        <p class="admin-page-subtitle">
            Full details for this dynamic frontend service section
        </p>
    </div>

    <div class="show-actions">
        @can('website_service_edit')
            <a href="{{ route('admin.website-services.edit', $websiteService->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Service
            </a>
        @endcan

        @can('website_service_delete')
            <form action="{{ route('admin.website-services.destroy', $websiteService->id) }}"
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

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <img src="{{ $websiteService->service_image }}"
                     alt="{{ $websiteService->title }}"
                     class="profile-avatar-lg"
                     style="object-fit: cover; border-radius: 24px;">

                <p class="profile-title">{{ $websiteService->title ?? '—' }}</p>
                <p class="profile-subtitle">{{ $websiteService->badge_text ?? 'Website Service' }}</p>

                @if($websiteService->status)
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
                        <p class="stat-mini-label">Service ID</p>
                        <p class="stat-mini-value">#{{ $websiteService->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Featured</p>
                        <p class="stat-mini-value-sm">{{ $websiteService->is_featured ? 'Yes' : 'No' }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value-sm">{{ $websiteService->sort_order ?? 0 }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Status</p>
                        <p class="stat-mini-value-sm">{{ $websiteService->status ? 'Active' : 'Inactive' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('website_service_edit')
                    <a href="{{ route('admin.website-services.edit', $websiteService->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Service
                    </a>
                @endcan

                <a href="{{ route('admin.website-services.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Services
                </a>

                @can('website_service_create')
                    <a href="{{ route('admin.website-services.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Service
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Main Content</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $websiteService->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Badge</span>
                    <span class="detail-value">{{ $websiteService->badge_text ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $websiteService->title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Highlight Title</span>
                    <span class="detail-value">{{ $websiteService->highlight_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $websiteService->description ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($websiteService->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($websiteService->updated_at)->format('d M Y, H:i') ?? '-' }}
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

                    <p class="detail-section-title">Section Points</p>
                </div>
            </div>

            <div class="detail-section-pad-sm">
                <div class="permission-summary">
                    <p class="permission-summary-title">{{ $websiteService->point_one_title ?? 'Point 1' }}</p>
                    <p>{{ $websiteService->point_one_text ?? '—' }}</p>
                </div>

                <div class="permission-summary mt-3">
                    <p class="permission-summary-title">{{ $websiteService->point_two_title ?? 'Point 2' }}</p>
                    <p>{{ $websiteService->point_two_text ?? '—' }}</p>
                </div>

                <div class="permission-summary mt-3">
                    <p class="permission-summary-title">{{ $websiteService->point_three_title ?? 'Point 3' }}</p>
                    <p>{{ $websiteService->point_three_text ?? '—' }}</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection