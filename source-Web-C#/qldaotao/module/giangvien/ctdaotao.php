<?php
if(!in_array(2, $_SESSION['user_quyen'])) redirect('index.php', 0);
$dt_id = isset($_GET['dt_id']) ? filter_data($_GET['dt_id']) : 0;
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;

$mact = isset($_POST['txtMaCT']) ? filter_data($_POST['txtMaCT']) : NULL;
$tenct = isset($_POST['txtTenCT']) ? filter_data($_POST['txtTenCT']) : NULL;
$mota = isset($_POST['txtMoTa']) ? filter_data($_POST['txtMoTa']) : NULL;
$k_id = isset($_POST['slKhoa']) ? filter_data($_POST['slKhoa']) : 0;
switch($act){
	case "them":
		if(isset($_POST['submit'])){
			if(empty($tenct) || empty($mact) || $k_id==0)
				$fail = "Nhập đầy đủ các trường có dấu (*)";
			else{
				$sql = "SELECT * FROM daotao WHERE dt_ma='".$mact."'";
				$qr=mysqli_query($con, $sql);
				if(mysqli_num_rows($qr)>0)
					$fail = "Mã CT đã tồn tại. Nhập mã khác!";
			}

			if(!empty($fail))
				show_error($fail);
			else{	

				$sql="INSERT INTO `daotao`(`dt_ma`, `dt_ten`, `dt_mota`, `dt_trangthai`, `k_id`) VALUES ('$mact','$tenct','$mota',0,$k_id)";
				$qr=mysqli_query($con, $sql);
				redirect("index.php?page=ctdaotao",0);
			}
		
		}
		include_once "./layout/giangvien/ctdaotao_them.php";
		break;

	case "themmon":
		$tenmon = isset($_POST['txtTenMon']) ? filter_data($_POST['txtTenMon']) : NULL;
		$sotc = isset($_POST['slSoTC']) ? filter_data($_POST['slSoTC']) : 1;
		if(isset($_POST['submit'])){
			if(empty($tenmon))
				$loi="Điền đầy đủ tất cả các trường!";
			if(!empty($loi))
				show_error($loi);
			else{
				$sql = "SELECT * FROM nhanvien WHERE nv_tentaikhoan='".$_SESSION['user_name']."'";
				$qr = mysqli_query($con, $sql);
				$nv_id = mysqli_fetch_object($qr)->nv_id;

				$sql1="INSERT INTO `monhoc`(`mh_ten`, `mh_tinchi`, `dt_id`) VALUES ('$tenmon',$sotc,$dt_id)";
				$qr1 = mysqli_query($con, $sql1);
				//echo $sql1;
				if(!$qr1)
					die("loi");
				else 
					//redirect("index.php?page=ctdaotao",0);
					redirect("index.php?page=ctdaotao&act=suamon&dt_id=$dt_id",0);
			}
		}
		include_once "./layout/giangvien/ctdaotao_themmon.php";
		break;

	case "edit":
		if($dt_id>0){
			$sql = "SELECT * FROM daotao WHERE dt_id=$dt_id";
			$qr =mysqli_query($con, $sql);
			$daotao = mysqli_fetch_object($qr);
		}

		if(isset($_POST['submit'])){
			if(empty($mact) || empty($tenct))
				$loi= "Thông tin có dấu (*) không được bỏ trống!";

			if(!empty($loi))
				show_error($loi);
			else{
				$sql1="UPDATE `daotao` SET `dt_ma`='".$mact."',`dt_ten`='".$tenct."',`dt_mota`='".$mota."' WHERE dt_id=$dt_id"; //echo $sql1;
				$qr1=mysqli_query($con, $sql1);
				show_success("Chỉnh sửa thành công!");
				include_once "./layout/giangvien/ctdaotao_sua.php";
				redirect("index.php?page=ctdaotao",2);
			}
		}

		include_once "./layout/giangvien/ctdaotao_sua.php";
		break;

	case "delete":
		$confirm="yes";
		$dt_id=isset($_GET['dt_id']) ? filter_data($_GET['dt_id']) : 0; //var_dump($dt_id); 
		if($dt_id<=0 || !is_numeric($dt_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="DELETE FROM daotao WHERE dt_id=$dt_id";
			$qr=mysqli_query($con, $sql);
			redirect("index.php?page=ctdaotao",0);
		}
		include_once "./layout/giangvien/ctdaotao.php";
		break;

	case "suamon":
		if($dt_id>0){
			$s = "SELECT * FROM daotao WHERE dt_id=$dt_id";
			$rs = mysqli_query($con, $s);
			$ctdt = mysqli_fetch_object($rs);
			$ctdt_ten = $ctdt->dt_ten;

			$sql = "SELECT * FROM monhoc WHERE dt_id=$dt_id"; //echo $sql;
			$qr = mysqli_query($con, $sql);
		}

		if(isset($_POST['btnSuaMon'])){
			$mh_id = isset($_POST['ma']) ? filter_data($_POST['ma']) : 0;
			$mh_ten = isset($_POST['txtTen']) ? filter_data($_POST['txtTen']) : NULL;
			$mh_tinchi = isset($_POST['txtTinChi']) ? filter_data($_POST['txtTinChi']) : NULL;
			//echo $mh_id."-".$mh_ten."-".$mh_tinchi; die();
			if($mh_ten==NULL || $mh_tinchi==NULL)
				$loi= "Thông tin có dấu (*) không được bỏ trống!";

			if(!empty($loi))
				show_error($loi);
			else{
				$sql = "UPDATE monhoc SET `mh_ten`='".$mh_ten."',`mh_tinchi`='".$mh_tinchi."' WHERE mh_id=$mh_id";
				//echo $sql; die();
				$qr = mysqli_query($con, $sql);
				if($qr)
					redirect("index.php?page=ctdaotao&act=suamon&dt_id=$dt_id",0);
			}
		}
		include_once "./layout/giangvien/ctdaotao_suamon.php";
		break;

	case "xoamon":
		/*load lai du lieu cac mon thuoc ctdt*/
		if($dt_id>0){
			$s = "SELECT * FROM daotao WHERE dt_id=$dt_id";
			$rs = mysqli_query($con, $s);
			$ctdt = mysqli_fetch_object($rs);
			$ctdt_ten = $ctdt->dt_ten;

			$sql = "SELECT * FROM monhoc WHERE dt_id=$dt_id"; //echo $sql;
			$qr = mysqli_query($con, $sql);
		}
		/*load lai du lieu cac mon thuoc ctdt*/

		$confirm="yes";
		$mh_id=isset($_GET['mh_id']) ? filter_data($_GET['mh_id']) : 0; //var_dump($dt_id); 
		if($mh_id<=0 || !is_numeric($mh_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="DELETE FROM monhoc WHERE mh_id=$mh_id";
			$qr=mysqli_query($con, $sql);
			if($qr)
				redirect("index.php?page=ctdaotao&act=suamon&dt_id=$dt_id",0);
		}
		include_once "./layout/giangvien/ctdaotao_suamon.php";
		break;
	default:
		include_once "./layout/giangvien/ctdaotao.php";
		break;
}
?>