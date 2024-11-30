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
          <h1>Form sửa tai khoan</h1>
        </div>
            
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thong Tin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN . '?act=post-update-khach-hang' ?>" method="post" >
                <input type="hidden" name="id_khach_hang" value="<?= $khachHang['id']; ?>" id="">
                <div class="card-body">
                  <div class="form-group">
                    <label >Họ Tên</label>
                    <input type="text" class="form-control" name="ho_ten" value="<?= $khachHang['ho_ten']; ?>" placeholder="Nhập ho ten">
                    <?php if(isset($_SESSION['error']['ho_ten'])){ ?>
                       <p class="text-danger" ><?= $_SESSION['error']['ho_ten'] ?></p> 
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="email" class="form-control" value="<?= $khachHang['email']; ?>" name="email" placeholder="Nhập email">
                    <?php if(isset($_SESSION['error']['email'])){ ?>
                       <p class="text-danger" ><?= $_SESSION['error']['email'] ?></p> 
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label >SDT</label>
                    <input type="text" class="form-control" value="<?= $khachHang['so_dien_thoai']; ?>" name="so_dien_thoai" placeholder="Nhập SDT">
                    <?php if(isset($_SESSION['error']['so_dien_thoai'])){ ?>
                       <p class="text-danger" ><?= $_SESSION['error']['so_dien_thoai'] ?></p> 
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus" >Trang thai</label>
                    <select name="trang_thai" id="inputStatus" class="form-control custom-select" >
                        <option <?= $khachHang['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Acticve</option>
                        <option <?= $khachHang['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Inacticve</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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



</body>

</html>