
<!-- MANAGE REVIEW PAGE -->
<!-- Save at: application/views/admin/review/manage.php -->

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
  .patient-photo { width:50px; height:50px; border-radius:50%; object-fit:cover; border:2px solid #b2d8c0; }
  .avatar-initials { width:50px; height:50px; border-radius:50%; background:#e8f5ee; color:#1a5c3a; font-size:1.1rem; font-weight:700; display:flex; align-items:center; justify-content:center; border:2px solid #b2d8c0; }
  /* ✅ Star fix — filled gold, empty grey */
  .star-filled { color:#f0a500; font-size:1.1rem; }
  .star-empty  { color:#ccc;    font-size:1.1rem; }
  .badge-on  { background:#d4edda; color:#155724; padding:4px 12px; border-radius:20px; font-size:0.88rem; font-weight:600; }
  .badge-off { background:#f8d7da; color:#721c24; padding:4px 12px; border-radius:20px; font-size:0.88rem; font-weight:600; }
  .btn-edit,.btn-del { padding:7px 16px; border-radius:5px; font-size:0.92rem; font-weight:600; text-decoration:none; border:none; cursor:pointer; display:inline-block; margin-right:4px; }
  .btn-edit { background:#e8f5ee; color:#1a5c3a; border:1px solid #b2d8c0; }
  .btn-edit:hover { background:#2e8b5a; color:#fff; text-decoration:none; }
  .btn-del  { background:#fdecea; color:#c0392b; border:1px solid #f5c6cb; }
  .btn-del:hover { background:#c0392b; color:#fff; }
  .empty-state { text-align:center; padding:50px 20px; color:#888; font-size:1rem; }
</style>

<div class="manage-wrap">

  <?php if($this->session->flashdata('success')): ?>
    <div class="flash-success">✔ <?= $this->session->flashdata('success') ?></div>
  <?php endif; ?>
  <?php if($this->session->flashdata('error')): ?>
    <div class="flash-error">✖ <?= $this->session->flashdata('error') ?></div>
  <?php endif; ?>

  <div class="manage-topbar">
    <h4>⭐ Manage Reviews (<?= count($reviews) ?>)</h4>
    <a href="<?= site_url('admin/add_review') ?>" class="btn-add">+ Add New Review</a>
  </div>

  <table class="manage-table">
    <thead>
      <tr>
        <th width="50">#</th>
        <th width="70">Photo</th>
        <th>Patient Name</th>
        <th>Review</th>
        <th width="140">Rating</th>
        <th width="100">Status</th>
        <th width="150">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($reviews)): ?>
        <tr><td colspan="7">
          <div class="empty-state">No reviews yet. <a href="<?= site_url('admin/add_review') ?>">Add now</a>.</div>
        </td></tr>
      <?php else: ?>
        <?php foreach($reviews as $i => $r): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td>
            <?php if(!empty($r->photo)): ?>
              <img class="patient-photo"
                   src="<?= base_url('assets/uploads/reviews/' . $r->photo) ?>"
                   alt="<?= htmlspecialchars($r->patient_name) ?>">
            <?php else: ?>
              <div class="avatar-initials">
                <?= strtoupper(substr($r->patient_name, 0, 1)) ?>
              </div>
            <?php endif; ?>
          </td>
          <td><strong><?= htmlspecialchars($r->patient_name) ?></strong></td>
          <td style="color:#555; max-width:220px; font-size:0.95rem">
            <?= strlen($r->review) > 80
                ? htmlspecialchars(substr($r->review, 0, 80)) . '...'
                : htmlspecialchars($r->review) ?>
          </td>
          <td>
            <?php
              // ✅ FIX: cast to int so comparison works correctly
              $rating = intval($r->rating);
              for($star = 1; $star <= 5; $star++):
            ?>
              <?php if($star <= $rating): ?>
                <span class="star-filled">★</span>
              <?php else: ?>
                <span class="star-empty">★</span>
              <?php endif; ?>
            <?php endfor; ?>
            <small style="color:#888; margin-left:4px"><?= $rating ?>/5</small>
          </td>
          <td>
            <?= $r->status == 1
                ? '<span class="badge-on">Active</span>'
                : '<span class="badge-off">Inactive</span>' ?>
          </td>
          <td>
            <a href="<?= site_url('admin/edit_review/' . $r->id) ?>" class="btn-edit">✏ Edit</a>
            <a href="<?= site_url('admin/delete_review/' . $r->id) ?>" class="btn-del"
               onclick="return confirm('Delete this review?')">🗑 Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>

</div>
