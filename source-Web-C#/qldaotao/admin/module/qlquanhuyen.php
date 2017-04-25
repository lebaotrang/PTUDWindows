<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$act=isset($_GET['act']) ? filter_data($_GET['act']) : '';

$qh_id=isset($_GET['qh_id']) ? filter_data($_GET['qh_id']) : 0;
switch ($act){
	
	case "delete":
		/*$confirm="yes";
		$tv_id=isset($_GET['tv_id']) ? filter_data($_GET['tv_id']) : 0;
		if($tv_id<=0 || !is_numeric($tv_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="SELECT * FROM hinh_tu_vien WHERE tv_id=$tv_id";
			$qr=mysqli_query($con, $sql);
			while($row=mysqli_fetch_array($qr)){
				unlink("../img/bannganh/".$row['htv_url']);
			}
			$sql1="UPDATE `nhan_su` SET tv_id=0 WHERE tv_id=$tv_id";
			$qr1=mysqli_query($con, $sql1);
			$sql2="DELETE FROM tu_vien WHERE tv_id=$tv_id";
			$qr2=mysqli_query($con, $sql2);
			redirect("index.php?page=qlquanhuyen",0);
		}
		include_once "layout/qlquanhuyen/index.php";*/
		break;
	case "truongban":
		if(isset($_POST['submit'])){
			$ns_id=isset($_POST['rdcheck']) ? $_POST['rdcheck'] : 0;
			if(!empty($ns_id)){
				$sql="INSERT INTO `quanhuyen_nhansu`(`qh_id`, `ns_id`, `qh_ns_quyen`, `qh_ns_trangthai`) VALUES ($qh_id,$ns_id,'Trưởng ban', 1)";
				$qr=mysqli_query($con, $sql);
				if(!$qr) die("Lỗi truy vấn CSDL!");
				redirect("index.php?page=qlquanhuyen",0);
			}
		}
		include_once "layout/qlquanhuyen/truongban.php";
		break;
	case "huytruongban":
		$qh_ns_id=isset($_GET['qh_ns_id']) ? filter_data($_GET['qh_ns_id']) : 0;
		$sql="DELETE FROM quanhuyen_nhansu WHERE qh_ns_id=$qh_ns_id";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die('Lỗi truy vấn CSDL!');
		redirect("?page=qlquanhuyen",0);
		include_once "layout/qlquanhuyen/truongban.php";
	case "bonhiem":
		$slchucvu=isset($_POST['slChucVu']) ? $_POST['slChucVu'] : 0;
		if(isset($_POST['submit'])){
			$multi_id=isset($_POST['multicheck']) ? $_POST['multicheck'] : '';
			if(empty($multi_id)){
				show_error("Phải chọn ít nhất 1 nhân sự!");
				include_once "layout/qlquanhuyen/bonhiem.php";
				exit();
			}
			foreach($multi_id as $key => $val){
				$sql="INSERT INTO `quanhuyen_nhansu`(`qh_id`, `ns_id`, `qh_ns_quyen`, `qh_ns_trangthai`) VALUES ($qh_id,$val,'$slchucvu', 0)";
				$rs=mysqli_query($con, $sql);
				if(!$rs) die("Lỗi truy vấn CSDL");
			}
			
		}
		include_once "layout/qlquanhuyen/bonhiem.php";
		break;
	case "deletepeople":
		$qh_ns_id=isset($_GET['qh_ns_id']) ? filter_data($_GET['qh_ns_id']) : 0;
		$confirm="yes";
		if(isset($_POST['delete'])){
			$confirm="";
			$qh_ns_id=isset($_POST['qh_ns_id']) ? filter_data($_POST['qh_ns_id']) : 0;
			$sql="DELETE FROM quanhuyen_nhansu WHERE qh_ns_id=$qh_ns_id";
			$qr=mysqli_query($con, $sql);
			redirect("index.php?page=qlquanhuyen&act=list&qh_id=$qh_id",0);
		}
		include_once "layout/qlquanhuyen/list.php";
		break;
	case "list":
		include_once "layout/qlquanhuyen/list.php";
		break;
	default:
		include_once "layout/qlquanhuyen/index.php";
		break;
}
?>