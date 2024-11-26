<?php

class AdminDanhMucControllers
{

    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc()
    {

        $listdanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/DanhMuc.php';
    }
    public function formAddDanhMuc()
    {

        require_once './views/danhmuc/addDanhMuc.php';
        deleteSessionError();
    }

    public function postAddDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên không được để trống';
            }
            
            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header('Location:' . BASE_URL_ADMIN . '?act=danh-muc');
            } else {
                $_SESSION['flash'] = true;
                header('Location: '. BASE_URL_ADMIN .'?act=form-add-danh-muc');
            }
        }
    }

    public function formUpdateDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danh_muc = $this->modelDanhMuc->getOneDanhMuc($id);
        if ($danh_muc) {
            
        require_once './views/danhmuc/updateDanhMuc.php';
        }else{
            header('Location:' . BASE_URL_ADMIN . '?act=danh-muc');
        }
    }

    public function postUpdateDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên không được để trống';
            }
            if (empty($errors)) {
                $this->modelDanhMuc->updateDanhMuc($id,$ten_danh_muc,$mo_ta);
                header('Location:' . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                $danh_muc = ['id' => $id,'ten_danh_muc'=> $ten_danh_muc,'mo_ta'=> $mo_ta];
                require_once './views/danhmuc/updateDanhMuc.php';
            }
        }
    }

    public function deleteDanhMuc(){
        $id = $_GET['id_danh_muc'];
        $danh_muc = $this->modelDanhMuc->getOneDanhMuc($id);

        if ($danh_muc) {
            $this->modelDanhMuc->xoaDanhMuc($id) ;
            header('Location:' . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }else{
            header('Location:' . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }

    }







}
