<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Janki Social Foundation | Education, Skill Development & Social Welfare NGO</title>
  <meta name="description" content="Janki Social Foundation works for education, skill development, women empowerment, youth empowerment, career guidance and community welfare." />
  <meta name="keywords" content="Janki Social Foundation, NGO, Education, Skill Development, Women Empowerment, Youth Empowerment, Donation, CSR, Volunteer" />

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
        <a href="tel:+917979026927" class="topbar-info">
          <span class="topbar-icon">
            <i class="bi bi-telephone-fill"></i>
          </span>
          <span>+91 7979026927</span>
        </a>

        <div class="topbar-info">
          <span class="topbar-icon">
            <i class="bi bi-geo-alt-fill"></i>
          </span>
          <span>Bailey Road, Rajabazar, Patna</span>
        </div>
      </div>

      <div class="topbar-right">
        <span class="topbar-text">Connect With Us</span>

        <div class="topbar-social">
          <a href="#" aria-label="Facebook">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="#" aria-label="Instagram">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="#" aria-label="YouTube">
            <i class="bi bi-youtube"></i>
          </a>
          <a href="#" aria-label="LinkedIn">
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

      <a class="navbar-brand" href="#">
        <img src="assets/img/JankiNGOLogo.png" alt="Janki Social Foundation">
      </a>

      <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
        <i class="bi bi-list"></i>
      </button>

      <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
          <li class="nav-item"><a class="nav-link" href="initiatives.html">Initiatives</a></li>
          <li class="nav-item"><a class="nav-link" href="event.html">Events</a></li>
          <li class="nav-item"><a class="nav-link" href="campaign.html">Campaigns</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="csr.html">CSR</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
        </ul>

        <div class="header-actions">
          <a href="volunter.html" class="btn btn-soft">Volunteer</a>
          <a href="donate.html" class="btn btn-main">Donate Now</a>
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
          <img src="assets/img/JankiNGOLogo.png" alt="">
        </div>
        <p>
          Working for education, skill development, vocational training, career guidance, women empowerment, youth empowerment and community welfare.
        </p>
      </div>

      <div class="col-lg-2 col-md-4">
        <h5>Quick Links</h5>
        <a href="#">About</a>
        <a href="#">Initiatives</a>
        <a href="#">Events</a>
        <a href="#">Gallery</a>
      </div>

      <div class="col-lg-3 col-md-4">
        <h5>Get Involved</h5>
        <a href="#">Donate</a>
        <a href="#">Volunteer</a>
        <a href="#">CSR</a>
        <a href="#">Partner With Us</a>
      </div>

      <div class="col-lg-3 col-md-4">
        <h5>Contact</h5>
        <p><i class="bi bi-telephone-fill"></i> +91 7979026927</p>
        <p><i class="bi bi-geo-alt-fill"></i> 302 Chandan Deep Apartment, Bailey Road, Rajabazar, Patna</p>
      </div>

    </div>

    <div class="footer-bottom">
      <p>© 2026 Janki Social Foundation. All Rights Reserved.</p>
      <p>Designed with care for social impact.</p>
    </div>
  </div>
</footer>
<!-- ================= FOOTER END ================= -->


<!-- Floating Buttons -->
<div class="floating-actions">
  <a href="tel:7979026927" class="call"><i class="bi bi-telephone-fill"></i></a>
  <a href="https://wa.me/917979026927" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
</div>

<!-- Mobile Bottom Nav -->
<div class="mobile-bottom-nav">
  <a href="index.html" class="active"><i class="bi bi-house-fill"></i><span>Home</span></a>
  <a href="donate.html"><i class="bi bi-heart-fill"></i><span>Donate</span></a>
  <a href="event.html"><i class="bi bi-calendar-event"></i><span>Events</span></a>
  <a href="volunter.html"><i class="bi bi-person-heart"></i><span>Volunteer</span></a>
  <a href="tel:7979026927"><i class="bi bi-telephone-fill"></i><span>Call</span></a>
</div>


<!-- Scripts -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>

@yield('scripts')

</body>
</html>
