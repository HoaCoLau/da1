<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css?v=<?php echo time() ?>" />
    <link rel="stylesheet" href="./Css/login.css?v=<?php echo time() ?>">
    <title>Sign Up</title>
</head>

<body>
    <div class="all-container">
        <div class="box-picture">
            
        </div>
        <div class="box-login">
            <h2>Sign Up</h2>
            <form action="<?= BASE_URL . '?act=post-sign-up' ?>" method="post">
                <div class="box-input">
                    <div class="box-user">
                        <i class="fas fa-user"></i>
                        <input class="user" type="text" placeholder="Họ tên" name="ho_ten"><br>
                        
                    </div>
                    <div class="box-user">
                        <i class="fa-solid fa-envelope"></i>
                        <input class="user" type="text" placeholder="Email" name="email"><br>
                        
                    </div>
                    <div class="box-user">
                        <i class="fas fa-phone"></i>
                        <input class="user" type="text" placeholder="Số điện thoại" name="so_dien_thoai"><br>
                        
                    </div>
                    <div class="box-user">
                        <i class="fa-solid fa-lock"></i>
                        <input class="user" class="pass" type="password" name="password" placeholder="Password"><br>
                        
                    </div>
                </div><br><br>
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