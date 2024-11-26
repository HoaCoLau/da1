<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css?v=<?php echo time() ?>" />
    <link rel="stylesheet" href="./Css/login.css?v=<?php echo time() ?>">
    <title>Login</title>
</head>

<body>
    <div class="all-container">
        <div class="box-picture">
            <div class="box-text">
                <h1>Welcome Back!</h1>
                <div class="content">
                    <div class="content-1">Enter personal information into your</div>
                    <div class="content-2">User account</div>
                </div>
                <div class="content-button">
                    <a href="<?= BASE_URL . '?act=sign-up' ?>">
                    <button>Sign up</button>
                </a>
                </div>
            </div>
        </div>
        <div class="box-login">
            <h2>Sign in</h2>
            <div class="box-login-icon">
                <a href="">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="">
                    <i class="fa-brands fa-google"></i>
                </a>
                <a href="">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
            <form action="<?= BASE_URL . '?act=check-login' ?>" method="post">
                <div class="noti">Or user your email account.</div>
                    <?php if (isset($_SESSION['error'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error'] ?></p>
                    <?php }else{
                        ?><p>Vui long dang nhap</p><?php
                    } ?>
                <div class="box-input">
                    <div class="box-user">
                        <i class="fa-solid fa-envelope"></i>
                        <input class="user" type="text" placeholder="Email" name="email">
                    </div>
                    <div class="box-user">
                        <i class="fa-solid fa-lock"></i>
                        <input class="user" class="pass" type="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="box-forgot-password">
                    <div>
                        <a href="">Forgot your password ?</a>
                    </div>
                </div>
                <div class="button-login">
                    <button type="submit">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<script src="https://kit.fontawesome.com/eda05fcf5c.js" crossorigin="anonymous"></script>
<script src="js/main.js?v=<?php echo time() ?>"></script>