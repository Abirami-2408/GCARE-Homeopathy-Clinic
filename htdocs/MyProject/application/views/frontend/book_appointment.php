<!-- Include this in your header if Bootstrap 5 isn't loading yet -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Optional: Bootstrap Icons for a professional medical look -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="d-flex align-items-center justify-content-center min-vh-100" style="background-color: #f2f7f5;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                
                <!-- Medically Blended Form Card -->
                <div class="card border-0 rounded-4 p-4 p-sm-5 bg-white shadow" style="box-shadow: 0 10px 30px rgba(25, 135, 84, 0.05) !important;">
                    
                    <!-- Hospital-Style Header -->
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle p-3 mb-2">
                            <i class="bi bi-calendar2-heart fs-3"></i>
                        </div>
                        <h2 class="fw-bold text-dark h3 m-0">Book an Appointment</h2>
                        <p class="text-muted small mt-1">Please fill in your details to schedule your visit</p>
                    </div>

                    <!-- Flash Messages -->
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success border-0 rounded-3 small mb-4"><?= $this->session->flashdata('success') ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger border-0 rounded-3 small mb-4"><?= $this->session->flashdata('error') ?></div>
                    <?php endif; ?>
                    <?= validation_errors('<div class="alert alert-danger border-0 rounded-3 small mb-4">', '</div>') ?>

                    <form action="<?= base_url('appointment/submit') ?>" method="post">
                        <!-- Full Name -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-lg medical-input fs-6" value="<?= set_value('name') ?>" placeholder="John Doe" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" class="form-control form-control-lg medical-input fs-6" value="<?= set_value('phone') ?>" placeholder="e.g. +1 234 567 890" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" name="email" class="form-control form-control-lg medical-input fs-6" value="<?= set_value('email') ?>" placeholder="name@example.com">
                        </div>

                        <!-- Preferred Date -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Preferred Date <span class="text-danger">*</span></label>
                            <input type="date" name="preferred_date" class="form-control form-control-lg medical-input fs-6" required>
                        </div>

                        <!-- Message -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Symptoms / Message <span class="text-muted">(Optional)</span></label>
                            <textarea name="message" class="form-control medical-input fs-6" rows="3" placeholder="Briefly describe the reason for your visit..."></textarea>
                        </div>

                        <!-- Blended Green Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg fw-bold rounded-3 text-white medical-btn py-3">
                                Book Appointment
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Premium Clinical Soft Form Inputs */
    .medical-input {
        background-color: #f8faf9;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        transition: all 0.2s ease-in-out;
    }
    .medical-input:focus {
        background-color: #ffffff;
        border-color: #198754; /* Bootstrap Clinical Green */
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.12);
    }
    
    /* Blended Green Button Styling */
    .medical-btn {
        background: linear-gradient(135deg, #198754, #146c43);
        border: none;
        box-shadow: 0 4px 12px rgba(25, 135, 84, 0.2);
        transition: all 0.2s ease-in-out;
    }
    .medical-btn:hover {
        background: linear-gradient(135deg, #146c43, #0f5132);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(25, 135, 84, 0.3);
    }
    .medical-btn:active {
        transform: translateY(0);
    }
</style>