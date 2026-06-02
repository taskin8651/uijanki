@extends('frontend.master')
@section('content')


  <!-- ================= NGO BACKGROUND SECTION START ================= -->
  @if($aboutPage)
<section class="ngo-background-section">
    <div class="ngo-bg-shape ngo-bg-shape-1"></div>
    <div class="ngo-bg-shape ngo-bg-shape-2"></div>

    <div class="container">
        <div class="ngo-background-wrapper">

            <!-- LEFT IMAGE -->
            <div class="ngo-background-visual">
                <div class="ngo-background-image">
                    <img src="{{ $aboutPage->background_image }}" alt="{{ $aboutPage->heading ?? 'NGO Background' }}">
                </div>

                <div class="ngo-background-floating-card">
                    <div class="ngo-floating-icon">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <div>
                        <strong>{{ $aboutPage->floating_title ?? 'Social Impact' }}</strong>
                        <span>{{ $aboutPage->floating_subtitle ?? 'Education • Skills • Welfare' }}</span>
                    </div>
                </div>

                <div class="ngo-background-badge">
                    <i class="bi bi-patch-check-fill"></i>
                    {{ $aboutPage->image_badge ?? 'Community Development Focus' }}
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="ngo-background-content">
                <div class="section-badge">
                    <span><i class="bi bi-building-heart"></i></span>
                    {{ $aboutPage->section_badge ?? 'NGO Background' }}
                </div>

                <h2>
                    {{ $aboutPage->heading ?? 'Building an aware, skilled and' }}
                    <span>{{ $aboutPage->highlight_heading ?? 'empowered society.' }}</span>
                </h2>

                @if($aboutPage->description_one)
                    <p>{{ $aboutPage->description_one }}</p>
                @endif

                @if($aboutPage->description_two)
                    <p>{{ $aboutPage->description_two }}</p>
                @endif

                <div class="ngo-background-points">

                    <div class="ngo-point-item">
                        <i class="bi bi-book-half"></i>
                        <div>
                            <h4>{{ $aboutPage->point_one_title ?? 'Education Awareness' }}</h4>
                            <span>{{ $aboutPage->point_one_text ?? 'Learning support, student motivation and outreach programs.' }}</span>
                        </div>
                    </div>

                    <div class="ngo-point-item">
                        <i class="bi bi-tools"></i>
                        <div>
                            <h4>{{ $aboutPage->point_two_title ?? 'Skill & Vocational Training' }}</h4>
                            <span>{{ $aboutPage->point_two_text ?? 'Practical training for livelihood and self-reliance.' }}</span>
                        </div>
                    </div>

                    <div class="ngo-point-item">
                        <i class="bi bi-people-fill"></i>
                        <div>
                            <h4>{{ $aboutPage->point_three_title ?? 'Community Welfare' }}</h4>
                            <span>{{ $aboutPage->point_three_text ?? 'Public participation, social awareness and welfare campaigns.' }}</span>
                        </div>
                    </div>

                </div>

                <div class="ngo-background-actions">

                    @if($aboutPage->button_one_text)
                        <a href="{{ url($aboutPage->button_one_link ?? '#') }}" class="btn ngo-btn-main">
                            {{ $aboutPage->button_one_text }}
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    @endif

                    @if($aboutPage->button_two_text)
                        <a href="{{ url($aboutPage->button_two_link ?? '#') }}" class="btn ngo-btn-soft">
                            <i class="bi bi-person-heart"></i>
                            {{ $aboutPage->button_two_text }}
                        </a>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>
@endif
  <!-- ================= NGO BACKGROUND SECTION END ================= -->



  <!-- ================= SOCIAL DEVELOPMENT APPROACH SECTION START ================= -->
  <section class="social-approach-section">
    <div class="social-approach-shape social-approach-shape-1"></div>
    <div class="social-approach-shape social-approach-shape-2"></div>

    <div class="container">

      <!-- SECTION HEAD -->
      <div class="social-approach-head">
        <div class="section-badge">
          <span><i class="bi bi-diagram-3-fill"></i></span>
          Social Development Approach
        </div>

        <h2>
          A practical approach to create
          <span>long-term community impact.</span>
        </h2>

        <p>
          Janki Social Foundation follows a structured and transparent approach to connect people,
          resources and opportunities with communities that need education, skills, awareness and support.
        </p>
      </div>

      <!-- MAIN WRAPPER -->
      <div class="social-approach-wrapper">

        <!-- LEFT CONTENT -->
        <div class="social-approach-content">

          <div class="approach-feature-card">
            <div class="approach-feature-icon">
              <i class="bi bi-search-heart-fill"></i>
            </div>
            <div>
              <h3>Identify Community Needs</h3>
              <p>
                We understand local challenges related to education, skills, awareness, women empowerment,
                youth development and welfare support.
              </p>
            </div>
          </div>

          <div class="approach-feature-card">
            <div class="approach-feature-icon green">
              <i class="bi bi-people-fill"></i>
            </div>
            <div>
              <h3>Mobilize Volunteers & Resources</h3>
              <p>
                Volunteers, donors, partners and CSR collaborators are connected to meaningful social programs
                and community activities.
              </p>
            </div>
          </div>

          <div class="approach-feature-card">
            <div class="approach-feature-icon sky">
              <i class="bi bi-calendar2-check-fill"></i>
            </div>
            <div>
              <h3>Execute Programs & Events</h3>
              <p>
                Awareness camps, training workshops, career guidance sessions, welfare campaigns and public
                participation drives are organized.
              </p>
            </div>
          </div>

          <div class="approach-feature-card">
            <div class="approach-feature-icon orange">
              <i class="bi bi-bar-chart-fill"></i>
            </div>
            <div>
              <h3>Track Impact Transparently</h3>
              <p>
                Impact numbers, donation campaign progress, event outcomes and donor/supporter records help
                build public trust.
              </p>
            </div>
          </div>

        </div>

        <!-- RIGHT VISUAL -->
        <div class="social-approach-visual">

          <div class="approach-circle-card">
            <div class="approach-circle-inner">
              <span>Impact</span>
              <h3>Community First</h3>
              <p>Education • Skills • Welfare</p>
            </div>

            <div class="approach-orbit approach-orbit-1">
              <i class="bi bi-book-half"></i>
              <span>Education</span>
            </div>

            <div class="approach-orbit approach-orbit-2">
              <i class="bi bi-tools"></i>
              <span>Skills</span>
            </div>

            <div class="approach-orbit approach-orbit-3">
              <i class="bi bi-gender-female"></i>
              <span>Women</span>
            </div>

            <div class="approach-orbit approach-orbit-4">
              <i class="bi bi-heart-fill"></i>
              <span>Welfare</span>
            </div>
          </div>

          <div class="approach-trust-box">
            <i class="bi bi-patch-check-fill"></i>
            <div>
              <strong>Transparent Development Model</strong>
              <span>Program planning, participation, execution and impact reporting.</span>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section>
  <!-- ================= SOCIAL DEVELOPMENT APPROACH SECTION END ================= -->



  <!-- ================= MISSION VISION VALUES SECTION START ================= -->
  <section class="mission-vision-section">
    <div class="mvv-bg-shape mvv-shape-1"></div>
    <div class="mvv-bg-shape mvv-shape-2"></div>

    <div class="container">

      <!-- SECTION HEAD -->
      <div class="mvv-section-head">
        <div class="section-badge">
          <span><i class="bi bi-bullseye"></i></span>
          Mission, Vision & Core Values
        </div>

        <h2>
          Guided by purpose, transparency and
          <span>long-term social change.</span>
        </h2>

        <p>
          Janki Social Foundation is committed to building an aware, skilled, educated and empowered society
          through practical programs, social participation and community-focused initiatives.
        </p>
      </div>

      <!-- MAIN CARDS -->
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

      <!-- CORE VALUES -->
      <div class="core-values-wrapper">

        <div class="core-values-left">
          <div class="section-badge small-badge">
            <span><i class="bi bi-stars"></i></span>
            Core Values
          </div>

          <h3>Values that guide every initiative.</h3>

          <p>
            Our work is driven by trust, transparency, dignity, participation and measurable impact.
          </p>
        </div>

        <div class="core-values-grid">

          <div class="core-value-item">
            <div class="core-value-icon">
              <i class="bi bi-shield-check"></i>
            </div>
            <h4>Transparency</h4>
            <p>Clear reporting of campaigns, events, donors and social impact.</p>
          </div>

          <div class="core-value-item">
            <div class="core-value-icon green">
              <i class="bi bi-people-fill"></i>
            </div>
            <h4>Community First</h4>
            <p>Programs designed around real needs of people and communities.</p>
          </div>

          <div class="core-value-item">
            <div class="core-value-icon sky">
              <i class="bi bi-lightbulb-fill"></i>
            </div>
            <h4>Empowerment</h4>
            <p>Helping people gain awareness, skills, confidence and opportunities.</p>
          </div>

          <div class="core-value-item">
            <div class="core-value-icon orange">
              <i class="bi bi-hand-thumbs-up-fill"></i>
            </div>
            <h4>Accountability</h4>
            <p>Responsible work with respect, verified data and public trust.</p>
          </div>

        </div>

      </div>

    </div>
  </section>
  <!-- ================= MISSION VISION VALUES SECTION END ================= -->



  <!-- ================= FOUNDER LEADERSHIP SECTION START ================= -->
  <section class="founder-leadership-section">
    <div class="founder-leader-shape founder-leader-shape-1"></div>
    <div class="founder-leader-shape founder-leader-shape-2"></div>

    <div class="container">

      <!-- SECTION HEAD -->
      <div class="founder-leader-head">
        <div class="section-badge">
          <span><i class="bi bi-people-fill"></i></span>
          Founder & Leadership
        </div>

        <h2>
          Leadership committed to
          <span>community development and social change.</span>
        </h2>

        <p>
          Janki Social Foundation is guided by visionary leadership focused on education awareness,
          skill development, women empowerment, youth empowerment and community welfare.
        </p>
      </div>

      <!-- FOUNDER GRID -->
      @if(isset($founderLeaders) && $founderLeaders->count())
    <div class="founder-leader-grid">

        @foreach($founderLeaders as $leader)
            <div class="founder-leader-card {{ $leader->is_featured ? 'featured' : '' }}">
                <div class="founder-card-pattern"></div>

                <div class="founder-leader-image">
                    <img src="{{ $leader->leader_image }}" alt="{{ $leader->name }}">
                </div>

                <div class="founder-leader-content">
                    <div class="founder-role-badge">
                        @if($leader->is_featured)
                            <i class="bi bi-heart-fill"></i>
                        @else
                            <i class="bi bi-patch-check-fill"></i>
                        @endif

                        {{ $leader->role_badge }}
                    </div>

                    <h3>{{ $leader->name }}</h3>

                    <p>{{ $leader->description }}</p>

                    @if(!empty($leader->focus_points))
                        <div class="founder-focus-list">
                            @foreach($leader->focus_points as $point)
                                @if($point)
                                    <span>
                                        <i class="bi bi-check-circle-fill"></i>
                                        {{ $point }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
@endif

      <!-- MESSAGE STRIP -->
      <div class="founder-message-strip">
        <div class="founder-message-icon">
          <i class="bi bi-chat-quote-fill"></i>
        </div>

        <div>
          <h3>Leadership With Purpose</h3>
          <p>
            “Every small effort becomes powerful when it is connected with education, dignity and opportunity.”
          </p>
        </div>

        <a href="contact.html" class="btn founder-message-btn">
          Read Founder Message
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

    </div>
  </section>
  <!-- ================= FOUNDER LEADERSHIP SECTION END ================= -->


@endsection