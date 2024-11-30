<?php include_once './views/layout/header.php' ?>
<?php include_once './views/layout/navbar.php' ?>
<?php include_once './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quan Ly San Pham</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=form-add-san-pham' ?>">
                <button class="btn btn-success">Thêm sản phẩm mới</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Ảnh Sản Phẩm</th>
                    <th>Giá Tiền</th>
                    <th>Số Lượng</th>
                    <th>Danh Mục</th>
                    <th>Trạng Thái</th>
                    <th>Thao tac</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listSanPham as $key => $sanpham) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $sanpham['ten_san_pham'] ?></td>
                      <td>
                        <img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" style="width: 100px" alt="" onerror="this.onerror=null; this.src='https://nhaxinh.com/wp-content/uploads/2024/01/nha-xinh-do-trang-tri-banner-31-1-24.jpg' ">
                      </td>
                      <td><?= $sanpham['gia_san_pham'] ?></td>
                      <td><?= $sanpham['so_luong'] ?></td>
                      <td><?= $sanpham['ten_danh_muc'] ?></td>
                      <td><?= $sanpham['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?></td>
                      <td>
                        <div class="btn-group">
                          <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $sanpham['id'] ?>">
                            <button class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                          <a href="<?= BASE_URL_ADMIN . '?act=form-update-san-pham&id_san_pham=' . $sanpham['id'] ?>">
                            <button class="btn btn-warning"><i class="fas fa-cogs"></i></button></a>
                          <a href="<?= BASE_URL_ADMIN . '?act=delete-san-pham&id_san_pham=' . $sanpham['id'] ?>" onclick="return confirm('Ban co muon xoa danh muc nay khong ?')">
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Ảnh Sản Phẩm</th>
                    <th>Giá Tiền</th>
                    <th>Số Lượng</th>
                    <th>Danh Mục</th>
                    <th>Trạng Thái</th>
                    <th>Thao tac</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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