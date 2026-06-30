<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Paradise — Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
  <style>
    body { font-family: 'Segoe UI', sans-serif; }

    /* ── Navbar ────────────────────────────────── */
    .navbar { background: rgba(26,31,54,.95); }
    .navbar-brand { color: #fff !important; font-weight: 700; letter-spacing: .5px; }
    .navbar-brand span { color: #6c8ef5; }
    .nav-link { color: rgba(255,255,255,.8) !important; }
    .nav-link:hover { color: #fff !important; }

    /* ── Hero slider ───────────────────────────── */
    .hero-slider .carousel-item { height: 520px; }
    .hero-slider .carousel-item img { width: 100%; height: 520px; object-fit: cover; filter: brightness(.65); }
    .hero-slider .carousel-caption h2 { font-size: 2.8rem; font-weight: 700; text-shadow: 0 2px 8px rgba(0,0,0,.5); }
    .hero-slider .carousel-caption p  { font-size: 1.1rem; }

    /* ── Gallery section ───────────────────────── */
    #gallery { padding: 80px 0; background: #f8f9fd; }
    #gallery .section-title { font-size: 2rem; font-weight: 700; color: #1a1f36; }
    #gallery .section-sub   { color: #6b7280; margin-bottom: 40px; }

    /* Filter buttons */
    .filter-btn { border-radius: 20px; margin: 0 4px 8px; font-size: .85rem; }
    .filter-btn.active { background: #6c8ef5; border-color: #6c8ef5; color: #fff; }

    /* Gallery grid */
    .gallery-grid { column-count: 3; column-gap: 16px; }
    @media(max-width:768px) { .gallery-grid { column-count: 2; } }
    @media(max-width:480px) { .gallery-grid { column-count: 1; } }

    .gallery-item {
      break-inside: avoid;
      margin-bottom: 16px;
      border-radius: 12px;
      overflow: hidden;
      position: relative;
      cursor: pointer;
    }
    .gallery-item img { width: 100%; display: block; transition: transform .35s; }
    .gallery-item:hover img { transform: scale(1.04); }

    /* Overlay on hover */
    .gallery-overlay {
      position: absolute; inset: 0;
      background: rgba(26,31,54,.55);
      opacity: 0; transition: opacity .25s;
      display: flex; align-items: center; justify-content: center;
    }
    .gallery-item:hover .gallery-overlay { opacity: 1; }
    .gallery-overlay span {
      color: #fff; font-size: .85rem; font-weight: 600;
      background: rgba(0,0,0,.3); padding: 6px 14px;
      border-radius: 20px;
    }

    /* ── Lightbox ──────────────────────────────── */
    #lightbox {
      display: none; position: fixed; inset: 0; z-index: 2000;
      background: rgba(0,0,0,.88); align-items: center; justify-content: center;
    }
    #lightbox.open { display: flex; }
    #lightbox img { max-width: 90vw; max-height: 85vh; border-radius: 10px; }
    #lightbox-close {
      position: absolute; top: 20px; right: 28px;
      color: #fff; font-size: 2rem; cursor: pointer; line-height: 1;
    }

    /* ── Footer ────────────────────────────────── */
    footer { background: #1a1f36; color: #c8cfe8; padding: 30px 0; text-align: center; font-size: .88rem; }
  </style>
</head>
<body>

<!-- ══════════════════════════════════════════
     NAVBAR
══════════════════════════════════════════ -->
<nav class="navbar navbar-expand-lg sticky-top px-4">
  <a class="navbar-brand" href="#">Paradise <span>Gallery</span></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navMenu">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin'); ?>">Admin</a></li>
    </ul>
  </div>
</nav>

<!-- ══════════════════════════════════════════
     HERO SLIDER
     Shows slides from `sliders` table (active only)
══════════════════════════════════════════ -->
<?php if ( ! empty($sliders)): ?>
<div id="heroSlider" class="carousel slide hero-slider" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php foreach ($sliders as $i => $slide): ?>
    <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
      <img src="<?php echo base_url('assets/uploads/slider/' . $slide['image']); ?>"
           alt="<?php echo htmlspecialchars($slide['title']); ?>">
      <div class="carousel-caption text-start">
        <h2><?php echo htmlspecialchars($slide['title']); ?></h2>
        <?php if ($slide['subtitle']): ?>
          <p><?php echo htmlspecialchars($slide['subtitle']); ?></p>
        <?php endif; ?>
        <?php if ($slide['link']): ?>
          <a href="<?php echo $slide['link']; ?>" class="btn btn-light btn-sm mt-1">
            Explore <i class="bi bi-arrow-right ms-1"></i>
          </a>
        <?php endif; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
<?php else: ?>
<!-- Fallback hero when no sliders are set -->
<div style="background:#1a1f36;color:#fff;text-align:center;padding:100px 20px;">
  <h1 style="font-size:3rem;font-weight:700;">Welcome to <span style="color:#6c8ef5;">Paradise</span></h1>
  <p style="color:#c8cfe8;margin-top:12px;">Explore our curated gallery of stunning images.</p>
</div>
<?php endif; ?>


<!-- ══════════════════════════════════════════
     GALLERY SECTION
     Shows all active gallery images from DB.
     Category filter buttons let visitors filter
     without a page reload (pure JS).
══════════════════════════════════════════ -->
<section id="gallery">
  <div class="container">
    <div class="text-center mb-2">
      <h2 class="section-title">Our Gallery</h2>
      <p class="section-sub">A collection of beautiful moments — click any image to view larger.</p>
    </div>

    <!-- Category filter buttons -->
    <?php if ( ! empty($categories)): ?>
    <div class="text-center mb-4">
      <button class="btn btn-outline-secondary filter-btn active" data-filter="all">All</button>
      <?php foreach ($categories as $cat): ?>
        <button class="btn btn-outline-secondary filter-btn"
                data-filter="<?php echo $cat['id']; ?>">
          <?php echo htmlspecialchars($cat['name']); ?>
        </button>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if ( ! empty($gallery)): ?>
    <!-- Masonry-style grid -->
    <div class="gallery-grid" id="gallery-grid">
      <?php foreach ($gallery as $item): ?>
      <div class="gallery-item" data-category="<?php echo $item['category_id']; ?>"
           onclick="openLightbox('<?php echo base_url('assets/uploads/gallery/' . $item['image']); ?>', '<?php echo addslashes(htmlspecialchars($item['title'])); ?>')">
        <img src="<?php echo base_url('assets/uploads/gallery/' . $item['image']); ?>"
             alt="<?php echo htmlspecialchars($item['title']); ?>"
             loading="lazy">
        <div class="gallery-overlay">
          <span><i class="bi bi-zoom-in me-1"></i><?php echo htmlspecialchars($item['title']); ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
      <div class="text-center text-muted py-5">
        <i class="bi bi-images" style="font-size:3rem;"></i>
        <p class="mt-3">No gallery images available yet.</p>
      </div>
    <?php endif; ?>

  </div>
</section>


<!-- ══════════════════════════════════════════
     LIGHTBOX (click → full view)
══════════════════════════════════════════ -->
<div id="lightbox" onclick="closeLightbox()">
  <span id="lightbox-close" onclick="closeLightbox()">&times;</span>
  <img id="lightbox-img" src="" alt="">
</div>


<!-- ══════════════════════════════════════════
     FOOTER
══════════════════════════════════════════ -->
<footer>
  <p class="mb-0">&copy; <?php echo date('Y'); ?> Paradise Gallery. All rights reserved.</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ── Lightbox ──────────────────────────────
function openLightbox(src, title) {
  document.getElementById('lightbox-img').src   = src;
  document.getElementById('lightbox-img').alt   = title;
  document.getElementById('lightbox').classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeLightbox() {
  document.getElementById('lightbox').classList.remove('open');
  document.body.style.overflow = '';
}
// Close on ESC key
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closeLightbox();
});

// ── Category filter ───────────────────────
document.querySelectorAll('.filter-btn').forEach(function(btn) {
  btn.addEventListener('click', function() {
    // Update active button style
    document.querySelectorAll('.filter-btn').forEach(function(b) { b.classList.remove('active'); });
    this.classList.add('active');

    var filter = this.dataset.filter;

    document.querySelectorAll('.gallery-item').forEach(function(item) {
      if (filter === 'all' || item.dataset.category === filter) {
        item.style.display = '';
      } else {
        item.style.display = 'none';
      }
    });
  });
});
</script>
</body>
</html>
