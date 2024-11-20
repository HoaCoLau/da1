<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "header.php";
if (isset($_GET["act"]) && $_GET["act"] != "") {
    $act = $_GET["act"];
    switch ($act) {

        //==================== CONTROLLER DANH MỤC ========================//

        case 'adddm':
            if (isset($_POST["themmoi"])) {
                $tenloai = $_POST["tenloai"];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }
            include "./danhmuc/add.php";
            break;
        case 'xoadm':
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                echo "<p style='color:red;'>Bạn hãy xóa hết sản phẩm thuộc danh mục này!</p>";
            }
            $listdanhmuc = loadall_danhmuc();
            include "./danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $dm = loadone_danhmuc($_GET["id"]);
            }
            include "./danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST["capnhat"]) && $_POST["capnhat"]) {
                $tenloai = $_POST["tenloai"];
                $id_dm = $_POST["id_dm"];
                update_dm($id_dm, $tenloai);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "./danhmuc/list.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "./danhmuc/list.php";
            break;

        //==================== CONTROLLER SẢN PHẨM ========================//

        case 'addsp':
            if (isset($_POST["themmoi"]) && $_POST["themmoi"]) {
                $iddm = $_POST["iddm"];
                $tensp = $_POST["tensp"];
                $giasp = $_POST["giasp"];
                $mota = $_POST["mota"];
                $luot_xem = 0;
                $filename = $_FILES["hinh"]["name"];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($filename);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //echo "File" . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " đã được up load.";
                } else {
                    //echo "Lỗi up load file.";
                }
                insert_sanpham($tensp, $giasp, $filename, $mota,$luot_xem,$iddm);
                $thongbao = "Thêm thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "./sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST["listok"]) && $_POST["listok"]) {
                $kewword = $_POST["keyword"];
                $iddm = $_POST["iddm"];
            } else {
                $kewword = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kewword, $iddm);
            include "./sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                delete_sanpham($_GET["id"]);
            }
            $listsanpham = loadall_sanpham("",0);
            include "./sanpham/list.php";
            break;
        
        case 'suasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {                
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "./sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST["capnhat_sp"]) && $_POST["capnhat_sp"]) {
                $id = $_POST["id"];
                $iddm = $_POST["iddm"];
                $tensp = $_POST["tensp"];
                $giasp = $_POST["giasp"];
                $mota = $_POST["mota"];
                $filename = $_FILES["hinh"]["name"];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($filename);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //echo "File" . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " đã được up load.";
                } else {
                    //echo "Lỗi up load file.";
                }
                update_sp($id, $iddm, $tensp, $giasp, $mota, $filename);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("",0);
            include "./sanpham/list.php";
            break;
            //==================== CONTROLLER TÀI KHOẢN ========================//

            case 'dskh':
                $listtaikhoan = loadall_taikhoan();
                include "./taikhoan/list.php";
            break;

            //==================== CONTROLLER BÌNH LUẬN ========================//

            case 'dsbl':
                $listbinhluan = loadbl_binhluan(0);
                include "./binhluan/list.php";
            break;
            case 'xoa_bl':
                if (isset($_GET["id"]) && $_GET["id"] > 0) {
                    //$id = $_GET["id"];
                    xoa_bl($_GET["id"]);
                }
                $listbinhluan = loadbl_binhluan(0);
                include "./binhluan/list.php";
            break;    
            //==================== CONTROLLER THỐNG KÊ ========================//

            case 'thongke':
                $listthongke = loadall_thongke();
                include "./thongke/list.php";
            break;

            //==================== CONTROLLER BIỂU ĐỒ ========================//
            
            case 'bieudo':
                $listthongke = loadall_thongke();
                include "./thongke/bieudo.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
?>