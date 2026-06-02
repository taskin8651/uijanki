@extends('frontend.master')
@section('content')


<!-- ================= CONTACT FORM SECTION START ================= -->
<section class="contact-form-section">
  <div class="contact-form-shape contact-form-shape-1"></div>
  <div class="contact-form-shape contact-form-shape-2"></div>

  <div class="container">

    <div class="contact-form-wrapper">

      <!-- LEFT CONTENT -->
      <div class="contact-form-content">

        <div class="section-badge">
          <span><i class="bi bi-chat-dots-fill"></i></span>
          Contact Us
        </div>

        <h2>
          Get in touch with
          <span>Janki Social Foundation.</span>
        </h2>

        <p>
          Have a question about donation, volunteering, CSR collaboration, partnership,
          events or community welfare programs? Send your message and our team will
          connect with you.
        </p>

        <div class="contact-info-list">

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="bi bi-telephone-fill"></i>
            </div>
            <div>
              <h4>Call Support</h4>
              <p><a href="tel:7979026927">7979026927</a></p>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon green">
              <i class="bi bi-whatsapp"></i>
            </div>
            <div>
              <h4>WhatsApp</h4>
              <p><a href="https://wa.me/917979026927">Chat with our team</a></p>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon sky">
              <i class="bi bi-geo-alt-fill"></i>
            </div>
            <div>
              <h4>Office Address</h4>
              <p>
                302 Chandan Deep Apartment, Bailey Road, Rajabazar,
                Near Jagdeo Path Pillar No. 1, Patna
              </p>
            </div>
          </div>

        </div>

        <div class="contact-social-strip">
          <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
        </div>

      </div>

      <!-- RIGHT FORM -->
      <div class="contact-form-card">

        <div class="contact-card-head">
          <div>
            <span>Send Message</span>
            <h3>Contact Form</h3>
          </div>

          <div class="contact-card-icon">
            <i class="bi bi-send-fill"></i>
          </div>
        </div>

        <form class="contact-main-form" action="#" method="post">

          <div class="contact-form-group">
            <label for="contact_name">Full Name <span>*</span></label>
            <input
              type="text"
              id="contact_name"
              name="name"
              placeholder="Enter your full name"
              required>
          </div>

          <div class="contact-form-group">
            <label for="contact_mobile">Mobile Number <span>*</span></label>
            <input
              type="tel"
              id="contact_mobile"
              name="mobile"
              placeholder="Enter mobile number"
              required>
          </div>

          <div class="contact-form-group">
            <label for="contact_email">Email Address</label>
            <input
              type="email"
              id="contact_email"
              name="email"
              placeholder="Enter email address">
          </div>

          <div class="contact-form-group">
            <label for="contact_subject">Subject <span>*</span></label>
            <select id="contact_subject" name="subject" required>
              <option value="">Select subject</option>
              <option value="donation">Donation Enquiry</option>
              <option value="volunteer">Volunteer Enquiry</option>
              <option value="csr">CSR Collaboration</option>
              <option value="partner">Partnership</option>
              <option value="event">Event / Program</option>
              <option value="general">General Enquiry</option>
            </select>
          </div>

          <div class="contact-form-group full">
            <label for="contact_message">Message <span>*</span></label>
            <textarea
              id="contact_message"
              name="message"
              rows="5"
              placeholder="Write your message here..."
              required></textarea>
          </div>

          <div class="contact-form-note full">
            <i class="bi bi-shield-check"></i>
            <span>Your details are safe and will be used only for communication purpose.</span>
          </div>

          <div class="contact-form-submit full">
            <button type="submit">
              Submit Message
              <i class="bi bi-arrow-right"></i>
            </button>
          </div>

        </form>

      </div>

    </div>

  </div>
</section>
<!-- ================= CONTACT FORM SECTION END ================= -->



<!-- ================= GOOGLE MAP SECTION START ================= -->
<section class="google-map-section">
  <div class="google-map-shape google-map-shape-1"></div>
  <div class="google-map-shape google-map-shape-2"></div>

  <div class="container">

    <div class="google-map-head">
      <div class="section-badge">
        <span><i class="bi bi-geo-alt-fill"></i></span>
        Google Map
      </div>

      <h2>
        Find our location
        <span>easily on Google Map.</span>
      </h2>

      <p>
        Visitors can quickly locate Janki Social Foundation office through an embedded
        Google Map. This section can be used only if map display is required.
      </p>
    </div>

    <div class="google-map-wrapper">

      <!-- LEFT LOCATION INFO -->
      <div class="map-info-card">

        <div class="map-info-top">
          <div>
            <span>Office Location</span>
            <h3>Janki Social Foundation</h3>
          </div>

          <div class="map-info-icon">
            <i class="bi bi-map-fill"></i>
          </div>
        </div>

        <div class="map-address-box">
          <i class="bi bi-geo-alt-fill"></i>
          <div>
            <h4>Address</h4>
            <p>
              302 Chandan Deep Apartment, Bailey Road, Rajabazar,
              Near Jagdeo Path Pillar No. 1, Patna
            </p>
          </div>
        </div>

        <div class="map-contact-grid">

          <a href="tel:7979026927" class="map-contact-item">
            <i class="bi bi-telephone-fill"></i>
            <div>
              <span>Call Us</span>
              <strong>7979026927</strong>
            </div>
          </a>

          <a href="https://wa.me/917979026927" class="map-contact-item">
            <i class="bi bi-whatsapp"></i>
            <div>
              <span>WhatsApp</span>
              <strong>Chat Now</strong>
            </div>
          </a>

        </div>

        <div class="map-note-box">
          <i class="bi bi-info-circle-fill"></i>
          <p>
            Google Map embed is optional. Add this section only when location display
            is required on the Contact Us page.
          </p>
        </div>

        <div class="map-action-row">
          <a
            href="https://www.google.com/maps/search/?api=1&query=302%20Chandan%20Deep%20Apartment%20Bailey%20Road%20Rajabazar%20Patna"
            target="_blank"
            class="map-btn-main">
            Get Directions
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="#" class="map-btn-soft">
            Contact Us
          </a>
        </div>

      </div>

      <!-- RIGHT GOOGLE MAP -->
      <div class="map-frame-card">

        <div class="map-frame-toolbar">
          <div>
            <span>Map Preview</span>
            <h3>Location Map</h3>
          </div>

          <div class="map-live-badge">
            <i class="bi bi-broadcast-pin"></i>
            Live Map
          </div>
        </div>

        <div class="google-map-frame">
          <iframe
            src="https://www.google.com/maps?q=302%20Chandan%20Deep%20Apartment%20Bailey%20Road%20Rajabazar%20Patna&output=embed"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen>
          </iframe>
        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= GOOGLE MAP SECTION END ================= -->




<!-- ================= ADDRESS PHONE DETAILS SECTION START ================= -->
<section class="contact-detail-section">
  <div class="contact-detail-bg contact-detail-bg-1"></div>
  <div class="contact-detail-bg contact-detail-bg-2"></div>

  <div class="container">

    <div class="contact-detail-head">
      <div class="section-badge">
        <span><i class="bi bi-telephone-fill"></i></span>
        Address & Phone Details
      </div>

      <h2>
        Reach us easily for
        <span>support and enquiries.</span>
      </h2>

      <p>
        Contact Janki Social Foundation for donation support, CSR collaboration,
        volunteer registration, partnership enquiry and community welfare programs.
      </p>
    </div>

    <div class="contact-detail-wrapper">

      <!-- ADDRESS CARD -->
      <div class="contact-detail-card featured">
        <div class="contact-detail-icon">
          <i class="bi bi-geo-alt-fill"></i>
        </div>

        <div class="contact-detail-content">
          <span>Office Address</span>
          <h3>Janki Social Foundation</h3>

          <p>
            302 Chandan Deep Apartment, Bailey Road, Rajabazar,
            Near Jagdeo Path Pillar No. 1, Patna
          </p>

          <a
            href="https://www.google.com/maps/search/?api=1&query=302%20Chandan%20Deep%20Apartment%20Bailey%20Road%20Rajabazar%20Patna"
            target="_blank"
            class="contact-detail-btn">
            Get Direction
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>

      <!-- PHONE CARD -->
      <div class="contact-detail-card">
        <div class="contact-detail-icon green">
          <i class="bi bi-telephone-outbound-fill"></i>
        </div>

        <div class="contact-detail-content">
          <span>Phone Number</span>
          <h3>Call Our Team</h3>

          <p>
            For donation, CSR, event, volunteering or general enquiry,
            call directly on our official contact number.
          </p>

          <a href="tel:7979026927" class="contact-detail-btn green">
            7979026927
            <i class="bi bi-telephone-fill"></i>
          </a>
        </div>
      </div>

      <!-- WHATSAPP CARD -->
      <div class="contact-detail-card">
        <div class="contact-detail-icon whatsapp">
          <i class="bi bi-whatsapp"></i>
        </div>

        <div class="contact-detail-content">
          <span>WhatsApp Support</span>
          <h3>Quick Message</h3>

          <p>
            Send your enquiry on WhatsApp for quick response from foundation
            support team.
          </p>

          <a href="https://wa.me/917979026927" target="_blank" class="contact-detail-btn whatsapp">
            Chat Now
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- ================= ADDRESS PHONE DETAILS SECTION END ================= -->
    
@endsection