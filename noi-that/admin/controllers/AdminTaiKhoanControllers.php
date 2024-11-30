<?php

class AdminTaiKhoanControllers{

    public $modelTaiKhoan;
    public $modelSanPham;


    public function __construct(){
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelSanPham = new AdminSanPham();
    }

    public function listQuanTri(){
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri(){

        require_once './views/taikhoan/quantri/addQuanTri.php';

        deleteSessionError();

    }

    public function postAddQuanTri(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            
            $_SESSION['error'] = $errors;
            if (empty($errors)) {

                $mat_khau = password_hash('123@123ab', PASSWORD_BCRYPT);
                $chuc_vu_id = 1;

                $this->modelTaiKhoan->addTaiKhoan($ho_ten, $email, $mat_khau, $chuc_vu_id);
                header('Location:' . BASE_URL_ADMIN . '?act=list-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header('Location: '. BASE_URL_ADMIN .'?act=form-add-quan-tri');
            }
        }
    }

    public function formUpdateQuanTri(){
        $quan_tri_id = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getOneTaiKhoan($quan_tri_id);

        require_once './views/taikhoan/quantri/updateQuanTri.php';
        deleteSessionError() ;
    }

    public function postUpdateQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $quan_tri_id = $_POST['quan_tri_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trang thai không được để trống';
            }

            $_SESSION['error'] = $errors;


            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai);

                header('Location:' . BASE_URL_ADMIN . '?act=list-quan-tri');
                exit();
            } else {

                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-update-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }

    public function resetPassword(){
        $tai_khoan_id = $_GET['id_quan_tri'];
        
        $tai_khoan = $this->modelTaiKhoan->getOneTaiKhoan( $tai_khoan_id );

        $mat_khau = password_hash('123@123ab', PASSWORD_BCRYPT);
        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $mat_khau);
        if ($status && $tai_khoan['chuc_vu_id'] == 1) {
            header('Location:' . BASE_URL_ADMIN . '?act=list-quan-tri');
            exit();
        }elseif($status && $tai_khoan['chuc_vu_id'] == 2){
            header('Location:' . BASE_URL_ADMIN . '?act=list-khach-hang');
            exit();
        }
        else {
            var_dump('Loi reset');die();
        }


    }

    public function listKhachHang(){
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);

        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formUpdateKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getOneTaiKhoan($id_khach_hang);

        require_once './views/taikhoan/khachhang/updateKhachHang.php';
        deleteSessionError() ;
    }

    public function postUpdateKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id_khach_hang = $_POST['id_khach_hang'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trang thai không được để trống';
            }

            $_SESSION['error'] = $errors;


            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan($id_khach_hang, $ho_ten, $email, $so_dien_thoai, $trang_thai);

                header('Location:' . BASE_URL_ADMIN . '?act=list-khach-hang');
                exit();
            } else {

                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-update-khach-hang&id_khach_hang=' . $id_khach_hang);
                exit();
            }
        }
    }

    public function deltailKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getOneTaiKhoan($id_khach_hang);

        $listBinhLuan = $this->modelSanPham->getBLFormKhachHang($id_khach_hang);
        require_once './views/taikhoan/khachhang/deltailKhachHang.php';
    }

    public function formLogin(){
        require_once './views/login.php';

        deleteSessionError();
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelTaiKhoan->checklogin($email, $password);

            if($user == $email){//dang nhap thanh cong
                
                $oneuser = $this->modelTaiKhoan->getOneUser($email);
                $_SESSION['user_admin'] = $oneuser['ho_ten'];
                header("Location: ". BASE_URL_ADMIN);
                exit();
            }else{
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;

                header("Location: ". BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }

    public function logout(){
        if(isset($_SESSION['user_admin'])){
            unset($_SESSION['user_admin']);
            header("Location: ". BASE_URL_ADMIN . '?act=login-admin');
        }
    }

    public function formUpdateThongTinQuanTri(){
        $email = $_SESSION['user_admin'];
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFormEmail($email);
        require_once './views/taikhoan/canhan/editCaNhan.php';
        deleteSessionError();
    }

    public function postUpdateMatKhauQuanTri(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];
            
            
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_admin']);

            $checkPass = password_verify($old_pass, $user['mat_khau']); 
            
            $errors = [];
            if (!$checkPass) {
                $errors['old_pass'] = 'mat khau nguoi dung khong dung';
            }
            if ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'mat khau nhap lai khong dung';
            }
            if (empty($old_pass)) {
                $errors['old_pass'] = 'Vui long dien truong du lieu nay';
            }
            if (empty($new_pass)) {
                $errors['new_pass'] = 'Vui long dien truong du lieu nay';
            }
            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Vui long dien truong du lieu nay';
            }

            
            $_SESSION['error'] = $errors;


            if (empty($errors)) {
                $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                $status = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
                if ($status) {
                    $_SESSION['success'] = "Doi mat khau thanh cong";
                    $_SESSION['flash'] = true;
                    header('Location: ' . BASE_URL_ADMIN . '?act=form-update-thong-tin-quan-tri');
                }
                
            } else {

                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-update-thong-tin-quan-tri');
                exit();
            }


        }
    }

}


?>