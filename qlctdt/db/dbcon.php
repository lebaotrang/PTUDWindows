<?php
define('ROOT_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))) . '/' );
define('DOMAIN', '127.0.0.1:1000/qldaotao/');
date_default_timezone_set('Asia/Saigon'); 

//Định nghĩa các hằng số kết nối đến database
DEFINE('DATABASE_USER', 'root');
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_PASSWORD', '');
DEFINE('DATABASE_NAME', 'quanlydaotao');

// Tạo chuỗi kết nối và thiết lập hiển thị tiếng việt
$con=mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME) or die("Lỗi! Không thể kết nối đến MySQL");
//mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD) || die("Khong the ket noi co so du lieu");
//mysql_select_db(DATABASE_NAME) || die("Khong the chon co so du lieu");
mysqli_query($con, "set names 'utf8'"); 
