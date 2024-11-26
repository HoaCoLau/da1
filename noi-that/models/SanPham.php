<?php
class SanPham {
    public $conn; // khai bao phuong thuc

    public function __construct()
    {
        $this->conn = connectDB();
    }


    public function getAllSanPham(){
        try{
        $spl = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
        FROM san_phams
        INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
        ';
        $stmt = $this->conn->prepare($spl);
        $stmt->execute();

        return $stmt->fetchAll();
        }catch (Exception $e) {
            echo 'loi' .$e->getMessage();
        }
    }
    public function getAllDanhMuc(){
        try{
        $spl = 'SELECT * FROM danh_mucs';
        $stmt = $this->conn->prepare($spl);
        $stmt->execute();

        return $stmt->fetchAll();
        }catch (Exception $e) {
            echo 'loi' .$e->getMessage();
        }
    }
    public function getOneSanPham($id){
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
            WHERE san_phams.id=:id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'loi' .$e->getMessage();
        }
    }
    public function getListAnhSanPham($id){
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id=:id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'loi' .$e->getMessage();
        }
    }
    public function getBLFormSanPham($id){
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten
            FROM binh_luans 
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id=:id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'loi' .$e->getMessage();
        }
    }
    public function getListSanPhamCungDanhMuc($danh_muc_id){
        try{
        $spl = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
        FROM san_phams
        INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
        WHERE san_phams.danh_muc_id ='. $danh_muc_id ;
        $stmt = $this->conn->prepare($spl);
        $stmt->execute();

        return $stmt->fetchAll();
        }catch (Exception $e) {
            echo 'loi' .$e->getMessage();
        }
    }

    public function insertComment($san_pham_id, $tai_khoan_id, $noi_dung){
        try {
            $sql = 'INSERT INTO binh_luans(san_pham_id, tai_khoan_id, noi_dung) VALUES (:san_pham_id, :tai_khoan_id, :noi_dung)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':san_pham_id' => $san_pham_id , ':tai_khoan_id' => $tai_khoan_id , ':noi_dung' => $noi_dung ]);
            return true;
        } catch (Exception $e) {
            echo 'loi' .$e->getMessage();
        }
    }


}