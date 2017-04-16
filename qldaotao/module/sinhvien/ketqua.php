<?php
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;
switch($act){
	case "luukq":
		//chuyen huong den trang in
		redirect('wordkq.php', 0);
		break;
}
include_once "./layout/sinhvien/ketqua.php";
?>