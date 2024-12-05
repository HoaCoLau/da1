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
        <div class="overlay" id="overlay">
    <div class="popup" id="popup">
        <p id="popupMessage"></p>
        <button onclick="closePopup()">Đóng</button>
    </div></div>
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
                <?php if (isset($_SESSION['error'])): ?>
                    <?php if (is_array($_SESSION['error'])): ?>
                        <ul class="text-danger">
                            <?php foreach ($_SESSION['error'] as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-danger"><?= htmlspecialchars($_SESSION['error']) ?></p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>Vui lòng đăng nhập</p>
                <?php endif; ?>
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
<script>
        function showPopup(message) {
            document.getElementById('popupMessage').innerText = message;
            document.getElementById('popup').classList.add('active');
            document.getElementById('overlay').classList.add('active');
        }

        function closePopup() {
            document.getElementById('popup').classList.remove('active');
            document.getElementById('overlay').classList.remove('active');
        }


        <?php if (isset($_SESSION['success_message'])): ?>
            showPopup("<?= htmlspecialchars($_SESSION['success_message']) ?>");
            <?php unset($_SESSION['success_message']);  ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_message'])): ?>
            showPopup("<?= htmlspecialchars($_SESSION['error_message']) ?>");
            <?php unset($_SESSION['error_message']);  ?>
        <?php endif; ?>
    </script>
    <style>
        
.overlay {
    display: none; 
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7); 
    z-index: 999;
}

.popup {
    display: none; 
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff; 
    border-radius: 10px; 
    padding: 20px;
    z-index: 1000;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); 
    max-width: 400px; 
    width: 90%; 
    animation: fadeIn 0.3s; 
}

.popup.active {
    display: block; 
}


.overlay.active {
    display: block; 
}


.popup button {
    background-color: #007bff; 
    color: white;
    border: none; 
    border-radius: 5px; 
    padding: 10px 15px; 
    cursor: pointer;
    transition: background-color 0.3s; 
}

.popup button:hover {
    background-color: #0056b3; 
}


@keyframes fadeIn {
    from {
        opacity: 0; 
    }
    to {
        opacity: 1; 
    }
}

#popupMessage {
    font-size: 16px; 
    margin-bottom: 15px; 
    text-align: center; 
}
    </style>
