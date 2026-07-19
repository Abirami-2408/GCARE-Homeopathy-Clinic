<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GCare Homeopathy Health Care</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
   :root {
      --green-dark:  #1a5c3a;
      --green-mid:   #2e8b5a;
      --green-light: #e8f5ee;
      --gold:        #c9a84c;
    }
    html {
  font-size: 16px; /* Sets the default root font size */
}

    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', sans-serif; color: #181717fb;
  font-size: 1rem; /* Adapts cleanly to 16px */
  line-height: 1.6;
 }

    /* ── NAVBAR ── */
    .navbar {
      background: #f9f2f2eb;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
      padding: 14px 0;
      position: sticky;
      top: 0;
      z-index: 999;
    }
    .navbar-brand {
      font-size: 1.4rem;
      font-weight: 800;
      color: var(--green-dark) !important;
      letter-spacing: 0.5px;
    }
    .navbar-brand span { color: var(--gold); }
    .nav-link {
      color: #444 !important;
      font-weight: 600;
      font-size: 0.95rem;
      margin: 0 4px;
      transition: color 0.2s;
    }
    .nav-link:hover { color: var(--green-mid) !important; }
    .btn-appt {
      background: var(--green-mid);
      color: #fff !important;
      border-radius: 25px;
      padding: 8px 22px !important;
      font-weight: 600;
    }
    .btn-appt:hover { background: var(--green-dark) !important; }

    /* ── SLIDER ── */
    .slider-section { position: relative; }

    .carousel-item img {
      width: 100%;
      height: 520px;
      object-fit: cover;
      display:block;
      filter: brightness(0.55);
    }

    /* Fallback slide when no image */
    .slide-fallback {
      width: 100%;
      height: 520px;
      background: linear-gradient(135deg, var(--green-dark), var(--green-mid));
    }

    .carousel-caption {
      bottom: 50%;
      transform: translateY(50%);
      text-align: center;
    }
    .carousel-caption h2 {
      font-size: calc(1.8rem + 1.5vw) !important; /* Dynamically scales text so it never looks too small */
      font-weight: 800;
      text-shadow: 0 2px 8px rgba(0,0,0,0.4);
      margin-bottom: 14px;
    }
    .carousel-caption p {
      font-size: calc(1rem + 0.3vw) !important;
      margin-bottom: 22px;
      text-shadow: 0 1px 4px rgba(0,0,0,0.4);
    }
    .carousel-caption .btn-slide {
      background: var(--gold);
      color: #fff;
      padding: 12px 32px;
      border-radius: 30px;
      font-weight: 700;
      font-size: 1rem;
      text-decoration: none;
      display: inline-block;
      transition: all 0.3s;
    }
    .carousel-caption .btn-slide:hover {
      background: #fff;
      color: var(--green-dark);
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: rgba(0,0,0,0.3);
      border-radius: 50%;
      padding: 20px;
      background-size: 50%;
    }
    .carousel-indicators li {
      background-color: var(--gold);
      width: 10px;
      height: 10px;
      border-radius: 50%;
    }

    /* No slider placeholder */
    .no-slider {
      height: 400px;
      background: linear-gradient(135deg, var(--green-dark), var(--green-mid));
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #fff;
    }
    .no-slider h2 { font-size: 2.4rem; font-weight: 800; margin-bottom: 10px; }
    .no-slider p  { font-size: 1.1rem; opacity: 0.85; }

    /* ── SECTION COMMON ── */
    section { padding: 70px 0; }
    .section-title {
      text-align: center;
      margin-bottom: 50px;
    }
    .section-title h2 {
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--green-dark);
      margin-bottom: 10px;
    }
    .section-title p {
      color: #777;
      font-size: 1rem;
      max-width: 520px;
      margin: 0 auto;
    }
    .section-title .divider {
      width: 55px;
      height: 3px;
      background: var(--gold);
      margin: 12px auto 16px;
      border-radius: 3px;
    }

    /* ── SERVICES ── */
    .services-section { background: #fff; }

    .service-card {
      background: #fff;
      border-radius: 14px;
      padding: 32px 24px;
      text-align: center;
      box-shadow: 0 4px 16px rgba(0,0,0,0.06);
      transition: all 0.3s;
      height: 100%;
    }
    .service-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 30px rgba(46,139,90,0.15);
    }
    .service-icon {
      width: 70px;
      height: 70px;
      background: var(--green-light);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 18px;
      transition: all 0.3s;
    }
    .service-card:hover .service-icon {
      background: var(--green-mid);
    }
    .service-icon i {
      font-size: 1.6rem;
      color: var(--green-dark);
      transition: color 0.3s;
    }
    .service-card:hover .service-icon i { color: #fff; }

    .service-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      object-position: center;
      border-radius: 10px;
      margin-bottom: 16px;
    }
    .service-card h5 {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--green-dark);
      margin-bottom: 10px;
    }
    .service-card p {
      font-size: 0.95rem;
      color: #666;
      line-height: 1.6;
    }

    /* ── REVIEWS ── */
    .reviews-section { background: #fff; }

    .review-card {
      background: #f9fbfa;
      border-radius: 14px;
      padding: 28px 24px;
      border-left: 4px solid var(--green-mid);
      box-shadow: 0 3px 12px rgba(0,0,0,0.05);
      transition: all 0.3s;
      height: 100%;
      display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
    }
    .review-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 24px rgba(46,139,90,0.12);
    }
    .review-card .quote {
      font-size: 2.5rem;
      color: var(--green-mid);
      line-height: 1;
      margin-bottom: 10px;
      opacity: 0.4;
    }
    .review-card p {
      font-size: 1rem;
      color: #555;
      line-height: 1.7;
      font-style: italic;
      margin-bottom: 24px;
    }
    .reviewer {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .reviewer img {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid var(--green-light);
    }
    .reviewer-avatar {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: var(--green-light);
      color: var(--green-dark);
      font-size: 1.1rem;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid #b2d8c0;
      flex-shrink: 0;
    }
    .reviewer-info strong {
      display: block;
      font-size: 0.95rem;
      color: var(--green-dark);
      font-weight: 700;
    }
    .stars { color: var(--gold); font-size: 0.9rem; }
    .star-empty { color: #ddd; }

    /* ── WHY US ── */
    .whyus-section { background: var(--green-dark); color: #fff; }
    .whyus-section .section-title h2 { color: #fff; }
    .whyus-section .section-title p  { color: rgba(255,255,255,0.7); }
    .why-card {
      text-align: center;
      padding: 24px 16px;
    }
    .why-card i {
      font-size: 2.2rem;
      color: var(--gold);
      margin-bottom: 14px;
      display: block;
    }
    .why-card h5 { color: #fff; font-weight: 700; margin-bottom: 8px; }
    .why-card p  { color: rgba(255,255,255,0.7); font-size: 0.9rem; }

    /* ── FOOTER ── */
    footer {
      background: #111;
      color: rgba(255,255,255,0.6);
      padding: 36px 0 20px;
      text-align: center;
      font-size: 0.9rem;
    }
    footer strong { color: #fff; }
    footer .footer-links { margin-bottom: 12px; }
    footer .footer-links a {
      color: rgba(255,255,255,0.6);
      margin: 0 10px;
      text-decoration: none;
      font-size: 0.88rem;
    }
    footer .footer-links a:hover { color: var(--gold); }
    footer .admin-link {
      display: inline-block;
      margin-top: 10px;
      color: rgba(255,255,255,0.3);
      font-size: 0.78rem;
      text-decoration: none;
    }
    footer .admin-link:hover { color: var(--gold); }
    /* ── Mobile Responsive Typography ── */
@media (max-width: 768px) {
  html {
    font-size: 15px; /* Safely scales down base elements on small screens */
  }
  .carousel-item img, .slide-fallback {
    height: 380px; /* Shortens banner height on mobile so text isn't swimming */
  }
}
/* ── FLOATING WHATSAPP BUTTON ── */
.whatsapp-float {
  position: fixed;
  bottom: 24px;
  right: 24px;
  width: 60px;
  height: 60px;
  background: #25D366;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 16px rgba(0,0,0,0.25);
  z-index: 1000;
  transition: all 0.3s ease;
  animation: wa-pulse 2s infinite;
}
.whatsapp-float:hover {
  background: #1ebc59;
  transform: scale(1.08);
  box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}
.whatsapp-float i {
  color: #fff;
  font-size: 1.8rem;
}

/* subtle pulse animation to draw attention */
@keyframes wa-pulse {
  0%   { box-shadow: 0 4px 16px rgba(37,211,102,0.4); }
  50%  { box-shadow: 0 4px 16px rgba(37,211,102,0.4), 0 0 0 10px rgba(37,211,102,0.08); }
  100% { box-shadow: 0 4px 16px rgba(37,211,102,0.4); }
}

/* Mobile adjustment */
@media (max-width: 576px) {
  .whatsapp-float {
    width: 52px;
    height: 52px;
    bottom: 18px;
    right: 18px;
  }
  .whatsapp-float i { font-size: 1.5rem; }
}
  </style>
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<nav class="navbar navbar-expand-lg navbar">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('/') ?>">
      <span>G</span>Care <small style="font-size:0.6em;font-weight:400;color:#888">Homeopathy</small>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ml-auto align-items-center">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#reviews">Reviews</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item ml-2">
         <a href="<?= base_url('appointment') ?>" class="btn btn-success">Book Appointment</a> 
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- ═══ SLIDER ═══ -->
<section id="home" class="slider-section p-0">
  <?php if(!empty($sliders)): ?>
  <div id="mainCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">

    <!-- Indicators (dots) -->
    <ol class="carousel-indicators">
      <?php foreach($sliders as $i => $s): ?>
        <li data-target="#mainCarousel" data-slide-to="<?= $i ?>"
            class="<?= $i == 0 ? 'active' : '' ?>"></li>
      <?php endforeach; ?>
    </ol>

    <!-- Slides -->
    <div class="carousel-inner">
      <?php foreach($sliders as $i => $s): ?>
      <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">

        <?php if(!empty($s->image)): ?>
          <img src="<?= base_url('assets/uploads/sliders/' . $s->image) ?>"
               alt="<?= htmlspecialchars($s->title) ?>">
        <?php else: ?>
          <div class="slide-fallback"></div>
        <?php endif; ?>

        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <h2><?= htmlspecialchars($s->title) ?></h2>
          <?php if(!empty($s->subtitle)): ?>
            <p><?= htmlspecialchars($s->subtitle) ?></p>
          <?php endif; ?>
          <a href="#services" class="btn-slide">Explore Services</a>
        </div>

      </div>
      <?php endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

  </div>
  <?php else: ?>
  <!-- No slider added yet — show default banner -->
  <div class="no-slider">
    <div>
      <h2>Welcome to GCare Homeopathy</h2>
      <p>Natural healing for a better life</p>
    </div>
  </div>
  <?php endif; ?>
</section>

<!-- ═══ SERVICES ═══ -->
<section id="services" class="services-section">
  <div class="container">
    <div class="section-title">
      <h2>Our Services</h2>
      <div class="divider"></div>
      <p>We offer a wide range of homeopathic treatments for all age groups</p>
    </div>

    <?php if(!empty($services)): ?>
    <div class="row">
      <?php foreach($services as $s): ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card">

          <?php if(!empty($s->image)): ?>
            <img src="<?= base_url('assets/uploads/services/' . $s->image) ?>"
                 alt="<?= htmlspecialchars($s->name) ?>">
          <?php endif; ?>

          <div class="service-icon">
            <i class="<?= htmlspecialchars($s->icon ?? 'fas fa-leaf') ?>"></i>
          </div>

          <h5><?= htmlspecialchars($s->name) ?></h5>
          <p><?= htmlspecialchars($s->description) ?></p>

        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-5 text-muted">
      <i class="fas fa-stethoscope fa-3x mb-3" style="opacity:0.2"></i>
      <p>Services will be listed here once added.</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ═══ WHY CHOOSE US ═══ -->
<section class="whyus-section">
  <div class="container">
    <div class="section-title">
      <h2>Why Choose GCare?</h2>
      <div class="divider"></div>
      <p>Trusted by thousands of patients for natural, side-effect-free healing</p>
    </div>
    <div class="row">
      <div class="col-md-3 col-6">
        <div class="why-card">
          <i class="fas fa-user-md"></i>
          <h5>Expert Doctors</h5>
          <p>Certified homeopathic practitioners with years of experience</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="why-card">
          <i class="fas fa-leaf"></i>
          <h5>Natural Treatment</h5>
          <p>100% natural medicines, zero side effects</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="why-card">
          <i class="fas fa-clock"></i>
          <h5>Timely Care</h5>
          <p>On-time appointments and quick consultations</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="why-card">
          <i class="fas fa-heart"></i>
          <h5>Patient First</h5>
          <p>Personalised treatment plans for every patient</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ REVIEWS ═══ -->
<section id="reviews" class="reviews-section">
  <div class="container">
    <div class="section-title">
      <h2>What Our Patients Say</h2>
      <div class="divider"></div>
      <p>Real experiences from our happy and recovered patients</p>
    </div>

    <?php if(!empty($reviews)): ?>
    <div class="row">
      <?php foreach($reviews as $r): ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="review-card">
          <div class="quote">"</div>
          <p><?= htmlspecialchars($r->review) ?></p>
          <div class="reviewer">

            <?php if(!empty($r->photo)): ?>
              <img src="<?= base_url('assets/uploads/reviews/' . $r->photo) ?>"
                   alt="<?= htmlspecialchars($r->patient_name) ?>">
            <?php else: ?>
              <div class="reviewer-avatar">
                <?= strtoupper(substr($r->patient_name, 0, 1)) ?>
              </div>
            <?php endif; ?>

            <div class="reviewer-info">
              <strong><?= htmlspecialchars($r->patient_name) ?></strong>
              <span class="stars">
                <?php
                  $rating = intval($r->rating);
                  for($i = 1; $i <= 5; $i++):
                ?>
                  <?php if($i <= $rating): ?>
                    <i class="fas fa-star"></i>
                  <?php else: ?>
                    <i class="far fa-star star-empty"></i>
                  <?php endif; ?>
                <?php endfor; ?>
              </span>
            </div>

          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-5 text-muted">
      <i class="fas fa-star fa-3x mb-3" style="opacity:0.2"></i>
      <p>Patient reviews will appear here once added.</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ═══ CONTACT ═══ -->
<section id="contact" style="background:#f9fbfa; padding:70px 0">
  <div class="container">
    <div class="section-title">
      <h2>Contact Us</h2>
      <div class="divider"></div>
      <p>Book an appointment or reach out to us</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4 text-center mb-4">
        <div style="background:#fff;border-radius:14px;padding:30px;box-shadow:0 3px 12px rgba(0,0,0,.06)">
          <i class="fas fa-phone-alt fa-2x mb-3" style="color:var(--green-mid)"></i>
          <h6 style="font-weight:700;color:#1a5c3a">Phone</h6>
          <p style="color:#555">+91 98765 43210</p>
        </div>
      </div>
      <div class="col-md-4 text-center mb-4">
        <div style="background:#fff;border-radius:14px;padding:30px;box-shadow:0 3px 12px rgba(0,0,0,.06)">
          <i class="fas fa-map-marker-alt fa-2x mb-3" style="color:var(--green-mid)"></i>
          <h6 style="font-weight:700;color:#1a5c3a">Location</h6>
          <p style="color:#555">123 Main Street, Tirunelveli, Tamil Nadu</p>
        </div>
      </div>
      <div class="col-md-4 text-center mb-4">
        <div style="background:#fff;border-radius:14px;padding:30px;box-shadow:0 3px 12px rgba(0,0,0,.06)">
          <i class="fas fa-clock fa-2x mb-3" style="color:var(--green-mid)"></i>
          <h6 style="font-weight:700;color:#1a5c3a">Timings</h6>
          <p style="color:#555">Mon – Sat: 9 AM – 7 PM</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FOOTER ═══ -->
<footer>
  <div class="container">
    <div class="footer-links">
      <a href="#home">Home</a>
      <a href="#services">Services</a>
      <a href="#reviews">Reviews</a>
      <a href="#contact">Contact</a>
    </div>
    <p>&copy; <?= date('Y') ?> <strong>GCare Homeopathy Health Care</strong>. All rights reserved.</p>
  
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(function(link) {
    link.addEventListener('click', function(e) {
      var target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        window.scrollTo({ top: target.offsetTop - 70, behavior: 'smooth' });
      }
    });
  });
</script>
<!-- ═══ FLOATING WHATSAPP BUTTON ═══ -->
<a href="https://wa.me/919487892198?text=Hello%2C%20I%20would%20like%20to%20book%20an%20appointment%20at%20GCare%20Homeopathy"
   class="whatsapp-float"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Chat with us on WhatsApp">
  <i class="fab fa-whatsapp"></i>
</a>
</body>
</html>
