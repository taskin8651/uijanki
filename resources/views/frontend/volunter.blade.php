@extends('frontend.master')
@section('content')



<!-- ================= VOLUNTEER REGISTRATION SECTION START ================= -->
<section class="volunteer-registration-section">
  <div class="volunteer-reg-shape volunteer-reg-shape-1"></div>
  <div class="volunteer-reg-shape volunteer-reg-shape-2"></div>

  <div class="container">

    <div class="volunteer-registration-wrapper">

      <!-- LEFT CONTENT -->
      <div class="volunteer-registration-content">

        <div class="section-badge">
          <span><i class="bi bi-person-heart"></i></span>
          Volunteer Registration
        </div>

        <h2>
          Join us as a volunteer
          <span>and support social change.</span>
        </h2>

        <p>
          Become a part of Janki Social Foundation and contribute your time,
          skills and energy in education awareness, skill development, women
          empowerment, youth guidance and community welfare activities.
        </p>

        <div class="volunteer-benefit-list">

          <div class="volunteer-benefit-item">
            <div class="volunteer-benefit-icon">
              <i class="bi bi-heart-fill"></i>
            </div>
            <div>
              <h4>Serve The Community</h4>
              <p>Participate in social awareness, welfare drives and support activities.</p>
            </div>
          </div>

          <div class="volunteer-benefit-item">
            <div class="volunteer-benefit-icon green">
              <i class="bi bi-people-fill"></i>
            </div>
            <div>
              <h4>Work With Team</h4>
              <p>Join events, campaigns and programs with foundation members.</p>
            </div>
          </div>

          <div class="volunteer-benefit-item">
            <div class="volunteer-benefit-icon sky">
              <i class="bi bi-award-fill"></i>
            </div>
            <div>
              <h4>Learn & Contribute</h4>
              <p>Gain experience while helping students, youth, women and communities.</p>
            </div>
          </div>

        </div>

        <div class="volunteer-contact-strip">
          <a href="tel:7979026927">
            <i class="bi bi-telephone-fill"></i>
            <div>
              <span>Call For Help</span>
              <strong>7979026927</strong>
            </div>
          </a>

          <a href="https://wa.me/917979026927" target="_blank">
            <i class="bi bi-whatsapp"></i>
            <div>
              <span>WhatsApp</span>
              <strong>Chat Now</strong>
            </div>
          </a>
        </div>

      </div>

      <!-- RIGHT FORM -->
      <div class="volunteer-registration-form-card">

        <div class="volunteer-form-head">
          <div>
            <span>Register Now</span>
            <h3>Volunteer Registration Form</h3>
          </div>

          <div class="volunteer-form-icon">
            <i class="bi bi-send-check-fill"></i>
          </div>
        </div>

        <form class="volunteer-registration-form" action="#" method="post">

          <div class="volunteer-form-group">
            <label for="volunteer_name">Full Name <span>*</span></label>
            <input
              type="text"
              id="volunteer_name"
              name="name"
              placeholder="Enter your full name"
              required>
          </div>

          <div class="volunteer-form-group">
            <label for="volunteer_mobile">Mobile Number <span>*</span></label>
            <input
              type="tel"
              id="volunteer_mobile"
              name="mobile"
              placeholder="Enter mobile number"
              required>
          </div>

          <div class="volunteer-form-group">
            <label for="volunteer_email">Email Address</label>
            <input
              type="email"
              id="volunteer_email"
              name="email"
              placeholder="Enter email address">
          </div>

          <div class="volunteer-form-group">
            <label for="volunteer_age">Age</label>
            <input
              type="number"
              id="volunteer_age"
              name="age"
              placeholder="Enter your age">
          </div>

          <div class="volunteer-form-group">
            <label for="volunteer_city">City / Location <span>*</span></label>
            <input
              type="text"
              id="volunteer_city"
              name="city"
              placeholder="Enter city or location"
              required>
          </div>

          <div class="volunteer-form-group">
            <label for="volunteer_interest">Area of Interest <span>*</span></label>
            <select id="volunteer_interest" name="interest_area" required>
              <option value="">Select interest area</option>
              <option value="education_awareness">Education Awareness</option>
              <option value="skill_development">Skill Development</option>
              <option value="women_empowerment">Women Empowerment</option>
              <option value="youth_empowerment">Youth Empowerment</option>
              <option value="community_welfare">Community Welfare</option>
              <option value="event_support">Event Support</option>
              <option value="media_support">Photo / Video / Media Support</option>
            </select>
          </div>

          <div class="volunteer-form-group">
            <label for="volunteer_availability">Availability</label>
            <select id="volunteer_availability" name="availability">
              <option value="">Select availability</option>
              <option value="weekdays">Weekdays</option>
              <option value="weekends">Weekends</option>
              <option value="both">Both Weekdays & Weekends</option>
              <option value="event_based">Event Based Only</option>
            </select>
          </div>

          <div class="volunteer-form-group">
            <label for="volunteer_experience">Previous Experience</label>
            <select id="volunteer_experience" name="experience">
              <option value="">Select experience</option>
              <option value="yes">Yes, I have experience</option>
              <option value="no">No, I am new</option>
            </select>
          </div>

          <div class="volunteer-form-group full">
            <label for="volunteer_address">Address</label>
            <textarea
              id="volunteer_address"
              name="address"
              rows="3"
              placeholder="Enter your address"></textarea>
          </div>

          <div class="volunteer-form-group full">
            <label for="volunteer_message">Why do you want to volunteer? <span>*</span></label>
            <textarea
              id="volunteer_message"
              name="message"
              rows="5"
              placeholder="Write your message..."
              required></textarea>
          </div>

          <div class="volunteer-form-note full">
            <i class="bi bi-shield-check"></i>
            <span>Your details will be used only for volunteer registration and foundation communication.</span>
          </div>

          <div class="volunteer-form-submit full">
            <button type="submit">
              Submit Registration
              <i class="bi bi-arrow-right"></i>
            </button>
          </div>

        </form>

      </div>

    </div>

  </div>
</section>
<!-- ================= VOLUNTEER REGISTRATION SECTION END ================= -->



<!-- ================= AREA OF INTEREST SECTION START ================= -->
<section class="interest-area-section">
  <div class="interest-area-shape interest-area-shape-1"></div>
  <div class="interest-area-shape interest-area-shape-2"></div>

  <div class="container">

    <div class="interest-area-head">
      <div class="section-badge">
        <span><i class="bi bi-stars"></i></span>
        Area of Interest
      </div>

      <h2>
        Choose your preferred
        <span>volunteer interest area.</span>
      </h2>

      <p>
        Volunteers can select the social program area where they want to contribute
        their time, skills and support with Janki Social Foundation.
      </p>
    </div>

    <div class="interest-area-grid">

      <label class="interest-area-card">
        <input type="checkbox" name="interest_area[]" value="education_awareness">
        <span class="interest-check"><i class="bi bi-check2"></i></span>

        <div class="interest-icon">
          <i class="bi bi-mortarboard-fill"></i>
        </div>

        <h3>Education Awareness</h3>
        <p>Support student awareness, learning guidance and education support activities.</p>
      </label>

      <label class="interest-area-card">
        <input type="checkbox" name="interest_area[]" value="skill_development">
        <span class="interest-check"><i class="bi bi-check2"></i></span>

        <div class="interest-icon green">
          <i class="bi bi-tools"></i>
        </div>

        <h3>Skill Development</h3>
        <p>Help in vocational training, practical workshops and skill-based programs.</p>
      </label>

      <label class="interest-area-card">
        <input type="checkbox" name="interest_area[]" value="women_empowerment">
        <span class="interest-check"><i class="bi bi-gender-female"></i></span>

        <div class="interest-icon pink">
          <i class="bi bi-person-hearts"></i>
        </div>

        <h3>Women Empowerment</h3>
        <p>Contribute to awareness, dignity, self-reliance and women support programs.</p>
      </label>

      <label class="interest-area-card">
        <input type="checkbox" name="interest_area[]" value="youth_empowerment">
        <span class="interest-check"><i class="bi bi-check2"></i></span>

        <div class="interest-icon orange">
          <i class="bi bi-people-fill"></i>
        </div>

        <h3>Youth Empowerment</h3>
        <p>Support youth motivation, career guidance and leadership awareness programs.</p>
      </label>

      <label class="interest-area-card">
        <input type="checkbox" name="interest_area[]" value="community_welfare">
        <span class="interest-check"><i class="bi bi-check2"></i></span>

        <div class="interest-icon purple">
          <i class="bi bi-heart-fill"></i>
        </div>

        <h3>Community Welfare</h3>
        <p>Participate in welfare drives, awareness campaigns and public support work.</p>
      </label>

      <label class="interest-area-card">
        <input type="checkbox" name="interest_area[]" value="event_support">
        <span class="interest-check"><i class="bi bi-check2"></i></span>

        <div class="interest-icon sky">
          <i class="bi bi-calendar-event-fill"></i>
        </div>

        <h3>Event Support</h3>
        <p>Help in event coordination, registration, media handling and ground support.</p>
      </label>

    </div>

    <div class="interest-area-bottom">
      <div>
        <i class="bi bi-info-circle-fill"></i>
        <span>You can select one or multiple interest areas as per your skills and availability.</span>
      </div>

      <a href="contact.html" class="interest-area-btn">
        Continue Registration
        <i class="bi bi-arrow-right"></i>
      </a>
    </div>

  </div>
</section>
<!-- ================= AREA OF INTEREST SECTION END ================= -->



<!-- ================= AVAILABILITY SECTION START ================= -->
<section class="availability-section">
  <div class="availability-shape availability-shape-1"></div>
  <div class="availability-shape availability-shape-2"></div>

  <div class="container">

    <div class="availability-head">
      <div class="section-badge">
        <span><i class="bi bi-calendar-check-fill"></i></span>
        Volunteer Availability
      </div>

      <h2>
        Select your preferred
        <span>availability schedule.</span>
      </h2>

      <p>
        Choose when you are available to support Janki Social Foundation activities,
        events, awareness campaigns and community welfare programs.
      </p>
    </div>

    <div class="availability-wrapper">

      <label class="availability-card">
        <input type="radio" name="availability" value="weekdays">

        <span class="availability-check">
          <i class="bi bi-check2"></i>
        </span>

        <div class="availability-icon">
          <i class="bi bi-calendar-week-fill"></i>
        </div>

        <div class="availability-content">
          <span>Monday to Friday</span>
          <h3>Weekdays</h3>
          <p>
            Best for volunteers who can support office work, awareness planning,
            coordination and weekday programs.
          </p>
        </div>
      </label>

      <label class="availability-card">
        <input type="radio" name="availability" value="weekends">

        <span class="availability-check">
          <i class="bi bi-check2"></i>
        </span>

        <div class="availability-icon green">
          <i class="bi bi-calendar-heart-fill"></i>
        </div>

        <div class="availability-content">
          <span>Saturday & Sunday</span>
          <h3>Weekends</h3>
          <p>
            Perfect for event support, community drives, awareness programs and
            volunteer participation.
          </p>
        </div>
      </label>

      <label class="availability-card">
        <input type="radio" name="availability" value="both">

        <span class="availability-check">
          <i class="bi bi-check2"></i>
        </span>

        <div class="availability-icon sky">
          <i class="bi bi-calendar2-check-fill"></i>
        </div>

        <div class="availability-content">
          <span>Flexible Support</span>
          <h3>Both Days</h3>
          <p>
            Choose this if you are flexible and can help on weekdays as well
            as weekends when required.
          </p>
        </div>
      </label>

      <label class="availability-card">
        <input type="radio" name="availability" value="event_based">

        <span class="availability-check">
          <i class="bi bi-check2"></i>
        </span>

        <div class="availability-icon orange">
          <i class="bi bi-megaphone-fill"></i>
        </div>

        <div class="availability-content">
          <span>Program Based</span>
          <h3>Event Based</h3>
          <p>
            Select this if you want to join only selected events, campaigns
            and special social programs.
          </p>
        </div>
      </label>

    </div>

    <div class="availability-note-card">

      <div class="availability-note-left">
        <i class="bi bi-info-circle-fill"></i>
        <div>
          <h4>Flexible Volunteer Timing</h4>
          <p>
            Your availability helps our team assign you suitable events and programs.
            Final schedule will be shared before activity confirmation.
          </p>
        </div>
      </div>

      <a href="contact.html" class="availability-btn">
        Continue Registration
        <i class="bi bi-arrow-right"></i>
      </a>

    </div>

  </div>
</section>
<!-- ================= AVAILABILITY SECTION END ================= -->



<!-- ================= EXPERIENCE SECTION START ================= -->
<section class="experience-section">
  <div class="experience-shape experience-shape-1"></div>
  <div class="experience-shape experience-shape-2"></div>

  <div class="container">

    <div class="experience-head">
      <div class="section-badge">
        <span><i class="bi bi-award-fill"></i></span>
        Volunteer Experience
      </div>

      <h2>
        Share your previous
        <span>volunteer experience.</span>
      </h2>

      <p>
        Let us know if you have worked in social programs, awareness campaigns,
        events, training activities or community welfare drives before.
      </p>
    </div>

    <div class="experience-wrapper">

      <label class="experience-card">
        <input type="radio" name="experience" value="fresher">

        <span class="experience-check">
          <i class="bi bi-check2"></i>
        </span>

        <div class="experience-icon">
          <i class="bi bi-person-plus-fill"></i>
        </div>

        <div class="experience-content">
          <span>New Volunteer</span>
          <h3>No Previous Experience</h3>
          <p>
            Select this if you are new but interested in learning, contributing
            and supporting foundation activities.
          </p>
        </div>
      </label>

      <label class="experience-card">
        <input type="radio" name="experience" value="basic">

        <span class="experience-check">
          <i class="bi bi-check2"></i>
        </span>

        <div class="experience-icon green">
          <i class="bi bi-people-fill"></i>
        </div>

        <div class="experience-content">
          <span>Basic Experience</span>
          <h3>1 - 6 Months</h3>
          <p>
            Select this if you have participated in a few events, camps,
            awareness drives or volunteer activities.
          </p>
        </div>
      </label>

      <label class="experience-card">
        <input type="radio" name="experience" value="intermediate">

        <span class="experience-check">
          <i class="bi bi-check2"></i>
        </span>

        <div class="experience-icon sky">
          <i class="bi bi-clipboard2-check-fill"></i>
        </div>

        <div class="experience-content">
          <span>Regular Volunteer</span>
          <h3>6 Months - 2 Years</h3>
          <p>
            Select this if you have regularly supported NGO programs,
            events, registrations or community activities.
          </p>
        </div>
      </label>

      <label class="experience-card">
        <input type="radio" name="experience" value="advanced">

        <span class="experience-check">
          <i class="bi bi-check2"></i>
        </span>

        <div class="experience-icon orange">
          <i class="bi bi-trophy-fill"></i>
        </div>

        <div class="experience-content">
          <span>Experienced</span>
          <h3>2+ Years</h3>
          <p>
            Select this if you have strong experience in social work, project
            coordination, field activity or event leadership.
          </p>
        </div>
      </label>

    </div>

    <div class="experience-detail-card">

      <div class="experience-detail-left">
        <div class="experience-detail-icon">
          <i class="bi bi-pencil-square"></i>
        </div>

        <div>
          <h3>Describe your experience</h3>
          <p>
            You can briefly mention organization name, type of work, program area
            and your role in previous volunteer activities.
          </p>
        </div>
      </div>

      <div class="experience-textarea-wrap">
        <label for="experience_details">Experience Details</label>
        <textarea
          id="experience_details"
          name="experience_details"
          rows="5"
          placeholder="Example: I helped in education awareness camp, registration desk, community survey, event coordination..."></textarea>
      </div>

    </div>

  </div>
</section>
<!-- ================= EXPERIENCE SECTION END ================= -->



<!-- ================= MESSAGE SECTION START ================= -->
<section class="message-section">
  <div class="message-shape message-shape-1"></div>
  <div class="message-shape message-shape-2"></div>

  <div class="container">

    <div class="message-wrapper">

      <!-- LEFT CONTENT -->
      <div class="message-content">

        <div class="section-badge">
          <span><i class="bi bi-chat-heart-fill"></i></span>
          Your Message
        </div>

        <h2>
          Tell us why you want
          <span>to join this mission.</span>
        </h2>

        <p>
          Share your reason, thoughts, skills or expectations. Your message helps
          our team understand how you want to contribute to Janki Social Foundation.
        </p>

        <div class="message-point-list">

          <div class="message-point">
            <div class="message-point-icon">
              <i class="bi bi-pencil-square"></i>
            </div>
            <div>
              <h4>Write Your Purpose</h4>
              <p>Mention why you want to volunteer or connect with the foundation.</p>
            </div>
          </div>

          <div class="message-point">
            <div class="message-point-icon green">
              <i class="bi bi-lightbulb-fill"></i>
            </div>
            <div>
              <h4>Share Your Skills</h4>
              <p>You can write about your skills, experience and contribution ideas.</p>
            </div>
          </div>

          <div class="message-point">
            <div class="message-point-icon sky">
              <i class="bi bi-heart-fill"></i>
            </div>
            <div>
              <h4>Support Social Impact</h4>
              <p>Your message helps us assign suitable activities and programs.</p>
            </div>
          </div>

        </div>

      </div>

      <!-- RIGHT MESSAGE CARD -->
      <div class="message-form-card">

        <div class="message-form-head">
          <div>
            <span>Message Details</span>
            <h3>Write Your Message</h3>
          </div>

          <div class="message-form-icon">
            <i class="bi bi-send-fill"></i>
          </div>
        </div>

        <form class="message-form" action="#" method="post">

          <div class="message-form-group">
            <label for="message_subject">Message Type <span>*</span></label>
            <select id="message_subject" name="message_type" required>
              <option value="">Select message type</option>
              <option value="volunteer_reason">Volunteer Reason</option>
              <option value="interest_details">Interest Details</option>
              <option value="experience_details">Experience Details</option>
              <option value="csr_enquiry">CSR Enquiry</option>
              <option value="general_message">General Message</option>
            </select>
          </div>

          <div class="message-form-group">
            <label for="preferred_contact">Preferred Contact</label>
            <select id="preferred_contact" name="preferred_contact">
              <option value="">Select contact method</option>
              <option value="phone">Phone Call</option>
              <option value="whatsapp">WhatsApp</option>
              <option value="email">Email</option>
            </select>
          </div>

          <div class="message-form-group full">
            <label for="message_text">Message <span>*</span></label>
            <textarea
              id="message_text"
              name="message"
              rows="7"
              placeholder="Write your message here..."
              required></textarea>
          </div>

          <div class="message-tips full">
            <h4><i class="bi bi-stars"></i> What you can write?</h4>

            <div class="message-tip-grid">
              <span><i class="bi bi-check-circle-fill"></i> Why you want to join</span>
              <span><i class="bi bi-check-circle-fill"></i> Your skills or experience</span>
              <span><i class="bi bi-check-circle-fill"></i> Preferred activity area</span>
              <span><i class="bi bi-check-circle-fill"></i> Any special availability</span>
            </div>
          </div>

          <div class="message-form-note full">
            <i class="bi bi-shield-check"></i>
            <span>Your message will be used only for foundation communication and registration review.</span>
          </div>

          <div class="message-form-submit full">
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
<!-- ================= MESSAGE SECTION END ================= -->



<!-- ================= ADMIN VOLUNTEER SUBMISSIONS SECTION START ================= -->
<section class="admin-volunteer-section">
  <div class="admin-volunteer-shape admin-volunteer-shape-1"></div>
  <div class="admin-volunteer-shape admin-volunteer-shape-2"></div>

  <div class="container">

    <div class="admin-volunteer-head">
      <div class="section-badge">
        <span><i class="bi bi-person-lines-fill"></i></span>
        Admin Volunteer Management
      </div>

      <h2>
        Manage volunteer
        <span>registration submissions.</span>
      </h2>

      <p>
        Admin can review volunteer registration requests, check interest area,
        availability, experience, message and update approval status from one place.
      </p>
    </div>

    <div class="admin-volunteer-dashboard">

      <div class="admin-volunteer-stat">
        <div class="admin-stat-icon">
          <i class="bi bi-inbox-fill"></i>
        </div>
        <div>
          <span>Total Submissions</span>
          <h3>248</h3>
        </div>
      </div>

      <div class="admin-volunteer-stat">
        <div class="admin-stat-icon green">
          <i class="bi bi-check-circle-fill"></i>
        </div>
        <div>
          <span>Approved</span>
          <h3>156</h3>
        </div>
      </div>

      <div class="admin-volunteer-stat">
        <div class="admin-stat-icon orange">
          <i class="bi bi-clock-fill"></i>
        </div>
        <div>
          <span>Pending Review</span>
          <h3>72</h3>
        </div>
      </div>

      <div class="admin-volunteer-stat">
        <div class="admin-stat-icon red">
          <i class="bi bi-x-circle-fill"></i>
        </div>
        <div>
          <span>Rejected</span>
          <h3>20</h3>
        </div>
      </div>

    </div>

    <div class="admin-volunteer-panel">

      <div class="admin-volunteer-toolbar">

        <div class="admin-toolbar-title">
          <div class="admin-toolbar-icon">
            <i class="bi bi-table"></i>
          </div>
          <div>
            <span>Submission List</span>
            <h3>Volunteer Requests</h3>
          </div>
        </div>

        <div class="admin-toolbar-actions">
          <div class="admin-search-box">
            <i class="bi bi-search"></i>
            <input type="search" placeholder="Search volunteer...">
          </div>

          <select class="admin-filter-select">
            <option value="">All Status</option>
            <option value="pending">Pending</option>
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>
          </select>

          <a href="#" class="admin-export-btn">
            <i class="bi bi-download"></i>
            Export
          </a>
        </div>

      </div>

      <div class="admin-volunteer-table-wrap">

        <table class="admin-volunteer-table">
          <thead>
            <tr>
              <th>Volunteer</th>
              <th>Contact</th>
              <th>Interest Area</th>
              <th>Availability</th>
              <th>Experience</th>
              <th>Status</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td data-label="Volunteer">
                <div class="volunteer-user">
                  <div class="volunteer-avatar">RS</div>
                  <div>
                    <h4>Rohit Sharma</h4>
                    <span>Patna, Bihar</span>
                  </div>
                </div>
              </td>

              <td data-label="Contact">
                <div class="volunteer-contact">
                  <a href="tel:9876543210">9876543210</a>
                  <span>rohit@example.com</span>
                </div>
              </td>

              <td data-label="Interest Area">
                <span class="interest-tag">Education Awareness</span>
              </td>

              <td data-label="Availability">
                <span class="simple-text">Weekends</span>
              </td>

              <td data-label="Experience">
                <span class="simple-text">6 Months - 2 Years</span>
              </td>

              <td data-label="Status">
                <span class="status-badge pending">
                  <i class="bi bi-clock-fill"></i>
                  Pending
                </span>
              </td>

              <td data-label="Action" class="text-right">
                <div class="action-group">
                  <a href="#" class="action-btn view" title="View">
                    <i class="bi bi-eye-fill"></i>
                  </a>
                  <a href="#" class="action-btn approve" title="Approve">
                    <i class="bi bi-check-lg"></i>
                  </a>
                  <a href="#" class="action-btn reject" title="Reject">
                    <i class="bi bi-x-lg"></i>
                  </a>
                </div>
              </td>
            </tr>

            <tr>
              <td data-label="Volunteer">
                <div class="volunteer-user">
                  <div class="volunteer-avatar green">PK</div>
                  <div>
                    <h4>Priya Kumari</h4>
                    <span>Bailey Road, Patna</span>
                  </div>
                </div>
              </td>

              <td data-label="Contact">
                <div class="volunteer-contact">
                  <a href="tel:9123456780">9123456780</a>
                  <span>priya@example.com</span>
                </div>
              </td>

              <td data-label="Interest Area">
                <span class="interest-tag green">Women Empowerment</span>
              </td>

              <td data-label="Availability">
                <span class="simple-text">Both Days</span>
              </td>

              <td data-label="Experience">
                <span class="simple-text">2+ Years</span>
              </td>

              <td data-label="Status">
                <span class="status-badge approved">
                  <i class="bi bi-check-circle-fill"></i>
                  Approved
                </span>
              </td>

              <td data-label="Action" class="text-right">
                <div class="action-group">
                  <a href="#" class="action-btn view" title="View">
                    <i class="bi bi-eye-fill"></i>
                  </a>
                  <a href="#" class="action-btn approve" title="Approve">
                    <i class="bi bi-check-lg"></i>
                  </a>
                  <a href="#" class="action-btn reject" title="Reject">
                    <i class="bi bi-x-lg"></i>
                  </a>
                </div>
              </td>
            </tr>

            <tr>
              <td data-label="Volunteer">
                <div class="volunteer-user">
                  <div class="volunteer-avatar sky">AK</div>
                  <div>
                    <h4>Amit Kumar</h4>
                    <span>Rajabazar, Patna</span>
                  </div>
                </div>
              </td>

              <td data-label="Contact">
                <div class="volunteer-contact">
                  <a href="tel:9988776655">9988776655</a>
                  <span>amit@example.com</span>
                </div>
              </td>

              <td data-label="Interest Area">
                <span class="interest-tag sky">Skill Development</span>
              </td>

              <td data-label="Availability">
                <span class="simple-text">Event Based</span>
              </td>

              <td data-label="Experience">
                <span class="simple-text">No Experience</span>
              </td>

              <td data-label="Status">
                <span class="status-badge rejected">
                  <i class="bi bi-x-circle-fill"></i>
                  Rejected
                </span>
              </td>

              <td data-label="Action" class="text-right">
                <div class="action-group">
                  <a href="#" class="action-btn view" title="View">
                    <i class="bi bi-eye-fill"></i>
                  </a>
                  <a href="#" class="action-btn approve" title="Approve">
                    <i class="bi bi-check-lg"></i>
                  </a>
                  <a href="#" class="action-btn reject" title="Reject">
                    <i class="bi bi-x-lg"></i>
                  </a>
                </div>
              </td>
            </tr>

          </tbody>
        </table>

      </div>

      <div class="admin-volunteer-footer">

        <div class="admin-footer-info">
          <i class="bi bi-shield-check"></i>
          <span>Admin can approve, reject, view and export volunteer submissions.</span>
        </div>

        <div class="admin-pagination">
          <a href="#"><i class="bi bi-chevron-left"></i></a>
          <a href="#" class="active">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#"><i class="bi bi-chevron-right"></i></a>
        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= ADMIN VOLUNTEER SUBMISSIONS SECTION END ================= -->

@endsection