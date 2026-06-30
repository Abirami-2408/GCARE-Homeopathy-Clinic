
<!-- EDIT SERVICE -->
<!-- application/views/admin/service/edit.php -->
<style>
  body{font-size:16px!important}
  .fw{max-width:700px;margin:20px auto;background:#fff;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,.07);overflow:hidden}
  .fh{background:#1a5c3a;color:#fff;padding:16px 24px;font-size:1.1rem;font-weight:700}
  .fb{padding:28px 24px}
  .fg{margin-bottom:20px}
  .fg label{display:block;font-size:1rem;font-weight:600;color:#333;margin-bottom:6px}
  .fg input,.fg textarea,.fg select{width:100%;padding:10px 14px;border:1px solid #cde0d4;border-radius:6px;font-size:1rem;color:#333;outline:none}
  .fg textarea{resize:vertical;min-height:100px}
  .ig{display:flex}
  .igp{background:#e8f5ee;border:1px solid #cde0d4;border-right:none;padding:10px 14px;border-radius:6px 0 0 6px;color:#1a5c3a}
  .ig input{border-radius:0 6px 6px 0}
  #imgPrev{max-width:160px;max-height:100px;border-radius:8px;border:2px dashed #cde0d4;display:none;margin-top:8px;object-fit:cover}
  .bs{background:#2e8b5a;color:#fff;padding:11px 28px;border:none;border-radius:6px;font-size:1rem;font-weight:700;cursor:pointer}
  .bs:hover{background:#1a5c3a}
  .bc{background:#f1f1f1;color:#555;padding:11px 22px;border:none;border-radius:6px;font-size:1rem;font-weight:600;text-decoration:none;margin-left:10px}
</style>

<div class="fw">
  <div class="fh">✏ Edit Service</div>
  <div class="fb">
    <?php echo form_open_multipart('admin/edit_service/'.$service->id); ?>

      <div class="fg">
        <label>Service Name *</label>
        <input type="text" name="name" value="<?= htmlspecialchars($service->name) ?>" required>
      </div>

      <div class="fg">
        <label>Description *</label>
        <textarea name="description" required><?= htmlspecialchars($service->description) ?></textarea>
      </div>

      <div class="fg">
        <label>Icon (FontAwesome)</label>
        <div class="ig">
          <div class="igp" id="iconPrev"><i class="<?= htmlspecialchars($service->icon ?? 'fas fa-stethoscope') ?>"></i></div>
          <input type="text" name="icon" id="iconInput" value="<?= htmlspecialchars($service->icon ?? '') ?>">
        </div>
      </div>

      <div class="fg">
        <label>Current Image</label><br>
        <?php if(!empty($service->image)): ?>
          <img src="<?= base_url('assets/uploads/services/'.$service->image) ?>"
               style="max-width:150px;border-radius:6px;border:1px solid #ddd;margin-top:6px">
        <?php else: ?><span style="color:#aaa">No image</span><?php endif; ?>
      </div>

      <div class="fg">
        <label>Replace Image <small style="font-weight:400;color:#888">(leave empty to keep current)</small></label>
        <input type="file" name="image" accept="image/*" onchange="prevImg(this)">
        <img id="imgPrev" src="" alt="">
      </div>

      <div class="fg">
        <label>Status</label>
        <select name="status" style="max-width:200px">
          <option value="1" <?= $service->status==1?'selected':'' ?>>Active</option>
          <option value="0" <?= $service->status==0?'selected':'' ?>>Inactive</option>
        </select>
      </div>

      <hr style="margin:24px 0;border-color:#e8f0eb">
      <button type="submit" class="bs">💾 Update Service</button>
      <a href="<?= site_url('admin/manage_service') ?>" class="bc">Cancel</a>

    <?php echo form_close(); ?>
  </div>
</div>
<script>
document.getElementById('iconInput').addEventListener('input',function(){
  document.getElementById('iconPrev').innerHTML='<i class="'+this.value+'"></i>';
});
function prevImg(i){if(i.files&&i.files[0]){var r=new FileReader();r.onload=function(e){var p=document.getElementById('imgPrev');p.src=e.target.result;p.style.display='block';};r.readAsDataURL(i.files[0]);}}
</script>
