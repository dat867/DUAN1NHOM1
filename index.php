<?php 
session_start();
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/UserModel.php';

// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new ProductController())->Login(),

    // Xử lý đăng nhập
    'formlogin' => (new ProductController())->formlogin(),
    //xử lý đăng kí
    'register' => (new ProductController())->register(),
    'formregister' => (new ProductController())->formregister(),

    //xử lí quên mật khẩu
    'forgotpassword' => (new ProductController())->forgotpass(),
    'formforgotpassword' => (new ProductController())->formforgotpassword(),
    
 

    // Redirects from controller can point here; map to Login for now
    'admin' => (new ProductController())->Login(),
    'guide' => (new ProductController())->Login(),

    // Mặc định: hiển thị trang login (tránh UnhandledMatchError)
    default => (new ProductController())->Login(),
};