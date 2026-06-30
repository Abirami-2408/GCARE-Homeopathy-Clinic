
<!-- ADD REVIEW PAGE -->
<!-- Save at: application/views/admin/review/add.php -->

<style>
  body { font-size:16px !important; }
  .form-wrap { max-width:650px; margin:20px auto; background:#fff; border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,0.07); overflow:hidden; }
  .form-header { background:#1a5c3a; color:#fff; padding:16px 24px; font-size:1.1rem; font-weight:700; }
  .form-body { padding:28px 24px; }
  .form-group { margin-bottom:20px; }
  .form-group label { display:block; font-size:1rem; font-weight:600; color:#333; margin-bottom:6px; }
  .form-group input, .form-group textarea, .form-group select {
    width:100%; padding:10px 14px; border:1px solid #cde0d4;
    border-radius:6px; font-size:1rem; color:#333; outline:none;
  }
  .form-group input:focus, .form-group textarea:focus { border-color:#2e8b5a; }
  .form-group textarea { resize:vertical; min-height:100px; }
  .required { color:#e74c3c; }
  .hint { font-size:0.85rem; color:#888; margin-top:4px; }
  .flash-error { background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; padding:12px 18px; border-radius:7px; margin-bottom:20px; font-size:1rem; }

  /* Star rating buttons */
  .star-options { display:flex; gap:10px; flex-wrap:wrap; margin-top:6px; }
  .star-options input[type="radio"] { display:none; }
  .star-options label {
    padding:7px 16px; border:1px solid #cde0d4; border-radius:6px;
    cursor:pointer; font-size:0.95rem; background:#fff; transition:all 0.2s;
  }
  .star-options input[type="radio"]:checked + label {
    background:#e8f5ee; border-color:#2e8b5a; color:#1a5c3a; font-weight:700;
  }
  .star-options label:hover { background:#e8f5ee; }

  /* Photo preview circle */
  #photoPreview {
    width:80px; height:80px; border-radius:50%; object-fit:cover;
    border:3px dashed #cde0d4; display:none; margin-top:8px;
  }

  .btn-save { background:#2e8b5a; color:#fff; padding:11px 28px; border:none; border-radius:6px; font-size:1rem; font-weight:700; cursor:pointer; }
  .btn-save:hover { background:#1a5c3a; }
  .btn-cancel { background:#f1f1f1; color:#555; padding:11px 22px; border:none; border-radius:6px; font-size:1rem; font-weight:600; cursor:pointer; text-decoration:none; margin-left:10px; }
  .btn-cancel:hover { background:#ddd; color:#333; text-decoration:none; }
</style>

<div class="form-wrap">
  <div class="form-header">⭐ Add New Review</div>
  <div class="form-body">

    <?php if($this->session->flashdata('error')): ?>
      <div class="flash-error">✖ <?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <!--
      ✅ form_open_multipart is required because we have a file input (photo).
      Even though photo is optional, the enctype must be multipart/form-data
      for $_FILES to be populated at all.
    -->
    <?php echo form_open_multipart('admin/add_review'); ?>

      <div class="form-group">
        <label>Patient Name <span class="required">*</span></label>
        <!-- name="patient_name" must match the DB column 'patient_name' -->
        <input type="text" name="patient_name" placeholder="e.g. Priya Ramesh"
               value="<?= set_value('patient_name') ?>" required>
      </div>

      <div class="form-group">
        <label>Review / Testimonial <span class="required">*</span></label>
        <textarea name="review" placeholder="What did the patient say about the treatment?"
                  required><?= set_value('review') ?></textarea>
      </div>

      <div class="form-group">
        <label>Rating <span class="required">*</span></label>
        <div class="star-options">
          <?php for($i = 1; $i <= 5; $i++): ?>
            <input type="radio" name="rating" id="star<?= $i ?>" value="<?= $i ?>"
                   <?= $i == 5 ? 'checked' : '' ?>>
            <label for="star<?= $i ?>">
              <?= $i ?> <?= str_repeat('★', $i) ?>
            </label>
          <?php endfor; ?>
        </div>
      </div>

      <div class="form-group">
        <label>Patient Photo <small style="font-weight:400;color:#888">(optional — review saves without it)</small></label>
        <!--
          ✅ BUG FIX NOTE:
          The name here is "photo" which matches _upload('photo', 'reviews') in the controller.
          When the user does NOT pick a file, $_FILES['photo']['name'] is empty string.
          The controller now correctly handles this: '' means no photo, which is fine.
          Previously the controller was blocking the save when no photo was chosen.
        -->
        <input type="file" name="photo" id="photoInput" accept="image/*"
               onchange="previewPhoto(this)">
        <img id="photoPreview" src="" alt="Preview">
        <div class="hint">Square photo recommended. JPG, PNG — max 2MB.</div>
      </div>

      <div class="form-group">
        <label>Status</label>
        <select name="status" style="max-width:200px">
          <option value="1" <?= set_select('status','1',TRUE) ?>>Active</option>
          <option value="0" <?= set_select('status','0') ?>>Inactive</option>
        </select>
      </div>

      <hr style="margin:24px 0; border-color:#e8f0eb;">

      <button type="submit" class="btn-save">💾 Save Review</button>
      <a href="<?= site_url('admin/manage_review') ?>" class="btn-cancel">Cancel</a>

    <?php echo form_close(); ?>

  </div>
</div>

<script>
  function previewPhoto(input) {
    if (input.files && input.files[0]) {
      var r = new FileReader();
      r.onload = function(e) {
        var p = document.getElementById('photoPreview');
        p.src = e.target.result;
        p.style.display = 'block';
      };
      r.readAsDataURL(input.files[0]);
    }
  }
</script>
