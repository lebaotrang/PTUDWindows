<?php
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;
$keyword = isset($_GET['keyword']) ? filter_data($_GET['keyword']) : NULL;
$loi="";
switch($act){
	case "advandce":
		break;
	default:
		if(empty($keyword)){
			$loi="Bạn cần nhập từ cần tìm!";
		}
		if(!isset($loi))
			include_once "./layout/giangvien/qltaikhoan.php";
		else{
			$a = "SELECT * FROM nhanvien WHERE nv_hoten like '%".$keyword."%'";
			$qra=mysqli_query($con, $a);

			$b = "SELECT * FROM sinhvien WHERE sv_hoten like '%".$keyword."%'";
			$qrb=mysqli_query($con, $b);

			if(mysqli_num_rows($qra)==0 && mysqli_num_rows($qrb)==0){
				$loi="Không tìm thấy kết quả nào phù hợp!";
			}
		}
		include_once "./layout/giangvien/timkiem.php";
}
?>