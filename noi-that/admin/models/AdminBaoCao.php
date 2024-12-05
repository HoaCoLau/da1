<?php

class AdminBaoCao {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();

    }
    public function getSoSanPhamDaBan() {
        try {
            $sql = 'SELECT SUM(so_luong) AS so_san_pham_da_ban FROM chi_tiet_don_hangs'; // Giả sử bạn có bảng chi tiết đơn hàng
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['so_san_pham_da_ban'] ?? 0; // Trả về số sản phẩm đã bán, nếu không có thì trả về 0
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage(); // Xử lý lỗi
            return 0; // Trả về 0 nếu có lỗi
        }
    }
    public function getDoanhThu() {
        try {
            $sql = 'SELECT SUM(tong_tien) AS doanh_thu FROM don_hangs'; // Giả sử bạn có bảng đơn hàng
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['doanh_thu'] ?? 0; // Trả về doanh thu, nếu không có thì trả về 0
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage(); // Xử lý lỗi
            return 0; // Trả về 0 nếu có lỗi
        }
    }

    public function getSoDonHang() {
        try {
            $sql = 'SELECT COUNT(*) AS so_don_hang FROM don_hangs'; // Giả sử bạn có bảng đơn hàng
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['so_don_hang'] ?? 0; // Trả về số đơn hàng, nếu không có thì trả về 0
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage(); // Xử lý lỗi
            return 0; // Trả về 0 nếu có lỗi
        }
    }
}