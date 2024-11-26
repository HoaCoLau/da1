<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/noi-that/');
// duong dan vao admin
define('BASE_URL_ADMIN'       , 'http://localhost/noi-that/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'bd_noi_that');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
