<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$page="layout/qlcaidat/";
if(isset($_POST['btnDangKy'])){
	$ma=isset($_POST['ma']) ? htmlentities($_POST['ma']) : '';
	$cd_trang = isset($_POST['txtTrang']) ? htmlentities($_POST['txtTrang']) : '';
	//echo $ma; echo $cd_trang;
	if($ma=='' || $cd_trang=='' || $cd_trang<=0){
		show_error("Số trang không hợp lệ!");
		include_once($page."index.php");	
		exit();
	}
	else{
		//echo $ma; echo $cd_trang;
		$sql="UPDATE caidat SET cd_trang='$cd_trang' WHERE cd_ma='$ma'";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL");
		else
			show_success("Cập nhật thành công!");
		
		include_once($page."index.php");	
		exit();
	}
		
}
else{	
	$page.="index.php";
	if(file_exists($page))
		include_once "$page";
	else
		redirect(DOMAIN."404.html", 0);
}
?>