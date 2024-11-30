<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link text-center" >
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <?= $_SESSION['user_admin'];  ?>
        </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=/' ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh Mục
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
              <i class="fab fa-product-hunt"></i>
              <p>
                Sản Phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Đơn Hàng
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Quan Ly tai khoan
              </p>
              <i class="fas fa-angle-left right" ></i>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item" >
                <a href="<?= BASE_URL_ADMIN . '?act=list-quan-tri' ?>" class="nav-link" >
                <i class="nav-icon far fa-user"></i>
                <p>Tai khoan quan tri</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?= BASE_URL_ADMIN . '?act=list-khach-hang' ?>" class="nav-link" >
                <i class="nav-icon far fa-user"></i>
                <p>Tai khoan khach hang</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?= BASE_URL_ADMIN . '?act=form-update-thong-tin-quan-tri' ?>" class="nav-link" >
                <i class="nav-icon far fa-user"></i>
                <p>Tai khoan ca nhan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>