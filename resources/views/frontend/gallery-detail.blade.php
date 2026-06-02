@extends('frontend.master')

@section('content')

@php
    $event = $eventGallery->event;
    $images = $eventGallery->getMedia('gallery_images');
    $videoUrls = $eventGallery->video_urls ?? [];
@endphp

<section class="gallery-detail-section">
    <div class="container">

        <div class="gallery-detail-hero">
            <div class="gallery-detail-content">
                <div class="section-badge">
                    <span><i class="bi bi-images"></i></span>
                    Event Album
                </div>

                <h1>{{ $event?->title }}</h1>

                <p>
                    {{ strip_tags($event?->short_description) }}
                </p>

                <div class="gallery-detail-meta">
                    @if($event?->category)
                        <span><i class="bi bi-tag-fill"></i> {{ $event->category }}</span>
                    @endif

                    @if($event?->start_date)
                        <span><i class="bi bi-calendar2-check"></i> {{ $event->start_date->format('d M Y') }}</span>
                    @endif

                    @if($event?->location)
                        <span><i class="bi bi-geo-alt-fill"></i> {{ $event->location }}</span>
                    @endif

                    <span><i class="bi bi-camera-fill"></i> {{ $eventGallery->photo_count }} Photos</span>
                    <span><i class="bi bi-play-circle-fill"></i> {{ $eventGallery->video_count }} Videos</span>
                </div>
            </div>

            <div class="gallery-detail-cover">
                <img src="{{ $eventGallery->cover_image }}" alt="{{ $event?->title }}">
            </div>
        </div>

        @if($images->count())
            <div class="gallery-detail-block">
                <div class="gallery-detail-head">
                    <span>Photo Gallery</span>
                    <h2>Photos from this event</h2>
                </div>

                <div class="gallery-photo-grid">
                    @foreach($images as $image)
                        <a href="{{ $image->getUrl() }}" target="_blank" class="gallery-photo-item">
                            <img src="{{ $image->getUrl() }}" alt="{{ $event?->title }}">
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if(count(array_filter($videoUrls)))
            <div class="gallery-detail-block">
                <div class="gallery-detail-head">
                    <span>Video Gallery</span>
                    <h2>Videos from this event</h2>
                </div>

                <div class="gallery-video-grid">
                    @foreach($videoUrls as $videoUrl)
                        @if($videoUrl)
                            <div class="gallery-video-card">
                                <iframe src="{{ $videoUrl }}"
                                        title="Event Video"
                                        allowfullscreen></iframe>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        @if($relatedGalleries->count())
            <div class="gallery-detail-block">
                <div class="gallery-detail-head">
                    <span>Related Albums</span>
                    <h2>More event albums</h2>
                </div>

                <div class="event-wise-grid">
                    @foreach($relatedGalleries as $gallery)
                        @php
                            $relatedEvent = $gallery->event;
                        @endphp

                        <div class="event-wise-card">
                            <div class="event-wise-img">
                                <img src="{{ $gallery->cover_image }}" alt="{{ $relatedEvent?->title }}">

                                <span class="event-wise-tag">
                                    {{ $relatedEvent?->category ?? 'Event' }}
                                </span>

                                <div class="event-wise-media-count">
                                    <span><i class="bi bi-camera-fill"></i> {{ $gallery->photo_count }} Photos</span>
                                    <span><i class="bi bi-play-circle-fill"></i> {{ $gallery->video_count }} Videos</span>
                                </div>
                            </div>

                            <div class="event-wise-content">
                                <div class="event-wise-meta">
                                    @if($relatedEvent?->start_date)
                                        <span>
                                            <i class="bi bi-calendar2-check"></i>
                                            {{ $relatedEvent->start_date->format('d M Y') }}
                                        </span>
                                    @endif

                                    @if($relatedEvent?->location)
                                        <span>
                                            <i class="bi bi-geo-alt-fill"></i>
                                            {{ $relatedEvent->location }}
                                        </span>
                                    @endif
                                </div>

                                <h3>{{ $relatedEvent?->title }}</h3>

                                <p>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($relatedEvent?->short_description), 120) }}
                                </p>

                                <div class="event-wise-footer">
                                    <div>
                                        <strong>{{ $gallery->total_media }}</strong>
                                        <span>Total Media</span>
                                    </div>

                                    <a href="{{ route('frontend.gallery.show', $gallery->id) }}">
                                        View Album
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        @endif

    </div>
</section>

@endsection