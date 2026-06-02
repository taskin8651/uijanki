@extends('frontend.master')
@section('content')


<!-- ================= CAMPAIGN LISTING SECTION START ================= -->
<section class="campaign-listing-section">
  <div class="campaign-listing-shape campaign-listing-shape-1"></div>
  <div class="campaign-listing-shape campaign-listing-shape-2"></div>

  <div class="container">

    <!-- SECTION HEAD -->
    <div class="campaign-listing-head">
      <div class="section-badge">
        <span><i class="bi bi-heart-fill"></i></span>
        Active Campaigns
      </div>

      <h2>
        Support meaningful campaigns and
        <span>help create real social impact.</span>
      </h2>

      <p>
        Explore Janki Social Foundation’s active campaigns for education, skill development,
        women empowerment, youth support, community welfare and social awareness.
      </p>
    </div>

    <!-- FILTER STRIP -->
    <div class="campaign-filter-strip">
      <a href="#" class="active">
        <i class="bi bi-grid-fill"></i>
        All Campaigns
      </a>

      <a href="#">
        <i class="bi bi-mortarboard-fill"></i>
        Education
      </a>

      <a href="#">
        <i class="bi bi-tools"></i>
        Skill Development
      </a>

      <a href="#">
        <i class="bi bi-gender-female"></i>
        Women Empowerment
      </a>

      <a href="#">
        <i class="bi bi-people-fill"></i>
        Community Welfare
      </a>
    </div>

    <!-- CAMPAIGN GRID -->
    <div class="campaign-listing-grid">

      <!-- CAMPAIGN CARD -->
      <div class="campaign-card">
        <div class="campaign-image">
          <img src="assets/img/campaign-education.png" alt="Education Support Campaign">

          <span class="campaign-status">
            <i class="bi bi-broadcast-pin"></i>
            Active
          </span>

          <span class="campaign-category">
            Education
          </span>
        </div>

        <div class="campaign-content">
          <div class="campaign-meta">
            <span><i class="bi bi-calendar2-week"></i> 30 Days Left</span>
            <span><i class="bi bi-geo-alt"></i> Patna</span>
          </div>

          <h3>Education Support Campaign for Students</h3>

          <p>
            Help children and students access learning support, awareness programs
            and basic educational resources for a better future.
          </p>

          <div class="campaign-progress-box">
            <div class="campaign-progress-top">
              <span>Raised ₹45,000</span>
              <strong>75%</strong>
            </div>

            <div class="campaign-progress-line">
              <span style="width: 75%;"></span>
            </div>

            <div class="campaign-progress-bottom">
              <span>Goal ₹60,000</span>
              <span>120 Supporters</span>
            </div>
          </div>

          <div class="campaign-actions">
            <a href="donate.html" class="campaign-btn-main">
              Donate Now
              <i class="bi bi-arrow-right"></i>
            </a>

            <a href="contact.html" class="campaign-btn-soft">
              Details
            </a>
          </div>
        </div>
      </div>

      <!-- CAMPAIGN CARD -->
      <div class="campaign-card">
        <div class="campaign-image">
          <img src="assets/img/campaign-skill.png" alt="Skill Development Campaign">

          <span class="campaign-status">
            <i class="bi bi-broadcast-pin"></i>
            Active
          </span>

          <span class="campaign-category green">
            Skill
          </span>
        </div>

        <div class="campaign-content">
          <div class="campaign-meta">
            <span><i class="bi bi-calendar2-week"></i> 22 Days Left</span>
            <span><i class="bi bi-geo-alt"></i> Bihar</span>
          </div>

          <h3>Skill Development & Training Campaign</h3>

          <p>
            Support practical training, vocational learning and career-focused
            guidance for youth and underprivileged communities.
          </p>

          <div class="campaign-progress-box">
            <div class="campaign-progress-top">
              <span>Raised ₹32,000</span>
              <strong>64%</strong>
            </div>

            <div class="campaign-progress-line green">
              <span style="width: 64%;"></span>
            </div>

            <div class="campaign-progress-bottom">
              <span>Goal ₹50,000</span>
              <span>84 Supporters</span>
            </div>
          </div>

          <div class="campaign-actions">
            <a href="donate.html" class="campaign-btn-main">
              Donate Now
              <i class="bi bi-arrow-right"></i>
            </a>

            <a href="contact.html" class="campaign-btn-soft">
              Details
            </a>
          </div>
        </div>
      </div>

      <!-- CAMPAIGN CARD -->
      <div class="campaign-card">
        <div class="campaign-image">
          <img src="assets/img/campaign-women.png" alt="Women Empowerment Campaign">

          <span class="campaign-status">
            <i class="bi bi-broadcast-pin"></i>
            Active
          </span>

          <span class="campaign-category sky">
            Women
          </span>
        </div>

        <div class="campaign-content">
          <div class="campaign-meta">
            <span><i class="bi bi-calendar2-week"></i> 18 Days Left</span>
            <span><i class="bi bi-geo-alt"></i> Community</span>
          </div>

          <h3>Women Empowerment Awareness Campaign</h3>

          <p>
            Help women build confidence, awareness, dignity, self-reliance and
            meaningful participation in community growth.
          </p>

          <div class="campaign-progress-box">
            <div class="campaign-progress-top">
              <span>Raised ₹28,000</span>
              <strong>56%</strong>
            </div>

            <div class="campaign-progress-line sky">
              <span style="width: 56%;"></span>
            </div>

            <div class="campaign-progress-bottom">
              <span>Goal ₹50,000</span>
              <span>67 Supporters</span>
            </div>
          </div>

          <div class="campaign-actions">
            <a href="donate.html" class="campaign-btn-main">
              Donate Now
              <i class="bi bi-arrow-right"></i>
            </a>

            <a href="contact.html" class="campaign-btn-soft">
              Details
            </a>
          </div>
        </div>
      </div>

    </div>

    <!-- BOTTOM CTA -->
    <div class="campaign-listing-cta">
      <div>
        <h3>Want to start or support a campaign?</h3>
        <p>
          Join hands with Janki Social Foundation to support education, skills,
          welfare and awareness initiatives.
        </p>
      </div>

      <a href="volunter.html" class="campaign-cta-btn">
        Become a Supporter
        <i class="bi bi-arrow-right"></i>
      </a>
    </div>

  </div>
</section>
<!-- ================= CAMPAIGN LISTING SECTION END ================= -->



<!-- ================= CAMPAIGN DETAIL SECTION START ================= -->
<section class="campaign-detail-section">
  <div class="campaign-detail-shape campaign-detail-shape-1"></div>
  <div class="campaign-detail-shape campaign-detail-shape-2"></div>

  <div class="container">

    <!-- DETAIL HERO -->
    <div class="campaign-detail-hero">

      <div class="campaign-detail-image">
        <img src="assets/img/campaign-detail-main.png" alt="Education Support Campaign">

        <div class="campaign-detail-status">
          <i class="bi bi-broadcast-pin"></i>
          Active Campaign
        </div>

        <div class="campaign-detail-category">
          Education Support
        </div>
      </div>

      <div class="campaign-detail-content">
        <div class="section-badge">
          <span><i class="bi bi-heart-fill"></i></span>
          Campaign Detail
        </div>

        <h1>
          Education Support Campaign
          <span>for underprivileged students.</span>
        </h1>

        <p>
          Help children and students access learning materials, awareness programs,
          guidance support and basic educational resources for a brighter future.
        </p>

        <div class="campaign-detail-meta">
          <span><i class="bi bi-calendar2-week"></i> 30 Days Left</span>
          <span><i class="bi bi-geo-alt-fill"></i> Patna, Bihar</span>
          <span><i class="bi bi-people-fill"></i> 120 Supporters</span>
        </div>

        <div class="campaign-donation-box">
          <div class="campaign-donation-top">
            <div>
              <span>Raised Amount</span>
              <strong>₹45,000</strong>
            </div>

            <div>
              <span>Goal Amount</span>
              <strong>₹60,000</strong>
            </div>
          </div>

          <div class="campaign-progress-main">
            <div class="campaign-progress-info">
              <span>Campaign Progress</span>
              <strong>75%</strong>
            </div>

            <div class="campaign-progress-track">
              <span style="width: 75%;"></span>
            </div>
          </div>

          <div class="campaign-detail-actions">
            <a href="donate.html" class="campaign-detail-btn-main">
              Donate Now
              <i class="bi bi-arrow-right"></i>
            </a>

            <a href="contact.html" class="campaign-detail-btn-soft">
              <i class="bi bi-share-fill"></i>
              Share Campaign
            </a>
          </div>
        </div>
      </div>

    </div>

    <!-- DETAIL BODY -->
    <div class="campaign-detail-body">

      <!-- LEFT MAIN CONTENT -->
      <div class="campaign-detail-main">

        <div class="campaign-story-card">
          <h2>Campaign Story</h2>

          <p>
            Education is one of the strongest tools for long-term social development.
            Through this campaign, Janki Social Foundation aims to support students
            who need access to basic study materials, awareness sessions, guidance
            and educational encouragement.
          </p>

          <p>
            Your contribution will help provide learning resources, organize education
            awareness sessions, support student motivation activities and create better
            opportunities for children and youth from underprivileged backgrounds.
          </p>

          <div class="campaign-story-highlight">
            <i class="bi bi-quote"></i>
            <p>
              Every child deserves access to learning, guidance and opportunity.
              Together, we can support education and build a stronger future.
            </p>
          </div>
        </div>

        <div class="campaign-impact-card">
          <div class="campaign-card-head">
            <span>Impact Areas</span>
            <h2>How your support helps</h2>
          </div>

          <div class="campaign-impact-grid">

            <div class="campaign-impact-item">
              <div class="campaign-impact-icon">
                <i class="bi bi-book-fill"></i>
              </div>
              <h3>Study Materials</h3>
              <p>Support notebooks, books and basic learning resources for students.</p>
            </div>

            <div class="campaign-impact-item">
              <div class="campaign-impact-icon green">
                <i class="bi bi-mortarboard-fill"></i>
              </div>
              <h3>Awareness Sessions</h3>
              <p>Organize education awareness and student motivation programs.</p>
            </div>

            <div class="campaign-impact-item">
              <div class="campaign-impact-icon sky">
                <i class="bi bi-people-fill"></i>
              </div>
              <h3>Guidance Support</h3>
              <p>Provide career guidance, counselling and confidence-building support.</p>
            </div>

          </div>
        </div>

        <div class="campaign-gallery-card">
          <div class="campaign-card-head">
            <span>Campaign Gallery</span>
            <h2>Photos from our initiatives</h2>
          </div>

          <div class="campaign-gallery-grid">
            <img src="assets/img/campaign-gallery-1.png" alt="Campaign Gallery">
            <img src="assets/img/campaign-gallery-2.png" alt="Campaign Gallery">
            <img src="assets/img/campaign-gallery-3.png" alt="Campaign Gallery">
          </div>
        </div>

      </div>

      <!-- RIGHT SIDEBAR -->
      <div class="campaign-detail-sidebar">

        <div class="campaign-donate-card">
          <h3>Make a Contribution</h3>
          <p>Your small support can create a meaningful impact in someone’s life.</p>

          <div class="donation-amounts">
            <a href="#">₹500</a>
            <a href="#">₹1000</a>
            <a href="#">₹2500</a>
            <a href="#">₹5000</a>
          </div>

          <a href="donate.html" class="sidebar-donate-btn">
            Donate Securely
            <i class="bi bi-heart-fill"></i>
          </a>
        </div>

        <div class="campaign-organizer-card">
          <div class="organizer-icon">
            <i class="bi bi-patch-check-fill"></i>
          </div>

          <h3>Organized By</h3>
          <h4>Janki Social Foundation</h4>
          <p>
            Working for education awareness, skill development, women empowerment,
            youth empowerment and community welfare.
          </p>

          <div class="organizer-contact">
            <a href="tel:7979026927">
              <i class="bi bi-telephone-fill"></i>
              Call Now
            </a>

            <a href="https://wa.me/917979026927">
              <i class="bi bi-whatsapp"></i>
              WhatsApp
            </a>
          </div>
        </div>

        <div class="related-campaign-card">
          <h3>Related Campaigns</h3>

          <div class="related-campaign-item">
            <img src="assets/img/campaign-skill.png" alt="Skill Campaign">
            <div>
              <span>Skill Development</span>
              <h4>Training Support Campaign</h4>
            </div>
          </div>

          <div class="related-campaign-item">
            <img src="assets/img/campaign-women.png" alt="Women Campaign">
            <div>
              <span>Women Empowerment</span>
              <h4>Awareness & Dignity Campaign</h4>
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= CAMPAIGN DETAIL SECTION END ================= -->



<!-- ================= TARGET AMOUNT SECTION START ================= -->
<section class="target-amount-section">
  <div class="target-amount-shape target-amount-shape-1"></div>
  <div class="target-amount-shape target-amount-shape-2"></div>

  <div class="container">

    <div class="target-amount-wrapper">

      <!-- LEFT CONTENT -->
      <div class="target-amount-content">

        <div class="section-badge">
          <span><i class="bi bi-bullseye"></i></span>
          Target Amount
        </div>

        <h2>
          Help us reach our
          <span>campaign donation target.</span>
        </h2>

        <p>
          Your contribution helps Janki Social Foundation continue education awareness,
          skill development, women empowerment, youth support and community welfare programs.
        </p>

        <div class="target-amount-list">

          <div class="target-amount-item">
            <div class="target-amount-icon">
              <i class="bi bi-heart-fill"></i>
            </div>
            <div>
              <h4>Every Donation Matters</h4>
              <p>Small contributions together create a meaningful impact for communities.</p>
            </div>
          </div>

          <div class="target-amount-item">
            <div class="target-amount-icon green">
              <i class="bi bi-shield-check"></i>
            </div>
            <div>
              <h4>Transparent Goal</h4>
              <p>Track raised amount, remaining amount and progress percentage clearly.</p>
            </div>
          </div>

          <div class="target-amount-item">
            <div class="target-amount-icon sky">
              <i class="bi bi-people-fill"></i>
            </div>
            <div>
              <h4>Community Impact</h4>
              <p>Your support helps students, youth, women and needy communities.</p>
            </div>
          </div>

        </div>

      </div>

      <!-- RIGHT TARGET CARD -->
      <div class="target-amount-card">

        <div class="target-card-head">
          <div>
            <span>Campaign Goal</span>
            <h3>Education Support Campaign</h3>
          </div>

          <div class="target-card-icon">
            <i class="bi bi-cash-coin"></i>
          </div>
        </div>

        <div class="target-amount-summary">

          <div class="target-summary-box">
            <span>Target Amount</span>
            <strong>₹1,00,000</strong>
          </div>

          <div class="target-summary-box green">
            <span>Raised Amount</span>
            <strong>₹72,500</strong>
          </div>

        </div>

        <div class="target-progress-area">
          <div class="target-progress-top">
            <span>Donation Progress</span>
            <strong>72.5%</strong>
          </div>

          <div class="target-progress-track">
            <span style="width: 72.5%;"></span>
          </div>

          <div class="target-progress-bottom">
            <span>₹27,500 remaining</span>
            <span>185 supporters</span>
          </div>
        </div>

        <div class="target-quick-amounts">
          <a href="#">₹500</a>
          <a href="#">₹1000</a>
          <a href="#">₹2500</a>
          <a href="#">₹5000</a>
        </div>

        <div class="target-action-row">
          <a href="contact.html" class="target-btn-main">
            Donate Now
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="contact.html" class="target-btn-soft">
            <i class="bi bi-share-fill"></i>
            Share
          </a>
        </div>

        <div class="target-trust-strip">
          <div>
            <i class="bi bi-patch-check-fill"></i>
            Secure Donation
          </div>

          <div>
            <i class="bi bi-clock-fill"></i>
            Active Campaign
          </div>
        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= TARGET AMOUNT SECTION END ================= -->



<!-- ================= RAISED AMOUNT SECTION START ================= -->
<section class="raised-amount-section">
  <div class="raised-amount-shape raised-amount-shape-1"></div>
  <div class="raised-amount-shape raised-amount-shape-2"></div>

  <div class="container">

    <div class="raised-amount-wrapper">

      <!-- LEFT RAISED CARD -->
      <div class="raised-amount-card">

        <div class="raised-card-head">
          <div>
            <span>Raised Amount</span>
            <h2>Campaign Donation Summary</h2>
          </div>

          <div class="raised-card-icon">
            <i class="bi bi-graph-up-arrow"></i>
          </div>
        </div>

        <div class="raised-highlight-box">
          <span>Total Raised</span>
          <strong>₹72,500</strong>
          <p>Raised from 185 supporters for education support campaign.</p>
        </div>

        <div class="raised-progress-area">
          <div class="raised-progress-top">
            <span>Raised Progress</span>
            <strong>72.5%</strong>
          </div>

          <div class="raised-progress-track">
            <span style="width: 72.5%;"></span>
          </div>

          <div class="raised-progress-bottom">
            <span>Target ₹1,00,000</span>
            <span>₹27,500 remaining</span>
          </div>
        </div>

        <div class="raised-stats-grid">

          <div class="raised-stat-box">
            <i class="bi bi-people-fill"></i>
            <strong>185</strong>
            <span>Supporters</span>
          </div>

          <div class="raised-stat-box green">
            <i class="bi bi-heart-fill"></i>
            <strong>₹392</strong>
            <span>Avg. Donation</span>
          </div>

          <div class="raised-stat-box sky">
            <i class="bi bi-calendar-check-fill"></i>
            <strong>30</strong>
            <span>Days Left</span>
          </div>

        </div>

      </div>

      <!-- RIGHT CONTENT -->
      <div class="raised-amount-content">

        <div class="section-badge">
          <span><i class="bi bi-cash-stack"></i></span>
          Raised Donation
        </div>

        <h2>
          Track every contribution with
          <span>clear raised amount details.</span>
        </h2>

        <p>
          Janki Social Foundation shows raised amount, target amount, supporter count
          and remaining goal clearly so every campaign remains transparent and trusted.
        </p>

        <div class="raised-feature-list">

          <div class="raised-feature-item">
            <div class="raised-feature-icon">
              <i class="bi bi-patch-check-fill"></i>
            </div>
            <div>
              <h4>Transparent Fund Tracking</h4>
              <p>Show total raised amount, target amount and remaining balance clearly.</p>
            </div>
          </div>

          <div class="raised-feature-item">
            <div class="raised-feature-icon green">
              <i class="bi bi-people-fill"></i>
            </div>
            <div>
              <h4>Supporter Count</h4>
              <p>Display how many people have supported the campaign so far.</p>
            </div>
          </div>

          <div class="raised-feature-item">
            <div class="raised-feature-icon sky">
              <i class="bi bi-bar-chart-fill"></i>
            </div>
            <div>
              <h4>Progress Visualization</h4>
              <p>Use progress bar and percentage to make campaign status easy to understand.</p>
            </div>
          </div>

        </div>

        <div class="raised-action-row">
          <a href="contact.html" class="raised-btn-main">
            Donate Now
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="campaign.html" class="raised-btn-soft">
            View Campaign
          </a>
        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= RAISED AMOUNT SECTION END ================= -->



<!-- ================= REMAINING AMOUNT SECTION START ================= -->
<section class="remaining-amount-section">
  <div class="remaining-amount-shape remaining-amount-shape-1"></div>
  <div class="remaining-amount-shape remaining-amount-shape-2"></div>

  <div class="container">

    <div class="remaining-amount-wrapper">

      <!-- LEFT CONTENT -->
      <div class="remaining-amount-content">

        <div class="section-badge">
          <span><i class="bi bi-hourglass-split"></i></span>
          Remaining Amount
        </div>

        <h2>
          A little more support can
          <span>complete this campaign goal.</span>
        </h2>

        <p>
          The remaining amount shows how much support is still needed to complete the campaign
          target and continue meaningful social welfare work through Janki Social Foundation.
        </p>

        <div class="remaining-feature-list">

          <div class="remaining-feature-item">
            <div class="remaining-feature-icon">
              <i class="bi bi-bullseye"></i>
            </div>
            <div>
              <h4>Clear Remaining Goal</h4>
              <p>Show the exact remaining donation amount needed to complete the target.</p>
            </div>
          </div>

          <div class="remaining-feature-item">
            <div class="remaining-feature-icon green">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div>
              <h4>Live Progress View</h4>
              <p>Visitors can easily understand campaign progress with clean visual details.</p>
            </div>
          </div>

          <div class="remaining-feature-item">
            <div class="remaining-feature-icon sky">
              <i class="bi bi-heart-fill"></i>
            </div>
            <div>
              <h4>Encourage More Support</h4>
              <p>Motivate donors to help close the gap and complete the campaign.</p>
            </div>
          </div>

        </div>

      </div>

      <!-- RIGHT REMAINING CARD -->
      <div class="remaining-amount-card">

        <div class="remaining-card-head">
          <div>
            <span>Donation Gap</span>
            <h3>Remaining Campaign Amount</h3>
          </div>

          <div class="remaining-card-icon">
            <i class="bi bi-wallet2"></i>
          </div>
        </div>

        <div class="remaining-highlight-box">
          <span>Remaining Amount</span>
          <strong>₹27,500</strong>
          <p>Still needed to complete the ₹1,00,000 education support campaign target.</p>
        </div>

        <div class="remaining-summary-grid">

          <div class="remaining-summary-box">
            <span>Target Amount</span>
            <strong>₹1,00,000</strong>
          </div>

          <div class="remaining-summary-box green">
            <span>Raised Amount</span>
            <strong>₹72,500</strong>
          </div>

        </div>

        <div class="remaining-progress-area">
          <div class="remaining-progress-top">
            <span>Amount Completed</span>
            <strong>72.5%</strong>
          </div>

          <div class="remaining-progress-track">
            <span style="width: 72.5%;"></span>
          </div>

          <div class="remaining-progress-bottom">
            <span>₹72,500 raised</span>
            <span>₹27,500 remaining</span>
          </div>
        </div>

        <div class="remaining-support-grid">

          <div class="remaining-support-box">
            <i class="bi bi-people-fill"></i>
            <strong>185</strong>
            <span>Supporters</span>
          </div>

          <div class="remaining-support-box green">
            <i class="bi bi-calendar-check-fill"></i>
            <strong>30</strong>
            <span>Days Left</span>
          </div>

        </div>

        <div class="remaining-action-row">
          <a href="contact.html" class="remaining-btn-main">
            Help Complete Goal
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="contact.html" class="remaining-btn-soft">
            <i class="bi bi-share-fill"></i>
            Share
          </a>
        </div>

      </div>

    </div>

  </div>
</section>
<!-- ================= REMAINING AMOUNT SECTION END ================= -->



@endsection 