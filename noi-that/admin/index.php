<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucControllers.php';
require_once './controllers/AdminSanPhamControllers.php';
require_once './controllers/AdminDonHangControllers.php';
require_once './controllers/AdminBaoCaoControllers.php';
require_once './controllers/AdminTaiKhoanControllers.php';
// require_once './controllers/AdminSanPhamControllers.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';
// require_once './controllers/AdminDanhMuc.php';

// Route
$act = $_GET['act'] ?? '/';

if ($act !== 'login-admin' && $act !== 'check-login-admin') {

    checkLoginAdmin();
}
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route dm
    '/' => (new AdminBaoCaoControllers())->hone(),


    'danh-muc' => (new AdminDanhMucControllers())->danhSachDanhMuc(),
    'form-add-danh-muc' => (new AdminDanhMucControllers())->formAddDanhMuc(),
    'post-add-danh-muc' => (new AdminDanhMucControllers())->postAddDanhMuc(),
    'form-update-danh-muc' => (new AdminDanhMucControllers())->formUpdateDanhMuc(),
    'post-update-danh-muc' => (new AdminDanhMucControllers())->postUpdateDanhMuc(),
    'delete-danh-muc' => (new AdminDanhMucControllers())->deleteDanhMuc(),



    // route sp
    'san-pham' => (new AdminSanPhamControllers())->danhSachSanPham(),
    'form-add-san-pham' => (new AdminSanPhamControllers())->formAddSanPham(),
    'post-add-san-pham' => (new AdminSanPhamControllers())->postAddSanPham(),
    'form-update-san-pham' => (new AdminSanPhamControllers())->formUpdateSanPham(),
    'post-update-san-pham' => (new AdminSanPhamControllers())->postUpdateSanPham(),
    'update-anh-san-pham' => (new AdminSanPhamControllers())->postUpdateAnhSanPham(),
    'delete-san-pham' => (new AdminSanPhamControllers())->deleteSanPham(),
    'chi-tiet-san-pham' => (new AdminSanPhamControllers())->chiTietSanPham(),



    //update Bluan
    'update-binh-luan' => (new AdminSanPhamControllers())->updateBinhLuan(),





    //route don hang

    'don-hang' => (new AdminDonHangControllers())->danhSachDonHang(),
    'chi-tiet-don-hang' => (new AdminDonHangControllers())->detailDonHang(),

    // route quan ly tai khoan

    'list-quan-tri' => (new AdminTaiKhoanControllers())->listQuanTri(),
    'form-add-quan-tri' => (new AdminTaiKhoanControllers())->formAddQuanTri(),
    'post-add-quan-tri' => (new AdminTaiKhoanControllers())->postAddQuanTri(),
    'form-update-quan-tri' => (new AdminTaiKhoanControllers())->formUpdateQuanTri(),
    'post-update-quan-tri' => (new AdminTaiKhoanControllers())->postUpdateQuanTri(),



    'form-update-thong-tin-quan-tri' => (new AdminTaiKhoanControllers())->formUpdateThongTinQuanTri(),
    // 'post-update-thong-tin-quan-tri' => (new AdminTaiKhoanControllers())->postUpdateThongTinQuanTri(),
    'post-update-mat-khau-quan-tri' => (new AdminTaiKhoanControllers())->postUpdateMatKhauQuanTri(),


    'reset-password' => (new AdminTaiKhoanControllers())->resetPassword(),



    'list-khach-hang' => (new AdminTaiKhoanControllers())->listKhachHang(),
    'form-update-khach-hang' => (new AdminTaiKhoanControllers())->formUpdateKhachHang(),
    'post-update-khach-hang' => (new AdminTaiKhoanControllers())->postUpdateKhachHang(),
    'chi-tiet-khach-hang' => (new AdminTaiKhoanControllers())->deltailKhachHang(),


    'login-admin' => (new AdminTaiKhoanControllers())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanControllers())->login(),
    'logout' => (new AdminTaiKhoanControllers())->logout(),
};
