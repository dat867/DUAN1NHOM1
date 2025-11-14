<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập | LOFT CITY</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap 5 + FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --primary: #00CED1;
      --primary-dark: #20B2AA;
      --light: #f8f9fa;
      --danger: #dc3545;
      --success: #28a745;
      --warning: #ffc107;
      --info: #17a2b8;
      --dark: #343a40;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #333;
    }

    /* ====================== LOGIN CONTAINER ====================== */
    .login-container {
      background: white;
      width: 420px;
      max-width: 90%;
      padding: 40px 35px;
      border-radius: 18px;
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
      text-align: center;
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .login-container .logo {
      margin-bottom: 20px;
    }

    .login-container .logo i {
      font-size: 3rem;
      color: var(--primary);
      text-shadow: 0 4px 8px rgba(0, 206, 209, 0.3);
    }

    .login-container h2 {
      margin: 0 0 28px;
      font-weight: 700;
      font-size: 1.75rem;
      color: var(--primary-dark);
      letter-spacing: 0.5px;
    }

    /* ====================== FORM ====================== */
    .login-form .form-group {
      margin-bottom: 18px;
      text-align: left;
    }

    .login-form label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
      color: #555;
      font-size: 0.95rem;
    }

    .login-form input {
      width: 100%;
      padding: 14px 16px;
      border: 1.5px solid #ddd;
      border-radius: 12px;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: #f9f9f9;
    }

    .login-form input:focus {
      outline: none;
      border-color: var(--primary);
      background: white;
      box-shadow: 0 0 0 3px rgba(0, 206, 209, 0.2);
    }

    .login-form .input-group {
      position: relative;
    }

    .login-form .input-group input {
      padding-right: 45px;
    }

    .login-form .toggle-password {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #888;
      font-size: 1.1rem;
    }

    .login-form .toggle-password:hover {
      color: var(--primary);
    }

    .login-form button {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
      box-shadow: 0 4px 15px rgba(0, 206, 209, 0.3);
    }

    .login-form button:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0, 206, 209, 0.4);
    }

    /* ====================== LINKS ====================== */
    .login-links {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 10px;
    }

    .login-links a {
      color: var(--primary);
      text-decoration: none;
      font-size: 0.92rem;
      font-weight: 500;
      transition: 0.3s;
    }

    .login-links a:hover {
      color: var(--primary-dark);
      text-decoration: underline;
    }

    /* ====================== RESPONSIVE ====================== */
    @media (max-width: 480px) {
      .login-container {
        padding: 30px 25px;
      }
      .login-container h2 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="logo">
      <i class="fas fa-user-shield"></i>
    </div>
    <h2>Đăng nhập tài khoản</h2>

    <form class="login-form" action="<?= BASE_URL.'?act=formlogin' ?>" method="post">
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" placeholder="Nhập email" required>
      </div>

      <div class="form-group">
        <label>Mật khẩu</label>
        <div class="input-group">
          <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
          <span class="toggle-password" onclick="togglePass()">
            <i class="fas fa-eye"></i>
          </span>
        </div>
      </div>

      <button type="submit" name="login">Đăng nhập</button>

      <div class="login-links">
        <a href="<?= BASE_URL.'?act=forgotpassword' ?>">Quên mật khẩu?</a>
        <a href="<?= BASE_URL.'?act=register' ?>">Đăng ký</a>
      </div>
    </form>
  </div>

  <script>
    function togglePass() {
      const pass = document.getElementById('password');
      const icon = document.querySelector('.toggle-password i');
      if (pass.type === 'password') {
        pass.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
      } else {
        pass.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
      }
    }
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>