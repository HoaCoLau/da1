<?php include_once './views/layout/header.php' ?>
<?php include_once './views/layout/navbar.php' ?>
<?php include_once './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1>Dashboard</h1>
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
            <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Sản phẩm đã bán</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $soSanPhamDaBan ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Doanh thu</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= formatPrice($doanhThu) ?>đ</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Số đơn hàng</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $soDonHang ?></h5>
                    </div>
                </div>
            </div>
        </div>
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