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
          <h1>Tai khoan khach hang</h1>
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
                    <th>Ho ten</th>
                    <th>Email</th>
                    <th>SDT</th>
                    <th>Trang thai</th>
                    <th>Thao tac</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listKhachHang as $key => $khachhang) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $khachhang['ho_ten'] ?></td>
                      <td><?= $khachhang['email'] ?></td>
                      <td><?= $khachhang['so_dien_thoai'] ?></td>
                      <td><?= $khachhang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                      <td>
                        <div class="btn-group" >
                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $khachhang['id'] ?>">
                        <button class="btn btn-primary"><i class="far fa-eye"></i></button></a>   
                        <a href="<?= BASE_URL_ADMIN . '?act=form-update-khach-hang&id_khach_hang=' . $khachhang['id'] ?>">
                        <button class="btn btn-warning"><i class="fas fa-cogs"></i></button></a>
                        <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quan_tri=' . $khachhang['id'] ?> " onclick="return confirm('Ban co muon reset password ?')  " >
                        <button class="btn btn-danger"><i class="fas fa-redo-alt"></i></button></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Ho ten</th>
                    <th>Email</th>
                    <th>SDT</th>
                    <th>Trang thai</th>
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