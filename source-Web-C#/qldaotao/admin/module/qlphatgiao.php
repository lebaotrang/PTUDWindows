<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$act=isset($_GET['act']) ? filter_data($_GET['act']) : '';

$pg_id=isset($_GET['pg_id']) ? filter_data($_GET['pg_id']) : 0;
$title=isset($_POST['title']) ? filter_data($_POST['title']) : '';
$short=isset($_POST['short']) ? filter_data($_POST['short']) : '';
$people=isset($_POST['people']) ? filter_data($_POST['people']) : '';
//$slcategory bổ sung chọn loại nếu có phát sinh
$slcategory=isset($_POST['slCategory']) ? $_POST['slCategory'] : 1;
$date=date("Y-m-d");
$description=isset($_POST['description']) ? filter_data($_POST['description']) : '';

switch ($act){
	case "add":
		if(isset($_POST['submit'])){
			$taptin=$_FILES['image'];
			if(empty($title) || empty($short) || empty($people) || empty($description) || empty($taptin['name'])){
				show_error("Điền đầy đủ tất cả các trường có dấu (*)!");
				include_once "layout/qlphatgiao/add.php";
				exit();
			}
			if(!empty($taptin['name'])){
				if($taptin['type']=="image/jpg" || $taptin['type']=="image/png" ||$taptin['type']=="image/jpeg" || $taptin['type']=="image/gif"){
					if($taptin['size']<=2097152)
						$tentaptin=$taptin['name'];
					else{
						show_error("Dung lượng ảnh vượt quá 2Mb!");
						include_once "layout/qlphatgiao/add.php";
						exit();
					}
				}
				else{
					show_error("Định dạng file ảnh không đúng!");
					include_once "layout/qlphatgiao/add.php";
					exit();
				}
				$tentaptin=$pg_id."_".$taptin['name'];
				copy($taptin['tmp_name'],"../img/phatgiao/".$tentaptin);
				$image_1 = new SimpleImage();
				$image_1->load($taptin['tmp_name']);
				$image_1->resize(400,300);
				$image_1->save("../img/phatgiao/".$tentaptin);
			}
			$sql="INSERT INTO `phat_giao`(`pg_tieude`, `pg_tomtat`, `pg_noidung`, `pg_hinhdaidien`, `pg_ngaydang`, `pg_tacgia`, `pg_luotxem`, `lgp_id`) 
				  VALUES ('$title','$short','$description','$tentaptin','$date','$people',0,$slcategory)";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
		}
		include_once "layout/qlphatgiao/add.php";
		break;
	case "detail":
		include_once "layout/qlphatgiao/detail.php";
		break;
	case "edit":
		$sql="SELECT * FROM phat_giao WHERE pg_id=$pg_id"; 
		$qr=mysqli_query($con, $sql);
		if(!$qr) die('Lỗi truy vấn CSDL!');
		if(mysqli_num_rows($qr)<=0)
			redirect("?page=qlphatgiao&pg_loai=1",0);
		$row=mysqli_fetch_array($qr);
		
		if(isset($_POST['submit'])){
			if(empty($title) || empty($short) || empty($description) || empty($people)){
				show_error("Điền đầy đủ tất cả các trường có dấu (*)!");
				include_once "layout/qlphatgiao/edit.php";
				exit();
			}
			$taptin=$_FILES['image'];
			if(!empty($taptin['name'])){
				if($taptin['type']=="image/jpg" || $taptin['type']=="image/png" ||$taptin['type']=="image/jpeg" || $taptin['type']=="image/gif"){
					if($taptin['size']<=2097152)
						$tentaptin=$taptin['name'];
					else{
						show_error("Dung lượng ảnh vượt quá 2Mb!");
						include_once "layout/qlphatgiao/edit.php";
						exit();
					}
				}
				else{
					show_error("Định dạng file ảnh không đúng!");
					include_once "layout/qlphatgiao/edit.php";
					exit();
				}
				$tentaptin=$pg_id."_".$taptin['name'];
				copy($taptin['tmp_name'],"../img/tintuc/".$tentaptin);
				$image_1 = new SimpleImage();
				$image_1->load($taptin['tmp_name']);
				$image_1->resize(400,300);
				$image_1->save("../img/phatgiao/".$tentaptin);
				unlink("../img/phatgiao/".$row['pg_hinhdaidien']);
				$sql="UPDATE `phat_giao` SET `pg_tieude`='$title',`pg_tomtat`='$short',`pg_noidung`='$description',`pg_hinhdaidien`='$tentaptin',
					 `pg_ngaydang`='$date',`pg_tacgia`='$people',`lgp_id`=1 WHERE `pg_id`=$pg_id";
			}	
			else{
				$sql="UPDATE `phat_giao` SET `pg_tieude`='$title',`pg_tomtat`='$short',`pg_noidung`='$description',
					 `pg_ngaydang`='$date',`pg_tacgia`='$people',`lgp_id`=1 WHERE `pg_id`=$pg_id";
			}
			$qr=mysqli_query($con, $sql); //echo $sql;
			if(!$qr) die('Lỗi truy vấn CSDL!');
			redirect("?page=qlphatgiao&act=edit&pg_id=$pg_id",0);
		}
		include_once "layout/qlphatgiao/edit.php";
		break;
	case "delete":
		$confirm="yes";
		$pg_id=isset($_GET['pg_id']) ? filter_data($_GET['pg_id']) : 0;
		if($pg_id<=0 || !is_numeric($pg_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="SELECT pg_id, pg_hinhdaidien FROM phat_giao WHERE pg_id=$pg_id";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
			if(mysqli_num_rows($qr)<=0)
				redirect("index.php?page=qlphatgiao");
			else{
				$row=mysqli_fetch_array($qr);
				unlink ("../img/phatgiao/".$row['pg_hinhdaidien']);
				$sql="DELETE FROM phat_giao WHERE pg_id=$pg_id";
				$qr=mysqli_query($con, $sql);
				redirect("index.php?page=qlphatgiao",0);
			}
			
		}
		include_once "layout/qlphatgiao/index.php";
		break;
	default:
		include_once "layout/qlphatgiao/index.php";
		break;
}
?>