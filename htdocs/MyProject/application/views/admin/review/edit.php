
<!-- EDIT REVIEW PAGE -->
<!-- Save at: application/views/admin/review/edit.php -->

<style>
  body { font-size:16px !important; }
  .form-wrap { max-width:650px; margin:20px auto; background:#fff; border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,0.07); overflow:hidden; }
  .form-header { background:#1a5c3a; color:#fff; padding:16px 24px; font-size:1.1rem; font-weight:700; }
  .form-body { padding:28px 24px; }
  .form-group { margin-bottom:20px; }
  .form-group label { display:block; font-size:1rem; font-weight:600; color:#333; margin-bottom:6px; }
  .form-group input, .form-group textarea, .form-group select { width:100%; padding:10px 14px; border:1px solid #cde0d4; border-radius:6px; font-size:1rem; color:#333; outline:none; }
  .form-group input:focus, .form-group textarea:focus { border-color:#2e8b5a; }
  .form-group textarea { resize:vertical; min-height:100px; }
  .hint { font-size:0.85rem; color:#888; margin-top:4px; }
  /* Star rating */
  .star-options { display:flex; gap:10px; flex-wrap:wrap; margin-top:6px; }
  .star-options input[type="radio"] { display:none; }
  .star-options label { padding:7px 16px; border:1px solid #cde0d4; border-radius:6px; cursor:pointer; font-size:0.95rem; background:#fff; transition:all 0.2s; }
  .star-options input[type="radio"]:checked + label { background:#e8f5ee; border-color:#2e8b5a; color:#1a5c3a; font-weight:700; }
  .star-options label:hover { background:#e8f5ee; }
  /* Photo preview */
  #photoPreview { width:80px; height:80px; border-radius:50%; object-fit:cover; border:3px dashed #cde0d4; display:none; margin-top:8px; }
  .flash-error { background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; padding:12px 18px; border-radius:7px; margin-bottom:20px; font-size:1rem; }
  .btn-save { background:#2e8b5a; color:#fff; padding:11px 28px; border:none; border-radius:6px; font-size:1rem; font-weight:700; cursor:pointer; }
  .btn-save:hover { background:#1a5c3a; }
  .btn-cancel { background:#f1f1f1; color:#555; padding:11px 22px; border:none; border-radius:6px; font-size:1rem; font-weight:600; cursor:pointer; text-decoration:none; margin-left:10px; }
</style>

<div class="form-wrap">
  <div class="form-header">✏ Edit Review</div>
  <div class="form-body">

    <?php if($this->session->flashdata('error')): ?>
      <div class="flash-error">✖ <?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?php echo form_open_multipart('admin/edit_review/' . $review->id); ?>

      <div class="form-group">
        <label>Patient Name <span style="color:red">*</span></label>
        <!-- ✅ name="patient_name" matches DB column -->
        <input type="text" name="patient_name"
               value="<?= htmlspecialchars($review->patient_name) ?>" required>
      </div>

      <div class="form-group">
        <label>Review / Testimonial <span style="color:red">*</span></label>
        <textarea name="review" required><?= htmlspecialchars($review->review) ?></textarea>
      </div>

      <div class="form-group">
        <label>Rating <span style="color:red">*</span></label>
        <div class="star-options">
          <?php
            $current_rating = intval($review->rating); // ✅ cast to int
            for($i = 1; $i <= 5; $i++):
          ?>
            <input type="radio" name="rating" id="star<?= $i ?>" value="<?= $i ?>"
                   <?= $current_rating === $i ? 'checked' : '' ?>>
            <label for="star<?= $i ?>"><?= $i ?> <?= str_repeat('★', $i) ?></label>
          <?php endfor; ?>
        </div>
      </div>

      <div class="form-group">
        <label>Current Photo</label><br>
        <?php if(!empty($review->photo)): ?>
          <img src="<?= base_url('assets/uploads/reviews/' . $review->photo) ?>"
               style="width:70px;height:70px;border-radius:50%;object-fit:cover;border:2px solid #b2d8c0;margin-top:6px;">
        <?php else: ?>
          <span style="color:#aaa">No photo uploaded</span>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label>Replace Photo <small style="font-weight:400;color:#888">(leave empty to keep current)</small></label>
        <input type="file" name="photo" id="photoInput" accept="image/*" onchange="previewPhoto(this)">
        <img id="photoPreview" src="" alt="Preview">
        <div class="hint">Square photo, max 1MB. JPG or PNG.</div>
      </div>

      <div class="form-group">
        <label>Status</label>
        <select name="status" style="max-width:200px">
          <option value="1" <?= $review->status == 1 ? 'selected' : '' ?>>Active</option>
          <option value="0" <?= $review->status == 0 ? 'selected' : '' ?>>Inactive</option>
        </select>
      </div>

      <hr style="margin:24px 0; border-color:#e8f0eb;">
      <button type="submit" class="btn-save">💾 Update Review</button>
      <a href="<?= site_url('admin/manage_review') ?>" class="btn-cancel">Cancel</a>

    <?php echo form_close(); ?>
  </div>
</div>

<script>
  function previewPhoto(input) {
    if (input.files && input.files[0]) {
      var r = new FileReader();
      r.onload = function(e) { var p = document.getElementById('photoPreview'); p.src = e.target.result; p.style.display = 'block'; };
      r.readAsDataURL(input.files[0]);
    }
  }
</script>
