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
          <h1>Tai khoan quan tri vien</h1>
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
              <a href="<?= BASE_URL_ADMIN . '?act=form-add-quan-tri' ?>">
                <button class="btn btn-success" >Thêm Tài Khoản</button>
              </a>
            </div>
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
                  <?php foreach ($listQuanTri as $key => $quantri) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $quantri['ho_ten'] ?></td>
                      <td><?= $quantri['email'] ?></td>
                      <td><?= $quantri['so_dien_thoai'] ?></td>
                      <td><?= $quantri['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-update-quan-tri&id_quan_tri=' . $quantri['id'] ?>">
                        <button class="btn btn-warning"><i class="fas fa-cogs"></i></button></a>
                        <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quan_tri=' . $quantri['id'] ?> " onclick="return confirm('Ban co muon reset password ?')  " >
                            <button class="btn btn-warning"><i class="fas fa-redo-alt"></i></button></a>
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