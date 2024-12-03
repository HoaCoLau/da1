<?php

class AdminDonHangControllers
{

    public $modelDonHang;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonHang()
    {

        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './views/donhang/DonHang.php';
    }
   
    public function detailDonHang(){
        $don_hang_id = $_GET['id_don_hang'];
        //lay thong tin don hang o bang don hang
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);


        //lay danh sach sp da dat cua don hang
        $sanPhamDonHang = $this->modelDonHang->getListSPDonHang($don_hang_id);
        
        $listTrangThaiDH = $this->modelDonHang->getAllTrangThaiDonHang();

        require_once './views/donhang/detailDonHang.php';
    }


    // public function formUpdateSanPham()
    // {
    //     $id = $_GET['id_san_pham'];
    //     $sanPham = $this->modelSanPham->getOneSanPham($id);
    //     $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
    //     $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
    //     if ($sanPham) {

    //         require_once './views/sanpham/updateSanPham.php';
    //     } else {
    //         header('Location:' . BASE_URL_ADMIN . '?act=san-pham');
    //         exit();
    //     }
    // }

    // public function postUpdateSanPham()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         $san_pham_id = $_POST['san_pham_id'] ?? '';

    //         $sanPhamOld = $this->modelSanPham->getOneSanPham($san_pham_id);
    //         $old_file = $sanPhamOld['hinh_anh']; // lấy ảnh cũ phục vụ sửa ảnh




    //         $ten_san_pham = $_POST['ten_san_pham'] ?? '';
    //         $gia_san_pham = $_POST['gia_san_pham'] ?? '';
    //         $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
    //         $so_luong = $_POST['so_luong'] ?? '';
    //         $ngay_nhap = $_POST['ngay_nhap'] ?? '';
    //         $danh_muc_id = $_POST['danh_muc_id'] ?? '';
    //         $trang_thai = $_POST['trang_thai'] ?? '';
    //         $mo_ta = $_POST['mo_ta'] ?? '';

    //         $hinh_anh = $_FILES['hinh_anh'] ?? null;


    //         $errors = [];
    //         if (empty($ten_san_pham)) {
    //             $errors['ten_san_pham'] = 'Tên không được để trống';
    //         }
    //         if (empty($gia_san_pham)) {
    //             $errors['gia_san_pham'] = 'Giá không được để trống';
    //         }
    //         if (empty($gia_khuyen_mai)) {
    //             $errors['gia_khuyen_mai'] = 'Giá không được để trống';
    //         }
    //         if (empty($so_luong)) {
    //             $errors['so_luong'] = 'Số lương không được để trống';
    //         }
    //         if (empty($ngay_nhap)) {
    //             $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
    //         }
    //         if (empty($danh_muc_id)) {
    //             $errors['danh_muc_id'] = 'Danh mục không được để trống';
    //         }
    //         if (empty($trang_thai)) {
    //             $errors['trang_thai'] = 'Trạng thái không được để trống';
    //         }

    //         $_SESSION['error'] = $errors;


    //         //logic sửa ảnh
    //         if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
    //             $new_file = uploadFile($hinh_anh, './uploads/');
    //             if (!empty($old_file)) {
    //                 deleteFile($old_file);
    //             }
    //         } else {
    //             $new_file = $old_file;
    //         }


    //         if (empty($errors)) {
    //             $this->modelSanPham->updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);

    //             header('Location:' . BASE_URL_ADMIN . '?act=san-pham');
    //             exit();
    //         } else {

    //             $_SESSION['flash'] = true;
    //             header('Location: ' . BASE_URL_ADMIN . '?act=form-update-san-pham&id_san_pham=' . $san_pham_id);
    //             exit();
    //         }
    //     }
    // }

    // //sửa album ảnh

    // public function postUpdateAnhSanPham()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $san_pham_id = $_POST['san_pham_id']  ?? '';
    //         // lấy danh sách ảnh hiện tại của sản phẩm
    //         $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

    //         //sử lý các ảnh gửi về từ form
    //         $img_array = $_FILES['img_array'];
    //         $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
    //         $current_img_ids = $_POST['current_img_ids'] ?? [];

    //         //khai báo mảng để lưu ảnh thêm mới hoặc thay thế cũ
    //         $upload_file = [];

    //         // upload anh moi hoac thay the anh cu
    //         foreach ($img_array['name'] as $key => $value) {
    //             if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
    //                 $new_file = uploadFileAlbum($img_array, './uploads/', $key);
    //                 if ($new_file) {
    //                     $upload_file[] = [
    //                         'id' => $current_img_ids[$key] ?? null,
    //                         'file' => $new_file,
    //                     ];
    //                 }
    //             }
    //         }

    //         // luu anh moi vao db va xoa anh cu neu co
    //         foreach ($upload_file as $file_info) {
    //             if ($file_info['id']) {
    //                 $old_file = $this->modelSanPham->getOneAnhSanPham($file_info)['link_hinh_anh'];

    //                 //cap nhat anh cu
    //                 $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

    //                 //xoa anh cu
    //                 deleteFile($old_file);
    //             } else {
    //                 //Them anh moi
    //                 $this->modelSanPham->insertAlbumSanPham($san_pham_id, $file_info['file']);
    //             }
    //         }

    //         //su ly xoa anh 
    //         foreach ($listAnhSanPhamCurrent as $anhSP) {
    //             $anh_id = $anhSP['id'];
    //             if (in_array($anh_id, $img_delete)) {
    //                 //xoa anh trong db
    //                 $this->modelSanPham->deleteAnhSanPham($anh_id);

    //                 //xoa file
    //                 deleteFile($anhSP['link_hinh_anh']);
    //             }
    //         }
    //         header('Location: ' . BASE_URL_ADMIN . '?act=form-update-san-pham&id_san_pham=' . $san_pham_id);
    //         exit();
    //     }
    // }



    // public function deleteSanPham()
    // {
    //     $id = $_GET['id_san_pham'];
    //     $san_pham = $this->modelSanPham->getOneSanPham($id);

    //     $listAnhSanPham= $this->modelSanPham->getListAnhSanPham($id);


    //     if ($san_pham) {
    //         deleteFile($san_pham['hinh_anh']);
    //         $this->modelSanPham->xoaSanPham($id);
    //     }
    //     if($listAnhSanPham){
    //         foreach( $listAnhSanPham as $key => $anhSP) {
    //             deleteFile($anhSP['link_hinh_anh']);
    //             $this-> modelSanPham->deleteAnhSanPham($anhSP['id']);
    //         }
    //     }
    //         header('Location:' . BASE_URL_ADMIN . '?act=san-pham');
    //         exit();
        
    // }

    // public function chiTietSanPham()
    // {
    //     $id = $_GET['id_san_pham'];
    //     $sanPham = $this->modelSanPham->getOneSanPham($id);
    //     $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
    //     if ($sanPham) {

    //         require_once './views/sanpham/chiTietSanPham.php';
    //     } else {
    //         header('Location:' . BASE_URL_ADMIN . '?act=san-pham');
    //         exit();
    //     }
    // }





}
