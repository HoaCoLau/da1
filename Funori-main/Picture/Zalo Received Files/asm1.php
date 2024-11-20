<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
    <style>
#layout{
    max-width: 1080px;
    margin: 0px auto;
}
header{
    line-height: 10px;
}
header .logo{
text-align: center;
background: rgb(41, 156, 228);
}
nav {
background-color: blue;
line-height: 40px;
text-align: center;
margin-bottom: 10px;
}

nav a {
font-variant: small-caps;
color: white;
text-decoration: none;
padding: 20px;
}

nav a:hover {
color: wheat;
text-decoration: underline;
}

.banner{
    display: flex;
}
article{
    background-color: rgb(247, 233, 208);
    padding: 5px 0px;
}
.dt{
    margin-bottom: 200px;
}
h1{
    border: 2px solid black;
    text-align: center;
    color: red;
    font-size: 35px;
    width: 25%;
    padding: 3px 5px;
    background-color: pink;
}
.pro1{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
}
.sp{
    text-align: center;
    margin: 20px;
}
.sp:hover{
    box-shadow:2px 2px gray;
}
.buy button{
    background-color: rgb(21, 233, 21);
    color: white;
    border-radius: 20px;
    padding: 5px 20px;
    margin: 5px;
    font-weight: bold;

}
.sp button:hover{
    background-color: yellow;
    color: black;
    border-radius: 20px;
    padding: 5px 20px;
    font-weight: bold;
}
.name{
text-align: center;
font-weight: bold;
color:red;
font-size:20px;
margin: 5px;
}
.price{
text-align: center;
}

.lap{
    margin-bottom: 30px;
}

.form {
    background-color: blue;
    padding: 10px 0;
    justify-content: space-evenly;
    text-align: center;
}

.form input {
    padding: 10px 10px;
    width: 60%;
}

.form button {
    background: orangered;
    color: white;
    padding: 10px 10px;
    font-weight: bold;
}

    </style>
</head>
<body>
    <div id="layout">
        <header>
        <div class="logo">
                <img src="img/logo.png">
            </div>    
        </header>
        <nav>
            <a href="#">TRANG CHỦ</a>
            <a href="#">GIỚI THIỆU</a>
            <a href="#">SẢN PHẨM</a>
            <a href="#">LIÊN HỆ</a>
            <a href="#">ĐĂNG NHẬP</a>
        </nav>
        <div class="banner">
            <img src="img/banner.jpg" width="100%" height="200px">
        </div>
    <div class="form">
        <form action="" method="POST">
        <input type="text" name="search">
        <button type="submit" name="btn_search">Tìm kiếm</button>
    </form>
    </div>
    <article>
        <div class="dt">
            <h1>ĐIỆN THOẠI</h1>
            <div class="pro1">
        <?php
            $array=[["anh"=>"img/iphone.jpg","tensp"=>"IPHONE","giatien"=>"14.990.000đ"],
            ["anh"=>"img/oppo.jpg","tensp"=>"OPPO","giatien"=>"14.990.000đ"],
            ["anh"=>"img/samsung1.jpg","tensp"=>"SAMSUNG","giatien"=>"14.990.000đ"],
            ["anh"=>"img/xiaomi.jpg","tensp"=>"XIAOMI","giatien"=>"14.990.000đ"],
            ["anh"=>"img/realme.jpg","tensp"=>"REALME","giatien"=>"14.990.000đ"],
            ["anh"=>"img/vivo.jpg","tensp"=>"VIVO","giatien"=>"14.990.000đ"],
            ["anh"=>"img/sony.jpg","tensp"=>"SONY","giatien"=>"14.990.000đ"],
            ["anh"=>"img/vsmart.jpg","tensp"=>"VSMART","giatien"=>"14.990.000đ"]];

            if(isset($_POST["btn_search"])){
                foreach($array as $key => $sp){
                    if(strcmp(strtoupper($_POST['search']),strtoupper($sp['tensp'])) ==0){
        ?>
            <div class="sp">
                <a href="#"><img src="<?php echo $sp["anh"] ?>" alt =""></a>
                <div class="name"><?php echo $sp["tensp"] ?></div>
                <div class="price"><?php echo $sp["giatien"] ?></div>
                <div class="buy"><a href=""><button>MUA</button></a></div>
            </div>
        <?php        
                }}  } else{
                    foreach($array as $key => $sp){
        ?>
            <div class="sp">
            <a href="#"><img src="<?php echo $sp["anh"] ?>" alt =""></a>
                <div class="name"><?php echo $sp["tensp"] ?></div>
                <div class="price"><?php echo $sp["giatien"] ?></div>
                <div class="buy"><a href=""><button>MUA</button></a></div>
            </div>
        <?php        
            }    } 
        ?>

            </div>
        </div>


        <div class="lap">
        <h1>LAPTOP</h1>
            <div class="pro1">
        <?php
            $array=[["anh"=>"img/acer.jpg","tensp"=>"ACER","giatien"=>"14.990.000đ"],
            ["anh"=>"img/asus.jpg","tensp"=>"ASUS","giatien"=>"14.990.000đ"],
            ["anh"=>"img/dell.jpg","tensp"=>"DELL","giatien"=>"14.990.000đ"],
            ["anh"=>"img/hp.jpg","tensp"=>"HP","giatien"=>"14.990.000đ"],
            ["anh"=>"img/lenovo.jpg","tensp"=>"LENOVO","giatien"=>"14.990.000đ"],
            ["anh"=>"img/macbook.jpg","tensp"=>"MACBOOK","giatien"=>"14.990.000đ"],
            ["anh"=>"img/msi.jpg","tensp"=>"MSI","giatien"=>"14.990.000đ"],
            ["anh"=>"img/lg.jpg","tensp"=>"LG","giatien"=>"14.990.000đ"]];
            
            if(isset($_POST["btn_search"])){
                foreach($array as $key => $sp){
                    if(strcmp(strtoupper($_POST['search']),strtoupper($sp['tensp'])) ==0){
        ?>
            <div class="sp">
                <a href="#"><img src="<?php echo $sp["anh"] ?>" alt =""></a>
                <div class="name"><?php echo $sp["tensp"] ?></div>
                <div class="price"><?php echo $sp["giatien"] ?></div>
                <div class="buy"><a href=""><button>MUA</button></a></div>
            </div>
        <?php        
                }}  } else{
                    foreach($array as $key => $sp){
        ?>
            <div class="sp">
            <a href="#"><img src="<?php echo $sp["anh"] ?>" alt =""></a>
                <div class="name"><?php echo $sp["tensp"] ?></div>
                <div class="price"><?php echo $sp["giatien"] ?></div>
                <div class="buy"><a href=""><button>MUA</button></a></div>
            </div>
        <?php        
            }    } 
        ?>

            </div>
        </div>
    </article>
    <footer>
        <img src="img/banner2.jpg" width="100%" height="200px">
        </footer>
    </div>
</body>
</html>
