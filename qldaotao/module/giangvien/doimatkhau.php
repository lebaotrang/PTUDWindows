<?php
if(isset($_POST['submit'])){
	$old_pass=trim(mysql_real_escape_string($_POST['txtMKCu']));
	$new_pass1=trim(mysql_real_escape_string($_POST['txtMKMoi']));
	$new_pass2=trim(mysql_real_escape_string($_POST['txtXNMatKhau']));
	
	if($old_pass!=NULL && $new_pass1!=NULL && $new_pass2!=NULL){
		//$pattern ='#^\w{6,30}$#';//bieu thuc yeu cau mk co tu 6 đen 30 ky tu
		$pattern = "/^([A-Z]){1}([\w_\!@#$%^&*()]+){5,31}$/";
		if(preg_match($pattern, $new_pass1, $match) == 0)
			$fail="Mật khẩu bắt đầu bằng chữ in hoa, có ít nhất 1 ký tự đặc biệt, có chữ số!";
		else{
			if($new_pass1!=$new_pass2)
				$fail="Xác nhận mật khẩu mới không trùng khớp!";
			else{
				$new_pass1=md5($new_pass1);
				$old_pass=md5($old_pass);
				$sql="select * from nhanvien where nv_matkhau = '$old_pass' and nv_tentaikhoan='".$_SESSION['user_name']."'";
				//echo $sql;
				$qr=mysqli_query($con, $sql);
				if(!$qr) die("Lỗi truy vấn CSDL1!");
				if(mysqli_num_rows($qr)<=0)
					$fail="Mật khẩu cũ không trùng khớp! Vui lòng nhập lại!";
			}
		}
	}
	else
		$fail="Vui lòng nhập tất cả thông tin!";
	
	if(!empty($fail))
		show_error($fail);
	else{	
		$sql1="UPDATE nhanvien SET nv_matkhau='$new_pass1' WHERE nv_tentaikhoan='$_SESSION[user_name]'";
		$qr1=mysqli_query($con, $sql1);
		if(!$qr1) die("Lỗi truy vấn CSDL!");
		show_success("Đổi mật khẩu thành công! Đăng xuất để áp dụng mật khẩu mới!");
	}
}

include_once "./layout/giangvien/doimatkhau.php";
?>