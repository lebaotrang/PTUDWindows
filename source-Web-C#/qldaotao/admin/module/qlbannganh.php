<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$act=isset($_GET['act']) ? filter_data($_GET['act']) : '';

$bn_id=isset($_GET['bn_id']) ? filter_data($_GET['bn_id']) : 0;
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
			redirect("index.php?page=qlbannganh",0);
		}
		include_once "layout/qlbannganh/index.php";*/
		break;
	case "truongban":
		if(isset($_POST['submit'])){
			$ns_id=isset($_POST['rdcheck']) ? $_POST['rdcheck'] : 0;
			if(!empty($ns_id)){
				$sql="INSERT INTO `bannganh_nhansu`(`bn_id`, `ns_id`, `bn_ns_quyen`, `qh_id`) VALUES ($bn_id,$ns_id,'Trưởng ban',0)";
				$qr=mysqli_query($con, $sql);
				if(!$qr) die("Lỗi truy vấn CSDL!");
				redirect("index.php?page=qlbannganh",0);
			}
		}
		include_once "layout/qlbannganh/truongban.php";
		break;
	case "huytruongban":
		$bn_ns_id=isset($_GET['bn_ns_id']) ? filter_data($_GET['bn_ns_id']) : 0;
		$sql="DELETE FROM bannganh_nhansu WHERE bn_ns_id=$bn_ns_id";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die('Lỗi truy vấn CSDL!');
		redirect("?page=qlbannganh",0);
		include_once "layout/qlbannganh/truongban.php";
	case "bonhiem":
		$slchucvu=isset($_POST['slChucVu']) ? $_POST['slChucVu'] : 0;
		if(isset($_POST['submit'])){
			$multi_id=isset($_POST['multicheck']) ? $_POST['multicheck'] : '';
			if(empty($multi_id)){
				show_error("Phải chọn ít nhất 1 nhân sự!");
				include_once "layout/qlbannganh/bonhiem.php";
				exit();
			}
			foreach($multi_id as $key => $val){
				$sql="INSERT INTO `bannganh_nhansu`(`bn_id`, `ns_id`, `bn_ns_quyen`, `qh_id`) VALUES ($bn_id,$val,'$slchucvu',0)";
				$rs=mysqli_query($con, $sql);
				if(!$rs) die("Lỗi truy vấn CSDL");
			}
			
		}
		include_once "layout/qlbannganh/bonhiem.php";
		break;
	case "deletepeople":
		$bn_ns_id=isset($_GET['bn_ns_id']) ? filter_data($_GET['bn_ns_id']) : 0;
		$confirm="yes";
		if(isset($_POST['delete'])){
			$confirm="";
			$bn_ns_id=isset($_POST['bn_ns_id']) ? filter_data($_POST['bn_ns_id']) : 0;
			$sql="DELETE FROM bannganh_nhansu WHERE bn_ns_id=$bn_ns_id";
			$qr=mysqli_query($con, $sql);
			redirect("index.php?page=qlbannganh&act=list&bn_id=$bn_id",0);
		}
		include_once "layout/qlbannganh/list.php";
		break;
	case "list":
		include_once "layout/qlbannganh/list.php";
		break;
	default:
		include_once "layout/qlbannganh/index.php";
		break;
}
?>