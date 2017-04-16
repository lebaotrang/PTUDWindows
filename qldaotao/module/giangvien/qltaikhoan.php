<?php
if(!in_array(1, $_SESSION['user_quyen'])) redirect('login.php', 0);
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;
$nv_id = isset($_GET['nv_id']) ? filter_data($_GET['nv_id']) : 0;

$quyen = isset($_POST['checkQuyen']) ? $_POST['checkQuyen'] : array(); //var_dump($quyen);
$hoten = isset($_POST['txtHoTen']) ? filter_data($_POST['txtHoTen']) : NULL;
$gioitinh = isset($_POST['rdGioiTinh']) ? filter_data($_POST['rdGioiTinh']) : 0;
$ngaysinh = isset($_POST['txtNgaySinh']) ? filter_data($_POST['txtNgaySinh']) : NULL;
$dienthoai = isset($_POST['txtDienThoai']) ? filter_data($_POST['txtDienThoai']) : NULL;
$email = isset($_POST['txtEmail']) ? filter_data($_POST['txtEmail']) : NULL;
$diachi = isset($_POST['txtDiaChi']) ? filter_data($_POST['txtDiaChi']) : NULL;
$matkhau = isset($_POST['txtMatKhau']) ? filter_data($_POST['txtMatKhau']) : NULL;
$k_id = isset($_POST['slKhoa']) ? filter_data($_POST['slKhoa']) : 0;
switch($act){
	case "them":
		if(isset($_POST['submit'])){
			
			if(empty($quyen) || empty($hoten) || empty($ngaysinh) || empty($dienthoai) || empty($email) || empty($matkhau) || $k_id==0)
				$loi="Điền đầy đủ trường có dấu (*)";
			else{
				$partten = "/^([A-Z]){1}([\w_\!@#$%^&*()]+){5,31}$/";
				if(!preg_match($partten ,$matkhau, $matchs))
					$loi="Mật khẩu bắt đầu bằng chữ in hoa, có ít nhất 1 ký tự đặc biệt, có chữ số"; 

				$sql="SELECT * FROM nhanvien WHERE nv_tentaikhoan = '".$email."'";
				$rs=mysqli_query($con, $sql);
				if(mysqli_num_rows($rs)>0)
					$loi="Tài khoản email này đã tồn tại!";

			}

			if(!empty($loi))
				show_error($loi);
			else{
				$matkhau=md5($matkhau);
				$sql="INSERT INTO `nhanvien`(`nv_hoten`, `nv_gioitinh`, `nv_ngaysinh`, `nv_dienthoai`, `nv_email`, `nv_diachi`, `nv_tentaikhoan`, `nv_matkhau`, `k_id`) VALUES ('$hoten',$gioitinh,'$ngaysinh','$dienthoai','$email','$diachi ','$email','$matkhau',$k_id)";
				$rs=mysqli_query($con, $sql);
				$nv_id = mysqli_insert_id($con);

				foreach ($quyen as $quyen) {
					$sql = "INSERT INTO `quyennhanvien`(`nv_id`, `q_id`) VALUES ($nv_id,$quyen)";
					$rs=mysqli_query($con, $sql);
				}
				if(!$rs) die("loi truy van csdl");
				redirect("index.php?page=qltaikhoan",0);
			}

		}
		include_once "./layout/giangvien/qltaikhoan_them.php";
		break;

	case "edit":

		if($nv_id>0){
			$sql = "SELECT * FROM nhanvien WHERE nv_id=$nv_id";
			$qr =mysqli_query($con, $sql);
			$nhanvien = mysqli_fetch_object($qr);
		}

		if(isset($_POST['submit'])){
			
			if(empty($quyen) || empty($hoten) || empty($ngaysinh) || empty($dienthoai) || empty($email) || $k_id==0)
				$loi="Điền đầy đủ trường có dấu (*)";

			if(!empty($loi))
				show_error($loi);
			else{
				$sql="UPDATE `nhanvien` SET `nv_hoten`='$hoten',`nv_gioitinh`=$gioitinh,`nv_ngaysinh`='$ngaysinh',`nv_dienthoai`='$dienthoai',`nv_email`='$email',`nv_diachi`='$diachi',`nv_tentaikhoan`='$email',`k_id`=$k_id WHERE nv_id=$nv_id";
				$rs=mysqli_query($con, $sql);

				$sql1="DELETE FROM `quyennhanvien` WHERE nv_id=$nv_id";
				$rs1=mysqli_query($con, $sql1);
				foreach ($quyen as $quyen) {
					$sql = "INSERT INTO `quyennhanvien`(`nv_id`, `q_id`) VALUES ($nv_id,$quyen)";
					$rs=mysqli_query($con, $sql);
				}
				//if(!$rs) die("loi truy van csdl");
				redirect("index.php?page=qltaikhoan",0);
			}

		}
		include_once "./layout/giangvien/qltaikhoan_sua.php";
		break;

	case "xoa":
		$confirm="yes";
		$nv_id=isset($_GET['nv_id']) ? filter_data($_GET['nv_id']) : 0;
		if($nv_id<=0 || !is_numeric($nv_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="DELETE FROM nhanvien WHERE nv_id=$nv_id";
			$qr=mysqli_query($con, $sql);
			redirect("index.php?page=qltaikhoan",0);
		}
		include_once "./layout/giangvien/qltaikhoan.php";
		break;

	case "resetpass":
		if(isset($_POST['submit'])){
			$new_pass1=trim(mysql_real_escape_string($_POST['txtMKMoi']));
			$new_pass2=trim(mysql_real_escape_string($_POST['txtXNMatKhau']));
			
			if($new_pass1!=NULL && $new_pass2!=NULL){
				$pattern = "/^([A-Z]){1}([\w_\!@#$%^&*()]+){5,31}$/";
				if(preg_match($pattern, $new_pass1, $match) == 0)
					$fail="Mật khẩu bắt đầu bằng chữ in hoa, có ít nhất 1 ký tự đặc biệt, có chữ số!";
				else{
					if($new_pass1!=$new_pass2)
						$fail="Xác nhận mật khẩu mới không trùng khớp!";
				}
			}
			else
				$fail="Vui lòng nhập tất cả thông tin!";
			
			if(!empty($fail))
				show_error($fail);
			else{	
				$new_pass1=md5($new_pass1);
				$sql1="UPDATE nhanvien SET nv_matkhau='$new_pass1' WHERE nv_id=$nv_id";
				$qr1=mysqli_query($con, $sql1);
				if(!$qr1) die("Lỗi truy vấn CSDL!");
				show_success("RESET mật khẩu thành công!");
			}
		}
		include_once "./layout/giangvien/qltaikhoan_resetpass.php";
		break;

	default:
		include_once "./layout/giangvien/qltaikhoan.php";
}
?>