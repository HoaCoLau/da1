<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/main.css">
    <link rel="stylesheet" href="Css/main-moblie.css">
    <link rel="stylesheet" href="Css/pay.css">
    <title>Checkout</title>
</head>
<body>
    <!-- Header -->
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
                <a href="" class="box-cart">
                    <i class="fa-solid fa-cart-shopping cart"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Banner -->
    <div class="banner">
        <img id="pic" src="uploads/slider-4.jpg" alt="Banner">
        <div class="in-content">
            <div class="tran-box">
                <div class="title">Design for life</div>
                <div class="text-title">Say hello to our brand new arrivals.</div>
                <div class="all-button">
                    <button>Shop all new in</button>
                </div>
            </div>
            <button id="left"><i class="fa-solid fa-arrow-left"></i></button>
            <button id="right"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>

    <!-- Checkout Form -->
    <div class="container">
        <form action="<?= htmlspecialchars(BASE_URL . '?act=xu-ly-thanh-toan') ?>" method="POST">
            <div class="billing-details">
                <h2>Thông tin người nhận</h2>
                <label for="ten_nguoi_nhan" class="required">Name</label>
                <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= htmlspecialchars($user['ho_ten'] ?? '') ?>" placeholder="Your Name" required>

                <label for="email_nguoi_nhan">Recipient Email</label>
                <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= htmlspecialchars($user['email'] ?? '') ?>" placeholder="Your Email">

                <label for="sdt_nguoi_nhan">Number</label>
                <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= htmlspecialchars($user['so_dien_thoai'] ?? '') ?>" placeholder="Your Number" required>

                <label for="dia_chi_nguoi_nhan">Recipient Address</label>
                <textarea id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" placeholder="Your Address" required><?= htmlspecialchars($user['dia_chi_nguoi_nhan'] ?? '') ?></textarea>

                <label for="ghi_chu">Additional Information</label>
                <textarea name="ghi_chu" id="ghi_chu" placeholder="Any additional notes"></textarea>
            </div>

            <div class="order-summary">
                <h2>Order Summary</h2>
                <div class="summary-item">
                    <?php 
                    $tongGioHang = 0;
                    foreach ($chiTietGioHang as $sanPham): 
                    ?>
                        <div class="product">
                            <img src="<?= htmlspecialchars(BASE_URL . $sanPham['hinh_anh']) ?>" alt="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>" style="height: 100px; width: 100px;">
                            <span><?= htmlspecialchars($sanPham['ten_san_pham']) ?></span>
                        </div>
                        <div class="price"><?= formatPrice($sanPham['gia_khuyen_mai']) ?></div>
                        <div class="subtotal">
                            <?php 
                            $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                            $tongGioHang += $tongTien;
                            ?>
                            <span><?= formatPrice($tongTien) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <hr>
                <div class="summary-total">
                    <span>Total</span>
                    <input type="hidden" name="tong_tien" value="<?= htmlspecialchars($tongGioHang) ?>">
                    <span class="total-amount"><?= formatPrice($tongGioHang) ?></span>
                </div>

                <div class="payment-options">
                    <h3>Thanh Toán</h3>
                    <label><input type="radio" name="phuong_thuc_thanh_toan_id" value="1" checked> Thanh toán khi nhận hàng</label><br>
                    <label><input type="radio"  name="phuong_thuc_thanh_toan_id" value="2"> Thanh toán online</label>
                </div>
                <hr>
                <label class="confirmation">
                    <input type="checkbox" required> Tôi xác nhận thông tin đơn hàng
                </label>
                <button type="submit" class="place-order">Place Order</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="box-first-footer">
            <div class="contact">
                <h2>CONTACT US</h2>
                <div>Add: 4 Copley Place, 7th Floor, Boston, MA</div>
                <div>Tell: 866.453.4748</div>
                <div>HR Fax: 810.222.5439</div>
                <div>Email: sales@funorifurniture.com</div>
            </div>
        </div>
        <div class="box-second-footer">
            <div class="first-box">
                <p>Copyright © 2022. All Rights Reserved</p>
            </div>
            <div class="second-box">
                <img src="../uploads/payments-1.png" alt="Payments">
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/eda05fcf5c.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>
