
<!-- EDIT SLIDER PAGE -->
<!-- Save at: application/views/admin/slider/edit.php -->

<style>
  body { font-size:16px !important; }
  .form-wrap { max-width:680px; margin:20px auto; background:#fff; border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,0.07); overflow:hidden; }
  .form-header { background:#1a5c3a; color:#fff; padding:16px 24px; font-size:1.1rem; font-weight:700; }
  .form-body { padding:28px 24px; }
  .form-group { margin-bottom:20px; }
  .form-group label { display:block; font-size:1rem; font-weight:600; color:#333; margin-bottom:6px; }
  .form-group input, .form-group select {
    width:100%; padding:10px 14px; border:1px solid #cde0d4;
    border-radius:6px; font-size:1rem; color:#333; outline:none;
  }
  .form-group input:focus { border-color:#2e8b5a; }
  .hint { font-size:0.85rem; color:#888; margin-top:4px; }
  .flash-error { background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; padding:12px 18px; border-radius:7px; margin-bottom:20px; font-size:1rem; }
  .current-img { max-width:280px; max-height:110px; border-radius:8px; border:1px solid #cde0d4; object-fit:cover; margin-top:6px; display:block; }
  #newImgPreview { max-width:280px; max-height:110px; border-radius:8px; border:2px dashed #2e8b5a; display:none; margin-top:8px; object-fit:cover; }
  .btn-save { background:#2e8b5a; color:#fff; padding:11px 28px; border:none; border-radius:6px; font-size:1rem; font-weight:700; cursor:pointer; }
  .btn-save:hover { background:#1a5c3a; }
  .btn-cancel { background:#f1f1f1; color:#555; padding:11px 22px; border:none; border-radius:6px; font-size:1rem; font-weight:600; cursor:pointer; text-decoration:none; margin-left:10px; }
  .btn-cancel:hover { background:#ddd; color:#333; text-decoration:none; }
</style>

<div class="form-wrap">
  <div class="form-header">✏ Edit Slider</div>
  <div class="form-body">

    <?php if($this->session->flashdata('error')): ?>
      <div class="flash-error">✖ <?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?php echo form_open_multipart('admin/edit_slider/' . $slider->id); ?>

      <div class="form-group">
        <label>Slider Title <span style="color:red">*</span></label>
        <input type="text" name="title" value="<?= htmlspecialchars($slider->title) ?>" required>
      </div>

      <div class="form-group">
        <label>Subtitle</label>
        <input type="text" name="subtitle" value="<?= htmlspecialchars($slider->subtitle ?? '') ?>">
      </div>

      <div class="form-group">
        <label>Current Image</label>
        <?php if(!empty($slider->image)): ?>
          <!--
            ✅ FIX: Show the existing slider image using the correct base_url path.
            This is the same path used in manage.php so it must be consistent.
          -->
          <img class="current-img"
               src="<?= base_url('assets/uploads/sliders/' . $slider->image) ?>"
               alt="Current slider image">
        <?php else: ?>
          <p style="color:#aaa; margin:6px 0">No image uploaded yet.</p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label>Replace Image <small style="font-weight:400;color:#888">(leave empty to keep current)</small></label>
        <input type="file" name="image" id="newImgInput" accept="image/*"
               onchange="previewNew(this)">
        <img id="newImgPreview" src="" alt="New image preview">
        <div class="hint">Recommended: 1920×700px. JPG, PNG, GIF, WebP — max 2MB.</div>
      </div>

      <div class="form-group">
        <label>Status</label>
        <select name="status" style="max-width:200px">
          <option value="1" <?= $slider->status == 1 ? 'selected' : '' ?>>Active</option>
          <option value="0" <?= $slider->status == 0 ? 'selected' : '' ?>>Inactive</option>
        </select>
      </div>

      <hr style="margin:24px 0; border-color:#e8f0eb;">
      <button type="submit" class="btn-save">💾 Update Slider</button>
      <a href="<?= site_url('admin/manage_slider') ?>" class="btn-cancel">Cancel</a>

    <?php echo form_close(); ?>
  </div>
</div>

<script>
  function previewNew(input) {
    if (input.files && input.files[0]) {
      var r = new FileReader();
      r.onload = function(e) {
        var p = document.getElementById('newImgPreview');
        p.src = e.target.result;
        p.style.display = 'block';
      };
      r.readAsDataURL(input.files[0]);
    }
  }
</script>
