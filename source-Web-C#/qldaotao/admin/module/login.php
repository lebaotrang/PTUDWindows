<?php
$email=isset($_POST['user']) ? filter_data($_POST['user']) : NULL;
$pass=isset($_POST['pass']) ? filter_data($_POST['pass']) : NULL;
$pass= ($pass!='') ? md5($pass) : NULL;

if(isset($_POST['signIn'])){
	if(!empty($email)&&!empty($pass)){
		$sql="SELECT * FROM quantri WHERE qt_tendangnhap='$email' and qt_matkhau='$pass' or qt_quyen=1 and qt_quyen=0";
		$rs=mysqli_query($con, $sql);
		if(!$rs) die("Lỗi truy vấn CSDL!");
		if(mysqli_num_rows($rs)>0){
			$row=mysqli_fetch_array($rs);
			$_SESSION['admin']='true';
			$_SESSION['admin_name']=$row['qt_tendangnhap'];
			redirect("index.php", 0);	
		}
		else{
			show_error("Thông tin đăng nhập không đúng");
		}
	}
	else{
		show_warning("Thông tin KHONG day du");
	}
}
include_once("layout/login.php"); // gọi giao dien Login
?>