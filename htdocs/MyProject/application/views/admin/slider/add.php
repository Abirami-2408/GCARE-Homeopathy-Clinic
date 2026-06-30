
<!-- ADD SLIDER PAGE -->
<!-- Save at: application/views/admin/slider/add.php -->

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
  .required { color:#e74c3c; }
  .flash-error { background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; padding:12px 18px; border-radius:7px; margin-bottom:20px; font-size:1rem; }

  /* ✅ Preview box sized like a real slider thumbnail */
  #imagePreview {
    max-width:300px; max-height:120px;
    border-radius:8px; border:2px dashed #cde0d4;
    display:none; margin-top:10px; object-fit:cover;
  }

  .btn-save { background:#2e8b5a; color:#fff; padding:11px 28px; border:none; border-radius:6px; font-size:1rem; font-weight:700; cursor:pointer; }
  .btn-save:hover { background:#1a5c3a; }
  .btn-cancel { background:#f1f1f1; color:#555; padding:11px 22px; border:none; border-radius:6px; font-size:1rem; font-weight:600; cursor:pointer; text-decoration:none; margin-left:10px; }
  .btn-cancel:hover { background:#ddd; color:#333; text-decoration:none; }
</style>

<div class="form-wrap">
  <div class="form-header">🖼 Add New Slider</div>
  <div class="form-body">

    <?php if($this->session->flashdata('error')): ?>
      <div class="flash-error">✖ <?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <!--
      ✅ MUST use form_open_multipart for file uploads.
      This sets enctype="multipart/form-data" on the <form> tag.
      Without this, $_FILES will be empty and no image will upload.
    -->
    <?php echo form_open_multipart('admin/add_slider'); ?>

      <div class="form-group">
        <label>Slider Title <span class="required">*</span></label>
        <input type="text" name="title" placeholder="e.g. Natural Healing for a Better Life"
               value="<?= set_value('title') ?>" required>
      </div>

      <div class="form-group">
        <label>Subtitle</label>
        <!-- name="subtitle" matches DB column 'subtitle' -->
        <input type="text" name="subtitle" placeholder="e.g. Trusted homeopathic treatments since 2005"
               value="<?= set_value('subtitle') ?>">
      </div>

      <div class="form-group">
        <label>Slider Image <span class="required">*</span></label>
        <!--
          ✅ name="image" — must match the $field_name passed to _upload('image', 'sliders')
          in the controller. If this name is wrong, $_FILES['image'] won't exist.
        -->
        <input type="file" name="image" id="sliderImage" accept="image/*"
               onchange="previewImg(this)" required>
        <img id="imagePreview" src="" alt="Preview">
        <div class="hint">Recommended: 1920×700px wide banner. JPG, PNG, GIF, WebP — max 2MB.</div>
      </div>

      <div class="form-group">
        <label>Status</label>
        <select name="status" style="max-width:200px">
          <option value="1" <?= set_select('status','1',TRUE) ?>>Active</option>
          <option value="0" <?= set_select('status','0') ?>>Inactive</option>
        </select>
      </div>

      <hr style="margin:24px 0; border-color:#e8f0eb;">
      <button type="submit" class="btn-save">💾 Save Slider</button>
      <a href="<?= site_url('admin/manage_slider') ?>" class="btn-cancel">Cancel</a>

    <?php echo form_close(); ?>
  </div>
</div>

<script>
  function previewImg(input) {
    if (input.files && input.files[0]) {
      var r = new FileReader();
      r.onload = function(e) {
        var p = document.getElementById('imagePreview');
        p.src = e.target.result;
        p.style.display = 'block';
      };
      r.readAsDataURL(input.files[0]);
    }
  }
</script>
