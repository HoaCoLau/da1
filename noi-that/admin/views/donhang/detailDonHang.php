<?php include_once './views/layout/header.php' ?>
<?php include_once './views/layout/navbar.php' ?>
<?php include_once './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>Quan Ly Danh sach don - Don han: <?= $donHang['ma_don_hang'] ?> </h1>
                </div>
                <div class="col-sm-2">
                    <form action="" method="">
                        <select name="" id="" class="form-group">
                            <?php foreach ($listTrangThaiDH as $key => $trangThai) : ?>
                                <option <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?>
                                <?= $trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled' : '' ?>
                                         value="<?= $trangThai['id'] ?>"><?= $trangThai['ten_trang_thai'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php
                    if ($donHang['trang_thai_id'] = 2) {
                        $colorAlerts = 'primary';
                    } elseif ($donHang['trang_thai_id'] = 1 &&
                        $donHang['trang_thai_id'] = 3  &&
                        $donHang['trang_thai_id'] = 4  &&
                        $donHang['trang_thai_id'] = 7  &&
                        $donHang['trang_thai_id'] = 9  &&
                        $donHang['trang_thai_id'] = 5
                    ) {
                        $colorAlerts = 'warning';
                    } elseif ($donHang['trang_thai_id'] = 5 &&
                        $donHang['trang_thai_id'] = 6  &&
                        $donHang['trang_thai_id'] = 8   &&
                        $donHang['trang_thai_id'] = 10  &&
                        $donHang['trang_thai_id'] = 11
                    ) {
                        $colorAlerts = 'success';
                    }
                    ?>
                    <div class="alert alert-<?= $colorAlerts; ?>" role="alert">
                        Đơn hàng: <?= $donHang['ten_trang_thai'] ?>
                    </div>



                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Funori - Hoa Cỏ Lau.
                                    <small class="float-right">Ngày đặt: <?= $donHang['ngay_dat'] ?> </small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Thông tin người đặt
                                <address>
                                    <strong><?= $donHang['ho_ten'] ?></strong><br>
                                    Email: <?= $donHang['email'] ?> <br>
                                    Số Điện Thoại: <?= $donHang['so_dien_thoai'] ?> <br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Người Nhận
                                <address>
                                    <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                    Email: <?= $donHang['email_nguoi_nhan'] ?> <br>
                                    Số Điện Thoại: <?= $donHang['sdt_nguoi_nhan'] ?> <br>
                                    Địac chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?> <br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Thông tin
                                <address>
                                    <strong> Mã đơn hàng: <?= $donHang['ma_don_hang'] ?></strong><br>
                                    Tổng tiền : <?= $donHang['tong_tien'] ?> <br>
                                    Ghi chú: <?= $donHang['ghi_chu'] ?> <br>
                                    Phương thức thanh toán: <?= $donHang['ten_phuong_thuc'] ?> <br>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên Sp</th>
                                            <th>Đơn giá </th>
                                            <th>số lượng</th>
                                            <th>thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tong_tien = 0; ?>
                                        <?php foreach ($sanPhamDonHang as $key => $sanpham) : ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $sanpham['ten_san_pham'] ?></td>
                                                <td><?= $sanpham['don_gia']  ?></td>
                                                <td><?= $sanpham['so_luong']  ?></td>
                                                <td><?= $sanpham['thanh_tien']  ?></td>
                                            </tr>
                                            <?php $tong_tien += $sanpham['thanh_tien']; ?>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">

                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Ngày đặt hàng: <?= $donHang['ngay_dat'] ?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Thành tiền:</th>
                                            <td>
                                                <?= $tong_tien ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Phí vận chuyển:</th>
                                            <td><?= $phi_van_chuyen = $tong_tien * 0.08; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tổng:</th>
                                            <td><?= $phi_van_chuyen + $tong_tien; ?></td>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->

                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once './views/layout/footer.php' ?>


<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>