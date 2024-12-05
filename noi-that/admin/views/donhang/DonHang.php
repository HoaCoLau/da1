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
          <h1>Quan Ly Danh sach don</h1>
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
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Ma Don Hang</th>
                    <th>Ten Nguoi Nhan</th>
                    <th>SDT</th>
                    <th>Ngay Dat</th>
                    <th>Tong Tien</th>
                    <th>Trạng Thái</th>
                    <th>Thao tac</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listDonHang as $key => $donhang) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $donhang['ma_don_hang'] ?></td>
                      <td><?= $donhang['ten_nguoi_nhan'] ?></td>
                      <td><?= $donhang['sdt_nguoi_nhan'] ?></td>
                      <td><?= $donhang['ngay_dat'] ?></td>
                      <td><?= $donhang['tong_tien'] ?></td>
                      <td><?= $donhang['ten_trang_thai'] ?></td>
                      <td>
                        <div class="btn-group">
                          <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donhang['id'] ?>">
                            <button class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Ma Don Hang</th>
                    <th>Ten Nguoi Nhan</th>
                    <th>SDT</th>
                    <th>Ngay Dat</th>
                    <th>Tong Tien</th>
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