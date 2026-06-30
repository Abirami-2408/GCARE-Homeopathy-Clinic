<!-- application/views/admin/dashboard.php -->
<style>
  .dashboard-wrap { padding: 24px; }
  .dash-title { font-size: 1.4rem; font-weight: 800; color: #1a5c3a; margin-bottom: 24px; }
  .stat-card {
    border-radius: 14px; padding: 28px 24px; color: #fff;
    display: flex; align-items: center; gap: 18px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.10); margin-bottom: 20px;
  }
  .stat-card.green  { background: linear-gradient(135deg, #2e8b5a, #1a5c3a); }
  .stat-card.teal   { background: linear-gradient(135deg, #20a090, #157a6e); }
  .stat-card.gold   { background: linear-gradient(135deg, #c9a84c, #a07830); }
  .stat-card i { font-size: 2.4rem; opacity: 0.85; }
  .stat-info h3 { font-size: 2rem; font-weight: 800; margin: 0; }
  .stat-info p  { font-size: 0.95rem; margin: 0; opacity: 0.85; }
  .quick-links { margin-top: 10px; }
  .quick-links .btn {
    border-radius: 8px; font-weight: 600; font-size: 0.95rem;
    padding: 10px 20px; margin: 6px 6px 6px 0;
  }
  .btn-green  { background: #2e8b5a; color: #fff; border: none; }
  .btn-green:hover { background: #1a5c3a; color: #fff; }
</style>

<div class="dashboard-wrap">
  <div class="dash-title">📊 Dashboard</div>

  <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
  <?php endif; ?>

  <!-- Stat Cards -->
  <div class="row">
    <div class="col-md-4">
      <div class="stat-card green">
        <i class="fas fa-images"></i>
        <div class="stat-info">
          <h3><?= $total_sliders ?></h3>
          <p>Active Sliders</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card teal">
        <i class="fas fa-stethoscope"></i>
        <div class="stat-info">
          <h3><?= $total_services ?></h3>
          <p>Active Services</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card gold">
        <i class="fas fa-star"></i>
        <div class="stat-info">
          <h3><?= $total_reviews ?></h3>
          <p>Active Reviews</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Links -->
  <div class="quick-links mt-4">
    <h5 style="font-weight:700; color:#1a5c3a; margin-bottom:14px;">Quick Actions</h5>
    <a href="<?= site_url('admin/add_slider') ?>"  class="btn btn-green">+ Add Slider</a>
    <a href="<?= site_url('admin/add_service') ?>" class="btn btn-green">+ Add Service</a>
    <a href="<?= site_url('admin/add_review') ?>"  class="btn btn-green">+ Add Review</a>
    <a href="<?= site_url('admin/manage_slider') ?>"  class="btn btn-outline-secondary">Manage Sliders</a>
    <a href="<?= site_url('admin/manage_service') ?>" class="btn btn-outline-secondary">Manage Services</a>
    <a href="<?= site_url('admin/manage_review') ?>"  class="btn btn-outline-secondary">Manage Reviews</a>
  </div>
</div>
