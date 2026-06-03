@extends('layouts.admin')

@section('page-title', 'Hero Sliders')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Hero Sliders</h2>
        <p class="admin-page-subtitle">
            Manage homepage hero slider images, alt text and sorting
        </p>
    </div>

    @can('hero_slider_create')
        <a href="{{ route('admin.hero-sliders.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Hero Slider
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
        <p class="stat-label">Total Sliders</p>
        <p class="stat-value">{{ $sliders->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $sliders->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $sliders->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $sliders->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Hero Sliders</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-HeroSlider">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Alt Text</th>
                    <th>Sort Order</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($sliders as $slider)
                    <tr data-entry-id="{{ $slider->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $slider->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div style="width:92px;height:62px;border-radius:14px;overflow:hidden;background:#f8fafc;border:1px solid #e5e7eb;box-shadow:0 10px 24px rgba(15,23,42,.08);">
                                    <img src="{{ $slider->slider_image }}"
                                         alt="{{ $slider->alt_text ?? $slider->title ?? 'Hero Slider' }}"
                                         style="width:100%;height:100%;object-fit:cover;">
                                </div>

                                <div>
                                    <p class="table-main-text">
                                        Slide Image
                                    </p>
                                    <p class="table-sub-text">
                                        Homepage hero
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <p class="table-main-text">
                                {{ $slider->title ?? 'Hero Slider' }}
                            </p>
                            <p class="table-sub-text">
                                Sort: {{ $slider->sort_order ?? 0 }}
                            </p>
                        </td>

                        <td style="color:#475569;">
                            {{ \Illuminate\Support\Str::limit($slider->alt_text ?? '-', 50) }}
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $slider->sort_order ?? 0 }}
                            </span>
                        </td>

                        <td>
                            @if($slider->status)
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
                            <span style="font-size:12.5px; color:#475569;">
                                {{ $slider->created_at?->format('d M Y') }}
                            </span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('hero_slider_edit')
                                    <a href="{{ route('admin.hero-sliders.edit', $slider->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('hero_slider_delete')
                                    <form action="{{ route('admin.hero-sliders.destroy', $slider->id) }}"
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
    initAdminDataTable('.datatable-HeroSlider', {
        canDelete: @can('hero_slider_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.hero-sliders.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search hero sliders...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ sliders'
    });
});
</script>
@endsection