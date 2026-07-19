<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($page_title) ? $page_title . ' — GCare Admin' : 'GCare Admin' ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <style>
    :root {
      --green-dark:  #1a5c3a;
      --green-mid:   #2e8b5a;
      --green-light: #e8f5ee;
      --gold:        #c9a84c;
      --sidebar-w:   240px;
    }

    * { box-sizing: border-box; }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f7f5;
      margin: 0;
    }

    /* ── Sidebar ── */
    .sidebar {
      position: fixed;
      top: 0; left: 0;
      width: var(--sidebar-w);
      height: 100vh;
      background: var(--green-dark);
      display: flex;
      flex-direction: column;
      z-index: 100;
      overflow-y: auto;
    }

    .sidebar-brand {
      padding: 22px 20px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .sidebar-brand h4 {
      color: #fff;
      font-size: 1.1rem;
      font-weight: 700;
      margin: 0;
      letter-spacing: 0.5px;
    }

    .sidebar-brand span {
      color: var(--gold);
    }

    .sidebar-brand small {
      display: block;
      color: rgba(255,255,255,0.5);
      font-size: 0.7rem;
      margin-top: 2px;
    }

    .nav-section-label {
      color: rgba(255,255,255,0.35);
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      padding: 18px 20px 6px;
    }

    .sidebar nav a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 20px;
      color: rgba(255,255,255,0.75);
      text-decoration: none;
      font-size: 0.875rem;
      transition: all 0.2s;
      border-left: 3px solid transparent;
    }

    .sidebar nav a:hover,
    .sidebar nav a.active {
      color: #fff;
      background: rgba(255,255,255,0.08);
      border-left-color: var(--gold);
    }

    .sidebar nav a i {
      width: 18px;
      text-align: center;
      font-size: 0.85rem;
      opacity: 0.8;
    }

    .sidebar-footer {
      margin-top: auto;
      padding: 16px 20px;
      border-top: 1px solid rgba(255,255,255,0.1);
    }

    .sidebar-footer a {
      color: rgba(255,255,255,0.5);
      font-size: 0.8rem;
      text-decoration: none;
    }

    .sidebar-footer a:hover { color: #fff; }

    /* ── Main Content ── */
    .main-content {
      margin-left: var(--sidebar-w);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .topbar {
      background: #fff;
      padding: 14px 28px;
      border-bottom: 1px solid #e4ebe7;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 50;
    }

    .topbar h5 {
      margin: 0;
      font-size: 1rem;
      font-weight: 600;
      color: var(--green-dark);
    }

    .topbar .breadcrumb {
      margin: 0;
      background: none;
      padding: 0;
      font-size: 0.78rem;
    }

    .page-body {
      padding: 28px;
      flex: 1;
    }

    /* ── Cards ── */
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.06);
    }

    .card-header {
      background: var(--green-dark);
      color: #fff;
      border-radius: 10px 10px 0 0 !important;
      padding: 14px 20px;
      font-weight: 600;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    /* ── Forms ── */
    .form-control {
      border-radius: 6px;
      border: 1px solid #cde0d4;
      font-size: 0.875rem;
    }

    .form-control:focus {
      border-color: var(--green-mid);
      box-shadow: 0 0 0 0.2rem rgba(46,139,90,0.15);
    }

    label {
      font-size: 0.82rem;
      font-weight: 600;
      color: #444;
      margin-bottom: 4px;
    }

    /* ── Buttons ── */
    .btn-primary {
      background: var(--green-mid);
      border-color: var(--green-mid);
    }

    .btn-primary:hover {
      background: var(--green-dark);
      border-color: var(--green-dark);
    }

    .btn-sm { font-size: 0.75rem; }

    /* ── Table ── */
    .table thead th {
      background: var(--green-light);
      color: var(--green-dark);
      font-size: 0.78rem;
      font-weight: 700;
      letter-spacing: 0.4px;
      text-transform: uppercase;
      border-bottom: 2px solid #c0dbc9;
    }

    .table td {
      font-size: 0.85rem;
      vertical-align: middle;
    }

    .table-thumb {
      width: 60px;
      height: 45px;
      object-fit: cover;
      border-radius: 6px;
      border: 1px solid #ddd;
    }

    /* ── Status badge ── */
    .badge-active {
      background: #d4edda;
      color: #1a5c3a;
      font-size: 0.7rem;
      padding: 3px 8px;
      border-radius: 20px;
      font-weight: 600;
    }

    .badge-inactive {
      background: #f8d7da;
      color: #721c24;
      font-size: 0.7rem;
      padding: 3px 8px;
      border-radius: 20px;
      font-weight: 600;
    }

    /* ── Alert ── */
    .alert { border-radius: 8px; font-size: 0.85rem; }

    /* ── Star rating ── */
    .star-display { color: var(--gold); font-size: 0.9rem; }

    /* ── Image preview ── */
    #imagePreview {
      max-width: 160px;
      max-height: 100px;
      border-radius: 8px;
      border: 2px dashed #cde0d4;
      display: none;
      margin-top: 8px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<!-- ═══ SIDEBAR ═══ -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <h4><span>G</span>Care Admin</h4>
    <small>Homeopathy Health Care</small>
  </div>

  <div class="nav-section-label">Main</div>
  <nav>
    <a href="<?= site_url('admin/dashboard') ?>"
       class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
      <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>
    <li><a href="<?= base_url('admin/manage_appointment') ?>"><i class="fa fa-calendar-check"></i> Manage Appointments</a></li>
  </nav>

  <div class="nav-section-label">Slider</div>
  <nav>
    <a href="<?= site_url('admin/add_slider') ?>"
       class="<?= $this->uri->segment(2) == 'add_slider' ? 'active' : '' ?>">
      <i class="fas fa-plus-circle"></i> Add Slider
    </a>
    <a href="<?= site_url('admin/manage_slider') ?>"
       class="<?= $this->uri->segment(2) == 'manage_slider' ? 'active' : '' ?>">
      <i class="fas fa-images"></i> Manage Sliders
    </a>
  </nav>

  <div class="nav-section-label">Services</div>
  <nav>
    <a href="<?= site_url('admin/add_service') ?>"
       class="<?= $this->uri->segment(2) == 'add_service' ? 'active' : '' ?>">
      <i class="fas fa-plus-circle"></i> Add Service
    </a>
    <a href="<?= site_url('admin/manage_service') ?>"
       class="<?= $this->uri->segment(2) == 'manage_service' ? 'active' : '' ?>">
      <i class="fas fa-stethoscope"></i> Manage Services
    </a>
  </nav>

  <div class="nav-section-label">Reviews</div>
  <nav>
    <a href="<?= site_url('admin/add_review') ?>"
       class="<?= $this->uri->segment(2) == 'add_review' ? 'active' : '' ?>">
      <i class="fas fa-plus-circle"></i> Add Review
    </a>
    <a href="<?= site_url('admin/manage_review') ?>"
       class="<?= $this->uri->segment(2) == 'manage_review' ? 'active' : '' ?>">
      <i class="fas fa-star"></i> Manage Reviews
    </a>
    
  </nav>

  <div class="sidebar-footer">
    <a href="<?= site_url('admin/logout') ?>">
      <i class="fas fa-sign-out-alt mr-1"></i> Logout
    </a>
  </div>
</aside>

<!-- ═══ MAIN ═══ -->
<div class="main-content">
  <div class="topbar">
    <div>
      <h5><?= isset($page_title) ? $page_title : 'Dashboard' ?></h5>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard') ?>">Home</a></li>
          <?php if(isset($page_title)): ?>
          <li class="breadcrumb-item active"><?= $page_title ?></li>
          <?php endif; ?>
        </ol>
      </nav>
    </div>
    <a href="<?= site_url('/') ?>" target="_blank" class="btn btn-sm btn-outline-secondary">
      <i class="fas fa-eye mr-1"></i> View Site
    </a>
  </div>

  <div class="page-body">

    <!-- Flash messages -->
    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fas fa-check-circle mr-2"></i><?= $this->session->flashdata('success') ?>
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-exclamation-circle mr-2"></i><?= $this->session->flashdata('error') ?>
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
    <?php endif; ?>
