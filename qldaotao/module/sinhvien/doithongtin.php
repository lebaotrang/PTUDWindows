<?php
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;
$makhoa = isset($_POST['txtMaKhoa']) ? filter_data($_POST['txtMaKhoa']) : NULL;
$tenkhoa = isset($_POST['txtTenKhoa']) ? filter_data($_POST['txtTenKhoa']) : NULL;
$nambd = isset($_POST['slNamBD']) ? filter_data($_POST['slNamBD']) : 0;
$namkt = isset($_POST['slNamKT']) ? filter_data($_POST['slNamKT']) : 0;
//var_dump($namkt);
switch ($act) {
	case 'them':
		if(isset($_POST['submit'])){
			if(empty($makhoa) || empty($tenkhoa) || $nambd==0 || $namkt=0)
				$fail = "Điền đầy đủ các trường có dấu (*)";
			if(!empty($fail))
				show_error($fail);
		}
		
		include_once "./layout/sinhvien/themthongtin.php";
		break;
	default:
		include_once "./layout/sinhvien/doithongtin.php";
		break;
}

?>