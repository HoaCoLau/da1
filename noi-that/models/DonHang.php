<?php
class DonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id )
    {
        try {
            $sql = 'INSERT INTO don_hangs (tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ghi_chu, tong_tien, phuong_thuc_thanh_toan_id, ngay_dat, ma_don_hang ,trang_thai_id )
                    VALUES (:tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ghi_chu, :tong_tien, :phuong_thuc_thanh_toan_id, :ngay_dat, :ma_don_hang,  :trang_thai_id )';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ghi_chu' => $ghi_chu,
                ':tong_tien' => $tong_tien,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                ':ngay_dat' => $ngay_dat,
                ':ma_don_hang' => $ma_don_hang,
                ':trang_thai_id' =>  $trang_thai_id 
            ]);
           
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
    public function clearGioHang($tai_khoan_id) {
        try {
            $sql = 'DELETE FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
    public function addChiTietDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $thanh_tien)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien)
                    VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong, :thanh_tien)';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id' => $don_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':don_gia' => $don_gia,
                ':so_luong' => $so_luong,
                ':thanh_tien' => $thanh_tien
            ]);
            return true; // Trả về true nếu thêm thành công
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
}
