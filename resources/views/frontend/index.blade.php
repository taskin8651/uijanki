@extends('frontend.master')
@section('content')
<!-- ================= HERO SECTION START ================= -->
<section class="hero-section">
  <div class="hero-bg-shape hero-shape-1"></div>
  <div class="hero-bg-shape hero-shape-2"></div>
  <div class="hero-dot-pattern"></div>

  <div class="container">
    <div class="row align-items-center g-5">

      <!-- HERO CONTENT -->
      <div class="col-lg-6">
        <div class="hero-content">

          <div class="hero-badge">
            <span><i class="bi bi-stars"></i></span>
            Professional NGO For Social Impact
          </div>

          <h1>
            Empowering Lives Through
            <span>Education, Skills & Social Welfare</span>
          </h1>

          <p>
            Janki Social Foundation works to build an aware, skilled, educated and empowered society through education awareness, vocational training, career guidance, women empowerment, youth development and community welfare.
          </p>

          <div class="hero-actions">
            <a href="/donate" class="btn hero-btn-main">
              <i class="bi bi-heart-fill"></i>
              Donate For A Cause
            </a>

            <a href="/volunter" class="btn hero-btn-outline">
              Explore Our Work
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>

          <div class="hero-impact-row">
            <div class="hero-impact-item">
              <strong>500+</strong>
              <span>Beneficiaries</span>
            </div>

            <div class="hero-impact-item">
              <strong>35+</strong>
              <span>Events</span>
            </div>

            <div class="hero-impact-item">
              <strong>120+</strong>
              <span>Volunteers</span>
            </div>
          </div>

        </div>
      </div>

      <!-- HERO IMAGE SLIDER -->
      <div class="col-lg-6">
        <div class="hero-visual">

         <div class="hero-img-frame">
    <div class="hero-image-slider">

        @forelse($heroSliders as $key => $slider)
            <div class="hero-slide {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ $slider->slider_image }}"
                     alt="{{ $slider->alt_text ?? $slider->title ?? 'Janki Social Foundation Social Work' }}">
            </div>
        @empty
            <div class="hero-slide active">
                <img src="{{ asset('assets/img/hero-ngo.png') }}" alt="Janki Social Foundation Social Work">
            </div>

            <div class="hero-slide">
                <img src="{{ asset('assets/img/hero-ngo-2.png') }}" alt="Education Awareness Program">
            </div>

            <div class="hero-slide">
                <img src="{{ asset('assets/img/hero-ngo-3.png') }}" alt="Skill Development Program">
            </div>

            <div class="hero-slide">
                <img src="{{ asset('assets/img/hero-ngo-4.png') }}" alt="Community Welfare Program">
            </div>
        @endforelse

        <div class="hero-slider-dots">
            @if($heroSliders->count())
                @foreach($heroSliders as $key => $slider)
                    <button type="button"
                            class="{{ $key == 0 ? 'active' : '' }}"
                            aria-label="Slide {{ $key + 1 }}">
                    </button>
                @endforeach
            @else
                <button type="button" class="active" aria-label="Slide 1"></button>
                <button type="button" aria-label="Slide 2"></button>
                <button type="button" aria-label="Slide 3"></button>
                <button type="button" aria-label="Slide 4"></button>
            @endif
        </div>

    </div>
</div>

          <div class="hero-floating-card hero-floating-card-1">
            <div class="hero-floating-icon">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div>
              <h5>Education Support</h5>
              <p>Awareness & learning help</p>
            </div>
          </div>

          <div class="hero-floating-card hero-floating-card-2">
            <div class="hero-floating-icon green">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div>
              <h5>Campaign Progress</h5>
              <p>Transparent donation tracking</p>
            </div>
          </div>

          <div class="hero-trust-card">
            <i class="bi bi-patch-check-fill"></i>
            <span>Trusted NGO platform for real social impact, events, CSR and donation campaigns.</span>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<!-- ================= HERO SECTION END ================= -->


<!-- ================= NGO INTRODUCTION SECTION START ================= -->
@if($aboutPage)
<section class="ngo-intro-section">
  <div class="intro-bg-shape intro-shape-1"></div>
  <div class="intro-bg-shape intro-shape-2"></div>

  <div class="container">
    <div class="row align-items-center g-5">

      <!-- LEFT IMAGE AREA -->
      <div class="col-lg-6">
        <div class="intro-image-wrap">

          <div class="intro-main-image">
            <img src="{{ $aboutPage->background_image }}"
                 alt="{{ $aboutPage->image_badge ?? $aboutPage->heading ?? 'Janki Social Foundation Community Work' }}">
          </div>

          <div class="intro-experience-card">
            <div class="intro-exp-icon">
              <i class="bi bi-heart-pulse-fill"></i>
            </div>

            <div>
              <h4>{{ $aboutPage->floating_title ?? 'Social Impact' }}</h4>
              <p>{{ $aboutPage->floating_subtitle ?? 'Education • Skill • Welfare' }}</p>
            </div>
          </div>

          <div class="intro-mini-card">
            <i class="bi bi-patch-check-fill"></i>
            <span>
              {{ $aboutPage->image_badge ?? 'Transparent, community-focused and impact-driven NGO work.' }}
            </span>
          </div>

        </div>
      </div>

      <!-- RIGHT CONTENT AREA -->
      <div class="col-lg-6">
        <div class="intro-content">

          <div class="section-badge">
            <span><i class="bi bi-stars"></i></span>
            {{ $aboutPage->section_badge ?? 'NGO Introduction' }}
          </div>

          <h2>
            {{ $aboutPage->heading ?? 'Building an aware, skilled and empowered society through' }}
            <span>{{ $aboutPage->highlight_heading ?? 'meaningful social initiatives.' }}</span>
          </h2>

          @if($aboutPage->description_one)
            <p>{!! $aboutPage->description_one !!}</p>
          @endif

          @if($aboutPage->description_two)
            <p>{!! $aboutPage->description_two !!}</p>
          @endif

          <div class="intro-feature-grid">

            @if($aboutPage->point_one_title || $aboutPage->point_one_text)
              <div class="intro-feature-item">
                <div class="intro-feature-icon">
                  <i class="bi bi-book-half"></i>
                </div>
                <div>
                  <h4>{{ $aboutPage->point_one_title ?? 'Education Awareness' }}</h4>
                  <p>{{ $aboutPage->point_one_text ?? 'Learning support, motivation and awareness programs.' }}</p>
                </div>
              </div>
            @endif

            @if($aboutPage->point_two_title || $aboutPage->point_two_text)
              <div class="intro-feature-item">
                <div class="intro-feature-icon green">
                  <i class="bi bi-tools"></i>
                </div>
                <div>
                  <h4>{{ $aboutPage->point_two_title ?? 'Skill Development' }}</h4>
                  <p>{{ $aboutPage->point_two_text ?? 'Practical training, job-readiness and digital awareness.' }}</p>
                </div>
              </div>
            @endif

            @if($aboutPage->point_three_title || $aboutPage->point_three_text)
              <div class="intro-feature-item">
                <div class="intro-feature-icon sky">
                  <i class="bi bi-people-fill"></i>
                </div>
                <div>
                  <h4>{{ $aboutPage->point_three_title ?? 'Community Welfare' }}</h4>
                  <p>{{ $aboutPage->point_three_text ?? 'Social support, awareness drives and local development.' }}</p>
                </div>
              </div>
            @endif

            @if($aboutPage->purpose_title || $aboutPage->purpose_description)
              <div class="intro-feature-item">
                <div class="intro-feature-icon green">
                  <i class="bi bi-person-heart"></i>
                </div>
                <div>
                  <h4>{{ $aboutPage->purpose_title ?? 'Empowerment' }}</h4>
                  <p>{{ $aboutPage->purpose_description ?? 'Women, youth and beneficiary-focused initiatives.' }}</p>
                </div>
              </div>
            @endif

          </div>

          <div class="intro-actions">
            @if($aboutPage->button_one_text)
              <a href="{{ url($aboutPage->button_one_link ?? 'about') }}" class="btn intro-btn-main">
                {{ $aboutPage->button_one_text }}
                <i class="bi bi-arrow-right"></i>
              </a>
            @endif

            @if($aboutPage->button_two_text)
              <a href="{{ url($aboutPage->button_two_link ?? 'volunter') }}" class="btn intro-btn-soft">
                <i class="bi bi-person-plus-fill"></i>
                {{ $aboutPage->button_two_text }}
              </a>
            @endif
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
@endif
<!-- ================= NGO INTRODUCTION SECTION END ================= -->


<!-- ================= MISSION VISION VALUES SECTION START ================= -->
<section class="mvv-section">
  <div class="mvv-bg-shape mvv-shape-1"></div>
  <div class="mvv-bg-shape mvv-shape-2"></div>

  <div class="container">

    <!-- SECTION HEADING -->
    <div class="mvv-section-head">
      <div class="section-badge">
        <span><i class="bi bi-gem"></i></span>
        Mission, Vision & Values
      </div>

      <h2>
        Guided by purpose, transparency and
        <span>long-term social commitment.</span>
      </h2>

      <p>
        Janki Social Foundation works with a clear mission to support education, skills, empowerment, social awareness and community welfare for a better society.
      </p>
    </div>

    <!-- MAIN MVV GRID -->
    @if($aboutPage)
<div class="mvv-main-grid">

    <!-- Mission -->
    <div class="mvv-feature-card mission-card">
        <div class="mvv-card-glow"></div>

        <div class="mvv-icon">
            <i class="bi bi-rocket-takeoff-fill"></i>
        </div>

        <span class="mvv-number">01</span>

        <h3>{{ $aboutPage->mission_title ?? 'Our Mission' }}</h3>

        @if($aboutPage->mission_description)
            <p>{{ $aboutPage->mission_description }}</p>
        @endif

        @if(!empty($aboutPage->mission_points))
            <ul>
                @foreach($aboutPage->mission_points as $point)
                    @if($point)
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $point }}
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Vision -->
    <div class="mvv-feature-card vision-card featured">
        <div class="mvv-card-glow"></div>

        <div class="mvv-icon white">
            <i class="bi bi-eye-fill"></i>
        </div>

        <span class="mvv-number">02</span>

        <h3>{{ $aboutPage->vision_title ?? 'Our Vision' }}</h3>

        @if($aboutPage->vision_description)
            <p>{{ $aboutPage->vision_description }}</p>
        @endif

        @if(!empty($aboutPage->vision_points))
            <ul>
                @foreach($aboutPage->vision_points as $point)
                    @if($point)
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $point }}
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Purpose -->
    <div class="mvv-feature-card purpose-card">
        <div class="mvv-card-glow"></div>

        <div class="mvv-icon green">
            <i class="bi bi-heart-fill"></i>
        </div>

        <span class="mvv-number">03</span>

        <h3>{{ $aboutPage->purpose_title ?? 'Our Purpose' }}</h3>

        @if($aboutPage->purpose_description)
            <p>{{ $aboutPage->purpose_description }}</p>
        @endif

        @if(!empty($aboutPage->purpose_points))
            <ul>
                @foreach($aboutPage->purpose_points as $point)
                    @if($point)
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $point }}
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif
    </div>

</div>
@endif

    <!-- VALUE MINI CARDS -->
    <div class="mvv-mini-grid">

      <div class="mvv-mini-card">
        <div class="mvv-mini-icon">
          <i class="bi bi-shield-check"></i>
        </div>
        <div>
          <h4>Transparency</h4>
          <p>Clear campaigns, donor records and impact updates.</p>
        </div>
      </div>

      <div class="mvv-mini-card">
        <div class="mvv-mini-icon green">
          <i class="bi bi-people-fill"></i>
        </div>
        <div>
          <h4>Community First</h4>
          <p>Programs designed around real community needs.</p>
        </div>
      </div>

      <div class="mvv-mini-card">
        <div class="mvv-mini-icon sky">
          <i class="bi bi-lightbulb-fill"></i>
        </div>
        <div>
          <h4>Awareness</h4>
          <p>Encouraging education, responsibility and participation.</p>
        </div>
      </div>

      <div class="mvv-mini-card">
        <div class="mvv-mini-icon">
          <i class="bi bi-graph-up-arrow"></i>
        </div>
        <div>
          <h4>Impact</h4>
          <p>Focused on measurable outcomes and long-term change.</p>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- ================= MISSION VISION VALUES SECTION END ================= -->


<!-- ================= PREMIUM FOCUS AREAS SECTION START ================= -->
<section class="jsf-focus-section">
  <div class="jsf-focus-pattern"></div>
  <div class="jsf-focus-orb orb-1"></div>
  <div class="jsf-focus-orb orb-2"></div>

  <div class="container">

    <!-- SECTION HEAD -->
    <div class="jsf-focus-head">
      <div>
        <div class="jsf-section-badge">
          <span><i class="bi bi-stars"></i></span>
          Key Focus Areas
        </div>

        <h2>
          Programs designed to create
          <span>awareness, skills & empowerment.</span>
        </h2>
      </div>

      <p>
        Janki Social Foundation works across education, vocational training,
        career guidance, women empowerment, youth development and community welfare
        to create long-term social impact.
      </p>
    </div>

    <!-- BENTO GRID -->
   @if($campaigns->count())
<div class="jsf-focus-grid">

  @foreach($campaigns as $key => $campaign)
    @php
        $number = str_pad($key + 1, 2, '0', STR_PAD_LEFT);

        $cardClass = '';
        $iconClass = 'blue';
        $linkClass = '';
        $buttonText = $campaign->button_one_text ?? 'Read More';
        $buttonLink = $campaign->button_one_link ? url($campaign->button_one_link) : route('frontend.campaigns.index');

        if($key == 0) {
            $cardClass = 'jsf-card-main';
            $iconClass = 'light';
            $linkClass = 'light-link';
        } elseif($key == 2) {
            $cardClass = 'jsf-card-soft-green';
            $iconClass = 'green';
        } elseif($key == 3) {
            $cardClass = 'jsf-card-gradient';
            $iconClass = 'light';
            $linkClass = 'light-link';
        } elseif($key == 5) {
            $cardClass = 'jsf-card-image-wide';
            $iconClass = 'light';
            $linkClass = 'light-link';
        } elseif($key == 6) {
            $cardClass = 'jsf-card-soft-blue';
            $iconClass = 'sky';
        } elseif($key == 7) {
            $cardClass = 'jsf-card-cta';
            $iconClass = 'light';
            $linkClass = 'light-link';
        }
    @endphp

    @if($key == 0)
      {{-- MAIN IMAGE CARD --}}
      <div class="jsf-focus-card {{ $cardClass }}">
        <div class="jsf-card-img">
          <img src="{{ $campaign->campaign_image }}" alt="{{ $campaign->title }}">
        </div>

        <div class="jsf-main-overlay"></div>

        <div class="jsf-main-content">
          <div class="jsf-card-icon {{ $iconClass }}">
            <i class="bi bi-megaphone-fill"></i>
          </div>

          <div>
            <span class="jsf-card-count">{{ $number }}</span>

            <h3>{{ $campaign->title }}</h3>

            <p>
              {{ \Illuminate\Support\Str::limit(strip_tags($campaign->short_description), 140) }}
            </p>
          </div>

          <a href="{{ $buttonLink }}" class="jsf-card-link {{ $linkClass }}">
            {{ $buttonText }}
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>

    @elseif($key == 5)
      {{-- WIDE IMAGE CARD --}}
      <div class="jsf-focus-card {{ $cardClass }}">
        <div class="jsf-card-img">
          <img src="{{ $campaign->campaign_image }}" alt="{{ $campaign->title }}">
        </div>

        <div class="jsf-main-overlay green-overlay"></div>

        <div class="jsf-main-content compact">
          <div class="jsf-card-icon {{ $iconClass }}">
            <i class="bi bi-megaphone-fill"></i>
          </div>

          <div>
            <span class="jsf-card-count">{{ $number }}</span>

            <h3>{{ $campaign->title }}</h3>

            <p>
              {{ \Illuminate\Support\Str::limit(strip_tags($campaign->short_description), 130) }}
            </p>
          </div>

          <a href="{{ $buttonLink }}" class="jsf-card-link {{ $linkClass }}">
            {{ $buttonText }}
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>

    @else
      {{-- NORMAL CARD --}}
      <div class="jsf-focus-card {{ $cardClass }}">
        @if($cardClass == 'jsf-card-cta')
          <div class="jsf-cta-shine"></div>
        @endif

        <div class="jsf-card-icon {{ $iconClass }}">
          <i class="bi bi-megaphone-fill"></i>
        </div>

        <span class="jsf-card-count">{{ $number }}</span>

        <h3>{{ $campaign->title }}</h3>

        <p>
          {{ \Illuminate\Support\Str::limit(strip_tags($campaign->short_description), 130) }}
        </p>

        <a href="{{ $buttonLink }}" class="jsf-card-link {{ $linkClass }}">
          {{ $buttonText }}
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    @endif

  @endforeach

</div>
@else
<div class="gallery-empty-box">
    <h3>No Campaign Found</h3>
    <p>No active campaigns are available right now.</p>
</div>
@endif

  </div>
</section>
<!-- ================= PREMIUM FOCUS AREAS SECTION END ================= -->


<!-- ================= ACTIVE DONATION CAMPAIGN SECTION START ================= -->
<section class="donation-preview-section">
  <div class="donation-bg-shape donation-shape-1"></div>
  <div class="donation-bg-shape donation-shape-2"></div>

  <div class="container">

    <div class="row align-items-center g-5">

      <!-- LEFT CONTENT -->
      <div class="col-lg-5">
        <div class="donation-preview-content">

          <div class="section-badge donation-badge">
            <span><i class="bi bi-heart-fill"></i></span>
            Active Donation Campaign
          </div>

          <h2>
            Support a cause and help us create
            <span>real community impact.</span>
          </h2>

          <p>
            Your donation helps Janki Social Foundation run education awareness camps, skill development programs, vocational training sessions, career guidance workshops and community welfare activities.
          </p>

          <div class="donation-feature-list">

            <div class="donation-feature">
              <i class="bi bi-check-circle-fill"></i>
              <span>Transparent donation tracking</span>
            </div>

            <div class="donation-feature">
              <i class="bi bi-check-circle-fill"></i>
              <span>Campaign-wise fund progress</span>
            </div>

            <div class="donation-feature">
              <i class="bi bi-check-circle-fill"></i>
              <span>Donor recognition with permission</span>
            </div>

          </div>

          <div class="donation-preview-actions">
            <a href="/donate" class="btn donation-btn-main">
              Donate Now
              <i class="bi bi-arrow-right"></i>
            </a>

            <a href="/campaigns" class="btn donation-btn-soft">
              View All Campaigns
            </a>
          </div>

        </div>
      </div>

      <!-- RIGHT CAMPAIGN CARD -->
      @if($activeCampaign)
<div class="col-lg-7">
    <div class="donation-campaign-card">

        <div class="campaign-image-area">
            <img src="{{ $activeCampaign->campaign_image }}"
                 alt="{{ $activeCampaign->title ?? 'Donation Campaign' }}">

            <div class="campaign-status-badge">
                <span></span>
                {{ $activeCampaign->status_badge ?? 'Active Campaign' }}
            </div>

            @if($activeCampaign->category)
                <div class="campaign-category-badge">
                    {{ $activeCampaign->category }}
                </div>
            @endif
        </div>

        <div class="campaign-card-content">

            <div class="campaign-card-head">
                <div>
                    <span class="campaign-small-title">
                        Current Fundraising Campaign
                    </span>

                    <h3>{{ $activeCampaign->title }}</h3>
                </div>

                <div class="campaign-percent">
                    <strong>{{ $activeCampaign->progress_percentage }}%</strong>
                    <span>Raised</span>
                </div>
            </div>

            <p>
                {{ \Illuminate\Support\Str::limit(strip_tags($activeCampaign->short_description), 180) }}
            </p>

            @php
                $goalAmount = $activeCampaign->goal_amount ?? 0;
                $raisedAmount = $activeCampaign->raised_amount ?? 0;
                $remainingAmount = max($goalAmount - $raisedAmount, 0);
            @endphp

            <div class="campaign-amount-grid">

                <div class="campaign-amount-box">
                    <span>Target Amount</span>
                    <strong>₹{{ number_format($goalAmount, 0) }}</strong>
                </div>

                <div class="campaign-amount-box">
                    <span>Raised Amount</span>
                    <strong>₹{{ number_format($raisedAmount, 0) }}</strong>
                </div>

                <div class="campaign-amount-box">
                    <span>Remaining</span>
                    <strong>₹{{ number_format($remainingAmount, 0) }}</strong>
                </div>

            </div>

            <div class="campaign-progress-wrap">
                <div class="campaign-progress-info">
                    <span>Campaign Progress</span>
                    <strong>
                        ₹{{ number_format($raisedAmount, 0) }} raised of ₹{{ number_format($goalAmount, 0) }}
                    </strong>
                </div>

                <div class="campaign-progress">
                    <div class="campaign-progress-bar"
                         style="width: {{ $activeCampaign->progress_percentage }}%;">
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="campaign-meta-row">

                <div class="campaign-meta-item">
                    <i class="bi bi-people-fill"></i>
                    <div>
                        <strong>{{ $activeCampaign->supporters ?? 0 }}</strong>
                        <span>Supporters</span>
                    </div>
                </div>

                <div class="campaign-meta-item">
                    <i class="bi bi-calendar-check-fill"></i>
                    <div>
                        <strong>{{ $activeCampaign->days_left ?? 'Active' }}</strong>
                        <span>Remaining</span>
                    </div>
                </div>

                <div class="campaign-meta-item">
                    <i class="bi bi-shield-check"></i>
                    <div>
                        <strong>Verified</strong>
                        <span>Manual Tracking</span>
                    </div>
                </div>

            </div>

            <div class="campaign-card-footer">
                <div class="campaign-donor-stack">
                    <span>J</span>
                    <span>S</span>
                    <span>F</span>
                    <span>+</span>
                </div>

                <p>Recent supporters joined this campaign.</p>

                <a href="{{ $activeCampaign->button_one_link ? url($activeCampaign->button_one_link) : url('donate') }}"
                   class="campaign-card-link">
                    {{ $activeCampaign->button_one_text ?? 'View Details' }}
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </div>

    </div>
</div>
@endif

    </div>

  </div>
</section>
<!-- ================= ACTIVE DONATION CAMPAIGN SECTION END ================= -->


<!-- ================= EVENTS PREVIEW SECTION START ================= -->
<section class="events-preview-section">
  <div class="events-bg-shape events-shape-1"></div>
  <div class="events-bg-shape events-shape-2"></div>

  <div class="container">

    <!-- SECTION HEADING -->
    <div class="events-section-head">
      <div class="section-badge">
        <span><i class="bi bi-calendar-event-fill"></i></span>
        Upcoming & Recent Events
      </div>

      <h2>
        Events, workshops and social activities
        <span>creating real community impact.</span>
      </h2>

      <p>
        Stay connected with our upcoming programs, ongoing activities and completed events across education, skill development, women empowerment, youth development and community welfare.
      </p>
    </div>

   @if($featuredEvent || $sideEvents->count())
<div class="events-preview-layout">

  @if($featuredEvent)
    <!-- FEATURED EVENT -->
    <div class="featured-event-card">

      <div class="featured-event-image">
        <img src="{{ $featuredEvent->event_image }}"
             alt="{{ $featuredEvent->title ?? 'Featured Event' }}">

        <div class="event-status {{ strtolower($featuredEvent->status_badge ?? 'upcoming') }}">
          <span></span>
          {{ $featuredEvent->status_badge ?? 'Upcoming Event' }}
        </div>

        @if($featuredEvent->start_date)
          <div class="event-date-badge">
            <strong>{{ $featuredEvent->start_date->format('d') }}</strong>
            <span>{{ $featuredEvent->start_date->format('M') }}</span>
          </div>
        @endif
      </div>

      <div class="featured-event-content">

        @if($featuredEvent->category)
          <div class="event-category">
            <i class="bi bi-mortarboard-fill"></i>
            {{ $featuredEvent->category }}
          </div>
        @endif

        <h3>{{ $featuredEvent->title }}</h3>

        <p>
          {{ \Illuminate\Support\Str::limit(strip_tags($featuredEvent->short_description), 190) }}
        </p>

        <div class="event-info-grid">

          <div class="event-info-item">
            <i class="bi bi-clock-fill"></i>
            <div>
              <strong>
                {{ $featuredEvent->start_time ? \Carbon\Carbon::parse($featuredEvent->start_time)->format('h:i A') : 'Time TBA' }}
              </strong>
              <span>Event Time</span>
            </div>
          </div>

          <div class="event-info-item">
            <i class="bi bi-geo-alt-fill"></i>
            <div>
              <strong>{{ $featuredEvent->location ?? 'Location TBA' }}</strong>
              <span>Location</span>
            </div>
          </div>

          <div class="event-info-item">
            <i class="bi bi-people-fill"></i>
            <div>
              <strong>{{ $featuredEvent->info_one_title ?? 'Open Entry' }}</strong>
              <span>{{ $featuredEvent->info_one_text ?? 'Registration' }}</span>
            </div>
          </div>

        </div>

        <div class="featured-event-actions">
          @if($featuredEvent->button_one_text)
            <a href="{{ $featuredEvent->button_one_link ? url($featuredEvent->button_one_link) : url('contact') }}"
               class="btn event-btn-main">
              {{ $featuredEvent->button_one_text }}
              <i class="bi bi-arrow-right"></i>
            </a>
          @endif

          @if($featuredEvent->button_two_text)
            <a href="{{ $featuredEvent->button_two_link ? url($featuredEvent->button_two_link) : url('event') }}"
               class="btn event-btn-soft">
              {{ $featuredEvent->button_two_text }}
            </a>
          @endif
        </div>

      </div>

    </div>
  @endif

  <!-- SIDE EVENTS -->
  @if($sideEvents->count())
    <div class="events-side-list">

      @foreach($sideEvents as $event)
        <div class="side-event-card">
          <div class="side-event-image">
            <img src="{{ $event->event_image }}"
                 alt="{{ $event->title ?? 'Event' }}">
          </div>

          <div class="side-event-content">
            <div class="side-event-top">
              <span class="side-event-status {{ strtolower($event->status_badge ?? 'upcoming') }}">
                {{ $event->status_badge ?? 'Upcoming' }}
              </span>

              @if($event->start_date)
                <span class="side-event-date">
                  {{ $event->start_date->format('d M') }}
                </span>
              @else
                <span class="side-event-date">TBA</span>
              @endif
            </div>

            <h4>{{ $event->title }}</h4>

            <p>
              {{ \Illuminate\Support\Str::limit(strip_tags($event->short_description), 105) }}
            </p>

            <a href="{{ $event->button_one_link ? url($event->button_one_link) : url('event') }}">
              {{ $event->button_one_text ?? 'View Event' }}
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      @endforeach

    </div>
  @endif

</div>
@else
<div class="gallery-empty-box">
    <h3>No Event Found</h3>
    <p>No active events are available right now.</p>
</div>
@endif

    <!-- EVENT CATEGORY PILLS -->
    <!-- <div class="event-category-pills">

      <span><i class="bi bi-book-half"></i> Education Camp</span>
      <span><i class="bi bi-tools"></i> Training Workshop</span>
      <span><i class="bi bi-award-fill"></i> Career Seminar</span>
      <span><i class="bi bi-gender-female"></i> Women Empowerment</span>
      <span><i class="bi bi-people-fill"></i> Community Welfare</span>
      <span><i class="bi bi-megaphone-fill"></i> Awareness Drive</span>

    </div> -->

  </div>
</section>
<!-- ================= EVENTS PREVIEW SECTION END ================= -->


<!-- ================= IMPACT NUMBERS SECTION START ================= -->
<section class="impact-numbers-section">
  <div class="impact-bg-shape impact-shape-1"></div>
  <div class="impact-bg-shape impact-shape-2"></div>

  <div class="container">

    <div class="impact-numbers-wrapper">

      <!-- LEFT CONTENT -->
      <div class="impact-left-content">

        <div class="section-badge">
          <span><i class="bi bi-graph-up-arrow"></i></span>
          Our Impact Numbers
        </div>

        <h2>
          Every number reflects a story of
          <span>hope, support and social change.</span>
        </h2>

        <p>
          Janki Social Foundation focuses on measurable community impact through education awareness, skill development,
          volunteer participation, donation campaigns, events and welfare activities.
        </p>

        <div class="impact-trust-box">
          <i class="bi bi-patch-check-fill"></i>
          <div>
            <strong>Transparent & Impact-Focused Work</strong>
            <small>Numbers can be updated dynamically from admin panel as per verified data.</small>
          </div>
        </div>

      </div>

      <!-- RIGHT COUNTERS -->
      <div class="impact-counter-grid">

        <div class="impact-counter-card">
          <div class="impact-card-icon">
            <i class="bi bi-people-fill"></i>
          </div>

          <div class="impact-counter-value">
            <span class="impact-counter" data-target="500">0</span><em>+</em>
          </div>

          <h4>Beneficiaries Reached</h4>
          <p>People supported through education, awareness and welfare activities.</p>
        </div>

        <div class="impact-counter-card featured">
          <div class="impact-card-icon green">
            <i class="bi bi-calendar-event-fill"></i>
          </div>

          <div class="impact-counter-value">
            <span class="impact-counter" data-target="35">0</span><em>+</em>
          </div>

          <h4>Events Completed</h4>
          <p>Community camps, workshops, awareness drives and training activities.</p>
        </div>

        <div class="impact-counter-card">
          <div class="impact-card-icon sky">
            <i class="bi bi-person-hearts"></i>
          </div>

          <div class="impact-counter-value">
            <span class="impact-counter" data-target="120">0</span><em>+</em>
          </div>

          <h4>Active Volunteers</h4>
          <p>Supporters helping in social campaigns, field activities and events.</p>
        </div>

        <div class="impact-counter-card">
          <div class="impact-card-icon green">
            <i class="bi bi-heart-fill"></i>
          </div>

          <div class="impact-counter-value">
            <span class="impact-counter" data-target="8">0</span><em>+</em>
          </div>

          <h4>Donation Campaigns</h4>
          <p>Cause-based campaigns for education, training and community welfare.</p>
        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= IMPACT NUMBERS SECTION END ================= -->



<!-- ================= FOUNDER MESSAGE SECTION START ================= -->
@if($featuredLeader)
<section class="founder-message-section">
  <div class="founder-bg-shape founder-shape-1"></div>
  <div class="founder-bg-shape founder-shape-2"></div>

  <div class="container">

    <div class="founder-message-card">

      <div class="row g-0 align-items-stretch">

        <!-- FOUNDER IMAGE -->
        <div class="col-lg-5">
          <div class="founder-image-area">

            <div class="founder-main-image">
              <img src="{{ $featuredLeader->leader_image }}"
                   alt="{{ $featuredLeader->name ?? 'Founder Leader' }}">
            </div>

            <div class="founder-image-badge">
              <i class="bi bi-patch-check-fill"></i>
              <div>
                <strong>{{ $featuredLeader->role_badge ?? 'Leadership With Purpose' }}</strong>

                @if(!empty($featuredLeader->focus_points))
                  <span>{{ implode(' • ', array_filter($featuredLeader->focus_points)) }}</span>
                @else
                  <span>Social impact • Trust • Community welfare</span>
                @endif
              </div>
            </div>

            <div class="founder-vertical-text">
              Janki Social Foundation
            </div>

          </div>
        </div>

        <!-- FOUNDER CONTENT -->
        <div class="col-lg-7">
          <div class="founder-content-area">

            <div class="section-badge">
              <span><i class="bi bi-chat-quote-fill"></i></span>
              Founder Message
            </div>

            <h2>
              “{{ $featuredLeader->role_badge ?? 'Every small effort becomes powerful when it is connected with' }}
              <span>education, dignity and opportunity.</span>”
            </h2>

            @if($featuredLeader->description)
              <p>
                {!! $featuredLeader->description !!}
              </p>
            @endif

            @if(!empty($featuredLeader->focus_points))
              <div class="founder-highlight-row">
                @foreach($featuredLeader->focus_points as $point)
                  @if($point)
                    <div class="founder-highlight-item">
                      <strong>{{ $loop->iteration < 10 ? '0'.$loop->iteration : $loop->iteration }}</strong>
                      <span>{{ $point }}</span>
                    </div>
                  @endif
                @endforeach
              </div>
            @endif

            @if($founderLeaders->count())
              <div class="founder-name-grid">

                @foreach($founderLeaders as $leader)
                  <div class="founder-name-card">
                    <div class="founder-name-icon {{ $loop->iteration % 2 == 0 ? 'green' : '' }}">
                      <i class="bi {{ $loop->iteration % 2 == 0 ? 'bi-person-heart' : 'bi-person-fill-check' }}"></i>
                    </div>

                    <div>
                      <h4>{{ $leader->name }}</h4>
                      <span>{{ $leader->role_badge ?? 'Founder Leader' }}</span>
                    </div>
                  </div>
                @endforeach

              </div>
            @endif

            <div class="founder-actions">
              <a href="{{ url('about') }}" class="btn founder-btn-main">
                Read Full Story
                <i class="bi bi-arrow-right"></i>
              </a>

              <a href="{{ url('contact') }}" class="btn founder-btn-soft">
                <i class="bi bi-person-plus-fill"></i>
                Join Our Mission
              </a>
            </div>

          </div>
        </div>

      </div>

    </div>

  </div>
</section>
@endif
<!-- ================= FOUNDER MESSAGE SECTION END ================= -->



<!-- ================= PREMIUM GALLERY PREVIEW SECTION START ================= -->
<section class="gallery-preview-section">
  <div class="gallery-bg-shape gallery-shape-1"></div>
  <div class="gallery-bg-shape gallery-shape-2"></div>
  <div class="gallery-bg-shape gallery-shape-3"></div>

  <div class="container">

    <!-- SECTION HEADING -->
    <div class="gallery-section-head">
      <div class="section-badge">
        <span><i class="bi bi-images"></i></span>
        Event Gallery Preview
      </div>

      <h2>
        Real moments from our social work,
        <span>events and community programs.</span>
      </h2>

      <p>
        Explore event-wise photos and activity highlights from education awareness, skill development,
        women empowerment, youth programs, CSR activities and community welfare campaigns.
      </p>
    </div>

    @if($eventGalleries->count())

    <!-- FILTER PILLS -->
    <div class="gallery-filter-pills">
        <button class="active" type="button" data-filter="all">All</button>

        @foreach($galleryCategories as $category)
            <button type="button" data-filter="{{ \Illuminate\Support\Str::slug($category) }}">
                {{ $category }}
            </button>
        @endforeach
    </div>

    <!-- GALLERY GRID -->
    <div class="gallery-preview-grid">

        @php
            $imageCounter = 0;
        @endphp

        @foreach($eventGalleries as $gallery)

            @php
                $event = $gallery->event;
                $images = $gallery->getMedia('gallery_images');
                $categorySlug = \Illuminate\Support\Str::slug($event?->category ?? 'gallery');
            @endphp

            @foreach($images as $image)

                @php
                    $imageCounter++;

                    $itemClass = '';

                    if($imageCounter == 1) {
                        $itemClass = 'gallery-large';
                    } elseif($imageCounter == 4) {
                        $itemClass = 'gallery-wide';
                    } elseif($imageCounter == 7) {
                        $itemClass = '';
                    }
                @endphp

                <div class="gallery-preview-item {{ $itemClass }}"
                     data-category="{{ $categorySlug }}">

                    <img src="{{ $image->getUrl() }}"
                         alt="{{ $event?->title ?? 'Event Gallery Image' }}">

                    <div class="gallery-overlay">

                        <div class="gallery-tag">
                            <i class="bi bi-images"></i>
                            {{ $event?->category ?? $event?->event_type ?? 'Event Gallery' }}
                        </div>

                        <div class="gallery-content">
                            <span>{{ $event?->status_badge ?? 'Gallery' }}</span>

                            <h3>
                                {{ $event?->title ?? 'Event Gallery' }}
                            </h3>

                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($event?->short_description), 85) }}
                            </p>
                        </div>

                        <a href="{{ url('gallery') }}" class="gallery-view-btn">
                            <i class="bi bi-arrow-up-right"></i>
                        </a>

                    </div>
                </div>

                @if($imageCounter >= 8)
                    @break
                @endif

            @endforeach

            @if($imageCounter >= 8)
                @break
            @endif

        @endforeach

    </div>

@else

    <div class="gallery-empty-box">
        <h3>No Gallery Found</h3>
        <p>No active event gallery images are available right now.</p>
    </div>

@endif
@section('scripts')
@parent
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.gallery-filter-pills button');
    const galleryItems = document.querySelectorAll('.gallery-preview-item');

    if (!filterButtons.length || !galleryItems.length) {
        return;
    }

    filterButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const filter = button.getAttribute('data-filter');

            filterButtons.forEach(function (btn) {
                btn.classList.remove('active');
            });

            button.classList.add('active');

            galleryItems.forEach(function (item) {
                const category = item.getAttribute('data-category');

                if (filter === 'all' || category === filter) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection

    <!-- BOTTOM CTA -->
    <div class="gallery-bottom-cta">
      <div class="gallery-cta-icon">
        <i class="bi bi-camera-reels-fill"></i>
      </div>

      <div class="gallery-cta-text">
        <h3>Want to explore more completed events?</h3>
        <p>View event-wise photo albums, videos and activity highlights.</p>
      </div>

      <a href="/gallery" class="btn gallery-btn-main">
        View Full Gallery
        <i class="bi bi-arrow-right"></i>
      </a>
    </div>

  </div>
</section>
<!-- ================= PREMIUM GALLERY PREVIEW SECTION END ================= -->



<!-- ================= ACTION CTA SECTION START ================= -->
<section class="action-cta-section">
  <div class="action-cta-shape action-cta-shape-1"></div>
  <div class="action-cta-shape action-cta-shape-2"></div>

  <div class="container">

    <!-- SECTION HEADING -->
    <div class="action-cta-head">
      <div class="section-badge">
        <span><i class="bi bi-hand-index-thumb-fill"></i></span>
        Get Involved
      </div>

      <h2>
        Choose how you want to support
        <span>Janki Social Foundation.</span>
      </h2>

      <p>
        Join our mission through volunteering, donation support, CSR collaboration or partnership for education, skill development and community welfare.
      </p>
    </div>

    <!-- CTA GRID -->
    <div class="action-cta-grid">

      <!-- Volunteer -->
      <div class="action-cta-card">
        <div class="action-cta-icon">
          <i class="bi bi-person-heart"></i>
        </div>

        <span class="action-cta-number">01</span>

        <h3>Volunteer With Us</h3>

        <p>
          Support our events, awareness drives, education activities, skill programs and community welfare initiatives.
        </p>

        <a href="/volunteer" class="action-cta-link">
          Become Volunteer
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

      <!-- Donate -->
      <div class="action-cta-card action-cta-featured">
        <div class="action-cta-icon white">
          <i class="bi bi-heart-fill"></i>
        </div>

        <span class="action-cta-number">02</span>

        <h3>Donate For A Cause</h3>

        <p>
          Contribute to active donation campaigns and help us support education, training and welfare activities.
        </p>

        <a href="/donate" class="action-cta-link">
          Donate Now
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

      <!-- CSR -->
      <div class="action-cta-card">
        <div class="action-cta-icon green">
          <i class="bi bi-building-check"></i>
        </div>

        <span class="action-cta-number">03</span>

        <h3>CSR Collaboration</h3>

        <p>
          Collaborate for CSR projects in education, skill training, women empowerment and social awareness.
        </p>

        <a href="/csr" class="action-cta-link">
          Start CSR Talk
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

      <!-- Partner -->
      <div class="action-cta-card">
        <div class="action-cta-icon sky">
          <i class="fa-solid fa-handshake"></i>
        </div>

        <span class="action-cta-number">04</span>

        <h3>Partner With Us</h3>

        <p>
          Join as training partner, event partner, donor partner, institutional partner or knowledge partner.
        </p>

        <a href="/contact" class="action-cta-link">
          Partner Now
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

    </div>

  </div>
</section>
<!-- ================= ACTION CTA SECTION END ================= -->


@endsection