
<!-- MANAGE SERVICE -->
<!-- application/views/admin/service/manage.php -->
<style>
  body{font-size:16px!important}
  .mw{padding:20px}
  .mt{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
  .mt h4{margin:0;font-size:1.3rem;font-weight:700;color:#1a5c3a}
  .ba{background:#2e8b5a;color:#fff;padding:8px 18px;border-radius:6px;text-decoration:none;font-size:.95rem;font-weight:600}
  .ba:hover{background:#1a5c3a;color:#fff;text-decoration:none}
  .fs,.fe2{padding:12px 18px;border-radius:7px;margin-bottom:16px;font-size:1rem;font-weight:500}
  .fs{background:#d4edda;color:#155724;border:1px solid #c3e6cb}
  .fe2{background:#f8d7da;color:#721c24;border:1px solid #f5c6cb}
  table{width:100%;border-collapse:collapse;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 2px 10px rgba(0,0,0,.07)}
  thead tr{background:#1a5c3a;color:#fff}
  thead th{padding:14px 16px;font-size:1rem;font-weight:600;text-align:left}
  tbody tr{border-bottom:1px solid #e8f0eb}
  tbody tr:hover{background:#f4faf7}
  tbody td{padding:13px 16px;font-size:1rem;color:#333;vertical-align:middle}
  table img{width:70px;height:55px;object-fit:cover;border-radius:6px;border:1px solid #ddd}
  .ib{width:38px;height:38px;background:#e8f5ee;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#1a5c3a}
  .bon{background:#d4edda;color:#155724;padding:4px 12px;border-radius:20px;font-size:.88rem;font-weight:600}
  .bof{background:#f8d7da;color:#721c24;padding:4px 12px;border-radius:20px;font-size:.88rem;font-weight:600}
  .be,.bd{padding:7px 14px;border-radius:5px;font-size:.9rem;font-weight:600;text-decoration:none;border:none;cursor:pointer;display:inline-block;margin-right:4px}
  .be{background:#e8f5ee;color:#1a5c3a;border:1px solid #b2d8c0}
  .be:hover{background:#2e8b5a;color:#fff;text-decoration:none}
  .bd{background:#fdecea;color:#c0392b;border:1px solid #f5c6cb}
  .bd:hover{background:#c0392b;color:#fff}
  .es{text-align:center;padding:50px 20px;color:#888;font-size:1rem}
</style>

<div class="mw">
  <?php if($this->session->flashdata('success')): ?>
    <div class="fs">✔ <?= $this->session->flashdata('success') ?></div>
  <?php endif; ?>
  <?php if($this->session->flashdata('error')): ?>
    <div class="fe2">✖ <?= $this->session->flashdata('error') ?></div>
  <?php endif; ?>

  <div class="mt">
    <h4>🩺 Manage Services (<?= count($services) ?>)</h4>
    <a href="<?= site_url('admin/add_service') ?>" class="ba">+ Add New Service</a>
  </div>

  <table>
    <thead>
      <tr>
        <th width="50">#</th>
        <th width="55">Icon</th>
        <th width="90">Image</th>
        <th>Name</th>
        <th>Description</th>
        <th width="100">Status</th>
        <th width="150">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php if(empty($services)): ?>
      <tr><td colspan="7"><div class="es">No services yet. <a href="<?= site_url('admin/add_service') ?>">Add now</a>.</div></td></tr>
    <?php else: ?>
      <?php foreach($services as $i => $s): ?>
      <tr>
        <td><?= $i+1 ?></td>
        <td>
          <div class="ib"><i class="<?= htmlspecialchars($s->icon ?? 'fas fa-stethoscope') ?>"></i></div>
        </td>
        <td>
          <?php if(!empty($s->image)): ?>
            <img src="<?= base_url('assets/uploads/services/'.$s->image) ?>" alt="">
          <?php else: ?><span style="color:#aaa;font-size:.9rem">No image</span><?php endif; ?>
        </td>
        <td><strong><?= htmlspecialchars($s->name) ?></strong></td>
        <td style="color:#555;max-width:200px">
          <?= strlen($s->description)>80 ? htmlspecialchars(substr($s->description,0,80)).'...' : htmlspecialchars($s->description) ?>
        </td>
        <td><?= $s->status==1 ? '<span class="bon">Active</span>' : '<span class="bof">Inactive</span>' ?></td>
        <td>
          <a href="<?= site_url('admin/edit_service/'.$s->id) ?>" class="be">✏ Edit</a>
          <a href="<?= site_url('admin/delete_service/'.$s->id) ?>" class="bd"
             onclick="return confirm('Delete this service?')">🗑 Del</a>
        </td>
      </tr>
      <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
  </table>
</div>
