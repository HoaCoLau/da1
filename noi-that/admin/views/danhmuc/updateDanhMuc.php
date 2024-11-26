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
          <h1>Sửa thêm danh mục</h1>
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
                <h3 class="card-title">Thông tin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN . '?act=post-update-danh-muc' ?>" method="post" >
                <input type="text" name="id" value="<?= $danh_muc['id'] ?>" hidden >
                <div class="card-body">
                  <div class="form-group">
                    <label >Tên danh mục</label>
                    <input type="text" class="form-control" name="ten_danh_muc" value="<?= $danh_muc['ten_danh_muc'] ?>" placeholder="Nhập tên danh mục">
                    <?php if(isset($errors['ten_danh_muc'])){ ?>
                       <p class="text-danger" ><?= $errors['ten_danh_muc'] ?></p> 
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label >Mô tả</label>
                    <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập mô tả" ><?= $danh_muc['mo_ta'] ?></textarea>
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