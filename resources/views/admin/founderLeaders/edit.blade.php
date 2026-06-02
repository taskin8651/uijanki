@extends('layouts.admin')

@section('page-title', 'Edit Founder Leader')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.founder-leaders.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            Edit Founder Leader
        </h2>

        <p class="admin-page-subtitle">
            Update founder, co-founder or leader card information
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.founder-leaders.update', $founderLeader->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- LEFT CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <div>
                    <p class="form-card-title">Leader Information</p>
                    <p class="form-card-subtitle">Basic profile and role details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="role_badge">
                        Role Badge <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-id-badge icon"></i>

                        <input type="text"
                               name="role_badge"
                               id="role_badge"
                               value="{{ old('role_badge', $founderLeader->role_badge) }}"
                               required
                               placeholder="Founder / Co-Founder"
                               class="field-input {{ $errors->has('role_badge') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('role_badge'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('role_badge') }}
                        </p>
                    @else
                        <p class="field-hint">Example: Founder, Co-Founder, Director</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="name">
                        Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $founderLeader->name) }}"
                               required
                               placeholder="Mr. Pankaj Kumar"
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">
                        Description <span class="req">*</span>
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="6"
                              required
                              placeholder="Enter short leader description"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $founderLeader->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @else
                        <p class="field-hint">This text will appear on frontend leader card.</p>
                    @endif
                </div>

            </div>
        </div>

        {{-- RIGHT CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image & Settings</p>
                    <p class="form-card-subtitle">Upload leader image and control display</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="leader_image">
                        Leader Image
                    </label>

                    <input type="file"
                           name="leader_image"
                           id="leader_image"
                           class="field-input {{ $errors->has('leader_image') ? 'error' : '' }}">

                    @if($errors->has('leader_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('leader_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-image"></i>
                            Leave empty if you do not want to change image.
                        </p>
                    @endif

                    @if($founderLeader->getFirstMedia('leader_image'))
                        <div class="mt-3">
                            <img src="{{ $founderLeader->leader_image }}"
                                 alt="{{ $founderLeader->name }}"
                                 style="width: 180px; height: 130px; object-fit: cover; border-radius: 14px; border: 1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $founderLeader->sort_order) }}"
                               placeholder="0"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @else
                        <p class="field-hint">Lower number will show first.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Featured Card
                    </label>

                    <label class="role-checkbox-item {{ old('is_featured', $founderLeader->is_featured) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured', $founderLeader->is_featured) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Make this card featured</span>
                    </label>

                    <p class="field-hint">
                        Featured card will get special frontend design class.
                    </p>
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Status
                    </label>

                    <label class="role-checkbox-item {{ old('status', $founderLeader->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $founderLeader->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Active</span>
                    </label>

                    <p class="field-hint">
                        Only active leaders will show on frontend.
                    </p>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Icons are static on frontend. Only image, text and order are dynamic.
                    </p>
                </div>

                @if($founderLeader->getFirstMedia('leader_image'))
                    <form method="POST"
                          action="{{ route('admin.founder-leaders.removeImage', $founderLeader->id) }}"
                          class="mt-3"
                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-ghost">
                            <i class="fas fa-trash"></i>
                            Remove Current Image
                        </button>
                    </form>
                @endif

            </div>
        </div>

    </div>

    {{-- FOCUS POINTS --}}
    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-list-check"></i>
            </div>

            <div>
                <p class="form-card-title">Focus Points</p>
                <p class="form-card-subtitle">Add short points shown below leader description</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">

                @php
                    $focusPoints = old('focus_points', $founderLeader->focus_points ?? []);
                @endphp

                @for($i = 0; $i < 3; $i++)
                    <div class="field-group">
                        <label class="field-label" for="focus_point_{{ $i }}">
                            Focus Point {{ $i + 1 }}
                        </label>

                        <div class="input-icon-wrap">
                            <i class="fas fa-check-circle icon"></i>

                            <input type="text"
                                   name="focus_points[]"
                                   id="focus_point_{{ $i }}"
                                   value="{{ $focusPoints[$i] ?? '' }}"
                                   placeholder="Education Support"
                                   class="field-input {{ $errors->has('focus_points.' . $i) ? 'error' : '' }}">
                        </div>

                        @if($errors->has('focus_points.' . $i))
                            <p class="field-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first('focus_points.' . $i) }}
                            </p>
                        @endif
                    </div>
                @endfor

            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.founder-leaders.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection