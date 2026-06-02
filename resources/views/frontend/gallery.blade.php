@extends('frontend.master')
@section('content')


<!-- ================= EVENT WISE ALBUM SECTION START ================= -->

<section class="event-wise-album-section">
  <div class="event-wise-shape event-wise-shape-1"></div>
  <div class="event-wise-shape event-wise-shape-2"></div>

  <div class="container">

    <div class="event-wise-head">
      <div class="section-badge">
        <span><i class="bi bi-images"></i></span>
        Event-wise Album
      </div>

      <h2>
        Browse photo and video
        <span>albums by events.</span>
      </h2>

      <p>
        Explore event-wise photo and video memories from education awareness,
        skill development, women empowerment, youth guidance and community welfare activities.
      </p>
    </div>

    <div class="event-wise-filter">
      <a href="#" class="active" data-filter="all">
        <i class="bi bi-grid-fill"></i>
        All Events
      </a>

      <a href="#" data-filter="photos">
        <i class="bi bi-camera-fill"></i>
        Photos
      </a>

      <a href="#" data-filter="videos">
        <i class="bi bi-play-circle-fill"></i>
        Videos
      </a>

      <a href="#" data-filter="completed">
        <i class="bi bi-calendar-check-fill"></i>
        Completed Events
      </a>
    </div>

    <div class="event-wise-grid">

      @forelse($galleries as $gallery)
        @php
            $event = $gallery->event;
            $category = $event?->category ?? 'Event';
            $categoryLower = strtolower($category);
            $colorClass = '';

            if(str_contains($categoryLower, 'skill')) {
                $colorClass = 'green';
            } elseif(str_contains($categoryLower, 'women')) {
                $colorClass = 'sky';
            }

            $filterTypes = [];

            if($gallery->photo_count > 0) {
                $filterTypes[] = 'photos';
            }

            if($gallery->video_count > 0) {
                $filterTypes[] = 'videos';
            }

            if($event?->event_type === 'completed') {
                $filterTypes[] = 'completed';
            }
        @endphp

        <div class="event-wise-card" data-filter-types="{{ implode(',', $filterTypes) }}">
          <div class="event-wise-img">
            <img src="{{ $gallery->cover_image }}" alt="{{ $event?->title }}">

            <span class="event-wise-tag {{ $colorClass }}">
                {{ $category }}
            </span>

            <div class="event-wise-media-count">
              <span><i class="bi bi-camera-fill"></i> {{ $gallery->photo_count }} Photos</span>
              <span><i class="bi bi-play-circle-fill"></i> {{ $gallery->video_count }} Videos</span>
            </div>

            <div class="event-wise-overlay">
              <a href="{{ route('frontend.gallery.show', $gallery->id) }}">
                <i class="bi bi-images"></i>
              </a>

              <a href="{{ route('frontend.gallery.show', $gallery->id) }}">
                <i class="bi bi-play-fill"></i>
              </a>
            </div>
          </div>

          <div class="event-wise-content">
            <div class="event-wise-meta">
              @if($event?->start_date)
                <span>
                  <i class="bi bi-calendar2-check"></i>
                  {{ $event->start_date->format('d M Y') }}
                </span>
              @endif

              @if($event?->location)
                <span>
                  <i class="bi bi-geo-alt-fill"></i>
                  {{ $event->location }}
                </span>
              @endif
            </div>

            <h3>{{ $event?->title }}</h3>

            <p>
              {{ \Illuminate\Support\Str::limit(strip_tags($event?->short_description), 135) }}
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
      @empty
        <div class="gallery-empty-box">
            <h3>No Albums Found</h3>
            <p>No event-wise photo or video albums are available right now.</p>
        </div>
      @endforelse

    </div>

  </div>
</section>

<!-- ================= EVENT WISE ALBUM SECTION END ================= -->




<!-- ================= ALBUM COVER IMAGE SECTION START ================= -->
@if($latestGallery)
@php
    $event = $latestGallery->event;
    $images = $latestGallery->getMedia('gallery_images');
    $videoUrls = $latestGallery->video_urls ?? [];

    $firstThumb = $images->get(0)?->getUrl() ?? $latestGallery->cover_image;
    $secondThumb = $images->get(1)?->getUrl() ?? $latestGallery->cover_image;
    $thirdThumb = $images->get(2)?->getUrl() ?? $latestGallery->cover_image;

    $moreCount = max($latestGallery->total_media - 3, 0);
@endphp

<section class="album-cover-section">
  <div class="album-cover-shape album-cover-shape-1"></div>
  <div class="album-cover-shape album-cover-shape-2"></div>

  <div class="container">

    <div class="album-cover-wrapper">

      <!-- LEFT COVER IMAGE -->
      <div class="album-cover-image-card">

        <div class="album-cover-image">
          <img src="{{ $latestGallery->cover_image }}" alt="{{ $event?->title }}">

          <div class="album-cover-overlay"></div>

          <div class="album-cover-top">
            <span class="album-cover-category">
              <i class="bi bi-images"></i>
              {{ $event?->category ?? 'Event Album' }}
            </span>

            <span class="album-cover-status">
              <i class="bi bi-patch-check-fill"></i>
              Published
            </span>
          </div>

          <div class="album-cover-content">
            <div class="album-cover-meta">
              @if($event?->start_date)
                <span>
                  <i class="bi bi-calendar2-check"></i>
                  {{ $event->start_date->format('d M Y') }}
                </span>
              @endif

              @if($event?->location)
                <span>
                  <i class="bi bi-geo-alt-fill"></i>
                  {{ $event->location }}
                </span>
              @endif
            </div>

            <h2>{{ $event?->title }}</h2>

            <p>
              {{ \Illuminate\Support\Str::limit(strip_tags($event?->short_description), 160) }}
            </p>

            <div class="album-cover-counts">
              <div>
                <strong>{{ str_pad($latestGallery->photo_count, 2, '0', STR_PAD_LEFT) }}</strong>
                <span>Photos</span>
              </div>

              <div>
                <strong>{{ str_pad($latestGallery->video_count, 2, '0', STR_PAD_LEFT) }}</strong>
                <span>Videos</span>
              </div>

              <div>
                <strong>{{ str_pad($latestGallery->total_media, 2, '0', STR_PAD_LEFT) }}</strong>
                <span>Total Media</span>
              </div>
            </div>
          </div>

        </div>

      </div>

      <!-- RIGHT CONTENT -->
      <div class="album-cover-info-card">

        <div class="section-badge">
          <span><i class="bi bi-camera-fill"></i></span>
          Latest Album Cover
        </div>

        <h2>
          Highlight every event with
          <span>a premium album cover.</span>
        </h2>

        <p>
          Latest event album is displayed here with event title, short description,
          date, location, photo count and video count.
        </p>

        <div class="album-cover-feature-list">

          <div class="album-cover-feature">
            <div class="album-cover-feature-icon">
              <i class="bi bi-image-fill"></i>
            </div>
            <div>
              <h4>High Quality Cover</h4>
              <p>Show one main image as the identity of the complete event album.</p>
            </div>
          </div>

          <div class="album-cover-feature">
            <div class="album-cover-feature-icon green">
              <i class="bi bi-play-circle-fill"></i>
            </div>
            <div>
              <h4>Photo & Video Count</h4>
              <p>Display total photos, videos and media count directly on the cover.</p>
            </div>
          </div>

          <div class="album-cover-feature">
            <div class="album-cover-feature-icon sky">
              <i class="bi bi-eye-fill"></i>
            </div>
            <div>
              <h4>Easy Album Preview</h4>
              <p>Make album browsing simple, attractive and mobile friendly.</p>
            </div>
          </div>

        </div>

        <div class="album-cover-preview-row">
          <img src="{{ $firstThumb }}" alt="{{ $event?->title }}">
          <img src="{{ $secondThumb }}" alt="{{ $event?->title }}">
          <img src="{{ $thirdThumb }}" alt="{{ $event?->title }}">

          <a href="{{ route('frontend.gallery.show', $latestGallery->id) }}" class="album-more-box">
            <strong>+{{ $moreCount }}</strong>
            <span>More</span>
          </a>
        </div>

        <div class="album-cover-actions">
          <a href="{{ route('frontend.gallery.show', $latestGallery->id) }}" class="album-cover-btn-main">
            View Full Album
            <i class="bi bi-arrow-right"></i>
          </a>

         @php
    $shareText = 'Check this event album: ' . ($event?->title ?? 'Event Album');
    $shareLink = route('frontend.gallery.show', $latestGallery->id);
    $whatsappShareUrl = 'https://wa.me/?text=' . urlencode($shareText . ' ' . $shareLink);
@endphp

<a href="{{ $whatsappShareUrl }}"
   target="_blank"
   class="album-cover-btn-soft">
    <i class="bi bi-whatsapp"></i>
    Share on WhatsApp
</a>
        </div>

      </div>

    </div>

  </div>
</section>
@endif
<!-- ================= ALBUM COVER IMAGE SECTION END ================= -->




<!-- ================= VIDEO SUPPORT SECTION START ================= -->
<section class="video-support-section">
  <div class="video-support-shape video-support-shape-1"></div>
  <div class="video-support-shape video-support-shape-2"></div>

  <div class="container">

    <div class="video-support-wrapper">

      <!-- LEFT CONTENT -->
      <div class="video-support-content">

        <div class="section-badge">
          <span><i class="bi bi-play-circle-fill"></i></span>
          YouTube / Vimeo Support
        </div>

        <h2>
          Add event videos from
          <span>YouTube and Vimeo easily.</span>
        </h2>

        <p>
          Display campaign, event, training and awareness videos using YouTube or Vimeo
          embed links with a premium responsive video layout.
        </p>

        <div class="video-support-list">

          <div class="video-support-item">
            <div class="video-support-icon">
              <i class="bi bi-youtube"></i>
            </div>
            <div>
              <h4>YouTube Video Embed</h4>
              <p>Add YouTube video URL or embed link to show event highlights on the website.</p>
            </div>
          </div>

          <div class="video-support-item">
            <div class="video-support-icon green">
              <i class="bi bi-play-btn-fill"></i>
            </div>
            <div>
              <h4>Vimeo Video Support</h4>
              <p>Support Vimeo video embeds for clean, professional and high-quality playback.</p>
            </div>
          </div>

          <div class="video-support-item">
            <div class="video-support-icon sky">
              <i class="bi bi-phone-fill"></i>
            </div>
            <div>
              <h4>Fully Responsive Player</h4>
              <p>Video layout automatically adjusts on laptop, tablet and mobile screens.</p>
            </div>
          </div>

        </div>

        <div class="video-support-actions">
          <a href="gallery.html" class="video-support-btn-main">
            View Video Gallery
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="gallery.html" class="video-support-btn-soft">
            Add Video
          </a>
        </div>

      </div>

      <!-- RIGHT VIDEO PREVIEW -->
      <div class="video-support-card">

        <div class="video-card-head">
          <div>
            <span>Featured Video</span>
            <h3>Event Video Preview</h3>
          </div>

          <div class="video-card-icon">
            <i class="bi bi-camera-reels-fill"></i>
          </div>
        </div>

        @if($latestVideoGallery)
@php
    $videoEvent = $latestVideoGallery->event;
    $videoUrls = array_values(array_filter($latestVideoGallery->video_urls ?? []));
    $latestVideoUrl = $videoUrls[0] ?? null;
@endphp

@if($latestVideoUrl)
    <div class="video-embed-box">
        <iframe
            src="{{ $latestVideoUrl }}"
            title="{{ $videoEvent?->title ?? 'Event Video' }}"
            allow="autoplay; fullscreen; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>

    <div class="video-info-box">
        <div class="video-info-meta">
            @if($videoEvent?->start_date)
                <span>
                    <i class="bi bi-calendar2-check"></i>
                    {{ $videoEvent->start_date->format('d M Y') }}
                </span>
            @endif

            @if($videoEvent?->location)
                <span>
                    <i class="bi bi-geo-alt-fill"></i>
                    {{ $videoEvent->location }}
                </span>
            @endif
        </div>

        <h4>{{ $videoEvent?->title }}</h4>

        <p>
            {{ \Illuminate\Support\Str::limit(strip_tags($videoEvent?->short_description), 150) }}
        </p>
    </div>
@endif
@endif

        <div class="video-platform-grid">

          <div class="video-platform-box">
            <i class="bi bi-youtube"></i>
            <div>
              <strong>YouTube</strong>
              <span>Embed URL Support</span>
            </div>
          </div>

          <div class="video-platform-box green">
            <i class="bi bi-vimeo"></i>
            <div>
              <strong>Vimeo</strong>
              <span>Player URL Support</span>
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= VIDEO SUPPORT SECTION END ================= -->



<!-- ================= CATEGORY FILTERING SECTION START ================= -->
<section class="category-filter-section">
  <div class="category-filter-shape category-filter-shape-1"></div>
  <div class="category-filter-shape category-filter-shape-2"></div>

  <div class="container">

    <div class="category-filter-head">
      <div class="section-badge">
        <span><i class="bi bi-funnel-fill"></i></span>
        Category Filtering
      </div>

      <h2>
        Filter albums, events and campaigns
        <span>by category easily.</span>
      </h2>

      <p>
        Help visitors browse Janki Social Foundation’s photos, videos, campaigns and events
        by selecting education, skill development, women empowerment, youth support and welfare categories.
      </p>
    </div>

    <div class="category-filter-wrapper">

      <!-- FILTER SIDEBAR -->
      <div class="category-filter-sidebar">

        <div class="filter-sidebar-head">
          <div>
            <span>Browse By</span>
            <h3>Categories</h3>
          </div>

          <div class="filter-sidebar-icon">
            <i class="bi bi-sliders"></i>
          </div>
        </div>

        <div class="category-filter-list">
          <a href="#" class="active" data-category="all">
            <span>
              <i class="bi bi-grid-fill"></i>
              All Categories
            </span>
            <strong>{{ $galleries->count() }}</strong>
          </a>

          @foreach($galleryCategories as $category)
            @php
                $categoryLower = strtolower($category->category);
                $categorySlug = \Illuminate\Support\Str::slug($category->category);

                $icon = 'bi-grid-fill';

                if(str_contains($categoryLower, 'education')) {
                    $icon = 'bi-mortarboard-fill';
                } elseif(str_contains($categoryLower, 'skill')) {
                    $icon = 'bi-tools';
                } elseif(str_contains($categoryLower, 'women')) {
                    $icon = 'bi-gender-female';
                } elseif(str_contains($categoryLower, 'youth')) {
                    $icon = 'bi-people-fill';
                } elseif(str_contains($categoryLower, 'welfare') || str_contains($categoryLower, 'community')) {
                    $icon = 'bi-heart-fill';
                }
            @endphp

            <a href="#" data-category="{{ $categorySlug }}">
              <span>
                <i class="bi {{ $icon }}"></i>
                {{ $category->category }}
              </span>
              <strong>{{ str_pad($category->total, 2, '0', STR_PAD_LEFT) }}</strong>
            </a>
          @endforeach
        </div>

      </div>

      <!-- FILTER CONTENT -->
      <div class="category-filter-content">

        <div class="category-filter-topbar">
          <div>
            <span>Showing Results</span>
            <h3 id="categoryResultTitle">All Category Items</h3>
          </div>

          <div class="category-sort-box">
            <i class="bi bi-sort-down"></i>
            <select id="categorySort">
              <option value="latest">Latest First</option>
              <option value="oldest">Oldest First</option>
              <option value="photos">Most Photos</option>
              <option value="media">Most Media</option>
            </select>
          </div>
        </div>

        <div class="category-filter-tabs">
          <a href="#" class="active" data-type="all">All</a>
          <a href="#" data-type="photos">Photos</a>
          <a href="#" data-type="videos">Videos</a>
          <a href="#" data-type="completed">Completed Events</a>
        </div>

        <div class="category-result-grid" id="categoryResultGrid">

          @forelse($galleries as $gallery)
            @php
                $event = $gallery->event;
                $category = $event?->category ?? 'Event';
                $categorySlug = \Illuminate\Support\Str::slug($category);
                $categoryLower = strtolower($category);

                $colorClass = '';

                if(str_contains($categoryLower, 'skill')) {
                    $colorClass = 'green';
                } elseif(str_contains($categoryLower, 'women')) {
                    $colorClass = 'sky';
                } elseif(str_contains($categoryLower, 'welfare') || str_contains($categoryLower, 'community')) {
                    $colorClass = 'green';
                }

                $mediaType = 'all';

                if($gallery->photo_count > 0 && $gallery->video_count > 0) {
                    $mediaType = 'all photos videos';
                } elseif($gallery->photo_count > 0) {
                    $mediaType = 'photos';
                } elseif($gallery->video_count > 0) {
                    $mediaType = 'videos';
                }

                if($event?->event_type === 'completed') {
                    $mediaType .= ' completed';
                }

                $dateValue = $event?->start_date ? $event->start_date->format('Y-m-d') : '';
            @endphp

            <div class="category-result-card"
                 data-category="{{ $categorySlug }}"
                 data-type="{{ $mediaType }}"
                 data-date="{{ $dateValue }}"
                 data-photos="{{ $gallery->photo_count }}"
                 data-media="{{ $gallery->total_media }}">

              <div class="category-result-img">
                <img src="{{ $gallery->cover_image }}" alt="{{ $event?->title }}">

                <span class="{{ $colorClass }}">
                  {{ $category }}
                </span>
              </div>

              <div class="category-result-info">
                <div class="category-result-meta">
                  @if($event?->start_date)
                    <span>
                      <i class="bi bi-calendar2-check"></i>
                      {{ $event->start_date->format('d M Y') }}
                    </span>
                  @endif

                  <span>
                    <i class="bi bi-images"></i>
                    {{ $gallery->total_media }} Media
                  </span>
                </div>

                <h4>{{ $event?->title }}</h4>

                <p>
                  {{ \Illuminate\Support\Str::limit(strip_tags($event?->short_description), 120) }}
                </p>

                <a href="{{ route('frontend.gallery.show', $gallery->id) }}">
                  View Details
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          @empty
            <div class="gallery-empty-box">
              <h3>No Category Items Found</h3>
              <p>No albums are available right now.</p>
            </div>
          @endforelse

        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= CATEGORY FILTERING SECTION END ================= -->



<!-- ================= MOBILE FRIENDLY LIGHTBOX SECTION START ================= -->
@if($galleries->count())
<section class="mobile-lightbox-section">
  <div class="mobile-lightbox-shape mobile-lightbox-shape-1"></div>
  <div class="mobile-lightbox-shape mobile-lightbox-shape-2"></div>

  <div class="container">

    <div class="mobile-lightbox-head">
      <div class="section-badge">
        <span><i class="bi bi-arrows-fullscreen"></i></span>
        Mobile-friendly Lightbox
      </div>

      <h2>
        View event albums in a
        <span>smooth mobile lightbox.</span>
      </h2>

      <p>
        Click any event album card to view that event’s photos and videos in popup.
      </p>
    </div>

    {{-- ONLY EVENT ALBUM CARDS --}}
    <div class="event-album-select-grid">

      @foreach($galleries as $gallery)
        @php
            $event = $gallery->event;
            $images = $gallery->getMedia('gallery_images');
            $videoUrls = array_values(array_filter($gallery->video_urls ?? []));
        @endphp

        <div class="event-album-select-card"
             data-gallery-id="{{ $gallery->id }}"
             data-cover-src="{{ $gallery->cover_image }}">

          <div class="event-album-select-img">
            <img src="{{ $gallery->cover_image }}" alt="{{ $event?->title ?? 'Event Album' }}">

            <span>
              <i class="bi bi-images"></i>
              {{ $gallery->total_media }} Media
            </span>

            <div class="event-album-play">
              <i class="bi bi-arrows-fullscreen"></i>
            </div>
          </div>

          <div class="event-album-select-content">
            <div class="event-album-meta">
              @if($event?->start_date)
                <small>
                  <i class="bi bi-calendar2-check"></i>
                  {{ $event->start_date->format('d M Y') }}
                </small>
              @endif

              @if($event?->location)
                <small>
                  <i class="bi bi-geo-alt-fill"></i>
                  {{ $event->location }}
                </small>
              @endif
            </div>

            <h3>{{ $event?->title ?? 'Event Album' }}</h3>

            <p>
              {{ \Illuminate\Support\Str::limit(strip_tags($event?->short_description), 90) }}
            </p>

            <div class="event-album-select-meta">
              <small>
                <i class="bi bi-camera-fill"></i>
                {{ $gallery->photo_count }} Photos
              </small>

              <small>
                <i class="bi bi-play-circle-fill"></i>
                {{ $gallery->video_count }} Videos
              </small>
            </div>
          </div>

          {{-- HIDDEN MEDIA DATA --}}
          <div class="gallery-hidden-media" style="display:none;">
            @foreach($images as $image)
              <span class="gallery-media-source"
                    data-src="{{ $image->getUrl() }}"
                    data-type="image"></span>
            @endforeach

            @foreach($videoUrls as $videoUrl)
              <span class="gallery-media-source"
                    data-src="{{ $videoUrl }}"
                    data-type="video"></span>
            @endforeach
          </div>

        </div>
      @endforeach

    </div>

  </div>
</section>

{{-- LIGHTBOX POPUP --}}
<div class="premium-lightbox" id="premiumLightbox">
  <button type="button" class="lightbox-close" id="lightboxClose">
    <i class="bi bi-x-lg"></i>
  </button>

  <button type="button" class="lightbox-arrow lightbox-prev" id="lightboxPrev">
    <i class="bi bi-chevron-left"></i>
  </button>

  <div class="lightbox-viewer">
    <div class="lightbox-media-box" id="lightboxMediaBox"></div>
  </div>

  <button type="button" class="lightbox-arrow lightbox-next" id="lightboxNext">
    <i class="bi bi-chevron-right"></i>
  </button>
</div>
@endif

<!-- ================= MOBILE FRIENDLY LIGHTBOX SECTION END ================= -->




@endsection
