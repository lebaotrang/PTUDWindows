<?php
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;
$dt_id = isset($_GET['dt_id']) ? filter_data($_GET['dt_id']) : 0;
switch($act){
	case "dangky":
		if(!is_numeric($dt_id))
			redirect("index.php",0);
		else{
			$sql ="SELECT * FROM sinhvien where sv_email = '".$_SESSION['user_name']."'";
			$rs=mysqli_query($con, $sql);
			if(!$rs) die("Lỗi truy vấn CSDL!");
			$sv_id = mysqli_fetch_object($rs)->sv_id; //var_dump($sv_id);

			$sql2 = "SELECT count(*) as soluong FROM dangky WHERE dt_id = $dt_id AND sv_id = $sv_id";
			$rs2=mysqli_query($con, $sql2);
			if(mysqli_fetch_object($rs2)->soluong==0){
				$sql1 = "INSERT INTO `dangky`(`dt_id`, `sv_id`, `dk_trangthai`) 
				    	 VALUES ($dt_id,$sv_id,'Có ý thích')";
				$rs1=mysqli_query($con, $sql1);
				if(!$rs1) die("Lỗi truy vấn CSDL!");
				show_success("Đăng ký ngành thành công!");
			}			
			
		}
		break;
}
include_once "./layout/sinhvien/ctdaotao.php";
?>