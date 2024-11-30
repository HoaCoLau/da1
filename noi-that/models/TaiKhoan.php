<?php
class TaiKhoan
{
    public $conn; // khai bao phuong thuc

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checklogin($email, $mat_khau)
    {
        try {
            
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

    
            if ($user) {

                if ($user['trang_thai'] == 1) {
                    if (password_verify($mat_khau, $user['mat_khau'])) {
                        return $user['email']; 
                    } else {
                        return "Mật khẩu không chính xác"; 
                    }
                } else {
                    return "Tài khoản bị cấm"; 
                }
            } else {
                return "Bạn nhập sai tài khoản hoặc mật khẩu"; 
            }
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getOneUser($email)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }

    public function insertTaiKhoan($ho_ten, $email, $so_dien_thoai, $mat_khau, $chuc_vu_id)
    {
        try {
            $sql = 'INSERT INTO tai_khoans(ho_ten, email, so_dien_thoai, mat_khau, chuc_vu_id) VALUES (:ho_ten, :email, :so_dien_thoai, :mat_khau, :chuc_vu_id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':ho_ten' => $ho_ten, ':email' => $email, ':so_dien_thoai' => $so_dien_thoai, ':mat_khau' => $mat_khau, ':chuc_vu_id' => $chuc_vu_id]);
            return true;
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }
}
