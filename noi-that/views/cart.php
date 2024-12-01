<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="./Css/main.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="./Css/main-moblie.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="./Css/Shop.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="./Css/cart2.css">
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
                        <img src="./uploads/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="box-icon">
                <a href="" class="box-search">
                    <i class="fa-solid fa-magnifying-glass search"></i>
                </a>
                <?php if (isset($_SESSION['user'])) { ?>
                    <?= $_SESSION['user'];  ?>
                    <a class="nav-link" onclick="return confirm('Ban co muon dang xuat?')" href="<?= BASE_URL . '?act=logout' ?>"><i class="fas fa-sign-out-alt"></i></a>
                <?php } else { ?>

                    <a href="<?= BASE_URL . '?act=login' ?>" class="box-user">
                        <i class="fa-regular fa-user user"></i>
                    </a>
                <?php } ?>
                <a href="" class="box-heart">
                    <i class="fa-regular fa-heart heart"></i>
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
          
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="cart">
            <div class="cart-table">
              <table>
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Thao tac</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $tongGioHang = 0;
                    foreach($chiTietGioHang as $key=>$sanPham): 
                         ?>
                  <tr>
                    <td class="product">
                      <img    src="<?= BASE_URL . $sanPham['hinh_anh']  ?>"      alt="Asgaard Sofa" style="height: 100px ; width: 100px; margin: 20px;">
                      <span><?=  $sanPham['ten_san_pham']  ?>"</span>
                    </td>
                    <td class="price"> <?= $sanPham['gia_khuyen_mai']  ?></td>
                    <td class="quantity">
                      <input type="number" value="<?= $sanPham['so_luong'] ?>" min="1">
                    </td>
                    <td class="subtotal"><span>
                    <?php
                        $tongTien = 0 ;
                        if($sanPham){
                            $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                        }else{
                            $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                        }
                        $tongGioHang += $tongTien ;
                        echo formatPrice( $tongTien);
                        ?>
                    </span>
                        
                    </td>
                    <td class="delete">
                      <span class="delete-icon">🗑️</span>
                    </td>
                  </tr>
                </tbody>

                <?php  endforeach ;?>
                
              </table>
            </div>
            <div class="cart-totals">
              <h3>Cart Totals</h3>
              <div class="totals-row">
              <td><?= formatPrice($tongGioHang) ?></td>
              </div>
              <div class="totals-row total">
                <span>Total</span>
                <td><?= formatPrice($tongGioHang) ?></td>
              </div>
              <a class="btn btn-sqr d-block " href="<?= BASE_URL .'?act=thanh-toan' ?>">Check Out</a>
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