<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/TaiKhoan.php';
require_once './models/SanPham.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';
// Route
$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->home(),
    'shop' => (new HomeController())->shop(),
    'about' => (new HomeController())->about(),
    'admin' => (new HomeController())->admin(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'san-pham-theo-danh-muc' => (new HomeController())->sanPhamTheoDanhMuc(),
    'gio-hang' => (new HomeController())->gioHang(),
    'them-gio-hang' => (new HomeController())->addGioHang(),
    'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController())->postthanhToan(),

    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->login(),
    'logout' => (new HomeController())->logout(),
    'sign-up' => (new HomeController())->formSignUp(),
    'post-sign-up' => (new HomeController())->postSignUp(),
    'post-comment' => (new HomeController())->postComment(),
    default => (new HomeController())->home(), // Thêm default để xử lý các trường hợp không khớp
};