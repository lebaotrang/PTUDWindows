<?php
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;
$dt_id = isset($_GET['dt_id']) ? filter_data($_GET['dt_id']) : 0;
switch($act){
	case "xoa":
		if(!is_numeric($dt_id))
			redirect("index.php",0);
		else{
			$sql1 ="SELECT * FROM sinhvien where sv_email = '".$_SESSION['user_name']."'";
			$rs1=mysqli_query($con, $sql1);
			if(!$rs1) die("Lỗi truy vấn CSDL!");
			$sv_id = mysqli_fetch_object($rs1)->sv_id; //var_dump($sv_id);

			$sql ="DELETE FROM dangky where sv_id=$sv_id AND dt_id=$dt_id AND dk_trangthai='Có ý thích'";
			$rs=mysqli_query($con, $sql);
			if(!$rs) die("Lỗi truy vấn CSDL!");
			show_success("Xóa ngành thành công!");	
		}
		break;
}
include_once "./layout/sinhvien/qldangky.php";
?>