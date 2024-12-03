<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }

    public function about()
    {
        require_once './views/about.php';
    }

    public function admin()
    {
        header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
    }

    public function home()
    {
        $topSanPham = $this->modelSanPham->getTop3SanPham(); // Lấy top 3 sản phẩm
        require_once './views/home.php';
    }

    public function shop()
{
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $itemsPerPage = 16; 
    $offset = ($currentPage - 1) * $itemsPerPage; 

    $listSanPham = $this->modelSanPham->getSanPhamPhanTrang($itemsPerPage, $offset);
    $totalSanPham = $this->modelSanPham->countAllSanPham(); 
    $totalPages = ceil($totalSanPham / $itemsPerPage); 

    $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
    foreach ($listSanPham as &$sanPham) {
        $sanPham['hinh_anh_khac'] = $this->modelSanPham->getListHinhAnhSanPham($sanPham['id']);
    }
    require_once './views/Shop.php';
}
public function sanPhamTheoDanhMuc()
{
    $idDanhMuc = $_GET['id'] ?? null;
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $itemsPerPage = 16; 
    $offset = ($currentPage - 1) * $itemsPerPage; 

    if ($idDanhMuc) {
        // Lấy sản phẩm theo danh mục với phân trang
        $listSanPham = $this->modelSanPham->getSanPhamTheoDanhMuc($idDanhMuc, $itemsPerPage, $offset);
        $totalSanPham = $this->modelSanPham->countSanPhamTheoDanhMuc($idDanhMuc); // Giả sử bạn có phương thức này để đếm sản phẩm theo danh mục
        $totalPages = ceil($totalSanPham / $itemsPerPage); 

        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        foreach ($listSanPham as &$sanPham) {
            $sanPham['hinh_anh_khac'] = $this->modelSanPham->getListHinhAnhSanPham($sanPham['id']);
        }
        
        require_once './views/Shop.php'; // Gọi view tương ứng
    } else {
        // Nếu không có danh mục, lấy tất cả sản phẩm
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once './views/Shop.php';
        exit();
    }
}


    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getOneSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBLFormSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getSanPhamTheoDanhMuc($sanPham['danh_muc_id']);
        if ($sanPham) {
            require_once './views/chiTietSanPham.php';
        } else {
            header('Location:' . BASE_URL . '?act=shop');
            exit();
        }
    }

    public function formLogin()
    {
        require_once './views/login.php';
        deleteSessionError();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelTaiKhoan->checklogin($email, $password);
            if ($user == $email) { // Đăng nhập thành công
                $oneuser = $this->modelTaiKhoan->getOneUser($email);
                $_SESSION['user_name'] = $oneuser['ho_ten'];
                $_SESSION['user'] = $email;  // Lưu email vào session
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = 'Email hoặc mật khẩu không đúng!';
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header("Location: " . BASE_URL . '?act=/');
        }
    }

    public function formSignUp()
    {
        require_once './views/signUp.php';
        deleteSessionError();
    }

    public function postSignUp()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $password = $_POST['password'] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'So dien thoai không được để trống';
            }
            if (empty($password)) {
                $errors['password'] = 'Password không được để trống';
            }

            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $mat_khau = password_hash($password, PASSWORD_BCRYPT);
                $chuc_vu_id = 2;
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $so_dien_thoai, $mat_khau, $chuc_vu_id);
                header('Location:' . BASE_URL . '?act=login');
            } else {
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL . '?act=sign-up');
            }
        }
    }

    public function postComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $comment = $_POST['comment'] ?? '';
            $san_pham_id = $_POST['id_san_pham'];
            $tai_khoan_id = '9';
            $errors = [];
            if (empty($comment)) {
                $errors['comment'] = 'Comment không được để trống';
            }

            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $noi_dung = $comment;
                $this->modelSanPham->insertComment($san_pham_id, $tai_khoan_id, $noi_dung);
                header('Location: ' . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
            } else {
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
            }
        }
    }

    public function gioHang()
    {
        $email = $_SESSION['user'];
        $user = $this->modelTaiKhoan->getOneUser($email);
        // Kiểm tra xem người dùng có tồn tại trong hệ thống không
        if ($user && isset($user['id'])) {
            $tai_khoan_id = $user['id']; // Gán tai_khoan_id từ người dùng đã đăng nhập

            // Kiểm tra xem người dùng đã có giỏ hàng chưa
            $gioHang = $this->modelGioHang->getGioHangFromId(id: $tai_khoan_id);

            // Nếu chưa có giỏ hàng, tạo giỏ hàng mới
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($tai_khoan_id);
                $gioHang = ['id' => $gioHangId]; // Lưu lại ID giỏ hàng mới tạo
            } else {
                $gioHangId = $gioHang['id']; // Giỏ hàng đã tồn tại
            }



            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $checkSanPham = false;
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHangId);

            // var_dump($chiTietGioHang);die;
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới vào chi tiết giỏ hàng

            // Xác nhận thêm giỏ hàng thành công
            require_once 'views/cart.php';
        } else {
            // Người dùng không tồn tại trong hệ thống
            var_dump('Người dùng không tồn tại!');
            die();
        }
    }

    
    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (isset($_SESSION['user'])) {
                // Lấy thông tin người dùng từ session
                $email = $_SESSION['user'];
                $user = $this->modelTaiKhoan->getOneUser($email);

                // Kiểm tra xem người dùng có tồn tại trong hệ thống không
                if ($user && isset($user['id'])) {
                    $tai_khoan_id = $user['id']; // Gán tai_khoan_id từ người dùng đã đăng nhập

                    // Kiểm tra xem người dùng đã có giỏ hàng chưa
                    $gioHang = $this->modelGioHang->getGioHangFromId(id: $tai_khoan_id);

                    // Nếu chưa có giỏ hàng, tạo giỏ hàng mới
                    if (!$gioHang) {
                        $gioHangId = $this->modelGioHang->addGioHang($tai_khoan_id);
                        $gioHang = ['id' => $gioHangId]; // Lưu lại ID giỏ hàng mới tạo
                    } else {
                        $gioHangId = $gioHang['id']; // Giỏ hàng đã tồn tại
                    }

                    // Lấy thông tin sản phẩm và số lượng từ form
                    $san_pham_id = $_POST['san_pham_id'];
                    $so_luong = $_POST['so_luong'];

                    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                    $checkSanPham = false;
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHangId);

                    // var_dump($chiTietGioHang);die;
                    // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới vào chi tiết giỏ hàng
                    if (!$checkSanPham) {
                        $this->modelGioHang->addDetailGioHang($gioHangId, $san_pham_id, $so_luong);
                    }

                    // Xác nhận thêm giỏ hàng thành công
                    require_once 'views/cart.php';
                } else {
                    // Người dùng không tồn tại trong hệ thống
                    var_dump('Người dùng không tồn tại!');
                    die();
                }
            } else {
                // Người dùng chưa đăng nhập
                var_dump('Chưa đăng nhập!');
                die();
            }
        }
    }

    public function thanhToan()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!isset($_SESSION['user'])) {
            echo 'Chưa đăng nhập!';
            die();
        }

        // Lấy thông tin người dùng từ session
        $email = $_SESSION['user'];
        $user = $this->modelTaiKhoan->getOneUser($email);

        // Kiểm tra xem người dùng có tồn tại không
        if (!$user || !isset($user['id'])) {
            echo 'Người dùng không tồn tại!';
            die();
        }

        // Lấy ID tài khoản của người dùng
        $tai_khoan_id = $user['id'];

        // Lấy giỏ hàng hiện tại
        $gioHang = $this->modelGioHang->getGioHangFromId($tai_khoan_id);

        if (!$gioHang) {
            // Nếu chưa có giỏ hàng, tạo mới giỏ hàng
            $gioHangId = $this->modelGioHang->addGioHang($tai_khoan_id);
            $gioHang = ['id' => $gioHangId];
        }

        // Lấy chi tiết giỏ hàng (danh sách sản phẩm trong giỏ hàng)
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

        // Truyền dữ liệu giỏ hàng vào view
        require_once 'views/pay.php';
    }

    public function postthanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
            
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];



            $ngay_dat = date('Y-m-d');

            $trang_thai_id = 1;
            $user = $this->modelTaiKhoan->getOneUser($_SESSION['user']);
            $tai_khoan_id =   $user['id'];
            $ma_don_hang = 'DH' . rand(1000, 9999);
            $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );
            $gioHang = new GioHang();
            $gioHang = $this->modelDonHang->clearGioHang($tai_khoan_id);
            header('Location:' . BASE_URL . '?act=shop');
            exit();
        }
    }
}
