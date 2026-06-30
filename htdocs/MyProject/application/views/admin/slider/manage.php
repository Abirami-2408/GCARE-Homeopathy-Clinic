
<!-- MANAGE SLIDER PAGE -->
<!-- Save at: application/views/admin/slider/manage.php -->

<style>
  body { font-size:16px !important; }
  .manage-wrap { padding:20px; }
  .manage-topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; }
  .manage-topbar h4 { margin:0; font-size:1.3rem; font-weight:700; color:#1a5c3a; }
  .btn-add { background:#2e8b5a; color:#fff; padding:8px 18px; border-radius:6px; text-decoration:none; font-size:0.95rem; font-weight:600; }
  .btn-add:hover { background:#1a5c3a; color:#fff; text-decoration:none; }
  .flash-success,.flash-error { padding:12px 18px; border-radius:7px; margin-bottom:16px; font-size:1rem; font-weight:500; }
  .flash-success { background:#d4edda; color:#155724; border:1px solid #c3e6cb; }
  .flash-error   { background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; }
  .manage-table { width:100%; border-collapse:collapse; background:#fff; border-radius:10px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.07); }
  .manage-table thead tr { background:#1a5c3a; color:#fff; }
  .manage-table thead th { padding:14px 16px; font-size:1rem; font-weight:600; text-align:left; }
  .manage-table tbody tr { border-bottom:1px solid #e8f0eb; }
  .manage-table tbody tr:hover { background:#f4faf7; }
  .manage-table tbody td { padding:13px 16px; font-size:1rem; color:#333; vertical-align:middle; }

  /* ✅ FIX: Slider thumbnail must have fixed dimensions and object-fit
     so it displays properly regardless of the uploaded image size */
  .manage-table img.slider-thumb {
    width:120px; height:65px; object-fit:cover;
    border-radius:6px; border:1px solid #ddd;
    display:block;
  }

  .badge-on  { background:#d4edda; color:#155724; padding:4px 12px; border-radius:20px; font-size:0.88rem; font-weight:600; }
  .badge-off { background:#f8d7da; color:#721c24; padding:4px 12px; border-radius:20px; font-size:0.88rem; font-weight:600; }
  .btn-edit,.btn-del { padding:7px 16px; border-radius:5px; font-size:0.92rem; font-weight:600; text-decoration:none; border:none; cursor:pointer; display:inline-block; margin-right:4px; }
  .btn-edit { background:#e8f5ee; color:#1a5c3a; border:1px solid #b2d8c0; }
  .btn-edit:hover { background:#2e8b5a; color:#fff; text-decoration:none; }
  .btn-del  { background:#fdecea; color:#c0392b; border:1px solid #f5c6cb; }
  .btn-del:hover { background:#c0392b; color:#fff; }
  .empty-state { text-align:center; padding:50px 20px; color:#888; font-size:1rem; }
  .no-img { color:#aaa; font-size:0.85rem; font-style:italic; }
</style>

<div class="manage-wrap">

  <?php if($this->session->flashdata('success')): ?>
    <div class="flash-success">✔ <?= $this->session->flashdata('success') ?></div>
  <?php endif; ?>
  <?php if($this->session->flashdata('error')): ?>
    <div class="flash-error">✖ <?= $this->session->flashdata('error') ?></div>
  <?php endif; ?>

  <div class="manage-topbar">
    <h4>🖼 Manage Sliders (<?= count($sliders) ?>)</h4>
    <a href="<?= site_url('admin/add_slider') ?>" class="btn-add">+ Add New Slider</a>
  </div>

  <table class="manage-table">
    <thead>
      <tr>
        <th width="50">#</th>
        <th width="140">Image</th>
        <th>Title</th>
        <th>Subtitle</th>
        <th width="100">Status</th>
        <th width="160">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($sliders)): ?>
        <tr><td colspan="6">
          <div class="empty-state">No sliders found. <a href="<?= site_url('admin/add_slider') ?>">Add your first slider</a>.</div>
        </td></tr>
      <?php else: ?>
        <?php foreach($sliders as $i => $s): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td>
            <?php if(!empty($s->image)): ?>
              <!--
                ✅ FIX — IMAGE PATH:
                base_url('assets/uploads/sliders/') points to
                http://localhost:8080/MyProject/assets/uploads/sliders/<filename>
                This matches FCPATH . 'assets/uploads/sliders/' where the file is saved.
                If your image was not showing before, the most common causes are:
                  1. The assets/ folder is outside application/ (correct — it should be
                     in the web root, beside index.php, NOT inside application/).
                  2. The uploads/sliders/ folder didn't exist or had no write permission.
                  3. base_url was wrong in config/config.php.
              -->
              <img class="slider-thumb"
                   src="<?= base_url('assets/uploads/sliders/' . $s->image) ?>"
                   alt="<?= htmlspecialchars($s->title) ?>">
            <?php else: ?>
              <span class="no-img">No image</span>
            <?php endif; ?>
          </td>
          <td><strong><?= htmlspecialchars($s->title) ?></strong></td>
          <td style="color:#555"><?= htmlspecialchars($s->subtitle ?? '') ?></td>
          <td>
            <?= $s->status == 1
                ? '<span class="badge-on">Active</span>'
                : '<span class="badge-off">Inactive</span>' ?>
          </td>
          <td>
            <a href="<?= site_url('admin/edit_slider/' . $s->id) ?>" class="btn-edit">✏ Edit</a>
            <a href="<?= site_url('admin/delete_slider/' . $s->id) ?>" class="btn-del"
               onclick="return confirm('Delete this slider?')">🗑 Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>

</div>
