<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
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
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        foreach ($listSanPham as &$sanPham) {
            $sanPham['hinh_anh_khac'] = $this->modelSanPham->getListHinhAnhSanPham($sanPham['id']);
        }
        require_once './views/Shop.php';
    }

    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getOneSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBLFormSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamCungDanhMuc($sanPham['danh_muc_id']);
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
            if ($user == $email) { //dang nhap thanh cong

                $oneuser = $this->modelTaiKhoan->getOneUser($email);
                $_SESSION['user'] = $oneuser['ho_ten'];
                header(header: "Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;

                header(header: "Location: " . BASE_URL . '?act=login');
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
    public function sanPhamTheoDanhMuc()
    {
        $idDanhMuc = $_GET['id'] ?? null;
        if ($idDanhMuc) {
            $listSanPham = $this->modelSanPham->getSanPhamTheoDanhMuc($idDanhMuc);
            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            require_once './views/Shop.php'; // Gọi view tương ứng
        } else {
            // Xử lý trường hợp không có danh mục
            $listSanPham = $this->modelSanPham->getAllSanPham();
            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            require_once './views/Shop.php';
            exit();
        }
    }
}
