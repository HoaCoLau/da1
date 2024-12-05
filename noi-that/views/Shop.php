<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="./Css/main.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="./Css/main-moblie.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="./Css/Shop.css?v=<?php echo time() ?>">
    <title>Shop</title>
</head>

<body>
    <div class="header">
        <div class="content">
            <div class="box-menu-mobile">
                <button>
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <nav class="box-menu">
                <ul class="all-list-menu">
                    <li>
                        <a href="./?act=/" class="hover-a">Home</a>
                    </li>
                    <li class="padding-list-menu">
                        <a href="./?act=shop" class="hover-a">Shop</a>
                    </li>
                    <li class="padding-list-menu">
                        <a href="./?act=about" class="hover-a">About Us</a>
                    </li>

                </ul>
            </nav>
            <div class="box-logo">
                <div class="logo">
                    <a href="./?act=/">
                        <img src="./uploads/newbg.png" alt="">
                    </a>
                </div>
            </div>
            <div class="box-icon">
                <!-- Form search nhe -->
                <?php
                $ketQua = $listSanPham; // Giữ nguyên danh sách sản phẩm ban đầu

                if (isset($_POST['submit'])) {
                    $searchInput = trim($_POST['keyword']);
                    $ketQua = []; // Khởi tạo lại kết quả tìm kiếm

                    if (!empty($searchInput)) {
                        foreach ($listSanPham as $item) {
                            // Kiểm tra xem tên sản phẩm có chứa từ khóa tìm kiếm không
                            if (stripos($item['ten_san_pham'], $searchInput) !== false) {
                                $ketQua[] = $item; // Thêm sản phẩm vào kết quả nếu tìm thấy
                            }
                        }
                    }
                }
                ?>
                <!-- Form search nhe -->
                <div class="box-search">
                    <i class="fa-solid fa-magnifying-glass search search-js"></i>
                    <div class="form" id="form" style="display: none;"> <!-- Ẩn ô tìm kiếm ban đầu -->
                        <form action="" method="POST">
                            <div class="searchIn">
                                <input type="text" name="keyword" class="searchInput-js" placeholder="Tìm kiếm sản phẩm..." value="<?= isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword'], ENT_QUOTES) : '' ?>">
                            </div>
                            <div class="btn-search">
                                <button class="btn" type="submit" name="submit">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end Form search nhe -->
                <a href=""></a>
                <?php if (isset($_SESSION['user'])) { ?>
                    <?= $_SESSION['user_name'];  ?>
                    <a class="nav-link" onclick="return confirm('Ban co muon dang xuat?')" href="<?= BASE_URL . '?act=logout' ?>"><i class="fas fa-sign-out-alt"></i></a>
                <?php } else { ?>

                    <a href="<?= BASE_URL . '?act=login' ?>" class="box-user">
                        <i class="fa-regular fa-user user"></i>
                    </a>
                <?php } ?>

                <a href="<?= BASE_URL . '?act=gio-hang' ?>" class="box-cart">
                    <i class="fa-solid fa-cart-shopping cart"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Form search nhe -->
    <div class="box-banner-shop">
        <div class="in-box-banner">
            <div class="text-title-banner">
                Shop
            </div>
            <div class="box-path">
                <div>
                    Home
                </div>
                <div class="icon">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                    Shop
                </div>
            </div>
            <div class="box-list-product">
                <div class="box-shop-product">
                    <a href="<?= BASE_URL . '?act=san-pham-theo-danh-muc&id=16' ?>">
                        <img src="./uploads/Shop/categories-19.jpg" alt="">
                        <div class="name-product">

                            <p>Armchairs</p>
                        </div>
                    </a>
                </div>
                <div class="box-shop-product">
                    <a href="<?= BASE_URL . '?act=san-pham-theo-danh-muc&id=16' ?>">
                        <img src="./uploads/Shop/categories-18.jpg" alt="">
                        <div class="name-product">
                            <p>Outdoor</p>
                        </div>
                    </a>
                </div>
                <div class="box-shop-product">
                    <a href="<?= BASE_URL . '?act=san-pham-theo-danh-muc&id=16' ?>">
                        <img src="./uploads/Shop/categories-6.jpg" alt="">
                        <div class="name-product">
                            <p>Sofas</p>
                        </div>
                    </a>
                </div>
                <div class="box-shop-product">
                    <a href="<?= BASE_URL . '?act=san-pham-theo-danh-muc&id=16' ?>">
                        <img src="./uploads/Shop/categories-10.jpg" alt="">
                        <div class="name-product">
                            <p>Storage</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="box-shop">
        <div class="box-sidebar">

            <div class="first-sidebar">
                <div class="title-sidebar">
                    Categories
                </div>
                <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
                    <div class="in-sidebar">
                        <div class="name">
                            <!-- Cập nhật liên kết đến trang lọc sản phẩm -->
                            <a href="<?= BASE_URL . '?act=san-pham-theo-danh-muc&id=' . $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></a>
                        </div>
                        <div class="box-number"></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="all-box-brands">
                <div class="title-brands">Brands</div>
                <div class="box-list-brands">
                    <div class="box-img-brands">
                        <a href="">
                            <img src="./uploads/Shop/brand-1-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="box-img-brands">
                        <a href="">
                            <img src="./uploads/Shop/brand-2-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="box-img-brands">
                        <a href="">
                            <img src="./uploads/Shop/brand-3-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="box-img-brands">
                        <a href="">
                            <img src="./uploads/Shop/brand-4-1.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-all-product">
            <div class="header-product">
                <!-- Form search nhe -->
                <div class="btn-search">
                    <form action="" method="POST">
                        <button class="btn btn-outline-warning" type="submit" name="sortOrder" value="A-Z">Sắp xếp A-Z</button>
                        <button class="btn btn-outline-warning" type="submit" name="sortOrder" value="Z-A">Sắp xếp Z-A</button>
                    </form>
                </div>
                <!-- Form search nhe -->
            </div>
            <!-- Form search nhe -->
            <?php
            $ketQua = $listSanPham;

            if (isset($_POST['sortOrder'])) {
                $sortOrder = $_POST['sortOrder'];

                if ($sortOrder === 'A-Z') {
                    // Sắp xếp theo tên sản phẩm từ A-Z
                    usort($ketQua, function ($a, $b) {
                        return strcmp($a['ten_san_pham'], $b['ten_san_pham']);
                    });
                } elseif ($sortOrder === 'Z-A') {
                    // Sắp xếp theo tên sản phẩm từ Z-A
                    usort($ketQua, function ($a, $b) {
                        return strcmp($b['ten_san_pham'], $a['ten_san_pham']);
                    });
                }
            }
            ?>
            <!-- Form search nhe -->

            <div class="all-box-new-product">
                <!-- Thay đổi dư liệu một chút nhé -->
                <?php foreach ($ketQua as $key => $sanPham): ?>
                    <div class="new-product-1">
                        <div class="pic-product-1">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                <img id="Pic-product-1" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
                                <script>
                                    let newProduct = document.getElementById('Pic-product-1');

                                    newProduct.addEventListener('mouseout', function() {
                                        newProduct.src = '<?= BASE_URL . $sanPham['hinh_anh'] ?>';
                                    });
                                </script>
                            </a>
                            <div class="box-icon-new-product">
                                <i style="font-size: 19px;" id="cart-Product" class="fa-solid fa-cart-shopping"></i>
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                    <i style="font-size: 18px;" id="search-Product" class="fa-solid fa-magnifying-glass"></i>
                                </a>
                            </div>
                        </div>
                        <div class="box-star" style="width: 100%; height: 23px;">
                            <i style="color: #fcad02; margin-left: 0;" class="fa-solid fa-star"></i>
                            <i style="color: #fcad02;" class="fa-solid fa-star"></i>
                            <i style="color: #fcad02;" class="fa-solid fa-star"></i>
                            <i style="color: #fcad02;" class="fa-solid fa-star"></i>
                            <i style="color: #fcad02;" class="fa-solid fa-star"></i>
                            <span style="margin-left: 5px; color: rgb(201, 201, 201); font-size: 12px;">(140 review)</span>
                        </div>
                        <div class="title-new-product">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                <!-- Thay đổi dư liệu một chút nhé -->
                                <?= htmlspecialchars($sanPham['ten_san_pham']) ?></a>
                            <!-- Thay đổi dư liệu một chút nhé -->

                        </div><br>
                        <div>
                            <?php if ($sanPham['gia_khuyen_mai'] && $sanPham['gia_khuyen_mai'] > 0) { ?>
                                <span class="price-old"><?= formatPrice($sanPham['gia_san_pham']) . 'đ'  ?> </span>
                                <span class="price-new"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>

                            <?php } else { ?>
                                <span class="price-old" style="text-decoration: none; color:red; font-size:larger;"><?= formatPrice($sanPham['gia_san_pham']) . 'đ'  ?></span>
                            <?php } ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?act=shop&page=<?= $i ?>" class="<?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>

        </div>
    </div>
    <!-- Phần footer -->
    <div class="box-first-footer">
        <div class="contact">
            <h2>CONTACT US</h2>
            <div class="in">
                <div>Add :4 Copley Place, 7th Floor, Boston, MA 6</div>
                <div>Tell : 866.453.4748</div>
                <div>HR Fax: 810.222.5439</div>
                <div>sales@funorifurniture.com</div>
            </div>
        </div>
        <div class="contact">
            <h2>CATEGOIRES</h2>
            <div class="in">
                <a href="">
                    <div>Furniture</div>
                </a>
                <a href="">
                    <div>Tables</div>
                </a>
                <a href="">
                    <div>Seating</div>
                </a>
                <a href="">
                    <div>Desks & office </div>
                </a>
                <a href="">
                    <div>Storage</div>
                </a>
                <a href="">
                    <div>Bed & Bath</div>
                </a>
            </div>
        </div>
        <div class="contact">
            <h2>SERVICES</h2>
            <div class="in">
                <a href="">
                    <div>Sale</div>
                </a>
                <a href="">
                    <div>Quick Ship</div>
                </a>
                <a href="">
                    <div>New Designs</div>
                </a>
                <a href="">
                    <div>Accidental Fabric Protection</div>
                </a>
                <a href="">
                    <div>Furniture Care</div>
                </a>
                <a href="">
                    <div>Gift Cards</div>
                </a>
            </div>
        </div>
        <div class="contact">
            <h2>JOIN US</h2>
            <div class="in">
                <div style="margin-bottom: 25px;">Enter your email below to be the first to know
                    <br>
                    about new collections and product launches.
                </div>
                <div class="box-email">
                    <input type="text" placeholder="Email adress...">
                    <button type="submit">
                        <i class="fa-solid fa-envelope"></i>
                    </button>
                </div>
                <div class="icon-contact">
                    <ul>
                        <li>
                            <a href="">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa-brands fa-dribbble"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa-brands fa-behance"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="box-second-footer">
        <div class="first-box">
            <div class="title">
                Copyright © 2022. All Right Reserved
            </div>
        </div>
        <div class="second-box">
            <div class="box-bank">
                <img src="../uploads/payments-1.png" alt="">
            </div>
        </div>
    </div>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchIcon = document.querySelector('.search-js');
        const searchForm = document.getElementById('form');

        searchIcon.addEventListener('click', function() {
            // Toggle lớp 'show' cho ô tìm kiếm
            searchForm.classList.toggle('show');
        });
    });
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
<script src="https://kit.fontawesome.com/eda05fcf5c.js" crossorigin="anonymous"></script>
<script src="./js/main.js?v=<?php echo time() ?>"></script>