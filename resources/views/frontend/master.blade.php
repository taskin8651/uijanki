@php
    $settingUrl = function ($path) {
        if (! $path) {
            return '#';
        }

        if (str_starts_with($path, 'http') || str_starts_with($path, '#') || str_starts_with($path, 'tel:') || str_starts_with($path, 'mailto:')) {
            return $path;
        }

        return url($path);
    };
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>{{ $websiteSetting->meta_title ?: 'Janki Social Foundation | Education, Skill Development & Social Welfare NGO' }}</title>
  <meta name="description" content="{{ $websiteSetting->meta_description ?: 'Janki Social Foundation works for education, skill development, women empowerment, youth empowerment, career guidance and community welfare.' }}" />
  <meta name="keywords" content="{{ $websiteSetting->meta_keywords ?: 'Janki Social Foundation, NGO, Education, Skill Development, Women Empowerment, Youth Empowerment, Donation, CSR, Volunteer' }}" />
  <link rel="icon" href="{{ $websiteSetting->favicon }}">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  <!-- AOS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<!-- ================= TOP BAR START ================= -->
<div class="topbar">
  <div class="container">
    <div class="topbar-inner">

      <div class="topbar-left">
        <a href="tel:{{ $websiteSetting->tel_link }}" class="topbar-info">
          <span class="topbar-icon">
            <i class="bi bi-telephone-fill"></i>
          </span>
          <span>{{ $websiteSetting->phone_display ?: $websiteSetting->phone_number }}</span>
        </a>

        <div class="topbar-info">
          <span class="topbar-icon">
            <i class="bi bi-geo-alt-fill"></i>
          </span>
          <span>{{ $websiteSetting->short_address ?: 'Bailey Road, Rajabazar, Patna' }}</span>
        </div>
      </div>

      <div class="topbar-right">
        <span class="topbar-text">Connect With Us</span>

        <div class="topbar-social">
          <a href="{{ $websiteSetting->facebook_url ?: '#' }}" aria-label="Facebook">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="{{ $websiteSetting->instagram_url ?: '#' }}" aria-label="Instagram">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="{{ $websiteSetting->youtube_url ?: '#' }}" aria-label="YouTube">
            <i class="bi bi-youtube"></i>
          </a>
          <a href="{{ $websiteSetting->linkedin_url ?: '#' }}" aria-label="LinkedIn">
            <i class="bi bi-linkedin"></i>
          </a>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- ================= TOP BAR END ================= -->


<!-- ================= HEADER START ================= -->
<header class="main-header" id="mainHeader">
  <nav class="navbar navbar-expand-lg">
    <div class="container">

      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ $websiteSetting->logo }}" alt="{{ $websiteSetting->site_name ?: 'Janki Social Foundation' }}">
      </a>

      <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
        <i class="bi bi-list"></i>
      </button>

      <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">About</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('initiatives*') ? 'active' : '' }}" href="{{ route('initiatives') }}">Initiatives</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('events*') ? 'active' : '' }}" href="{{ route('frontend.events.index') }}">Events</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('campaigns*') ? 'active' : '' }}" href="{{ route('frontend.campaigns.index') }}">Campaigns</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}" href="{{ route('frontend.gallery.index') }}">Gallery</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('csr*') ? 'active' : '' }}" href="{{ route('frontend.csr.index') }}">CSR</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('frontend.contact') }}">Contact</a></li>
        </ul>

        <div class="header-actions">
          <a href="{{ $settingUrl($websiteSetting->volunteer_url ?: 'volunter') }}" class="btn btn-soft">Volunteer</a>
          <a href="{{ $settingUrl($websiteSetting->donate_url ?: 'donate') }}" class="btn btn-main">Donate Now</a>
        </div>
      </div>

    </div>
  </nav>
</header>
<!-- ================= HEADER END ================= -->


@yield('content')



<!-- ================= FOOTER START ================= -->
<footer class="footer">
  <div class="container">
    <div class="row g-4">

      <div class="col-lg-4">
        <div class="footer-brand">
          <img src="{{ $websiteSetting->logo }}" alt="{{ $websiteSetting->site_name ?: 'Janki Social Foundation' }}">
        </div>
        <p>
          {{ $websiteSetting->footer_description ?: 'Working for education, skill development, vocational training, career guidance, women empowerment, youth empowerment and community welfare.' }}
        </p>
      </div>

      <div class="col-lg-2 col-md-4">
        <h5>Quick Links</h5>
        <a href="{{ route('frontend.about') }}">About</a>
        <a href="{{ route('initiatives') }}">Initiatives</a>
        <a href="{{ route('frontend.events.index') }}">Events</a>
        <a href="{{ route('frontend.gallery.index') }}">Gallery</a>
      </div>

      <div class="col-lg-3 col-md-4">
        <h5>Get Involved</h5>
        <a href="{{ $settingUrl($websiteSetting->donate_url ?: 'donate') }}">Donate</a>
        <a href="{{ $settingUrl($websiteSetting->volunteer_url ?: 'volunter') }}">Volunteer</a>
        <a href="{{ route('frontend.csr.index') }}">CSR</a>
        <a href="{{ route('frontend.contact') }}">Partner With Us</a>
      </div>

      <div class="col-lg-3 col-md-4">
        <h5>Contact</h5>
        <p><i class="bi bi-telephone-fill"></i> {{ $websiteSetting->phone_display ?: $websiteSetting->phone_number }}</p>
        <p><i class="bi bi-geo-alt-fill"></i> {{ $websiteSetting->full_address ?: '302 Chandan Deep Apartment, Bailey Road, Rajabazar, Patna' }}</p>
      </div>

    </div>

    <div class="footer-bottom">
      <p>{{ $websiteSetting->copyright_text ?: '© 2026 Janki Social Foundation. All Rights Reserved.' }}</p>
      <p>{{ $websiteSetting->footer_credit ?: 'Designed with care for social impact.' }}</p>
    </div>
  </div>
</footer>
<!-- ================= FOOTER END ================= -->


<!-- Floating Buttons -->
<div class="floating-actions">
  <a href="tel:{{ $websiteSetting->tel_link }}" class="call"><i class="bi bi-telephone-fill"></i></a>
  <a href="https://wa.me/{{ $websiteSetting->whatsapp_link }}" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
</div>

<!-- Mobile Bottom Nav -->
<div class="mobile-bottom-nav">
  <a href="{{ url('/') }}" class="active"><i class="bi bi-house-fill"></i><span>Home</span></a>
  <a href="{{ $settingUrl($websiteSetting->donate_url ?: 'donate') }}"><i class="bi bi-heart-fill"></i><span>Donate</span></a>
  <a href="{{ route('frontend.events.index') }}"><i class="bi bi-calendar-event"></i><span>Events</span></a>
  <a href="{{ $settingUrl($websiteSetting->volunteer_url ?: 'volunter') }}"><i class="bi bi-person-heart"></i><span>Volunteer</span></a>
  <a href="tel:{{ $websiteSetting->tel_link }}"><i class="bi bi-telephone-fill"></i><span>Call</span></a>
</div>


<!-- Scripts -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>

@yield('scripts')

</body>
</html>
