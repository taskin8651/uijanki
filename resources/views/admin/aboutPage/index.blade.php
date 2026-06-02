@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        About Page CMS
    </div>

    <div class="card-body">

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.about-page.update') }}" enctype="multipart/form-data">
            @csrf

            <h5 class="mb-3">NGO Background Section</h5>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Section Badge</label>
                    <input type="text" name="section_badge" class="form-control"
                           value="{{ old('section_badge', $aboutPage->section_badge) }}">
                </div>

                <div class="form-group col-md-4">
                    <label>Floating Title</label>
                    <input type="text" name="floating_title" class="form-control"
                           value="{{ old('floating_title', $aboutPage->floating_title) }}">
                </div>

                <div class="form-group col-md-4">
                    <label>Floating Subtitle</label>
                    <input type="text" name="floating_subtitle" class="form-control"
                           value="{{ old('floating_subtitle', $aboutPage->floating_subtitle) }}">
                </div>

                <div class="form-group col-md-4">
                    <label>Image Badge Text</label>
                    <input type="text" name="image_badge" class="form-control"
                           value="{{ old('image_badge', $aboutPage->image_badge) }}">
                </div>

                <div class="form-group col-md-4">
                    <label>Heading</label>
                    <input type="text" name="heading" class="form-control"
                           value="{{ old('heading', $aboutPage->heading) }}">
                </div>

                <div class="form-group col-md-4">
                    <label>Highlight Heading</label>
                    <input type="text" name="highlight_heading" class="form-control"
                           value="{{ old('highlight_heading', $aboutPage->highlight_heading) }}">
                </div>

                <div class="form-group col-md-6">
                    <label>Description One</label>
                    <textarea name="description_one" class="form-control" rows="5">{{ old('description_one', $aboutPage->description_one) }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label>Description Two</label>
                    <textarea name="description_two" class="form-control" rows="5">{{ old('description_two', $aboutPage->description_two) }}</textarea>
                </div>

                <div class="form-group col-md-4">
                    <label>Background Image</label>
                    <input type="file" name="background_image" class="form-control">

                    @if($aboutPage->getFirstMedia('background_image'))
                        <div class="mt-2">
                            <img src="{{ $aboutPage->background_image }}" style="width: 140px; height: 90px; object-fit: cover; border-radius: 8px;">
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-4">
                    <label>Status</label>
                    <div class="form-check mt-2">
                        <input type="checkbox" name="status" value="1" class="form-check-input"
                               {{ old('status', $aboutPage->status) ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>
            </div>

            <hr>

            <h5 class="mb-3">Background Points</h5>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Point 1 Title</label>
                    <input type="text" name="point_one_title" class="form-control"
                           value="{{ old('point_one_title', $aboutPage->point_one_title) }}">
                </div>

                <div class="form-group col-md-8">
                    <label>Point 1 Text</label>
                    <input type="text" name="point_one_text" class="form-control"
                           value="{{ old('point_one_text', $aboutPage->point_one_text) }}">
                </div>

                <div class="form-group col-md-4">
                    <label>Point 2 Title</label>
                    <input type="text" name="point_two_title" class="form-control"
                           value="{{ old('point_two_title', $aboutPage->point_two_title) }}">
                </div>

                <div class="form-group col-md-8">
                    <label>Point 2 Text</label>
                    <input type="text" name="point_two_text" class="form-control"
                           value="{{ old('point_two_text', $aboutPage->point_two_text) }}">
                </div>

                <div class="form-group col-md-4">
                    <label>Point 3 Title</label>
                    <input type="text" name="point_three_title" class="form-control"
                           value="{{ old('point_three_title', $aboutPage->point_three_title) }}">
                </div>

                <div class="form-group col-md-8">
                    <label>Point 3 Text</label>
                    <input type="text" name="point_three_text" class="form-control"
                           value="{{ old('point_three_text', $aboutPage->point_three_text) }}">
                </div>
            </div>

            <hr>

            <h5 class="mb-3">Buttons</h5>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>Button 1 Text</label>
                    <input type="text" name="button_one_text" class="form-control"
                           value="{{ old('button_one_text', $aboutPage->button_one_text) }}">
                </div>

                <div class="form-group col-md-3">
                    <label>Button 1 Link</label>
                    <input type="text" name="button_one_link" class="form-control"
                           value="{{ old('button_one_link', $aboutPage->button_one_link) }}">
                </div>

                <div class="form-group col-md-3">
                    <label>Button 2 Text</label>
                    <input type="text" name="button_two_text" class="form-control"
                           value="{{ old('button_two_text', $aboutPage->button_two_text) }}">
                </div>

                <div class="form-group col-md-3">
                    <label>Button 2 Link</label>
                    <input type="text" name="button_two_link" class="form-control"
                           value="{{ old('button_two_link', $aboutPage->button_two_link) }}">
                </div>
            </div>

            <hr>

            <h5 class="mb-3">Mission</h5>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Mission Title</label>
                    <input type="text" name="mission_title" class="form-control"
                           value="{{ old('mission_title', $aboutPage->mission_title) }}">
                </div>

                <div class="form-group col-md-8">
                    <label>Mission Description</label>
                    <textarea name="mission_description" class="form-control" rows="4">{{ old('mission_description', $aboutPage->mission_description) }}</textarea>
                </div>

                @php
                    $missionPoints = old('mission_points', $aboutPage->mission_points ?? []);
                @endphp

                @for($i = 0; $i < 3; $i++)
                    <div class="form-group col-md-4">
                        <label>Mission Point {{ $i + 1 }}</label>
                        <input type="text" name="mission_points[]" class="form-control"
                               value="{{ $missionPoints[$i] ?? '' }}">
                    </div>
                @endfor
            </div>

            <hr>

            <h5 class="mb-3">Vision</h5>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Vision Title</label>
                    <input type="text" name="vision_title" class="form-control"
                           value="{{ old('vision_title', $aboutPage->vision_title) }}">
                </div>

                <div class="form-group col-md-8">
                    <label>Vision Description</label>
                    <textarea name="vision_description" class="form-control" rows="4">{{ old('vision_description', $aboutPage->vision_description) }}</textarea>
                </div>

                @php
                    $visionPoints = old('vision_points', $aboutPage->vision_points ?? []);
                @endphp

                @for($i = 0; $i < 3; $i++)
                    <div class="form-group col-md-4">
                        <label>Vision Point {{ $i + 1 }}</label>
                        <input type="text" name="vision_points[]" class="form-control"
                               value="{{ $visionPoints[$i] ?? '' }}">
                    </div>
                @endfor
            </div>

            <hr>

            <h5 class="mb-3">Purpose</h5>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Purpose Title</label>
                    <input type="text" name="purpose_title" class="form-control"
                           value="{{ old('purpose_title', $aboutPage->purpose_title) }}">
                </div>

                <div class="form-group col-md-8">
                    <label>Purpose Description</label>
                    <textarea name="purpose_description" class="form-control" rows="4">{{ old('purpose_description', $aboutPage->purpose_description) }}</textarea>
                </div>

                @php
                    $purposePoints = old('purpose_points', $aboutPage->purpose_points ?? []);
                @endphp

                @for($i = 0; $i < 3; $i++)
                    <div class="form-group col-md-4">
                        <label>Purpose Point {{ $i + 1 }}</label>
                        <input type="text" name="purpose_points[]" class="form-control"
                               value="{{ $purposePoints[$i] ?? '' }}">
                    </div>
                @endfor
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-danger">
                    Update About Page
                </button>
            </div>
        </form>

        @if($aboutPage->getFirstMedia('background_image'))
            <form method="POST" action="{{ route('admin.about-page.removeImage') }}" class="mt-2"
                  onsubmit="return confirm('Are you sure you want to remove this image?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    Remove Current Image
                </button>
            </form>
        @endif

    </div>
</div>

@endsection