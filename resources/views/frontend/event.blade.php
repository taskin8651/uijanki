@extends('frontend.master')
@section('content')



<!-- ================= UPCOMING EVENT SECTION START ================= -->
@if($upcomingFeaturedEvent || $upcomingEvents->count())
<section class="upcoming-event-section">
  <div class="event-bg-shape event-bg-shape-1"></div>
  <div class="event-bg-shape event-bg-shape-2"></div>

  <div class="container">

    <div class="upcoming-event-head">
      <div class="section-badge">
        <span><i class="bi bi-calendar-event-fill"></i></span>
        Upcoming Events
      </div>

      <h2>
        Join our upcoming events and
        <span>be part of social change.</span>
      </h2>

      <p>
        Participate in Janki Social Foundation’s upcoming awareness drives, training programs,
        community meetings and welfare initiatives created to bring meaningful impact.
      </p>
    </div>

    <div class="upcoming-event-wrapper">

      @if($upcomingFeaturedEvent)
      <div class="featured-event-card">
        <div class="featured-event-image">
          <img src="{{ $upcomingFeaturedEvent->event_image }}" alt="{{ $upcomingFeaturedEvent->title }}">

          <div class="event-date-box">
            <strong>{{ $upcomingFeaturedEvent->start_date?->format('d') }}</strong>
            <span>{{ $upcomingFeaturedEvent->start_date?->format('M') }}</span>
          </div>

          <div class="event-status-badge">
            <i class="bi bi-broadcast-pin"></i>
            {{ $upcomingFeaturedEvent->status_badge ?? 'Upcoming' }}
          </div>
        </div>

        <div class="featured-event-content">
          <div class="event-meta">
            @if($upcomingFeaturedEvent->start_time)
              <span>
                <i class="bi bi-clock-fill"></i>
                {{ \Carbon\Carbon::parse($upcomingFeaturedEvent->start_time)->format('h:i A') }}
                @if($upcomingFeaturedEvent->end_time)
                  - {{ \Carbon\Carbon::parse($upcomingFeaturedEvent->end_time)->format('h:i A') }}
                @endif
              </span>
            @endif

            <span><i class="bi bi-geo-alt-fill"></i> {{ $upcomingFeaturedEvent->location }}</span>
          </div>

          <h3>{{ $upcomingFeaturedEvent->title }}</h3>

          <p>{{ $upcomingFeaturedEvent->short_description }}</p>

          <div class="event-info-grid">
            @if($upcomingFeaturedEvent->info_one_title)
            <div class="event-info-item">
              <i class="bi bi-people-fill"></i>
              <div>
                <strong>{{ $upcomingFeaturedEvent->info_one_title }}</strong>
                <span>{{ $upcomingFeaturedEvent->info_one_text }}</span>
              </div>
            </div>
            @endif

            @if($upcomingFeaturedEvent->info_two_title)
            <div class="event-info-item">
              <i class="bi bi-heart-fill"></i>
              <div>
                <strong>{{ $upcomingFeaturedEvent->info_two_title }}</strong>
                <span>{{ $upcomingFeaturedEvent->info_two_text }}</span>
              </div>
            </div>
            @endif
          </div>

          <div class="featured-event-actions">
            @if($upcomingFeaturedEvent->button_one_text)
            <a href="{{ url($upcomingFeaturedEvent->button_one_link ?? '#') }}" class="btn event-btn-main">
              {{ $upcomingFeaturedEvent->button_one_text }}
              <i class="bi bi-arrow-right"></i>
            </a>
            @endif

            @if($upcomingFeaturedEvent->button_two_text)
            <a href="{{ url($upcomingFeaturedEvent->button_two_link ?? '#') }}" class="btn event-btn-soft">
              <i class="bi bi-person-plus-fill"></i>
              {{ $upcomingFeaturedEvent->button_two_text }}
            </a>
            @endif
          </div>
        </div>
      </div>
      @endif

      <div class="event-side-list">
        @foreach($upcomingEvents as $event)
        <div class="event-mini-card">
          <div class="event-mini-date {{ $loop->iteration == 2 ? 'green' : ($loop->iteration == 3 ? 'sky' : '') }}">
            <strong>{{ $event->start_date?->format('d') }}</strong>
            <span>{{ $event->start_date?->format('M') }}</span>
          </div>

          <div class="event-mini-content">
            <span class="event-mini-tag {{ $loop->iteration == 2 ? 'green' : ($loop->iteration == 3 ? 'sky' : '') }}">
              {{ $event->category }}
            </span>
            <h4>{{ $event->title }}</h4>
            <p><i class="bi bi-geo-alt"></i> {{ $event->location }}</p>
          </div>

          <a href="{{ url($event->button_one_link ?? '#') }}" class="event-mini-link">
            <i class="bi bi-arrow-up-right"></i>
          </a>
        </div>
        @endforeach
      </div>

    </div>
  </div>
</section>
@endif

<!-- ================= UPCOMING EVENT SECTION END ================= -->




<!-- ================= ONGOING EVENTS SECTION START ================= -->
@if($ongoingFeaturedEvent || $ongoingEvents->count())
<section class="ongoing-event-section">
  <div class="ongoing-bg-shape ongoing-bg-shape-1"></div>
  <div class="ongoing-bg-shape ongoing-bg-shape-2"></div>

  <div class="container">

    <div class="ongoing-event-head">
      <div class="section-badge">
        <span><i class="bi bi-broadcast"></i></span>
        Ongoing Events
      </div>

      <h2>
        Active initiatives creating
        <span>real community impact.</span>
      </h2>

      <p>
        Explore Janki Social Foundation’s ongoing events, awareness drives, welfare support activities,
        training sessions and community participation programs currently making a difference.
      </p>
    </div>

    <div class="ongoing-event-wrapper">

      @if($ongoingFeaturedEvent)
      <div class="ongoing-feature-card">
        <div class="ongoing-feature-image">
          <img src="{{ $ongoingFeaturedEvent->event_image }}" alt="{{ $ongoingFeaturedEvent->title }}">

          <div class="ongoing-live-badge">
            <span></span>
            {{ $ongoingFeaturedEvent->status_badge ?? 'Live Now' }}
          </div>

          <div class="ongoing-date-card">
            <strong>{{ $ongoingFeaturedEvent->start_date?->format('d') }}</strong>
            <span>
              {{ $ongoingFeaturedEvent->start_date?->format('M') }}
              @if($ongoingFeaturedEvent->end_date)
                - {{ $ongoingFeaturedEvent->end_date?->format('d M') }}
              @endif
            </span>
          </div>
        </div>

        <div class="ongoing-feature-content">
          <div class="ongoing-meta">
            @if($ongoingFeaturedEvent->start_time)
            <span>
              <i class="bi bi-clock-fill"></i>
              {{ \Carbon\Carbon::parse($ongoingFeaturedEvent->start_time)->format('h:i A') }}
              @if($ongoingFeaturedEvent->end_time)
                - {{ \Carbon\Carbon::parse($ongoingFeaturedEvent->end_time)->format('h:i A') }}
              @endif
            </span>
            @endif

            <span><i class="bi bi-geo-alt-fill"></i> {{ $ongoingFeaturedEvent->location }}</span>
          </div>

          <h3>{{ $ongoingFeaturedEvent->title }}</h3>

          <p>{{ $ongoingFeaturedEvent->short_description }}</p>

          @if($ongoingFeaturedEvent->progress)
          <div class="ongoing-progress-box">
            <div class="ongoing-progress-top">
              <span>Program Progress</span>
              <strong>{{ $ongoingFeaturedEvent->progress }}%</strong>
            </div>
            <div class="ongoing-progress-line">
              <span style="width: {{ $ongoingFeaturedEvent->progress }}%;"></span>
            </div>
          </div>
          @endif

          <div class="ongoing-info-grid">
            @if($ongoingFeaturedEvent->info_one_title)
            <div class="ongoing-info-item">
              <i class="bi bi-people-fill"></i>
              <div>
                <strong>{{ $ongoingFeaturedEvent->info_one_title }}</strong>
                <span>{{ $ongoingFeaturedEvent->info_one_text }}</span>
              </div>
            </div>
            @endif

            @if($ongoingFeaturedEvent->info_two_title)
            <div class="ongoing-info-item">
              <i class="bi bi-heart-fill"></i>
              <div>
                <strong>{{ $ongoingFeaturedEvent->info_two_title }}</strong>
                <span>{{ $ongoingFeaturedEvent->info_two_text }}</span>
              </div>
            </div>
            @endif
          </div>

          <div class="ongoing-event-actions">
            @if($ongoingFeaturedEvent->button_one_text)
            <a href="{{ url($ongoingFeaturedEvent->button_one_link ?? '#') }}" class="btn ongoing-btn-main">
              {{ $ongoingFeaturedEvent->button_one_text }}
              <i class="bi bi-arrow-right"></i>
            </a>
            @endif

            @if($ongoingFeaturedEvent->button_two_text)
            <a href="{{ url($ongoingFeaturedEvent->button_two_link ?? '#') }}" class="btn ongoing-btn-soft">
              <i class="bi bi-person-plus-fill"></i>
              {{ $ongoingFeaturedEvent->button_two_text }}
            </a>
            @endif
          </div>
        </div>
      </div>
      @endif

      <div class="ongoing-event-list">
        @foreach($ongoingEvents as $event)
        <div class="ongoing-small-card">
          <div class="ongoing-small-icon {{ $loop->iteration == 2 ? 'green' : ($loop->iteration == 3 ? 'sky' : '') }}">
            <i class="bi {{ $loop->iteration == 1 ? 'bi-mortarboard-fill' : ($loop->iteration == 2 ? 'bi-tools' : 'bi-megaphone-fill') }}"></i>
          </div>

          <div class="ongoing-small-content">
            <span class="ongoing-small-tag {{ $loop->iteration == 2 ? 'green' : ($loop->iteration == 3 ? 'sky' : '') }}">
              {{ $event->category }}
            </span>
            <h4>{{ $event->title }}</h4>
            <p><i class="bi bi-calendar2-week"></i> {{ $event->status_badge }}</p>
          </div>

          <a href="{{ url($event->button_one_link ?? '#') }}" class="ongoing-small-link">
            <i class="bi bi-arrow-up-right"></i>
          </a>
        </div>
        @endforeach
      </div>

    </div>
  </div>
</section>
@endif
<!-- ================= ONGOING EVENTS SECTION END ================= -->



<!-- ================= COMPLETED EVENTS SECTION START ================= -->
@if($completedFeaturedEvent || $completedEvents->count())
<section class="completed-event-section">
  <div class="completed-bg-shape completed-bg-shape-1"></div>
  <div class="completed-bg-shape completed-bg-shape-2"></div>

  <div class="container">

    <div class="completed-event-head">
      <div class="section-badge">
        <span><i class="bi bi-check2-circle"></i></span>
        Completed Events
      </div>

      <h2>
        Our completed events and
        <span>social impact activities.</span>
      </h2>

      <p>
        A glimpse of Janki Social Foundation’s successfully completed awareness drives,
        welfare programs, skill sessions and community participation initiatives that created
        meaningful impact.
      </p>
    </div>

    @if($completedFeaturedEvent)
    <div class="completed-feature-card">

      <div class="completed-feature-image">
        <img src="{{ $completedFeaturedEvent->event_image }}" alt="{{ $completedFeaturedEvent->title }}">

        <div class="completed-status-badge">
          <i class="bi bi-patch-check-fill"></i>
          {{ $completedFeaturedEvent->status_badge ?? 'Completed' }}
        </div>

        <div class="completed-date-card">
          <strong>{{ $completedFeaturedEvent->start_date?->format('d') }}</strong>
          <span>{{ $completedFeaturedEvent->start_date?->format('M Y') }}</span>
        </div>
      </div>

      <div class="completed-feature-content">
        <div class="completed-meta">
          <span><i class="bi bi-geo-alt-fill"></i> {{ $completedFeaturedEvent->location }}</span>
          <span><i class="bi bi-people-fill"></i> {{ $completedFeaturedEvent->category }}</span>
        </div>

        <h3>{{ $completedFeaturedEvent->title }}</h3>

        <p>{{ $completedFeaturedEvent->short_description }}</p>

        <div class="completed-impact-grid">
          <div class="completed-impact-item">
            <i class="bi bi-people-fill"></i>
            <div>
              <strong>{{ $completedFeaturedEvent->people_reached ?? 0 }}+</strong>
              <span>People Reached</span>
            </div>
          </div>

          <div class="completed-impact-item">
            <i class="bi bi-heart-fill"></i>
            <div>
              <strong>{{ $completedFeaturedEvent->families_supported ?? 0 }}+</strong>
              <span>Families Supported</span>
            </div>
          </div>

          <div class="completed-impact-item">
            <i class="bi bi-mortarboard-fill"></i>
            <div>
              <strong>{{ $completedFeaturedEvent->youth_guided ?? 0 }}+</strong>
              <span>Youth Guided</span>
            </div>
          </div>
        </div>

        <div class="completed-event-actions">
          @if($completedFeaturedEvent->button_one_text)
          <a href="{{ url($completedFeaturedEvent->button_one_link ?? '#') }}" class="btn completed-btn-main">
            {{ $completedFeaturedEvent->button_one_text }}
            <i class="bi bi-arrow-right"></i>
          </a>
          @endif

          @if($completedFeaturedEvent->button_two_text)
          <a href="{{ url($completedFeaturedEvent->button_two_link ?? '#') }}" class="btn completed-btn-soft">
            <i class="bi bi-journal-text"></i>
            {{ $completedFeaturedEvent->button_two_text }}
          </a>
          @endif
        </div>
      </div>

    </div>
    @endif

    <div class="completed-event-grid">
      @foreach($completedEvents as $event)
      <div class="completed-event-card">
        <div class="completed-card-image">
          <img src="{{ $event->event_image }}" alt="{{ $event->title }}">
          <span><i class="bi bi-check-circle-fill"></i> {{ $event->status_badge ?? 'Completed' }}</span>
        </div>

        <div class="completed-card-content">
          <div class="completed-card-meta">
            <span><i class="bi bi-calendar2-check"></i> {{ $event->start_date?->format('d M Y') }}</span>
          </div>

          <h4>{{ $event->title }}</h4>
          <p>{{ $event->short_description }}</p>

          <a href="{{ url($event->button_one_link ?? '#') }}">
            {{ $event->button_one_text ?? 'View Details' }}
            <i class="bi bi-arrow-up-right"></i>
          </a>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>
@endif
<!-- ================= COMPLETED EVENTS SECTION END ================= -->



<!-- ================= EVENT CATEGORY MANAGEMENT SECTION START ================= -->
<section class="event-category-section">
  <div class="event-category-shape event-category-shape-1"></div>
  <div class="event-category-shape event-category-shape-2"></div>

  <div class="container">

    <div class="event-category-head">
      <div class="section-badge">
        <span><i class="bi bi-grid-1x2-fill"></i></span>
        Event Category Management
      </div>

      <h2>
        Manage events with
        <span>clear categories and smart organization.</span>
      </h2>

      <p>
        Organize upcoming, ongoing and completed events into meaningful categories like education,
        skill development, women empowerment, youth empowerment, community welfare and awareness drives.
      </p>
    </div>

    <div class="event-category-wrapper">

      <div class="event-category-panel">

        <div class="category-panel-top">
          <div>
            <h3>Event Categories</h3>
            <p>Quick category overview for website events.</p>
          </div>

          <a href="{{ url('events') }}" class="category-add-btn">
            <i class="bi bi-calendar-event"></i>
            All Events
          </a>
        </div>

        <div class="category-list">

          @forelse($eventCategories as $category)
            @php
              $eventsByCategory = $categoryEvents[$category->category] ?? collect();
              $latestEvent = $eventsByCategory->first();

              $iconClass = 'bi-grid-fill';
              $colorClass = '';

              if(str_contains(strtolower($category->category), 'education')) {
                  $iconClass = 'bi-mortarboard-fill';
                  $colorClass = '';
              } elseif(str_contains(strtolower($category->category), 'skill')) {
                  $iconClass = 'bi-tools';
                  $colorClass = 'green';
              } elseif(str_contains(strtolower($category->category), 'women')) {
                  $iconClass = 'bi-gender-female';
                  $colorClass = 'sky';
              } elseif(str_contains(strtolower($category->category), 'youth')) {
                  $iconClass = 'bi-people-fill';
                  $colorClass = '';
              } elseif(str_contains(strtolower($category->category), 'welfare')) {
                  $iconClass = 'bi-heart-fill';
                  $colorClass = 'green';
              } elseif(str_contains(strtolower($category->category), 'awareness')) {
                  $iconClass = 'bi-megaphone-fill';
                  $colorClass = 'sky';
              }
            @endphp

            <div class="category-row {{ $loop->first ? 'active' : '' }}">
              <div class="category-row-icon {{ $colorClass }}">
                <i class="bi {{ $iconClass }}"></i>
              </div>

              <div class="category-row-content">
                <h4>{{ $category->category }}</h4>

                @if($latestEvent)
                  <p>
                    Latest: {{ \Illuminate\Support\Str::limit($latestEvent->title, 58) }}
                  </p>
                @else
                  <p>{{ $category->category }} related events and activities.</p>
                @endif

                
              </div>

              <div class="category-row-count">
                {{ str_pad($category->total, 2, '0', STR_PAD_LEFT) }}
              </div>
            </div>
          @empty
            <div class="category-row active">
              <div class="category-row-icon">
                <i class="bi bi-calendar-x"></i>
              </div>

              <div class="category-row-content">
                <h4>No Categories Found</h4>
                <p>No event categories are available right now.</p>
              </div>

              <div class="category-row-count">00</div>
            </div>
          @endforelse

        </div>

      </div>

      <div class="event-category-dashboard">

        <div class="dashboard-card-main">
          <div class="dashboard-top">
            <div>
              <span class="dashboard-label">Category Status</span>
              <h3>Well Organized Event System</h3>
            </div>

            <div class="dashboard-icon">
              <i class="bi bi-bar-chart-fill"></i>
            </div>
          </div>

          <div class="dashboard-progress-list">

            <div class="dashboard-progress-item">
              <div class="progress-info">
                <span>Upcoming Events</span>
                <strong>{{ $upcomingEventCount }}</strong>
              </div>
              <div class="progress-line">
                <span style="width: {{ $upcomingPercent }}%;"></span>
              </div>
            </div>

            <div class="dashboard-progress-item">
              <div class="progress-info">
                <span>Ongoing Events</span>
                <strong>{{ $ongoingEventCount }}</strong>
              </div>
              <div class="progress-line green">
                <span style="width: {{ $ongoingPercent }}%;"></span>
              </div>
            </div>

            <div class="dashboard-progress-item">
              <div class="progress-info">
                <span>Completed Events</span>
                <strong>{{ $completedEventCount }}</strong>
              </div>
              <div class="progress-line sky">
                <span style="width: {{ $completedPercent }}%;"></span>
              </div>
            </div>

          </div>
        </div>

        <div class="dashboard-stats-grid">

          <div class="dashboard-stat-card">
            <i class="bi bi-calendar-event-fill"></i>
            <strong>{{ $totalEvents }}+</strong>
            <span>Total Events</span>
          </div>

          <div class="dashboard-stat-card green">
            <i class="bi bi-folder-check"></i>
            <strong>{{ str_pad($totalCategories, 2, '0', STR_PAD_LEFT) }}</strong>
            <span>Categories</span>
          </div>

          <div class="dashboard-stat-card sky">
            <i class="bi bi-people-fill"></i>
            <strong>{{ $totalParticipants > 0 ? $totalParticipants . '+' : '0+' }}</strong>
            <span>Participants</span>
          </div>

        </div>

        <div class="category-action-strip">
          <div>
            <h4>Need better event sorting?</h4>
            <p>
              {{ $totalCategories }} categories are connected with {{ $totalEvents }} active events.
            </p>
          </div>

          <a href="{{ url('events') }}" class="category-strip-btn">
            View Events
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= EVENT CATEGORY MANAGEMENT SECTION END ================= -->



<!-- ================= REGISTRATION ENQUIRY CTA SECTION START ================= -->
<section class="registration-cta-section">
  <div class="registration-cta-shape registration-cta-shape-1"></div>
  <div class="registration-cta-shape registration-cta-shape-2"></div>

  <div class="container">

    <div class="registration-cta-wrapper">

      <!-- LEFT CONTENT -->
      <div class="registration-cta-content">
        <div class="section-badge">
          <span><i class="bi bi-pencil-square"></i></span>
          Registration / Enquiry
        </div>

        <h2>
          Want to join our programs?
          <span>Register or send your enquiry today.</span>
        </h2>

        <p>
          Connect with Janki Social Foundation for education awareness, skill development,
          women empowerment, youth empowerment, community welfare and social awareness programs.
        </p>

        <div class="registration-cta-points">

          <div class="registration-point">
            <div class="registration-point-icon">
              <i class="bi bi-check-circle-fill"></i>
            </div>
            <div>
              <h4>Easy Registration</h4>
              <p>Submit your basic details and our team will connect with you.</p>
            </div>
          </div>

          <div class="registration-point">
            <div class="registration-point-icon green">
              <i class="bi bi-people-fill"></i>
            </div>
            <div>
              <h4>Program Guidance</h4>
              <p>Get information about upcoming events, training and welfare initiatives.</p>
            </div>
          </div>

          <div class="registration-point">
            <div class="registration-point-icon sky">
              <i class="bi bi-headset"></i>
            </div>
            <div>
              <h4>Quick Support</h4>
              <p>Reach out for volunteer, participant, donor or partner enquiries.</p>
            </div>
          </div>

        </div>
      </div>

      <!-- RIGHT FORM -->
      <div class="registration-cta-form-card">

        <div class="registration-form-head">
          <div>
            <span>Send Enquiry</span>
            <h3>Register Your Interest</h3>
          </div>

          <div class="registration-form-icon">
            <i class="bi bi-send-fill"></i>
          </div>
        </div>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul style="margin:0;padding-left:18px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form class="registration-form" action="{{ route('frontend.registration-enquiry.store') }}" method="post">
    @csrf

    <div class="form-grid">
        <div class="form-group">
            <label>Your Name <span>*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required>
        </div>

        <div class="form-group">
            <label>Mobile Number <span>*</span></label>
            <input type="tel" name="mobile" value="{{ old('mobile') }}" placeholder="Enter mobile number" required>
        </div>
    </div>

    <div class="form-grid">
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter email address">
        </div>

        <div class="form-group">
            <label>Enquiry Type</label>
            <select name="enquiry_type">
                <option value="">Select enquiry type</option>
                <option value="Program Registration" {{ old('enquiry_type') == 'Program Registration' ? 'selected' : '' }}>Program Registration</option>
                <option value="Volunteer Enquiry" {{ old('enquiry_type') == 'Volunteer Enquiry' ? 'selected' : '' }}>Volunteer Enquiry</option>
                <option value="Donation Enquiry" {{ old('enquiry_type') == 'Donation Enquiry' ? 'selected' : '' }}>Donation Enquiry</option>
                <option value="Partner / CSR Enquiry" {{ old('enquiry_type') == 'Partner / CSR Enquiry' ? 'selected' : '' }}>Partner / CSR Enquiry</option>
                <option value="General Enquiry" {{ old('enquiry_type') == 'General Enquiry' ? 'selected' : '' }}>General Enquiry</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label>Interested Program</label>
        <select name="interested_program">
            <option value="">Select program</option>
            <option value="Education Awareness" {{ old('interested_program') == 'Education Awareness' ? 'selected' : '' }}>Education Awareness</option>
            <option value="Skill Development" {{ old('interested_program') == 'Skill Development' ? 'selected' : '' }}>Skill Development</option>
            <option value="Vocational Training" {{ old('interested_program') == 'Vocational Training' ? 'selected' : '' }}>Vocational Training</option>
            <option value="Career Guidance" {{ old('interested_program') == 'Career Guidance' ? 'selected' : '' }}>Career Guidance</option>
            <option value="Women Empowerment" {{ old('interested_program') == 'Women Empowerment' ? 'selected' : '' }}>Women Empowerment</option>
            <option value="Youth Empowerment" {{ old('interested_program') == 'Youth Empowerment' ? 'selected' : '' }}>Youth Empowerment</option>
            <option value="Community Welfare" {{ old('interested_program') == 'Community Welfare' ? 'selected' : '' }}>Community Welfare</option>
            <option value="Social Awareness" {{ old('interested_program') == 'Social Awareness' ? 'selected' : '' }}>Social Awareness</option>
        </select>
    </div>

    <div class="form-group">
        <label>Your Message</label>
        <textarea name="message" placeholder="Write your message or requirement">{{ old('message') }}</textarea>
    </div>

    <button type="submit" class="registration-submit-btn">
        Submit Enquiry
        <i class="bi bi-arrow-right"></i>
    </button>
</form>

        <div class="registration-contact-strip">
          <a href="tel:{{ $websiteSetting->tel_link }}">
            <i class="bi bi-telephone-fill"></i>
            Call Now
          </a>

          <a href="https://wa.me/{{ $websiteSetting->whatsapp_link }}">
            <i class="bi bi-whatsapp"></i>
            WhatsApp
          </a>
        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= REGISTRATION ENQUIRY CTA SECTION END ================= -->



@endsection
