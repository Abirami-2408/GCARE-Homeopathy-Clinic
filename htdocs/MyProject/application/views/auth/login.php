
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Login — GCare</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body {
      background: #f4faf7;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
    .login-box {
      background: #fff;
      border-radius: 14px;
      padding: 40px 36px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .login-logo { text-align: center; margin-bottom: 28px; }
    .login-logo h4 { color: #1a5c3a; font-weight: 800; font-size: 1.5rem; margin: 0; }
    .login-logo p { color: #888; font-size: 0.88rem; margin: 4px 0 0; }
    .btn-login {
      background: #2e8b5a; color: #fff; width: 100%; padding: 12px;
      font-weight: 700; border: none; border-radius: 8px; font-size: 1rem; margin-top: 8px;
    }
    .btn-login:hover { background: #1a5c3a; color: #fff; }
  </style>
</head>
<body>

  <div class="login-box">
    <div class="login-logo">
      <h4>🌿 GCare Admin</h4>
      <p>Sign in to manage your website</p>
    </div>

    <?php if($this->session->flashdata('error')): ?>
      <div class="alert alert-danger" style="font-size:0.92rem">
        ⚠️ <?= $this->session->flashdata('error') ?>
      </div>
    <?php endif; ?>

    <?php echo form_open('auth/login'); ?>
      <div class="form-group">
        <label style="font-weight:600; color:#333">Username</label>
        <input type="text" name="username" class="form-control"
               placeholder="Enter username" required autocomplete="username">
      </div>
      <div class="form-group">
        <label style="font-weight:600; color:#333">Password</label>
        <input type="password" name="password" class="form-control"
               placeholder="Enter password" required autocomplete="current-password">
      </div>
      <button type="submit" class="btn-login">🔐 Login</button>
    <?php echo form_close(); ?>
  </div>

</body>
</html>