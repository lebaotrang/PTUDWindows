<?php
if(!in_array(3, $_SESSION['user_quyen'])) redirect('index.php', 0);
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;

$mact = isset($_POST['txtMaCT']) ? filter_data($_POST['txtMaCT']) : NULL;

if(!isset($dt_id)) $dt_id=1;
if(!isset($hk)) $hk = HKy_Hientai();
if(!isset($nk)) $nk = NK_HienTai();
switch($act){
	case "molop":
		include_once "./layout/giangvien/khdaotao_molop.php";
		break;
	case "xoamon":
		$hk = isset($_GET['slhocky']) ? $_GET['slhocky'] : HKy_Hientai();
		$nk = isset($_GET['slnienkhoa']) ? $_GET['slnienkhoa'] : NK_Hientai();
		if(isset($_POST['submitHP'])){
			$hk = isset($_POST['hk']) ? $_POST['hk'] : 0;
			$nk = isset($_POST['nk']) ? $_POST['nk'] : 0;
			$sql = "SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk"; //echo $sql;
			$qr = mysqli_query($con, $sql);
			$hknk_id = mysqli_fetch_object($qr)->hknk_id;

			$id = isset($_POST['id']) ? $_POST['id'] : array(); //var_dump($id);
			if(!empty($id) && $hk!=0 && $nk!=0){
				foreach ($id as $id) {
					$sql = "DELETE FROM hknk_mon WHERE hknk_id=$hknk_id AND m_id=$id";
					echo $sql;
					$qr = mysqli_query($con, $sql);
				}
				redirect("index.php?page=khdaotao");
			}
		}
		break;
	case "themmon":
		//$dt_id = isset($_POST['slDaoTao']) ? $_POST['slDaoTao'] : 1; //var_dump($dt_id);
		$daotao=isset($_GET['sldaotao']) ? $_GET['sldaotao'] : 1;
		$hk = isset($_GET['slhocky']) ? $_GET['slhocky'] : HKy_Hientai();
		$nk = isset($_GET['slnienkhoa']) ? $_GET['slnienkhoa'] : NK_Hientai();

		if(isset($_POST['submitHP'])){
			$dt_id = isset($_POST['dt_id']) ? $_POST['dt_id'] : 1; //var_dump($dt_id);
			$hk = isset($_POST['hk']) ? $_POST['hk'] : 0;
			$nk = isset($_POST['nk']) ? $_POST['nk'] : 0;
			$id = isset($_POST['id']) ? $_POST['id'] : array(); //var_dump($id);
			if(!empty($id) && $hk!=0 && $nk!=0){
				foreach ($id as $id) {
					$sql = "SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk";
					$qr = mysqli_query($con, $sql);
					$hknk_id = mysqli_fetch_object($qr)->hknk_id;
					$sql1 = "INSERT INTO `hknk_mon`(`hknk_id`, `m_id`) VALUES ($hknk_id,$id)";
					$qr1 = mysqli_query($con, $sql1);
				}
				redirect("index.php?page=khdaotao");
			}
			
		}

		$sql = "SELECT * FROM monhoc WHERE mh_id NOT IN (SELECT m_id FROM hockynienkhoa a, hknk_mon b 
				WHERE hocky=$hk AND nienkhoa=$nk AND a.hknk_id=b.hknk_id) AND dt_id=$daotao";
		$qr = mysqli_query($con, $sql);
		include_once "./layout/giangvien/khdaotao_themmon.php";
		break;
	default:
		$sql = "SELECT * FROM monhoc WHERE mh_id IN 
				(SELECT m_id FROM hockynienkhoa a, hknk_mon b 
				WHERE hocky=$hk AND nienkhoa=$nk AND a.hknk_id=b.hknk_id) AND dt_id=$dt_id";
				//echo $sql;
		$qr = mysqli_query($con, $sql);
		include_once "./layout/giangvien/khdaotao.php";
		break;
}
?>