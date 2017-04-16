<?php
if(!in_array(3, $_SESSION['user_quyen'])) redirect('index.php', 0);
$sv_id = isset($_GET['sv_id']) ? filter_data($_GET['sv_id']) : 0;
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;
$mact = isset($_POST['txtMaCT']) ? filter_data($_POST['txtMaCT']) : NULL;
$tenct = isset($_POST['txtTenCT']) ? filter_data($_POST['txtTenCT']) : NULL;
$mota = isset($_POST['txtMoTa']) ? filter_data($_POST['txtMoTa']) : NULL;
switch($act){
	// case "them":
	// 	if(isset($_POST['submit'])){
	// 		if(empty($tenct) || empty($mact))
	// 			$fail = "Nhập đầy đủ các trường có dấu (*)";
	// 		else{
	// 			$sql = "SELECT * FROM daotao WHERE dt_ma='".$mact."'";
	// 			$qr=mysqli_query($con, $sql);
	// 			if(mysqli_num_rows($qr)>0)
	// 				$fail = "Mã CT đã tồn tại. Nhập mã khác!";
	// 		}

	// 		if(!empty($fail))
	// 			show_error($fail);
	// 		else{	
	// 			$sql = "SELECT * FROM nhanvien WHERE nv_tentaikhoan ='".$_SESSION['user_name']."'"; 
	// 			$qr=mysqli_query($con, $sql);
	// 			$nv_id=mysqli_fetch_object($qr);
	// 			//var_dump($nv_id->nv_id);

	// 			$sql="INSERT INTO `daotao`(`dt_ma`, `dt_ten`, `dt_mota`, `dt_trangthai`, `nv_id`) VALUES ('$mact','$tenct','$mota',0,$nv_id->nv_id)";
	// 			$qr=mysqli_query($con, $sql);
	// 			redirect("index.php?page=qlsinhvien",0);
	// 		}
		
	// 	}
	// 	include_once "./layout/giangvien/qlsinhvien_them.php";
	// 	break;

	// case "themmon":
	// 	$tenmon = isset($_POST['txtTenMon']) ? filter_data($_POST['txtTenMon']) : NULL;
	// 	$sotc = isset($_POST['slSoTC']) ? filter_data($_POST['slSoTC']) : 1;
	// 	if(isset($_POST['submit'])){
	// 		if(empty($tenmon))
	// 			$loi="Điền đầy đủ tất cả các trường!";
	// 		if(!empty($loi))
	// 			show_error($loi);
	// 		else{
	// 			$sql = "SELECT * FROM nhanvien WHERE nv_tentaikhoan='".$_SESSION['user_name']."'";
	// 			$qr = mysqli_query($con, $sql);
	// 			$nv_id = mysqli_fetch_object($qr)->nv_id;

	// 			$sql1="INSERT INTO `monhoc`(`mh_ten`, `mh_tinchi`, `sv_id`, `nv_id`) VALUES ('$tenmon',$sotc,$sv_id,$nv_id)";
	// 			$qr1 = mysqli_query($con, $sql1);
	// 			echo $sql1;
	// 			if(!$qr1)
	// 				die("loi");
	// 		}
	// 	}
	// 	include_once "./layout/giangvien/qlsinhvien_themmon.php";
	// 	break;

	// case "edit":
	// 	if($sv_id>0){
	// 		$sql = "SELECT * FROM daotao WHERE sv_id=$sv_id";
	// 		$qr =mysqli_query($con, $sql);
	// 		$daotao = mysqli_fetch_object($qr);
	// 	}

	// 	if(isset($_POST['submit'])){
	// 		if(empty($mact) || empty($tenct))
	// 			$loi= "Thông tin có dấu (*) không được bỏ trống!";

	// 		if(!empty($loi))
	// 			show_error($loi);
	// 		else{
	// 			$sql1="UPDATE `daotao` SET `dt_ma`='".$mact."',`dt_ten`='".$tenct."',`dt_mota`='".$mota."' WHERE sv_id=$sv_id"; //echo $sql1;
	// 			$qr1=mysqli_query($con, $sql1);
	// 			show_success("Chỉnh sửa thành công!");
	// 			include_once "./layout/giangvien/qlsinhvien_sua.php";
	// 			redirect("index.php?page=qlsinhvien",2);
	// 		}
	// 	}

	// 	include_once "./layout/giangvien/qlsinhvien_sua.php";
	// 	break;

	// case "delete":
	// 	$confirm="yes";
	// 	$sv_id=isset($_GET['sv_id']) ? filter_data($_GET['sv_id']) : 0; //var_dump($sv_id); 
	// 	if($sv_id<=0 || !is_numeric($sv_id))
	// 		redirect("404.html",0);
	// 	if(isset($_POST['delete'])){
	// 		$confirm="";
	// 		$sql="DELETE FROM daotao WHERE sv_id=$sv_id";
	// 		$qr=mysqli_query($con, $sql);
	// 		redirect("index.php?page=qlsinhvien",0);
	// 	}
	// 	include_once "./layout/giangvien/qlsinhvien.php";

	case "resetpass":
		if(isset($_POST['submit'])){
			$sv_id = isset($_GET['sv_id']) ? $_GET['sv_id'] : 0;
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
				$sql1="UPDATE sinhvien SET sv_matkhau='$new_pass1' WHERE sv_id=$sv_id";
				$qr1=mysqli_query($con, $sql1);
				if(!$qr1) die("Lỗi truy vấn CSDL!");
				show_success("RESET mật khẩu thành công!");
			}
		}
		include_once "./layout/giangvien/qlsinhvien_resetpass.php";
		break;

	case "huydkctdt":
		$sv_id = isset($_GET['sv_id']) ? $_GET['sv_id'] : 0;
		$dt_id = isset($_GET['dt_id']) ? $_GET['dt_id'] : 0;
		if($sv_id==0 || !is_numeric($sv_id) || $dt_id==0 || !is_numeric($dt_id))
			redirect("index.php?page=qlsinhvien&act=svdk",0);
		else{
			$sql = "UPDATE dangky SET dk_trangthai='Có ý thích' WHERE sv_id=$sv_id";
			$rs=mysqli_query($con, $sql);

			$sql1 = "UPDATE sinhvien SET k_id=NULL AND dt_id=NULL WHERE sv_id=$sv_id";
			$rs1=mysqli_query($con, $sql1);

			if($rs && $rs1)
				redirect("index.php?page=qlsinhvien&act=svdkdetail&sv_id=$sv_id",0);
		}

		include_once "./layout/giangvien/qlsinhvien_svdkdetail.php";
		break;

	case "dkctdt":
		$sv_id = isset($_GET['sv_id']) ? $_GET['sv_id'] : 0;
		$dt_id = isset($_GET['dt_id']) ? $_GET['dt_id'] : 0;
		if($sv_id==0 || !is_numeric($sv_id) || $dt_id==0 || !is_numeric($dt_id))
			redirect("index.php?page=qlsinhvien&act=svdk",0);
		else{
			$sql2 = "SELECT * FROM dangky WHERE sv_id=$sv_id AND dk_trangthai='Đăng ký'";
			$rs2=mysqli_query($con, $sql2);
			if(mysqli_num_rows($rs2)>0)
				show_error("Không thể đăng ký 2 CTDT!");
			else{
				$sql = "UPDATE dangky SET dk_trangthai='Đăng ký' WHERE sv_id=$sv_id AND dt_id=$dt_id";
				$rs=mysqli_query($con, $sql);

				$sql1 = "UPDATE dangky SET dk_trangthai='Tạm hoãn' WHERE sv_id=$sv_id AND dk_trangthai!='Đăng ký'";
				$rs1=mysqli_query($con, $sql1);

				$sql3 = "SELECT k_id FROM daotao WHERE dt_id=$dt_id";
				$rs3=mysqli_query($con, $sql3);
				$k_id = mysqli_fetch_object($rs3)->k_id;

				$sql4 = "UPDATE sinhvien SET k_id=$k_id, dt_id=$dt_id WHERE sv_id=$sv_id";
				$rs4=mysqli_query($con, $sql4);

				if($rs && $rs1 && $rs3 && $rs4)
					redirect("index.php?page=qlsinhvien&act=svdkdetail&sv_id=$sv_id",0);
			}			
		}
		include_once "./layout/giangvien/qlsinhvien_svdkdetail.php";
		break;

	case "svdkdetail":
		$sv_id = isset($_GET['sv_id']) ? $_GET['sv_id'] : 0;
		if($sv_id==0 || !is_numeric($sv_id))
			redirect("index.php?page=qlsinhvien&act=svdk",0);

		include_once "./layout/giangvien/qlsinhvien_svdkdetail.php";
		break;

	case "svdk":
		include_once "./layout/giangvien/qlsinhvien_svdk.php";
		break;

	default:
		$k_id = isset($_POST['slKhoa']) ? $_POST['slKhoa'] :0;
		include_once "./layout/giangvien/qlsinhvien.php";
		break;
}
?>