<?php

class AdminBaoCaoControllers{
    public $modelBaoCao;
    public function __construct()
    {
        $this->modelBaoCao = new AdminBaoCao();
    }
    public function home(){
        $soSanPhamDaBan = $this->modelBaoCao->getSoSanPhamDaBan(); // Phương thức lấy số sản phẩm đã bán
        $doanhThu = $this->modelBaoCao->getDoanhThu(); // Phương thức lấy doanh thu
        $soDonHang = $this->modelBaoCao->getSoDonHang(); // Phương thức lấy số đơn hàng

        require_once './views/home.php';
    }
}





?>