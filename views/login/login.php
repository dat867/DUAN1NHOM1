<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #fff;
            width: 400px;
            padding: 40px 35px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 25px;
            color: #333;
            font-size: 26px;
        }

        .login-container input {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }

        .login-container input:focus {
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-container button:hover {
            background: #5a67d8;
        }

        .login-container a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #667eea;
            font-size: 14px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Đăng nhập tài khoản</h2>

        <form action="<?= BASE_URL.'?act=formlogin' ?>" method="post">
            <input type="text" name="email" placeholder="Nhập email" required>
            <input type="password" name="password" placeholder="Nhập mật khẩu" required>

            <button type="submit" name="login">Đăng nhập</button>

            <a href="<?= BASE_URL.'?act=forgotpassword' ?>">Quên mật khẩu?</a>
            <a href="<?= BASE_URL.'?act=register' ?>">Đăng kí</a>
        </form>
    </div>

</body>
</html>
