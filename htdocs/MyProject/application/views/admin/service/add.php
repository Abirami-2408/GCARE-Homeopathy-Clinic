
<!-- ADD SERVICE PAGE -->
<!-- application/views/admin/service/add.php -->
<style>
  body{font-size:16px!important}
  .fw{max-width:700px;margin:20px auto;background:#fff;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,.07);overflow:hidden}
  .fh{background:#1a5c3a;color:#fff;padding:16px 24px;font-size:1.1rem;font-weight:700}
  .fb{padding:28px 24px}
  .fg{margin-bottom:20px}
  .fg label{display:block;font-size:1rem;font-weight:600;color:#333;margin-bottom:6px}
  .fg input,.fg textarea,.fg select{width:100%;padding:10px 14px;border:1px solid #cde0d4;border-radius:6px;font-size:1rem;color:#333;outline:none}
  .fg input:focus,.fg textarea:focus,.fg select:focus{border-color:#2e8b5a}
  .fg textarea{resize:vertical;min-height:100px}
  .ig{display:flex}
  .igp{background:#e8f5ee;border:1px solid #cde0d4;border-right:none;padding:10px 14px;border-radius:6px 0 0 6px;color:#1a5c3a}
  .ig input{border-radius:0 6px 6px 0}
  .hint{font-size:.85rem;color:#888;margin-top:4px}
  .req{color:#e74c3c}
  .fe{background:#f8d7da;color:#721c24;border:1px solid #f5c6cb;padding:12px 18px;border-radius:7px;margin-bottom:20px;font-size:1rem}
  #imgPrev{max-width:160px;max-height:100px;border-radius:8px;border:2px dashed #cde0d4;display:none;margin-top:8px;object-fit:cover}
  .bs{background:#2e8b5a;color:#fff;padding:11px 28px;border:none;border-radius:6px;font-size:1rem;font-weight:700;cursor:pointer}
  .bs:hover{background:#1a5c3a}
  .bc{background:#f1f1f1;color:#555;padding:11px 22px;border:none;border-radius:6px;font-size:1rem;font-weight:600;cursor:pointer;text-decoration:none;margin-left:10px}
</style>

<div class="fw">
  <div class="fh">🩺 Add New Service</div>
  <div class="fb">

    <?php if($this->session->flashdata('error')): ?>
      <div class="fe">✖ <?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?php echo form_open_multipart('admin/add_service'); ?>

      <div class="fg">
        <label>Service Name <span class="req">*</span></label>
        <input type="text" name="name" placeholder="e.g. Chronic Disease Treatment"
               value="<?= set_value('name') ?>" required>
      </div>

      <div class="fg">
        <label>Description <span class="req">*</span></label>
        <textarea name="description" placeholder="Describe this service..."
                  required><?= set_value('description') ?></textarea>
      </div>

      <div class="fg">
        <label>Icon (FontAwesome)</label>
        <div class="ig">
          <div class="igp" id="iconPrev"><i class="fas fa-stethoscope"></i></div>
          <input type="text" name="icon" id="iconInput"
                 placeholder="fas fa-stethoscope"
                 value="<?= set_value('icon','fas fa-stethoscope') ?>">
        </div>
        <div class="hint">Find icons: <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a></div>
      </div>

      <div class="fg">
        <label>Service Image (optional)</label>
        <input type="file" name="image" accept="image/*" onchange="prevImg(this)">
        <img id="imgPrev" src="" alt="Preview">
        <div class="hint">JPG, PNG, GIF — max 2MB</div>
      </div>

      <div class="fg">
        <label>Status</label>
        <select name="status" style="max-width:200px">
          <option value="1">Active</option>
          <option value="0">Inactive</option>
        </select>
      </div>

      <hr style="margin:24px 0;border-color:#e8f0eb">
      <button type="submit" class="bs">💾 Save Service</button>
      <a href="<?= site_url('admin/manage_service') ?>" class="bc">Cancel</a>

    <?php echo form_close(); ?>
  </div>
</div>

<script>
document.getElementById('iconInput').addEventListener('input',function(){
  document.getElementById('iconPrev').innerHTML='<i class="'+this.value+'"></i>';
});
function prevImg(i){
  if(i.files&&i.files[0]){var r=new FileReader();r.onload=function(e){var p=document.getElementById('imgPrev');p.src=e.target.result;p.style.display='block';};r.readAsDataURL(i.files[0]);}
}
</script>
