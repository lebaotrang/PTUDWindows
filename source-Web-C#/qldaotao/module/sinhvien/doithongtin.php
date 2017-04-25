<?php
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;
$hoten = isset($_POST['txtHoTen']) ? filter_data($_POST['txtHoTen']) : NULL;
$gioitinh = isset($_POST['rdGioiTinh']) ? filter_data($_POST['rdGioiTinh']) : NULL;
$ngaysinh = isset($_POST['txtNgaySinh']) ? filter_data($_POST['txtNgaySinh']) : NULL;
$dienthoai = isset($_POST['txtDienThoai']) ? filter_data($_POST['txtDienThoai']) : NULL;
$diachi = isset($_POST['txtDiaChi']) ? filter_data($_POST['txtDiaChi']) : NULL;
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
	case 'edit':
		if(isset($_POST['submit'])){

			if(empty($hoten) || $gioitinh==NULL || empty($ngaysinh) || empty($dienthoai))
				$fail = "Điền đầy đủ các trường có dấu (*)";
			if(!empty($fail))
				show_error($fail);
			else{
				$sql="UPDATE `sinhvien` SET `sv_hoten`='$hoten',`sv_gioitinh`=$gioitinh,`sv_ngaysinh`='$ngaysinh',`sv_diachi`='$diachi',`sv_dienthoai`='$dienthoai' WHERE sv_email='".$_SESSION['user_name']."'";
				$rs=mysqli_query($con, $sql);
				if($rs)
					redirect("index.php?page=doithongtin&act=edit",0);
			}
		}
		
		include_once "./layout/sinhvien/doithongtin.php";
		break;
	default:
		include_once "./layout/sinhvien/doithongtin.php";
		break;
}

?>