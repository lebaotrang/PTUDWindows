<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$act=isset($_GET['act']) ? filter_data($_GET['act']) : '';
$lh_id=isset($_GET['lh_id']) ? filter_data($_GET['lh_id']) : 0;

switch ($act){
	case "add":
		break;
	case "delete":
		$confirm="yes";
		if($lh_id<=0 || !is_numeric($lh_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="DELETE FROM lien_he WHERE lh_id=$lh_id";
			$qr=mysqli_query($con, $sql);
			redirect("index.php?page=qllienhe",0);
		}
		include_once "layout/qllienhe/index.php";
		break;
	default:
		include_once "layout/qllienhe/index.php";
		break;
}