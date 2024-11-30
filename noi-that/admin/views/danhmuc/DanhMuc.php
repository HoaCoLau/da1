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
          <h1>Danh muc san pham</h1>
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
              <a href="<?= BASE_URL_ADMIN . '?act=form-add-danh-muc' ?>">
                <button class="btn btn-success" >Thêm Danh Mục</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Ten danh muc</th>
                    <th> mo ta</th>
                    <th>Thao tac</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listdanhMuc as $key => $danhmuc) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $danhmuc['ten_danh_muc'] ?></td>
                      <td><?= $danhmuc['mo_ta'] ?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-update-danh-muc&id_danh_muc=' . $danhmuc['id'] ?>">
                        <button class="btn btn-warning">Sua</button></a>
                        <a href="<?= BASE_URL_ADMIN . '?act=delete-danh-muc&id_danh_muc=' . $danhmuc['id'] ?>" onclick="return confirm('Ban co muon xoa danh muc nay khong ?')" >
                        <button class="btn btn-danger">Xoa</button></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
                <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Ten danh muc</th>
                    <th> mo ta</th>
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