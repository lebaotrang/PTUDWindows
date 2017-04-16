<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$act=isset($_GET['act']) ? filter_data($_GET['act']) : '';

$tt_id=isset($_GET['tt_id']) ? filter_data($_GET['tt_id']) : 0;
$tt_loai=isset($_GET['tt_loai']) ? filter_data($_GET['tt_loai']) : 0;
$title=isset($_POST['title']) ? filter_data($_POST['title']) : '';
$short=isset($_POST['short']) ? filter_data($_POST['short']) : '';
$people=isset($_POST['people']) ? filter_data($_POST['people']) : '';
$slcategory=isset($_POST['slCategory']) ? $_POST['slCategory'] : 0;
$slquanhuyen=isset($_POST['slQuanHuyen']) ? $_POST['slQuanHuyen'] : NULL;
$slbannganh=isset($_POST['slBanNganh']) ? $_POST['slBanNganh'] : 0;
$date=date("Y-m-d");
$description=isset($_POST['description']) ? filter_data($_POST['description']) : '';

switch ($act){
	case "add":
		if(isset($_POST['submit'])){
			$taptin=$_FILES['image'];
			if(empty($title) || empty($short) || $slbannganh==0 || $slcategory==0 || empty($description) || ($slcategory==1 && empty($slquanhuyen))){
				show_error("Điền đầy đủ tất cả các trường có dấu (*)!");
				include_once "layout/qltintuc/add.php";
				exit();
			}
			if(!empty($taptin['name'])){
				if($taptin['type']=="image/jpg" || $taptin['type']=="image/png" ||$taptin['type']=="image/jpeg" || $taptin['type']=="image/gif"){
					if($taptin['size']<=2097152)
						$tentaptin=$taptin['name'];
					else{
						show_error("Dung lượng ảnh vượt quá 2Mb!");
						include_once "layout/qltintuc/add.php";
						exit();
					}
				}
				else{
					show_error("Định dạng file ảnh không đúng!");
					include_once "layout/qltintuc/add.php";
					exit();
				}
				$tentaptin=$tt_id."_".$taptin['name'];
				copy($taptin['tmp_name'],"../img/tintuc/".$tentaptin);
				$image_1 = new SimpleImage();
				$image_1->load($taptin['tmp_name']);
				$image_1->resize(400,300);
				$image_1->save("../img/tintuc/".$tentaptin);
			}
			else
				$tentaptin="default-img.jpg";
			if(empty($slquanhuyen))
				$sql="INSERT INTO `tin_tuc`(`tt_tieude`, `tt_tomtat`, `tt_noidung`, `tt_hinhdaidien`, `tt_ngaydang`, `tt_nguoidang`, `tt_luotxem`, `tt_loai`, `bn_id`, `qh_id`) 
					  VALUES ('$title', '$short', '$description', '$tentaptin', '$date', '$people', 0, $slcategory, $slbannganh, NULL)";
			else
				$sql="INSERT INTO `tin_tuc`(`tt_tieude`, `tt_tomtat`, `tt_noidung`, `tt_hinhdaidien`, `tt_ngaydang`, `tt_nguoidang`, `tt_luotxem`, `tt_loai`, `bn_id`, `qh_id`) 
					  VALUES ('$title', '$short', '$description', '$tentaptin', '$date', '$people', 0, $slcategory, $slbannganh, $slquanhuyen)";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
		}
		include_once "layout/qltintuc/add.php";
		break;
	case "detail":
		include_once "layout/qltintuc/detail.php";
		break;
	case "edit":
		if($tt_loai!=1 && $tt_loai!=2)
			redirect("index.php?page=qltintuc&loai=1");
		
		if($tt_loai==1)
			$sql="SELECT * FROM tin_tuc tt, quan_huyen qh, ban_nganh bn WHERE tt.qh_id=qh.qh_id AND tt.bn_id=bn.bn_id AND tt_id=$tt_id";
		else
			$sql="SELECT * FROM tin_tuc tt, ban_nganh bn WHERE tt.bn_id=bn.bn_id AND tt_id=$tt_id"; 
		$qr=mysqli_query($con, $sql);
		if(!$qr) die('Lỗi truy vấn CSDL!');
		if(mysqli_num_rows($qr)<=0)
			redirect("?page=qltintuc&tt_loai=1",0);
		$row=mysqli_fetch_array($qr);
		
		if(isset($_POST['submit'])){
			$slquanhuyen=isset($_POST['slQuanHuyen']) ? $_POST['slQuanHuyen'] : 'NULL';
			$tt_loai=isset($_POST['slCategory']) ? filter_data($_POST['slCategory']) : 0;
			//echo $slquanhuyen."-".$tt_loai;
			if(empty($title) || empty($short) || $slbannganh==0 || $slcategory==0 || empty($description) || ($slcategory==1 && empty($slquanhuyen))){
				show_error("Điền đầy đủ tất cả các trường có dấu (*)!");
				include_once "layout/qltintuc/edit.php";
				exit();
			}
			$taptin=$_FILES['image'];
			if(!empty($taptin['name'])){
				if($taptin['type']=="image/jpg" || $taptin['type']=="image/png" ||$taptin['type']=="image/jpeg" || $taptin['type']=="image/gif"){
					if($taptin['size']<=2097152)
						$tentaptin=$taptin['name'];
					else{
						show_error("Dung lượng ảnh vượt quá 2Mb!");
						include_once "layout/qltintuc/edit.php";
						exit();
					}
				}
				else{
					show_error("Định dạng file ảnh không đúng!");
					include_once "layout/qltintuc/edit.php";
					exit();
				}
				$tentaptin=$tt_id."_".$taptin['name'];
				copy($taptin['tmp_name'],"../img/tintuc/".$tentaptin);
				$image_1 = new SimpleImage();
				$image_1->load($taptin['tmp_name']);
				$image_1->resize(400,300);
				$image_1->save("../img/tintuc/".$tentaptin);
				
				if(strcmp($row['tt_hinhdaidien'], "default-img.jpg")!=0)
				unlink("../img/tintuc/".$row['tt_hinhdaidien']);
			}
			else
				$tentaptin="default-img.jpg";
			
			if($tt_loai==1){
				if(strcmp($tentaptin, "default-img.jpg")!=0)
					//echo "1";
					$sql="UPDATE `tin_tuc` SET `tt_tieude`='$title',`tt_tomtat`='$short',`tt_noidung`='$description',`tt_hinhdaidien`='$tentaptin',
					 `tt_nguoidang`='$people',`tt_loai`=$slcategory,`bn_id`=$slbannganh,`qh_id`=$slquanhuyen WHERE `tt_id`=$tt_id";
				else
					//echo "2";
					$sql="UPDATE `tin_tuc` SET `tt_tieude`='$title',`tt_tomtat`='$short',`tt_noidung`='$description',
					 `tt_nguoidang`='$people',`tt_loai`=$slcategory,`bn_id`=$slbannganh,`qh_id`=$slquanhuyen WHERE `tt_id`=$tt_id";
			}
			else{
				if(strcmp($tentaptin, "default-img.jpg")!=0)
					//echo "3";
					$sql="UPDATE `tin_tuc` SET `tt_tieude`='$title',`tt_tomtat`='$short',`tt_noidung`='$description',`tt_hinhdaidien`='$tentaptin',
					 `tt_nguoidang`='$people',`tt_loai`=$slcategory,`bn_id`=$slbannganh,`qh_id`=NULL WHERE `tt_id`=$tt_id";
				else
					//echo "4";
					$sql="UPDATE `tin_tuc` SET `tt_tieude`='$title',`tt_tomtat`='$short',`tt_noidung`='$description',
					 `tt_nguoidang`='$people',`tt_loai`=$slcategory,`bn_id`=$slbannganh,`qh_id`=NULL WHERE `tt_id`=$tt_id";
			}
			//echo $sql; die();
			$qr=mysqli_query($con, $sql);
			if(!$qr) die('Lỗi truy vấn CSDL!');
			redirect("?page=qltintuc&act=edit&tt_loai=$tt_loai&tt_id=$tt_id",0);
		}
		include_once "layout/qltintuc/edit.php";
		break;
	case "delete":
		$confirm="yes";
		$tt_id=isset($_GET['tt_id']) ? filter_data($_GET['tt_id']) : 0;
		if($tt_id<=0 || !is_numeric($tt_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="DELETE FROM tin_tuc WHERE tt_id=$tt_id";
			$qr=mysqli_query($con, $sql);
			redirect("index.php?page=qltintuc",0);
		}
		include_once "layout/qltintuc/index.php";
		break;
	default:
		include_once "layout/qltintuc/index.php";
		break;
}
?>