<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="./Css/main.css?v=<?php echo time() ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="./Css/main-moblie.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="./Css/Shop.css?v=<?php echo time() ?>">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css?v=<?php echo time() ?>">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="./assets/css/vendor/pe-icon-7-stroke.css?v=<?php echo time() ?>">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="./assets/css/vendor/font-awesome.min.css?v=<?php echo time() ?>">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="./assets/css/plugins/slick.min.css?v=<?php echo time() ?>">
    <!-- animate css -->
    <link rel="stylesheet" href="./assets/css/plugins/animate.css?v=<?php echo time() ?>">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="./assets/css/plugins/nice-select.css?v=<?php echo time() ?>">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="./assets/css/plugins/jqueryui.min.css?v=<?php echo time() ?>">
    <!-- main style css -->
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time() ?>">
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
                <a href="" class="box-search">
                    <i class="fa-solid fa-magnifying-glass search"></i>
                </a>
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
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./?act=/"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="./?act=shop">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="./?act=shop"><?= $sanPham['ten_san_pham'] ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <?php foreach ($listAnhSanPham as $key => $anhSP): ?>
                                        <div class="pro-large-img img-zoom">
                                            <img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <?php foreach ($listAnhSanPham as $key => $anhSP): ?>
                                        <div class="pro-nav-thumb">
                                            <img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php endforeach; ?>


                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="#"><?= $sanPham['ten_danh_muc'] ?></a>
                                    </div>
                                    <h3 class="product-name"><?= $sanPham['ten_san_pham'] ?></h3>

                                    <div class="pro-review">
                                        <?php $countComment = count($listBinhLuan); ?>
                                        <span><?= $countComment . ' Comment' ?></span>
                                    </div>

                                    <div class="price-box">
                                        <?php if ($sanPham['gia_khuyen_mai'] && $sanPham['gia_khuyen_mai'] > 0) { ?>
                                            <span class="price-old"><?= formatPrice($sanPham['gia_san_pham']) . 'đ'  ?> </span>
                                            <span class="price-new"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>

                                        <?php } else { ?>
                                            <span class="price-old" style="text-decoration: none; color:red; font-size:larger;"><?= formatPrice($sanPham['gia_san_pham']) . 'đ'  ?></span>
                                        <?php } ?>
                                    </div>

                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span><?= $sanPham['so_luong'] ?> in stock</span>
                                    </div>
                                    <p class="pro-desc"><?= $sanPham['mo_ta'] ?></p>

                                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post" onsubmit="return addToCart(event)">
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">qty:</h6>
                                            <div class="quantity">
                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                                                <div class="pro-qty"><input name="so_luong" type="text" value="1"></div>
                                            </div>
                                            <div class="action_link">
                                                <button class="btn btn-cart2" type="submit">Add to cart</button>
                                            </div>
                                        </div>
                                    </form>

                                    <script>
                                        function addToCart(event) {
                                            event.preventDefault(); // Ngăn chặn hành động mặc định của form

                                            // Kiểm tra xem người dùng đã đăng nhập chưa
                                            <?php if (!isset($_SESSION['user'])): ?>
                                                // Nếu chưa đăng nhập, chuyển đến trang đăng nhập
                                                window.location.href = 'http://localhost/noi-that/?act=login';
                                            <?php else: ?>
                                                // Nếu đã đăng nhập, thực hiện thêm vào giỏ hàng
                                                const form = event.target;
                                                const formData = new FormData(form);

                                                fetch(form.action, {
                                                        method: 'POST',
                                                        body: formData
                                                    })
                                                    .then(response => response.text())
                                                    .then(data => {
                                                        // Hiển thị thông báo
                                                        alert('Sản phẩm đã được thêm vào giỏ hàng!');
                                                    })
                                                    .catch(error => {
                                                        console.error('Error:', error);
                                                    });
                                            <?php endif; ?>
                                        }
                                    </script>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">

                                        <li>
                                            <a data-bs-toggle="tab" href="#tab_three">Commet (<?= $countComment ?>)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_three">
                                            <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                                                <div class="total-reviews">
                                                    <?php if ($binhLuan['trang_thai'] == 1) {
                                                    ?>
                                                    <div class="rev-avatar">
                                                        <img src="./uploads/avata1.jpg" alt="">
                                                    </div>
                                                        <div class="review-box">
                                                            <div class="post-author">
                                                                <p><span><?= $binhLuan['ho_ten'] ?></span><br>
                                                                    Ngày đăng:<?= $binhLuan['ngay_dang'] ?></p>
                                                            </div>
                                                            <p><?= $binhLuan['noi_dung'] ?></p>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php endforeach; ?>
                                            <form action="<?= BASE_URL . '?act=post-comment' ?>" method="post" class="review-form">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <input type="hidden" value="<?= $sanPham['id'] ?>" name="id_san_pham">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Comment</label>
                                                        <textarea class="form-control" name="comment" required></textarea>

                                                    </div>
                                                </div>

                                                <div class="buttons">
                                                    <button class="btn btn-sqr" type="submit">Submit</button>
                                                </div>
                                            </form> <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Related Products</h2>
                        <p class="sub-title">Add related products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        <?php foreach ($listSanPhamCungDanhMuc as $key => $sanPham): ?>
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
                                        <i style="font-size: 18px;" id="heart-Product" class="fa-solid fa-heart"></i>
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
                                        <?= $sanPham['ten_san_pham'] ?></a>
                                </div>
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
                        <!-- product item end -->


                    </div>
                </div>
            </div>
        </div>
    </section>







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
<!-- Modernizer JS -->
<script src="./assets/js/vendor/modernizr-3.6.0.min.js?v=<?php echo time() ?>"></script>
<!-- jQuery JS -->
<script src="./assets/js/vendor/jquery-3.6.0.min.js?v=<?php echo time() ?>"></script>
<!-- Bootstrap JS -->
<script src="./assets/js/vendor/bootstrap.bundle.min.js?v=<?php echo time() ?>"></script>
<!-- slick Slider JS -->
<script src="./assets/js/plugins/slick.min.js?v=<?php echo time() ?>"></script>
<!-- Countdown JS -->
<script src="./assets/js/plugins/countdown.min.js?v=<?php echo time() ?>"></script>
<!-- Nice Select JS -->
<script src="./assets/js/plugins/nice-select.min.js?v=<?php echo time() ?>"></script>
<!-- jquery UI JS -->
<script src="./assets/js/plugins/jqueryui.min.js?v=<?php echo time() ?>"></script>
<!-- Image zoom JS -->
<script src="./assets/js/plugins/image-zoom.min.js?v=<?php echo time() ?>"></script>
<!-- Images loaded JS -->
<script src="./assets/js/plugins/imagesloaded.pkgd.min.js?v=<?php echo time() ?>"></script>
<!-- mail-chimp active js -->
<script src="./assets/js/plugins/ajaxchimp.js?v=<?php echo time() ?>"></script>
<!-- contact form dynamic js -->
<script src="./assets/js/plugins/ajax-mail.js?v=<?php echo time() ?>"></script>
<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
<!-- google map active js -->
<script src="./assets/js/plugins/google-map.js?v=<?php echo time() ?>"></script>
<!-- Main JS -->
<script src="./assets/js/main.js?v=<?php echo time() ?>"></script>

</html>

<script src="https://kit.fontawesome.com/eda05fcf5c.js" crossorigin="anonymous"></script>
<script src="./js/main.js?v=<?php echo time() ?>"></script>