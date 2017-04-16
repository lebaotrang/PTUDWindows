<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$act=isset($_GET['act']) ? filter_data($_GET['act']) : '';

$qt_ma=isset($_GET['qt_ma']) ? filter_data($_GET['qt_ma']) : 0;
switch ($act){
	case "add":
		$emailacc=isset($_POST['emailAcc']) ? filter_data($_POST['emailAcc']) : NULL;
		$name=isset($_POST['name']) ? filter_data($_POST['name']) : NULL;
		$newpass1= isset($_POST['newpass1']) ? filter_data($_POST['newpass1']) : NULL;
		$newpass2= isset($_POST['newpass2']) ? filter_data($_POST['newpass2']) : NULL;
		if(isset($_POST['submit'])){
			
			if(!empty($emailacc) || !empty($newpass1) || !empty($newpass2)){
				
				$pattern ='/^([a-zA-Z0-9\_\-])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/';
				if(preg_match($pattern, $emailacc, $match) == 0){
					show_error("Định dạng email không đúng!");
					include_once "layout/qltaikhoan/add.php";
					exit();
				}
					
				$pattern ='#^\w{6,30}$#';//bieu thuc yeu cau mk co tu 6 đen 30 ky tu
				if(preg_match($pattern, $newpass1, $match) == 0){
					show_error("Mật khẩu ít nhất 6 ký tự!");
					include_once "layout/qltaikhoan/add.php";
					exit();
				}
				
				if($newpass1!=$newpass2){
					show_error("Xác nhận mật khẩu không trùng khớp!");
					include_once "layout/qltaikhoan/add.php";
					exit();
				}
				
				$sql="SELECT * FROM quantri WHERE qt_tendangnhap='$emailacc'";
				$qr=mysqli_query($con, $sql);
				if(mysqli_num_rows($qr)>0){
					show_info("Tài khoản này đã tồn tại, vui lòng chọn tên khác!");
					include_once "layout/qltaikhoan/add.php";
					exit();
				}
				$newpass1=md5($newpass1);
				$sql="INSERT INTO `quantri`(`qt_tendangnhap`, `qt_matkhau`, `qt_ten`, `qt_quyen`) VALUES ('$emailacc','$newpass1','$name',1)";
				$qr=mysqli_query($con, $sql);
				if(!$qr) die("Lỗi truy vấn CSDL!");
				redirect("?page=qltaikhoan",0);
				
			}
			else {
				show_error("Vui lòng nhập tất cả thông tin!");
				include_once "layout/qltaikhoan/add.php";
				exit();
			}
			
		}
		include_once "layout/qltaikhoan/add.php";
		break;
	case "changepass":
		if(isset($_POST['submit'])){
			$oldpass= isset($_POST['oldpass']) ? filter_data($_POST['oldpass']) : NULL;
			$newpass1= isset($_POST['newpass1']) ? filter_data($_POST['newpass1']) : NULL;
			$newpass2= isset($_POST['newpass2']) ? filter_data($_POST['newpass2']) : NULL;

			if($oldpass!=NULL && $newpass1!=NULL && $newpass2!=NULL){
				$pattern ='#^\w{6,30}$#';//bieu thuc yeu cau mk co tu 6 đen 30 ky tu
				if(preg_match($pattern, $newpass1, $match) == 0)
					show_error("Mật khẩu ít nhất 6 ký tự!");
				else {
					if($newpass1!=$newpass2){
						show_error("Xác nhận mật khẩu mới không trùng khớp!");
						include_once "layout/qltaikhoan/changepass.php";
						exit();
					}
					else {
						$sql="select * from `quantri` where qt_matkhau = '".md5($oldpass)."' and `qt_tendangnhap`='".$_SESSION['admin_name']."'";
						$qr=mysqli_query($con, $sql);
						if($qr) {
							if(mysqli_num_rows($qr)<=0){
								show_error("Mật khẩu cũ không trùng khớp! Vui lòng nhập lại!");
								include_once "layout/qltaikhoan/changepass.php";
								exit();
							}
							else {	
								$sql1="UPDATE `quantri` SET `qt_matkhau` = '".md5($newpass1)."' WHERE `qt_tendangnhap`='".$_SESSION['admin_name']."'";
								$qr1=mysqli_query($con, $sql1);
								if(!$qr1) die("Lỗi truy vấn CSDL!");
								else{
									show_success("Đổi pass thành công! Đăng xuất để áp dụng pass mới!");
								}
							}
						}
						else
							die("Lỗi truy vấn CSDL!");
					}
				}
			}
			else {
				show_error("Vui lòng nhập tất cả thông tin!");
				include_once "layout/qltaikhoan/changepass.php";
				exit();
			}
		}//end if POST
		include_once "layout/qltaikhoan/changepass.php";
		break;
	case "delete":
		$confirm="yes";
		if($qt_ma<=0 || !is_numeric($qt_ma))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$qt_ma=isset($_POST['qt_ma']) ? filter_data($_POST['qt_ma']) : 0;
			$pass= isset($_POST['pass']) ? filter_data($_POST['pass']) : NULL;
			$sql="SELECT * FROM quantri WHERE qt_ma=$qt_ma";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
			$row=mysqli_fetch_array($qr);
			if(strcmp(md5($pass),$row['qt_matkhau'])==0){
				$sql1="DELETE FROM quantri WHERE qt_ma=$qt_ma";
				$qr1=mysqli_query($con, $sql1);
				if(!$qr1) die("Lỗi truy vấn CSDL");
				show_success("Xóa thành công! Đang chuyển hướng về trang chính!");
				redirect("index.php?page=qltaikhoan",3);
			}
			else{
				show_error("Mật khẩu không trùng khớp! Đang chuyển hướng về trang chính!");
				redirect("?page=qltaikhoan&act=delete&qt_ma=$qt_ma",3);
			}
		}
		include_once "layout/qltaikhoan/index.php";
		break;
	default:
		include_once "layout/qltaikhoan/index.php";
		break;
}
?>