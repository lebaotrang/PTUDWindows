<?php
if(!isset($_SESSION['user_name'])) redirect('index.php', 0);
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;

if(!isset($hk)) $hk = HKy_Hientai();
if(!isset($nk)) $nk = NK_HienTai();
switch($act){
	case "huydangkyhp":
		if(isset($_POST['submitHuyHP'])){
			$id = isset($_POST['idhuy']) ? $_POST['idhuy'] : array();
			$hk = isset($_POST['hk']) ? $_POST['hk'] : HKy_Hientai();
			$nk = isset($_POST['nk']) ? $_POST['nk'] : NK_Hientai();

			$sql = "SELECT * FROM sinhvien WHERE sv_email='".$_SESSION['user_name']."'";
			$qr = mysqli_query($con, $sql);
			$sv_id = mysqli_fetch_object($qr)->sv_id;

			$sql = "SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk";
			$qr = mysqli_query($con, $sql);
			$hknk_id = mysqli_fetch_object($qr)->hknk_id;

			if(!empty($id)){
				foreach ($id as $id) {
					$sql1 = "DELETE FROM `dangkymonhoc` WHERE sv_id=$sv_id AND mh_id=$id AND hknk_id=$hknk_id";
					$qr1 = mysqli_query($con, $sql1);
				}
				redirect("index.php?page=qldangkyhp");
			}
		}
		//include_once "./layout/sinhvien/qldangkyhp.php";
		break;
	case "dangkyhp":
		if(isset($_POST['submitHP'])){
			$id = isset($_POST['id']) ? $_POST['id'] : array();
			$hk = isset($_POST['hk']) ? $_POST['hk'] : HKy_Hientai();
			$nk = isset($_POST['nk']) ? $_POST['nk'] : NK_Hientai();

			$sql = "SELECT * FROM sinhvien WHERE sv_email='".$_SESSION['user_name']."'";
			$qr = mysqli_query($con, $sql);
			$sv_id = mysqli_fetch_object($qr)->sv_id;

			$sql = "SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk";
			$qr = mysqli_query($con, $sql);
			$hknk_id = mysqli_fetch_object($qr)->hknk_id;

			if(!empty($id)){
				foreach ($id as $id) {
					$sql1 = "INSERT INTO `dangkymonhoc`(`mh_id`, `sv_id`, `hknk_id`) VALUES ($id,$sv_id,$hknk_id)";
					$qr1 = mysqli_query($con, $sql1);
				}
				redirect("index.php?page=qldangkyhp");
			}
		}
		include_once "./layout/sinhvien/qldangkyhp.php";
		break;
	default:
		$sql = "SELECT * FROM sinhvien WHERE sv_email='".$_SESSION['user_name']."'";
		$qr = mysqli_query($con, $sql);
		$row = mysqli_fetch_object($qr);
		$dt_id = $row->dt_id;
		$sv_id = $row ->sv_id;

		$sql1 = "SELECT * FROM monhoc WHERE mh_id IN 
				(SELECT m_id FROM hockynienkhoa a, hknk_mon b 
				WHERE hocky=$hk AND nienkhoa=$nk AND a.hknk_id=b.hknk_id) AND dt_id=$dt_id";
				//echo $sql1;
		$qr1 = mysqli_query($con, $sql1);

		$hk = isset($_POST['hk']) ? $_POST['hk'] : HKy_Hientai();
		$nk = isset($_POST['nk']) ? $_POST['nk'] : NK_Hientai();
		$sql = "SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk";
		$qr = mysqli_query($con, $sql);
		$hknk_id = mysqli_fetch_object($qr)->hknk_id;

		$sql2 = "SELECT * FROM sinhvien a, dangkymonhoc b, monhoc c
				 WHERE a.sv_id=b.sv_id AND b.mh_id=c.mh_id AND a.sv_id=$sv_id AND hknk_id=$hknk_id";
		//echo $sql2;
		$qr2 = mysqli_query($con, $sql2);
		include_once "./layout/sinhvien/qldangkyhp.php";
		break;
}
?>